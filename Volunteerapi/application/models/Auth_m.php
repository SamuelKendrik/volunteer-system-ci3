<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_m extends CI_Model {

    private $table = 'users';

    function __construct()
    {
        parent::__construct();
    }

    function read($id)
    {
        $this->db->where((is_array($id) ? $id : array($this->primary_key => $id)));
        return $this->db->get($this->table_name)->row();
    }

    function update($data, $id)
    {
        $this->db->update($this->table_name, $data, (is_array($id) ? $id : array($this->primary_key => $id)));
        return $this->db->affected_rows();
    }

    function delete($id)
    {
        $this->db->delete($this->table_name, (is_array($id) ? $id : array($this->primary_key => $id)));
        return $this->db->affected_rows();
    }

    public function getByUsername($username) 
    {
        return $this->db->where('username', $username)->get($this->table)->row();
    }

    public function create($data) 
    {
        return $this->db->insert($this->table, $data);
    }

    public function getByEmail($email) 
    {
        return $this->db->where('email', $email)->get($this->table)->row();
    }

    public function getById($id) 
    {
        return $this->db
            ->get_where('users', ['id' => $id])
            ->row();
    }
}
