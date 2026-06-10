<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Account_m');
        $this->load->model('Organizer_m');
    }

    public function index()
    {
        $userId = $this->session->userdata('userId');

        $this->load->model('Organizer_m');

        $response = $this->Organizer_m->getMyEvents($userId);

        $data['myEvents'] = $response->data ?? [];
        $data['user'] = $this->Account_m->getProfile($userId)->data ?? null;

        $this->load->view('account', $data);
    }

    public function updateEvent($id)
    {
        $this->load->model('Organizer_m');

        $data = [
            'user_id' => $this->session->userdata('userId'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'location' => $this->input->post('location'),
            'event_date' => $this->input->post('event_date'),
            'max_quota' => $this->input->post('max_quota'),
            'hours_reward' => $this->input->post('hours_reward')
        ];

        $response = $this->Organizer_m->updateEvent($id, $data);

        if ($response && $response->status) {
            redirect('account');
        } else {
            show_error($response->message ?? 'Update failed');
        }
    }

    public function update()
    {
        $userId = $this->input->post('id');

        $data = [
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email')
        ];

        $password = $this->input->post('password');

        if (!empty($password)) {
            $data['password'] = $password;
        }

        $response = $this->Account_m->updateProfile($userId, $data);

        if ($response->status) {
            redirect('account');
        } else {
            show_error($response->message);
        }
    }
}