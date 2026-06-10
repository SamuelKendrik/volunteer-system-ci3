<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Review_m');
        $this->load->model('Homepage_m');
    }

    public function index()
    {
        $reviews = $this->Review_m->getByEvent(1);

        $data['reviews'] = $reviews ? $reviews : [];

        $data['featuredEvents'] =
            $this->Homepage_m->getFeaturedEvents();

        $data['binusEvents'] =
            $this->Homepage_m->getBinusEvents();

        $this->load->view('homepage', $data);
    }

    public function get_reviews($event_id)
    {
        $reviews =
            $this->Review_m->getByEvent($event_id);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($reviews));
    }
}