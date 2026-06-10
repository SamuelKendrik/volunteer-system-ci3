<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Account extends RestController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Account_m');
    }

    public function get_post()
    {
        $userId = $this->post('userId');

        $user = $this->Account_m->getById($userId);

        if (!$user) {
            return $this->response([
                'status' => false,
                'message' => 'User not found'
            ], 404);
        }

        return $this->response([
            'status' => true,
            'data' => $user
        ], 200);
    }

    public function update_post()
    {
        $data = [
            'id' => $this->post('id'),
            'username' => $this->post('username'),
            'email' => $this->post('email'),
            'password' => $this->post('password')
        ];

        $update = $this->Account_m->update($data);

        if (!$update) {
            return $this->response([
                'status' => false,
                'message' => 'Update failed'
            ], 500);
        }

        return $this->response([
            'status' => true,
            'message' => 'Update success'
        ], 200);
    }
}