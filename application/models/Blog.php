<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}
	public function getBlogList()
	{
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('blogs');
	
		if ($query) {
			return $query->result();
		} else {
			log_message('error', 'Database error: ' . $this->db->error()['message']);
			return false;
		}
	}
	public function store_Blog($data) {
        $this->db->insert('blogs', $data);
        return $this->db->insert_id(); // Return the ID of the inserted row
    }
	public function update_Blog($id,$data) {
		$this->db->where('id', $id);
        return $this->db->update('blogs', $data);
    }
	public function get_Blog_by_id($id) {
        $query = $this->db->get_where('blogs', array('id' => $id));
        return $query->row();
    }
	public function delete_Blog($id) {
        $this->db->where('id', $id);
        $this->db->delete('blogs');
    }

}
?>