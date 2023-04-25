<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materi_model extends CI_Model {
	
	var $table = 'materi';

	public function __construct()
	{
		parent::__construct();
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

	public function count_all_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_coach',$id);
		return $this->db->count_all_results();
	}

	public function get_all()
	{
		$this->db->from($this->table);
		$query = $this->db->get();

		return $query->result_array();

        // return $this->db->get('coach')->result_array();
	}

	public function get_all_desc()
	{
		$this->db->from($this->table);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();

		return $query->result_array();

        // return $this->db->get('coach')->result_array();
	}

	public function get_all_desc_by_idadmin($id_admin)
	{
		$this->db->from($this->table);
		$this->db->order_by('id', 'DESC');
		$this->db->where('id_admin',$id_admin);
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

	public function get_materi_by_id($id)
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


}
