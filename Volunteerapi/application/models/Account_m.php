<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Account_m extends CI_Model {

    private $table = 'users';

    function __construct()
    {
        parent::__construct();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function update($data)
    {
        $id = $data['id'];

        unset($data['id']);

        return $this->db->where('id', $id)
                        ->update($this->table, $data);
    }
}