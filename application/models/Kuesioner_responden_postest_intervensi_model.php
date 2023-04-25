<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuesioner_responden_postest_intervensi_model extends CI_Model {

	var $table = 'kuesioner_responden_postest_intervensi';

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

	public function get_all_by_idresponden($id_responden)
	{
		$this->db->from($this->table);
		$this->db->where('id_responden',$id_responden);
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

	public function get_admin_by_userid($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_user',$id);
		$query = $this->db->get();

		return $query->row_array();
	}


}
