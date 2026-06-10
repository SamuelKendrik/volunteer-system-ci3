<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_m extends CI_Model {

    public function getAllEvents() {

        return $this->db
            ->order_by('event_date', 'ASC')
            ->get('events')
            ->result();
    }

    public function searchEvents($title) {

        return $this->db
            ->like('title', $title)
            ->order_by('event_date', 'ASC')
            ->get('events')
            ->result();
    }

    public function insertVolunteer($data) {
        return $this->db->insert('registrations', $data);
    }

    public function updateVolunteer($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('registrations', $data);
    }

    public function getRegisteredByEvent($event_id) {

        $this->db->select('
            registrations.id as registration_id,
            registrations.user_id,
            registrations.event_id,
            registrations.status,
            registrations.attendance,
            registrations.registered_at,
            users.username,
            users.email
        ');

        $this->db->from('registrations');
        $this->db->join('users', 'users.id = registrations.user_id');
        $this->db->where('registrations.event_id', $event_id);

        return $this->db->get()->result();
    }

    public function updateById($id, $data) {

        $this->db->where('id', $id);
        return $this->db->update('registrations', $data);
    }

    public function checkUserEvent($user_id, $event_id)
    {
        return $this->db
            ->where('user_id', $user_id)
            ->where('event_id', $event_id)
            ->get('registrations')
            ->row();
    }
}