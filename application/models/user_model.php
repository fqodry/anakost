<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->table = "tb_user";
	}

	function get_all($conditions=array()) {
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($conditions);
		$query=$this->db->get();
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	function get_single($conditions=array()) {
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($conditions);
		$this->db->limit(1);
		$query=$this->db->get();
		if($query->num_rows() === 1) {
			return $query->row();
		} else {
			return false;
		}
	}

	function registration($data) {
		$condition = "email =" . "'" . $data['email'] . "'";
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($condition);
		$this->db->limit(1);
		$query=$this->db->get();
		if($query->num_rows() == 0) {
			$this->db->insert($this->table,$data);

			if($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}

	function add($data=array()) {
		$this->db->insert($this->table,$data);
	}

	function edit($conditions=array(),$data=array()) {
		$this->db->where($conditions);
		$this->db->update($this->table,$data);
	}

	function delete($conditions=array()) {
		$this->db->where($conditions);
		$this->db->delete($this->table);
	}

	function maxId() {
		$this->db->select_max('id');
		$this->db->from($this->table);
		$query=$this->db->get();
		if($query->num_rows() > 0) {
			return $query->row();
		} else {
			return false;
		}
	}

	function checkShaUser($code) {
		$data=array();
		$this->db->select('*');
		$this->db->where('sha1(user_id)',$code);
		$this->db->limit(1);
		$query=$this->db->get($this->table);
		if($query->num_rows() > 0) {
			$data=$query->row();
		}
		$query->free_result();
		return $data;
	}
}