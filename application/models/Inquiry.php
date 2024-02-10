<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inquiry extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}
	public function getInquiryList($artist_id)
	{
		$this->db->where('artist_id', $artist_id);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('inquiry');
	
		if ($query) {
			return $query->result();
		} else {
			log_message('error', 'Database error: ' . $this->db->error()['message']);
			return false;
		}
	}
	public function store_Inquiry($data) {
        $this->db->insert('inquiry', $data);
        return $this->db->insert_id(); // Return the ID of the inserted row
    }
	public function update_Inquiry($id,$data) {
		$this->db->where('id', $id);
        return $this->db->update('inquiry', $data);
    }
	public function get_Inquiry_by_id($id) {
        $query = $this->db->get_where('inquiry', array('id' => $id));
        return $query->row();
    }
	public function delete_Inquiry($id) {
        $this->db->where('id', $id);
        $this->db->delete('inquiry');
    }

}
?>