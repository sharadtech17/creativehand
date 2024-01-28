<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}
	public function getShopList()
	{
		$this->db->select('art_shops.*, artist.name as artistname, categories.category as categoryname');
		$this->db->from('art_shops');
		$this->db->join('artist', 'artist.id = art_shops.artist_id', 'left');
		$this->db->join('categories', 'categories.id = art_shops.category', 'left');
		$this->db->order_by('art_shops.id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function searchArtShop($query)
	{
		$this->db->select('art_shops.*, artist.name as artistname, categories.category as categoryname');
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
		$this->db->select('art_shops.*,artist.*,art_shops.id as shop_id, artist.description as artist_desc, art_shops.description as art_desc, categories.category as categoryname');
		$this->db->from('art_shops');
		$this->db->join('artist', 'artist.id = art_shops.artist_id', 'left');
		$this->db->join('categories', 'categories.id = art_shops.category', 'left');
		$this->db->where('art_shops.id', $id); // Specify the table alias for 'id'
		$query = $this->db->get();
		return $query->row();
	}
	public function getShopListByArtist($id) {
		$this->db->select('art_shops.*, artist.name as artistname, categories.category as categoryname');
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
	public function add_order_item($order_item_data) {
        // Insert order item data into the 'order_items' table
        $this->db->insert('order_item', $order_item_data);
    }
}
?>