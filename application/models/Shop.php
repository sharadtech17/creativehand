<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}
	public function getShopList()
	{
		$this->db->select('art_shops.*, artist.name as artistname, categories.categoriesname as categoryname');
		$this->db->from('art_shops');
		$this->db->join('artist', 'artist.id = art_shops.artist_id', 'left');
		$this->db->join('categories', 'categories.id = art_shops.category', 'left');
		$this->db->order_by('art_shops.id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function searchArtShop($query)
	{
		$this->db->select('art_shops.*, artist.name as artistname, categories.categoriesname as categoryname');
		$this->db->from('art_shops');
		$this->db->join('artist', 'artist.id = art_shops.artist_id', 'left');
		$this->db->join('categories', 'categories.id = art_shops.category', 'left');
		$this->db->like('art_shops.title', $query);
        $this->db->or_like('artist.name', $query);
        $this->db->or_like('categories.category', $query);
		$this->db->order_by('art_shops.id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getActiveShopList()
	{
		$this->db->select('art_shops.*, artist.name as artistname');
		$this->db->from('art_shops');
		$this->db->join('artist', 'artist.id = art_shops.artist_id', 'left');
		$this->db->where('art_shops.status', 0);
		$this->db->order_by('art_shops.id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function store_artshop($data) {
        $this->db->insert('art_shops', $data);
        return $this->db->insert_id(); // Return the ID of the inserted row
    }
	public function update_Shop($id,$data) {
		$this->db->where('id', $id);
        return $this->db->update('art_shops', $data);
    }
	public function get_Shop_by_id($id) {
		$this->db->select('art_shops.*,artist.*,art_shops.id as shop_id, artist.description as artist_desc,art_shops.category as shop_category,art_shops.subcategories as shop_subcategory, art_shops.description as art_desc, categories.categoriesname as categoryname');
		$this->db->from('art_shops');
		$this->db->join('artist', 'artist.id = art_shops.artist_id', 'left');
		$this->db->join('categories', 'categories.id = art_shops.category', 'left');
		$this->db->where('art_shops.id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	public function getShopListByArtist($id) {
		$this->db->select('art_shops.*, artist.name as artistname, categories.categoriesname as categoryname');
		$this->db->from('art_shops');
		$this->db->join('artist', 'artist.id = art_shops.artist_id', 'left');
		$this->db->join('categories', 'categories.id = art_shops.category', 'left');
		$this->db->where('art_shops.artist_id', $id); // Specify the table alias for 'id'
		$query = $this->db->get();
		return $query->result();
	}
	public function delete_Shop($id) {
        $this->db->where('id', $id);
        $this->db->delete('art_shops');
    }
	public function place_order($order_data) {
        // Insert order data into the 'orders' table
        $this->db->insert('orders', $order_data);
        
        // Return the ID of the inserted order (or false if insertion fails)
        return ($this->db->affected_rows() > 0) ? $this->db->insert_id() : false;
    }
	public function getAllOrders() {
		$this->db->select('orders.*,user.first_name as customer_name');
		$this->db->from('orders');
		$this->db->join('user', 'user.id = orders.user_id', 'left');
		$query = $this->db->get();
		return $query->result();
	}
	public function getOrdersById($id) {
		$this->db->select('orders.*,user.first_name as customer_name,user.email as customer_email,user.phone as customer_phone,,user.ship_address as ship_address');
		$this->db->from('orders');
		$this->db->join('user', 'user.id = orders.user_id', 'left');
		$this->db->where('orders.id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	public function getOrderByUserId($user_id) {
		$this->db->select('orders.*,user.first_name as customer_name');
		$this->db->from('orders');
		$this->db->join('user', 'user.id = orders.user_id', 'left');
		$this->db->where('orders.user_id', $user_id);
		$query = $this->db->get();
		return $query->result();
	}
	public function add_order_item($order_item_data) {
        // Insert order item data into the 'order_items' table
        $this->db->insert('order_item', $order_item_data);
    }
	public function getOrdersItemById($id) {
		$this->db->select('order_item.*,art_shops.*');
		$this->db->from('order_item');
		$this->db->join('art_shops', 'art_shops.id = order_item.product_id', 'left');
		$this->db->where('order_item.order_id', $id);
		$query = $this->db->get();
		return $query->result();
	}
	public function updateOrderStatus($orderId, $newStatus) {
        // Update the order status in the database
        $this->db->where('id', $orderId);
        $this->db->update('orders', array('order_status' => $newStatus));
    }
}
?>