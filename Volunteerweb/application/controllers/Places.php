<?php

defined('BASEPATH')
    OR exit('No direct script access allowed');

class Places extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Places_m');
    }

    public function index()
    {
        $events = $this->Places_m->getAllEvents();

        $user_id = $this->session->userdata('userId');

        foreach ($events as $event) {

            $check = $this->Places_m->checkJoined($user_id, $event->id);

            $event->joined = $check ? true : false;
        }

        $data['events'] = $events;

        $this->load->view('places', $data);
    }

    public function createEvent()
    {
        $this->load->model('Places_m');
        $result = $this->Places_m->createEvent($_POST);
        echo json_encode($result);
    }

    public function joinEvent()
    {
        $data = [
            'user_id' => $this->session->userdata('userId'),
            'event_id' => $this->input->post('event_id')
        ];

        $result = $this->Places_m->joinEvent($data);

        redirect('places');
    }
}