<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Organizer extends RestController {

    public function __construct() {
        parent::__construct();

        $this->load->model('Organizer_m');
        $this->load->model('Auth_m');
    }

    public function myEvents_get() {

        $userId = $this->get('user_id');

        $user = $this->Auth_m->getById($userId);

        if (!$user || $user->role !== 'organizer') {

            return $this->response([
                'status' => false,
                'message' => 'Access denied'
            ], 403);
        }

        $events = $this->Organizer_m->getEventsByOrganizer(
            $user->id
        );

        return $this->response([
            'status' => true,
            'data' => $events
        ], 200);
    }

    public function createEvent_post() {

        $user = $this->Auth_m->getById(
            $this->post('user_id')
        );

        if (!$user || $user->role !== 'organizer') {

            return $this->response([
                'status' => false,
                'message' => 'Access denied'
            ], 403);
        }

        $title = trim($this->post('title'));
        $description = trim($this->post('description'));
        $location = trim($this->post('location'));
        $event_date = trim($this->post('event_date'));
        $quota = $this->post('max_quota');
        $hours_reward = $this->post('hours_reward');

        if (
            empty($title) ||
            empty($description) ||
            empty($location) ||
            empty($event_date) ||
            empty($quota) ||
            empty($hours_reward)
        ) {

            return $this->response([
                'status' => false,
                'message' => 'All fields are required'
            ], 400);
        }

        $data = [
            'title' => $title,
            'description' => $description,
            'location' => $location,
            'event_date' => $event_date,
            'max_quota' => $quota,
            'hours_reward' => $hours_reward,
            'created_by' => $user->id
        ];

        $create = $this->Organizer_m->createEvent($data);

        if (!$create) {

            return $this->response([
                'status' => false,
                'message' => 'Failed create event'
            ], 500);
        }

        return $this->response([
            'status' => true,
            'message' => 'Event created'
        ], 201);
    }

    public function updateEvent_put($id) {

        $user = $this->Auth_m->getById(
            $this->put('user_id')
        );

        if (!$user || $user->role !== 'organizer') {

            return $this->response([
                'status' => false,
                'message' => 'Access denied'
            ], 403);
        }

        $event = $this->Organizer_m->getEventById($id);

        if (!$event) {

            return $this->response([
                'status' => false,
                'message' => 'Event not found'
            ], 404);
        }

        if ($event->created_by != $user->id) {

            return $this->response([
                'status' => false,
                'message' => 'Not your event'
            ], 403);
        }

        $title = trim($this->put('title'));
        $description = trim($this->put('description'));
        $location = trim($this->put('location'));
        $event_date = trim($this->put('event_date'));
        $quota = $this->put('max_quota');
        $hours_reward = $this->put('hours_reward');

        if (
            empty($title) ||
            empty($description) ||
            empty($location) ||
            empty($event_date) ||
            empty($quota) ||
            empty($hours_reward)
        ) {

            return $this->response([
                'status' => false,
                'message' => 'All fields are required'
            ], 400);
        }

        $noChanges =
            $event->title == $title &&
            $event->description == $description &&
            $event->location == $location &&
            $event->event_date == $event_date &&
            $event->max_quota == $quota &&
            $event->hours_reward == $hours_reward;

        if ($noChanges) {

            return $this->response([
                'status' => false,
                'message' => 'No changes detected'
            ], 400);
        }

        $data = [
            'title' => $title,
            'description' => $description,
            'location' => $location,
            'event_date' => $event_date,
            'max_quota' => $quota,
            'hours_reward' => $hours_reward
        ];

        $update = $this->Organizer_m->updateEvent($id, $data);

        if (!$update) {

            return $this->response([
                'status' => false,
                'message' => 'Failed update event'
            ], 500);
        }

        return $this->response([
            'status' => true,
            'message' => 'Event updated'
        ], 200);
    }

    public function deleteEvent_delete($id) {

        $user = $this->Auth_m->getById(
            $this->delete('user_id')
        );

        if (!$user || $user->role !== 'organizer') {

            return $this->response([
                'status' => false,
                'message' => 'Access denied'
            ], 403);
        }

        $event = $this->Organizer_m->getEventById($id);

        if (!$event) {

            return $this->response([
                'status' => false,
                'message' => 'Event not found'
            ], 404);
        }

        if ($event->created_by != $user->id) {

            return $this->response([
                'status' => false,
                'message' => 'Not your event'
            ], 403);
        }

        $delete = $this->Organizer_m->deleteEvent($id);

        if (!$delete) {

            return $this->response([
                'status' => false,
                'message' => 'Failed delete event'
            ], 500);
        }

        return $this->response([
            'status' => true,
            'message' => 'Event deleted'
        ], 200);
    }

    public function acceptParticipant_put($registrationId) {

        $user = $this->Auth_m->getById(
            $this->put('user_id')
        );

        if (!$user || $user->role !== 'organizer') {

            return $this->response([
                'status' => false,
                'message' => 'Access denied'
            ], 403);
        }

        $update = $this->Organizer_m->updateParticipant(
            $registrationId,
            [
                'status' => 'accepted'
            ]
        );

        if (!$update) {

            return $this->response([
                'status' => false,
                'message' => 'Failed accept participant'
            ], 500);
        }

        return $this->response([
            'status' => true,
            'message' => 'Participant accepted'
        ], 200);
    }

    public function verifyAttendance_put($registrationId) {

        $user = $this->Auth_m->getById(
            $this->put('user_id')
        );

        if (!$user || $user->role !== 'organizer') {

            return $this->response([
                'status' => false,
                'message' => 'Access denied'
            ], 403);
        }

        $update = $this->Organizer_m->updateParticipant(
            $registrationId,
            [
                'attendance' => 'present'
            ]
        );

        if (!$update) {

            return $this->response([
                'status' => false,
                'message' => 'Failed verify attendance'
            ], 500);
        }

        return $this->response([
            'status' => true,
            'message' => 'Attendance verified'
        ], 200);
    }
}