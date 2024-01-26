<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artist extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function editpassword($oldpassword, $newpassword, $artist_id)
	{
		$this->db->where('id', $artist_id);
		$this->db->where('password', $oldpassword);
		$query = $this->db->get('artist');
		if ($query->num_rows() > 0) {
			$this->db->where('id', $artist_id);
			$this->db->update('artist', array('password' => $newpassword));
			return true;
		} else {
			return false;
		}
	}
	public function updateartistprofile($artist_id, $update_data) {
		$this->db->where('id', $artist_id);
		return $this->db->update('artist', $update_data);
	}
	public function check_artist_exists($email) {
		$this->db->where('email', $email);
		$query = $this->db->get('artist');
		return $query->num_rows() > 0;
	}
	public function fetchcategories($category)
	{
		$this->db->where('activeflag', '0');
		$this->db->where('category', $category);
		$query = $this->db->get('categories');
		return $query->result();
	}
	public function fetchsubcategories($categories)
	{
		$this->db->where('activeflag', '0');
		if (is_array($categories) && !empty($categories)) {
			$this->db->where_in('categories', $categories);
		} else {
			return [];
		}
		$query = $this->db->get('subcategories');
		return $query->result();
	}
	public function categoriesdata($artistid)
	{
		$category = $this->db->select('category')->get_where('artist', ['id' => $artistid])->row('category');
		$this->db->where('category', $category);
		$this->db->where('activeflag', '0');
		$query = $this->db->get('categories');
		return $query->result();
	}
	public function subcategoriesdata($artistid)
	{
		$artist = $this->db->select('categories')->get_where('artist', ['id' => $artistid])->row();
		if ($artist) {
			$categoriesArray = json_decode($artist->categories, true);
			if (!empty($categoriesArray)) {
				$subcategoriesQuery = $this->db->select('subcategoriesname')->distinct()->from('subcategories')->where_in('categories', $categoriesArray)->where('activeflag', '0')->get()->result();
				return $subcategoriesQuery;
			}
		}
		return array(); 
	}
	public function register_artist($data) {
		$this->db->insert('artist', $data);
		return $this->db->insert_id();
	}
	public function mysubcategoriesdata($id)
	{
		$this->db->select('subcategories');
		$this->db->from('artist');
		$this->db->where('id', $id);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$result = $query->row(); 
			return $result->subcategories;
		} else {
			return false;
		}
	}
	public function authenticate_artist($email, $password) {
		$hashed_password = base64_encode($password);

		$this->db->where('email', $email);
		$this->db->where('password', $hashed_password);
		$query = $this->db->get('artist');

		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return false;
		}
	}
	public function authenticate_admin($email, $password) {
		$hashed_password = base64_encode($password);

		$this->db->where('email', $email);
		$this->db->where('password', $hashed_password);
		$query = $this->db->get('admin');

		if ($query->num_rows() > 0) {
			return $query->row_array();
		} else {
			return false;
		}
	}
	public function get_artists()
	{
		$this->db->where('activeflag', '0');
		$this->db->order_by('id', "desc");
		$query = $this->db->get('artist');
		return $query->result();
	}
	public function getfront_artists()
	{
		$this->db->where('verificationstatus', '1');
		$this->db->where('activeflag', '0');
		$this->db->order_by('id', "desc");
		$query = $this->db->get('artist');
		return $query->result();
	}
	public function verificationstatus($artistid,$status)
	{
		$this->db->where('id', $artistid);
		return $this->db->update('artist', array('verificationstatus' => $status));		
	}
	public function insert_art($data) {
		$this->db->insert('art', $data);
		return $this->db->affected_rows() > 0;
	}
	public function myallart($artistid)
	{
		$this->db->where('artist_id', $artistid);
		$this->db->where('activeflag', '0');
		$this->db->order_by('id', "desc");
		$query = $this->db->get('art');
		return $query->result();
	}
	public function allarts()
	{
		$this->db->select('art.*, artist.name as artistname');
		$this->db->from('art');
		$this->db->join('artist', 'artist.id = art.artist_id', 'left');
		$this->db->where('art.activeflag', '0');
		$this->db->order_by('art.id', 'desc');
		
		$query = $this->db->get();
		
		return $query->result();
	}
	public function get_art_by_id($art_id) {
		$query = $this->db->get_where('art', array('id' => $art_id));
		return $query->row();
	}
	public function delete_art($art_id) {
		$data = array('activeflag' => '1');
		$this->db->where('id', $art_id);
		$this->db->where('artist_id', $this->session->userdata['creativehandsartist']['usr_id']);
		return $this->db->update('art', $data);
	}
	public function deletearts($artId) {
		$data = array(
		'activeflag' => '1',
		);

		$this->db->where('id', $artId);
		$result = $this->db->update('art', $data);

		return $result;
	}
	public function getGalleryProducts($artistid)
	{
		$this->db->where('artist_id', $artistid);
		$this->db->where('activeflag', '0');
		$this->db->order_by('id', "desc");
		$query = $this->db->get('art');
		return $query->result();
	}
}
?>