<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}
	public function getCartItem($product_id, $user_id) {
        $this->db->where('product_id', $product_id);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('cart');
        return $query->row(); // Return the cart item if found, or null if not found
    }
	public function addCart($data) {
		$this->db->insert('cart', $data);
		return $this->db->insert_id();
	}
	public function getCartByUserId($user_id)
	{
		$this->db->select('cart.*,cart.id AS cart_id, art_shops.id AS product_id, art_shops.*');
		$this->db->from('cart');
		$this->db->join('art_shops', 'art_shops.id = cart.product_id', 'left');
		$this->db->where('cart.user_id', $user_id);
		$query = $this->db->get();
		return $query->result();
    }
	public function editCartItem($cart_id, $data) {
        // Update the cart item
		$this->db->where('id', $cart_id);
        return $this->db->update('cart', $data);
    }
	public function deleteCartItem($cart_id)
	{
		$this->db->where('id', $cart_id);
		$this->db->delete('cart');
		return ($this->db->affected_rows() > 0);
	}
	public function clear_cart($user_id) {
        // Delete cart items for the specified user
        $this->db->delete('cart', array('user_id' => $user_id));
    }
}
?>