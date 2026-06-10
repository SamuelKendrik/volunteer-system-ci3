<?php defined('BASEPATH') or exit('No direct script access allowed');

class Master_companies_m extends CI_Model
{

    private $table_name = "mst_master_companies";
    private $primary_key = "n_company_id";

    function __construct()
    {
        parent::__construct();
    }

    function count($where = NULL, $id = NULL, $where_in = NULL)
    {
        if ($where_in) $this->db->where_in($this->primary_key, $where_in);
        if ($where) $this->db->where($where);
        return $this->db->get($this->table_name)->num_rows();
    }

    function show($page, $limit, $where = NULL, $where_in = NULL)
    {
        if ($where_in) $this->db->where_in($this->primary_key, $where_in);
        if ($where) $this->db->where($where);
        $this->db->order_by($this->primary_key, 'ASC')->limit($limit, pagination_offset($page, $limit));
        return $this->db->get($this->table_name)->result();
    }

    function read($id)
    {
        $this->db->where((is_array($id) ? $id : array($this->primary_key => $id)));
        return $this->db->get($this->table_name)->row();
    }

    function create($data)
    {
        $this->db->insert($this->table_name, $data);
        return $this->db->insert_id();
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
}
