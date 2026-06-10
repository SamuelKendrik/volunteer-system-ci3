<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Places_m extends CI_Model {

    public function getAllEvents()
    {
        $apiUrl = "http://localhost/Volunteerapi/index.php/Event/events";

        $response =
            file_get_contents($apiUrl);

        if (!$response) {
            return [];
        }

        $result = json_decode($response);
        return $result->data ?? [];
    }

    public function createEvent($data)
    {
        $apiUrl = "http://localhost/Volunteerapi/index.php/Organizer/createEvent";

        $options = [
            'http' => [
                'method'  => 'POST',
                'header'  =>
                    "Content-type: application/x-www-form-urlencoded",
                'content' =>
                    http_build_query($data)
            ]
        ];

        $context =
            stream_context_create($options);

        $response =
            file_get_contents(
                $apiUrl,
                false,
                $context
            );

        return json_decode($response);
    }

    public function joinEvent($data)
    {
        $apiUrl = "http://localhost/Volunteerapi/index.php/Event/register";

        $options = [
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-type: application/x-www-form-urlencoded",
                'content' => http_build_query($data)
            ]
        ];

        $context = stream_context_create($options);

        $response = file_get_contents($apiUrl, false, $context);

        return json_decode($response);
    }

    public function checkJoined($user_id, $event_id)
    {
        $apiUrl = "http://localhost/Volunteerapi/index.php/Event/registeredByUserEvent?user_id="
            . $user_id . "&event_id=" . $event_id;

        $response = @file_get_contents($apiUrl);

        if (!$response) {
            return false;
        }

        $result = json_decode($response);

        return !empty($result->data);
    }
}