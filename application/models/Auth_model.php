<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Auth_model extends CI_Model {
 
    var $table = 'user';
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_all()
	{
		$this->db->from($this->table);
		$query = $this->db->get();

		return $query->result_array();

        // return $this->db->get('coach')->result_array();
	}
 
    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query = $this->db->get();
 
        return $query->row();
    }
    public function get_user_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query = $this->db->get();
 
        return $query->row_array();
    }
 
    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
 
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
 
    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    public function get_all_join_role_admin() {
		$this->db->select('*, user.id as user_id, user_role.id as user_role_id, admin.id as admin_id, admin.nama as nama_admin, user.email as user_email');
        $this->db->from($this->table);
        $this->db->join('user_role', 'user.role_id = user_role.id');
        $this->db->join('admin', 'user.id_admin = admin.id');
		$this->db->order_by('user.id', 'DESC');
        $query = $this->db->get();

        return $query->result_array();
    }
    
 
 
}