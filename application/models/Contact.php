<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}
	public function getContactList()
	{
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('contact');
	
		if ($query) {
			return $query->result();
		} else {
			log_message('error', 'Database error: ' . $this->db->error()['message']);
			return false;
		}
	}
	public function store_Contact($data) {
        $this->db->insert('contact', $data);
        return $this->db->insert_id();
    }
	public function update_Contact($id,$data) {
		$this->db->where('id', $id);
        return $this->db->update('contact', $data);
    }
	public function get_Contact_by_id($id) {
        $query = $this->db->get_where('contact', array('id' => $id));
        return $query->row();
    }
	public function delete_Contact($id) {
        $this->db->where('id', $id);
        $this->db->delete('contact');
    }

}
?>