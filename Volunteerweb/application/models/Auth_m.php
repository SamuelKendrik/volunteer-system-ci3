<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_m extends CI_Model {

    private $baseUrl;

    public function __construct()
    {
        parent::__construct();

        $this->baseUrl = 'http://localhost/Volunteerapi/index.php/';
    }

    private function request($method, $endpoint, $data = [])
    {
        $options = [
            'http' => [
                'method'  => $method,
                'header'  => "Content-type: application/x-www-form-urlencoded",
                'content' => http_build_query($data)
            ]
        ];

        $context = stream_context_create($options);

        $result = file_get_contents(
            $this->baseUrl . $endpoint,
            false,
            $context
        );

        return json_decode($result);
    }

    public function login($data)
    {
        return $this->request(
            'POST',
            'auth/login',
            $data
        );
    }

    public function register($data)
    {
        return $this->request(
            'POST',
            'auth/register',
            $data
        );
    }

    public function logout()
    {
        return $this->request(
            'POST',
            'auth/logout'
        );
    }
}