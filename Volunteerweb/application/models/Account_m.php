<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Account_m extends CI_Model {

    private $baseUrl = 'http://localhost/Volunteerapi/index.php/';

    private function request($method, $endpoint, $data = [])
    {
        $ch = curl_init($this->baseUrl . $endpoint);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        }

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            return (object)[
                'status' => false,
                'message' => curl_error($ch)
            ];
        }

        curl_close($ch);

        return json_decode($result);
    }

    public function getProfile($userId)
    {
        return $this->request('POST', 'account/get', [
            'userId' => $userId
        ]);
    }

    public function updateProfile($userId, $data)
    {
        return $this->request('POST', 'account/update', array_merge([
            'id' => $userId
        ], $data));
    }
}