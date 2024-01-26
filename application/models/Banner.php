<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}
	public function getBannerList()
	{
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('banner');
	
		if ($query) {
			return $query->result();
		} else {
			log_message('error', 'Database error: ' . $this->db->error()['message']);
			return false;
		}
	}
	public function store_banner($data) {
        $this->db->insert('banner', $data);
        return $this->db->insert_id(); // Return the ID of the inserted row
    }
	public function update_banner($id,$data) {
		$this->db->where('id', $id);
        return $this->db->update('banner', $data);
    }
	public function get_banner_by_id($id) {
        $query = $this->db->get_where('banner', array('id' => $id));
        return $query->row();
    }
	public function delete_banner($id) {
        $this->db->where('id', $id);
        $this->db->delete('banner');
    }

}
?>