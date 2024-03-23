<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}
	public function getSubscriptionList()
	{
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('subscription');
	
		if ($query) {
			return $query->result();
		} else {
			log_message('error', 'Database error: ' . $this->db->error()['message']);
			return false;
		}
	}
	public function getSubscriptionActiveList()
	{
		$this->db->order_by('id', 'desc');
		$this->db->where('status', 0);
		$query = $this->db->get('subscription');
	
		if ($query) {
			return $query->result();
		} else {
			log_message('error', 'Database error: ' . $this->db->error()['message']);
			return false;
		}
	}
	public function store_Subscription($data) {
        $this->db->insert('subscription', $data);
        return $this->db->insert_id(); // Return the ID of the inserted row
    }
	public function update_Subscription($id,$data) {
		$this->db->where('id', $id);
        return $this->db->update('subscription', $data);
    }
	public function get_Subscription_by_id($id) {
        $query = $this->db->get_where('subscription', array('id' => $id));
        return $query->row();
    }
	public function delete_Subscription($id) {
        $this->db->where('id', $id);
        $this->db->delete('subscription');
    }
}
?>