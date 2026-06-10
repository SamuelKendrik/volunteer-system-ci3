<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review_m extends CI_Model {

    public function getByEvent($event_id)
    {
        $this->db->select('reviews.*, users.username, users.profile_pic');

        $this->db->from('reviews');

        $this->db->join(
            'users',
            'users.id = reviews.user_id',
            'left'
        );

        $this->db->where(
            'reviews.event_id',
            $event_id
        );

        return $this->db->get()->result();
    }
}