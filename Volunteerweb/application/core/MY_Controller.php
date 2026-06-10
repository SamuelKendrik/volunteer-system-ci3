<?php
class MY_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Pragma: no-cache");

        if (!$this->session->userdata('loggedIn')) {
            redirect('auth/login');
        }
    }
}