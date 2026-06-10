<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Event extends RestController {

    public function __construct() {
        parent::__construct();
        $this->load->model('Event_m');
    }

    public function events_get() {

        $title = $this->get('title');

        if ($title) {
            $events = $this->Event_m->searchEvents($title);
        } else {
            $events = $this->Event_m->getAllEvents();
        }

        return $this->response([
            'status' => true,
            'data' => $events
        ], 200);
    }

    public function registeredByEvent_get() {

        $event_id = $this->get('event_id');

        if (!$event_id) {
            return $this->response([
                'status' => false,
                'message' => 'event_id is required'
            ], 400);
        }

        $data = $this->Event_m->getRegisteredByEvent($event_id);

        return $this->response([
            'status' => true,
            'data' => $data
        ], 200);
    }

    public function registeredByUserEvent_get()
    {
        $user_id = $this->get('user_id');
        $event_id = $this->get('event_id');

        if (!$user_id || !$event_id) {
            return $this->response([
                'status' => false,
                'message' => 'user_id and event_id required'
            ], 400);
        }

        $data = $this->Event_m->checkUserEvent($user_id, $event_id);

        return $this->response([
            'status' => true,
            'data' => $data ? true : false
        ], 200);
    }

    public function batchUpdate_put() {

        $data = $this->put('data');

        if (!$data || !is_array($data)) {
            return $this->response([
                'status' => false,
                'message' => 'Invalid data format'
            ], 400);
        }

        $updated_count = 0;

        foreach ($data as $row) {

            if (!isset($row['id'])) {
                continue;
            }

            $update = [];

            if (isset($row['status'])) {
                $update['status'] = $row['status'];
            }

            if (isset($row['attendance'])) {
                $update['attendance'] = $row['attendance'];
            }

            if (!empty($update)) {
                $this->Event_m->updateById($row['id'], $update);
                $updated_count++;
            }
        }

        return $this->response([
            'status' => true,
            'message' => 'Batch update completed',
            'updated_rows' => $updated_count
        ], 200);
    }

    public function register_post() {

        $user_id = $this->post('user_id');
        $event_id = $this->post('event_id');

        if (!$user_id || !$event_id) {
            return $this->response([
                'status' => false,
                'message' => 'user_id and event_id are required'
            ], 400);
        }

        $data = [
            'user_id' => $user_id,
            'event_id' => $event_id,
            'status' => '',
            'attendance' => '',
            'registered_at' => date('Y-m-d H:i:s')
        ];

        $insert = $this->Event_m->insertVolunteer($data);

        if ($insert) {
            return $this->response([
                'status' => true,
                'message' => 'Successfully registered for event'
            ], 200);
        }

        return $this->response([
            'status' => false,
            'message' => 'Failed to register'
        ], 500);
    }

    public function volunteer_put() {

        $id = $this->put('id');
        $status = $this->put('status');
        $attendance = $this->put('attendance');

        if (!$id) {
            return $this->response([
                'status' => false,
                'message' => 'id is required'
            ], 400);
        }

        $data = [];

        if ($status !== null) {
            $data['status'] = $status;
        }

        if ($attendance !== null) {
            $data['attendance'] = $attendance;
        }

        if (empty($data)) {
            return $this->response([
                'status' => false,
                'message' => 'No data to update'
            ], 400);
        }

        $update = $this->Event_m->updateVolunteer($id, $data);

        if ($update) {
            return $this->response([
                'status' => true,
                'message' => 'Successfully updated'
            ], 200);
        }

        return $this->response([
            'status' => false,
            'message' => 'Update failed'
        ], 500);
    }
}