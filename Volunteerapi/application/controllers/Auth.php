<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Auth extends RestController {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_m');
    }

    public function login_post() {
        $username = $this->post('username');
        $password = $this->post('password');

        if (!$username || !$password) {
            return $this->response([
                'status' => false,
                'message' => 'Username dan password wajib diisi'
            ], 400);
        }

        $user = $this->Auth_m->getByUsername($username);

        if (!$user || $password !== $user->password) {
            return $this->response([
                'status' => false,
                'message' => 'Username atau password salah'
            ], 401);
        }

        return $this->response([
            'status' => true,
            'message' => 'Login berhasil',
            'data' => [
                'userId' => $user->id,
                'username' => $user->username,
                'role' => $user->role
            ]
        ], 200);
    }

    public function register_post() {

        $username = $this->post('username');
        $email    = $this->post('email');
        $password = $this->post('password');
        $role     = $this->post('role');

        if (!$username || !$email || !$password || !$role) {

            return $this->response([
                'status' => false,
                'message' => 'Username, email, password, dan role wajib diisi'
            ], 400);
        }

        if ($role !== 'user' && $role !== 'organizer') {

            return $this->response([
                'status' => false,
                'message' => 'Role tidak valid'
            ], 400);
        }

        if ($this->Auth_m->getByUsername($username)) {

            return $this->response([
                'status' => false,
                'message' => 'Username sudah digunakan'
            ], 409);
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            return $this->response([
                'status' => false,
                'message' => 'Format email tidak valid'
            ], 400);
        }

        if ($this->Auth_m->getByEmail($email)) {

            return $this->response([
                'status' => false,
                'message' => 'Email sudah digunakan'
            ], 409);
        }

        $data = [
            'username' => $username,
            'email'    => $email,
            'password' => $password,
            'role'     => $role
        ];

        $create = $this->Auth_m->create($data);

        if (!$create) {

            return $this->response([
                'status' => false,
                'message' => 'Gagal register'
            ], 500);
        }

        return $this->response([
            'status' => true,
            'message' => 'Register berhasil'
        ], 201);
    }

    public function logout_post() {

        return $this->response([
            'status' => true,
            'message' => 'Logout berhasil'
        ], 200);
    }
}
