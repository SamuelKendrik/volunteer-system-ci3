<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Auth_m');
    }

    public function login()
    {
        $this->load->view('auth/login');
    }

    public function loginProcess()
    {
        $payload = [
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        ];

        $response = $this->Auth_m->login($payload);

        if ($response && $response->status) {

            $session = [
                'userId'   => $response->data->userId,
                'username' => $response->data->username,
                'role'     => $response->data->role,
                'loggedIn' => true
            ];

            $this->session->set_userdata($session);

            redirect('homepage');
        }

        $this->session->set_flashdata(
            'error',
            $response->message ?? 'Login gagal'
        );

        redirect('auth/login');
    }

    public function register()
    {
        $this->load->view('auth/register');
    }

    public function registerProcess()
    {
        $payload = [
            'username' => $this->input->post('username'),
            'email'    => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'role'     => $this->input->post('role')
        ];

        $response = $this->Auth_m->register($payload);

        if ($response && $response->status) {

            $this->session->set_flashdata(
                'success',
                'Register berhasil'
            );

            redirect('auth/login');
        }

        $this->session->set_flashdata(
            'error',
            $response->message ?? 'Register gagal'
        );

        redirect('auth/register');
    }

    public function logout()
    {
        $this->session->unset_userdata('userId');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('loggedIn');

        $this->session->sess_destroy();

        redirect('auth/login');
    }
}