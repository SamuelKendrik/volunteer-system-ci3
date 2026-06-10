<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review_m extends CI_Model {

    private $baseUrl = 'http://localhost/Volunteerapi/index.php/';

    public function getByEvent($eventId)
    {
        $url =
            $this->baseUrl .
            'review/index/' .
            $eventId;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        $result = curl_exec($ch);

        if (curl_errno($ch)) {

            echo curl_error($ch);
            die();
        }

        curl_close($ch);

        return json_decode($result);
    }
}