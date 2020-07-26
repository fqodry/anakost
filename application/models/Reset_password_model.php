<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reset_password_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->table = "tb_reset_password";
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

	function checkLinkAvail($hashcode){
		$data=array();
		$now = date('Y-m-d H:i:s');
		$this->db->select('*');
		$this->db->where('sha1(concat(email,"x",user_id,"y",link_created_at))',$hashcode);
		$this->db->where('is_used',0);
		$this->db->where("link_created_at <=",$now);
		$this->db->where("link_expired_at >=",$now);
		$this->db->order_by("link_created_at","desc");
		$this->db->limit(1);
		$query=$this->db->get($this->table);
		if($query->num_rows() > 0) {
			$data=$query->row();
		}
		$query->free_result();
		return $data;
	}
}