<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}
	public function getNewsList()
	{
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('news');
	
		if ($query) {
			return $query->result();
		} else {
			log_message('error', 'Database error: ' . $this->db->error()['message']);
			return false;
		}
	}
	public function store_News($data) {
        $this->db->insert('news', $data);
        return $this->db->insert_id(); // Return the ID of the inserted row
    }
	public function update_News($id,$data) {
		$this->db->where('id', $id);
        return $this->db->update('news', $data);
    }
	public function get_News_by_id($id) {
        $query = $this->db->get_where('news', array('id' => $id));
        return $query->row();
    }
	public function delete_News($id) {
        $this->db->where('id', $id);
        $this->db->delete('news');
    }

}
?>