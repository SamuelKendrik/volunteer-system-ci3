<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organizer_m extends CI_Model
{
    private $baseUrl = "http://localhost/Volunteerapi/index.php/";

    public function updateEvent($id, $data)
    {
        $url = $this->baseUrl . "Organizer/updateEvent/" . $id;

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/x-www-form-urlencoded"
        ]);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return (object)[
                'status' => false,
                'message' => curl_error($ch)
            ];
        }

        curl_close($ch);

        return json_decode($response);
    }

    public function getMyEvents($userId)
    {
        $url = $this->baseUrl . "Organizer/myEvents?user_id=" . $userId;

        $response = file_get_contents($url);

        return json_decode($response);
    }
}