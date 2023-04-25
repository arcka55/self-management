<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Responden_model extends CI_Model {

	var $table = 'responden';

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

    public function get_all_responden_email()
	{
		$this->db->select("email");
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

	public function delete_by_id_user($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete($this->table);
	}

	public function get_responden_by_userid($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_user',$id);
		$query = $this->db->get();

		return $query->row_array();
	}

	public function get_responden_email_by_userid($id)
	{
		$this->db->select("email");
		$this->db->from($this->table);
		$this->db->where('id_user',$id);
		$query = $this->db->get();

		return $query->row_array();
	}


}
