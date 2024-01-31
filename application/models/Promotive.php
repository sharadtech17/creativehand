<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotive extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}
	public function getPromotiveList()
	{
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('promotives');
	
		if ($query) {
			return $query->result();
		} else {
			log_message('error', 'Database error: ' . $this->db->error()['message']);
			return false;
		}
	}
	public function getActivePromotiveList()
	{
		$this->db->where('status',0);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('promotives');
	
		if ($query) {
			return $query->result();
		} else {
			log_message('error', 'Database error: ' . $this->db->error()['message']);
			return false;
		}
	}
	public function store_Promotive($data) {
        $this->db->insert('promotives', $data);
        return $this->db->insert_id(); // Return the ID of the inserted row
    }
	public function update_Promotive($id,$data) {
		$this->db->where('id', $id);
        return $this->db->update('promotives', $data);
    }
	public function get_Promotive_by_id($id) {
        $query = $this->db->get_where('promotives', array('id' => $id));
        return $query->row();
    }
	public function delete_Promotive($id) {
        $this->db->where('id', $id);
        $this->db->delete('promotives');
    }

}
?>