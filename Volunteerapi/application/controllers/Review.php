<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Review extends RestController {

    public function __construct() {
        parent::__construct();
        $this->load->model('Review_m');
    }

    public function index_get($event_id = null) {

        if ($event_id === null) {
            $this->response([], 400);
            return;
        }

        $data = $this->Review_m->getByEvent($event_id);

        $this->response($data, 200);
    }
}