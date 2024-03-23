<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubscriptionOrder extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}
	public function getSubscriptionOrderList()
	{
		$this->db->select('subscription_order.*, artist.name');
		$this->db->from('subscription_order');
		$this->db->join('artist', 'artist.id = subscription_order.artist_id', 'left');
		$this->db->order_by('subscription_order.id', 'desc');
		$query = $this->db->get();
		
		if ($query) {
			return $query->result();
		} else {
			log_message('error', 'Database error: ' . $this->db->error()['message']);
			return false;
		}
	}
public function getSubscriptionOrderActiveList()
{
    $this->db->select('subscription_order.*, subscription.*');
    $this->db->from('subscription_order');
    $this->db->join('subscription', 'subscription_order.subscription_id = subscription.id', 'left');
    $this->db->order_by('subscription_order.id', 'desc');
    $this->db->where('subscription_order.status', 0);
    $query = $this->db->get();

    if ($query) {
        return $query->result();
    } else {
        log_message('error', 'Database error: ' . $this->db->error()['message']);
        return false;
    }
}

	public function store_SubscriptionOrder($data) {
        $this->db->insert('subscription_order', $data);
        return $this->db->insert_id();
    }
	public function update_SubscriptionOrder($id,$data) {
		$this->db->where('id', $id);
        return $this->db->update('subscription_order', $data);
    }
	public function get_SubscriptionOrder_by_id($id) {
        $query = $this->db->get_where('subscription_order', array('id' => $id));
        return $query->row();
    }
	public function get_Subscription_by_artistid($id) {
		$this->db->select('subscription_order.*, artist.name');
		$this->db->from('subscription_order');
		$this->db->join('artist', 'artist.id = subscription_order.artist_id', 'left');
		$this->db->where('subscription_order.artist_id', $id);
		$query = $this->db->get();
	
		if ($query) {
			return $query->result();
		} else {
			log_message('error', 'Database error: ' . $this->db->error()['message']);
			return false;
		}
	}
	public function getSubscriptionOrderActive($id) {
		$today_date = date('Y-m-d');
	
		$this->db->select('subscription_order.*, artist.name, subscription.qty_art');
		$this->db->from('subscription_order');
		$this->db->join('artist', 'artist.id = subscription_order.artist_id', 'left');
		$this->db->join('subscription', 'subscription.id = subscription_order.subscription_id', 'left');
		$this->db->where('subscription_order.artist_id', $id);
		$this->db->where('subscription_order.subscription_type', 'Artist Subscription');
		$this->db->where('subscription_order.end_date >=', $today_date);
		$query = $this->db->get(); // Use get() instead of row()
	
		if ($query) {
			return $query->row();
		} else {
			log_message('error', 'Database error: ' . $this->db->error()['message']);
			return false;
		}
	}
	public function getSubscriptionOrderEventActive($id) {
		$today_date = date('Y-m-d');
	
		$this->db->select('subscription_order.*, artist.name, subscription.qty_value');
		$this->db->from('subscription_order');
		$this->db->join('artist', 'artist.id = subscription_order.artist_id', 'left');
		$this->db->join('subscription', 'subscription.id = subscription_order.subscription_id', 'left');
		$this->db->where('subscription_order.artist_id', $id);
		$this->db->where('subscription_order.subscription_type', 'Event Subscription');
		$query = $this->db->get(); // Use get() instead of row()
	
		if ($query) {
			return $query->row();
		} else {
			log_message('error', 'Database error: ' . $this->db->error()['message']);
			return false;
		}
	}
	public function delete_SubscriptionOrder($id) {
        $this->db->where('id', $id);
        $this->db->delete('subscription_order');
    }

}
?>