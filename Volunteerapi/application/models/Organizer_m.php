<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organizer_m extends CI_Model {

    public function createEvent($data) 
    {
        return $this->db->insert('events', $data);
    }

    public function updateEvent($id, $data) 
    {
        $this->db->where('id', $id);
        return $this->db->update('events', $data);
    }

    public function deleteEvent($id) 
    {
        $this->db->where('id', $id);
        return $this->db->delete('events');
    }

    public function updateParticipant($id, $data) 
    {
        $this->db->where('id', $id);
        return $this->db->update('registrations', $data);
    }

    public function getEventById($id) 
    {
        return $this->db
            ->get_where('events', ['id' => $id])
            ->row();
    }

    public function getEventsByOrganizer($organizerId)
    {
        return $this->db
            ->where('created_by', $organizerId)
            ->order_by('event_date', 'ASC')
            ->get('events')
            ->result();
    }
}