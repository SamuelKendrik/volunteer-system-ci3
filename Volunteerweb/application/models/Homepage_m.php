<?php

defined('BASEPATH')
    OR exit('No direct script access allowed');

class Homepage_m extends CI_Model {

    public function getFeaturedEvents()
    {
        $apiUrl = "http://localhost/Volunteerapi/index.php/Event/events";

        $response = file_get_contents($apiUrl);

        if (!$response) {
            return [];
        }

        $result = json_decode($response);
        $events = $result->data ?? [];
        $filtered = [];

        foreach ($events as $event) {

            if (
                stripos(
                    $event->location,
                    'binus'
                ) === false
            ) {

                $filtered[] = $event;

            }

        }

        shuffle($filtered);

        return array_slice(
            $filtered,
            0,
            4
        );
    }

    public function getBinusEvents()
    {
        $apiUrl = "http://localhost/Volunteerapi/index.php/Event/events";

        $response = file_get_contents($apiUrl);

        if (!$response) {
            return [];
        }

        $result = json_decode($response);
        $events = $result->data ?? [];
        $binusEvents = [];

        foreach ($events as $event) {

            if (
                stripos(
                    $event->location,
                    'binus'
                ) !== false
            ) {

                $binusEvents[] = $event;

            }

        }

        shuffle($binusEvents);

        return array_slice(
            $binusEvents,
            0,
            4
        );
    }
}