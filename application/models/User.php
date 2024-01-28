<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}
	public function editpassword($oldpassword, $newpassword, $user_id)
	{
		$this->db->where('id', $user_id);
		$this->db->where('password', $oldpassword);
		$query = $this->db->get('user');
		if ($query->num_rows() > 0) {
			$this->db->where('id', $user_id);
			$this->db->update('user', array('password' => $newpassword));
			return true;
		} else {
			return false;
		}
	}
	public function updateuserprofile($user_id, $update_data) {
		$this->db->where('id', $user_id);
		return $this->db->update('user', $update_data);
	}
	public function check_user_exists($email) {
		$this->db->where('email', $email);
		$query = $this->db->get('user');
		return $query->num_rows() > 0;
	}
	public function register_user($data) {
		$this->db->insert('user', $data);
		return $this->db->insert_id();
	}
	public function mysubcategoriesdata($id)
	{
		$this->db->select('subcategories');
		$this->db->from('user');
		$this->db->where('id', $id);

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$result = $query->row(); 
			return $result->subcategories;
		} else {
			return false;
		}
	}
	public function authenticate_user($email, $password) {
		$hashed_password = base64_encode($password);

		$this->db->where('email', $email);
		$this->db->where('password', $hashed_password);
		$query = $this->db->get('user');

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
	public function get_users()
	{
		$this->db->where('activeflag', '0');
		$this->db->order_by('id', "desc");
		$query = $this->db->get('user');
		return $query->result();
	}
	public function getfront_users()
	{
		$this->db->where('verificationstatus', '1');
		$this->db->where('activeflag', '0');
		$this->db->order_by('id', "desc");
		$query = $this->db->get('user');
		return $query->result();
	}
	public function verificationstatus($userid,$status)
	{
		$this->db->where('id', $userid);
		return $this->db->update('user', array('verificationstatus' => $status));		
	}
	public function insert_art($data) {
		$this->db->insert('art', $data);
		return $this->db->affected_rows() > 0;
	}
	public function myallart($userid)
	{
		$this->db->where('user_id', $userid);
		$this->db->where('activeflag', '0');
		$this->db->order_by('id', "desc");
		$query = $this->db->get('art');
		return $query->result();
	}
	public function allarts()
	{
		$this->db->select('art.*, user.name as username');
		$this->db->from('art');
		$this->db->join('user', 'user.id = art.user_id', 'left');
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
		$this->db->where('user_id', $this->session->userdata['creativehandsuser']['usr_id']);
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
	public function getGalleryProducts($userid)
	{
		$this->db->where('user_id', $userid);
		$this->db->where('activeflag', '0');
		$this->db->order_by('id', "desc");
		$query = $this->db->get('art');
		return $query->result();
	}
	public function getArtByHandArtuser()
	{
		$this->db->select('art.*, user.name as username');
		$this->db->from('art');
		$this->db->join('user', 'user.id = art.user_id', 'left');
		$this->db->where('art.activeflag', '0');
		$this->db->where('user.category', 'Hand Made Arts');
		$this->db->order_by('art.id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getPaintingByuser()
	{
		$this->db->select('art.*, user.name as username');
		$this->db->from('art');
		$this->db->join('user', 'user.id = art.user_id', 'left');
		$this->db->where('art.activeflag', '0');
		$this->db->where('user.category', 'Painting');
		$this->db->order_by('art.id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getHandArtuserByArtId($id)
	{
		$this->db->select('art.*, user.*, user.description as user_desc, art.description as art_desc');
		$this->db->from('art');
		$this->db->join('user', 'user.id = art.user_id', 'left');
		$this->db->where('art.id', $id);
		$query = $this->db->get();
		
		// Check if any row is returned
		if ($query->num_rows() > 0) {
			// Return the first row
			return $query->row();
		} else {
			// No data found, return null or handle it accordingly
			return null;
		}
	}
	public function get_user_by_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('user');
		return $query->row();
	}
	public function update_user($user_id,$data)
	{
		$this->db->where('id', $user_id);
		$query = $this->db->get('user');
		if ($query->num_rows() > 0) {
			$this->db->where('id', $user_id);
			$this->db->update('user',$data);
			return true;
		} else {
			return false;
		}
	}
	public function updateUserPassword($oldpassword, $newpassword, $user_id)
	{
		$this->db->where('id', $user_id);
		$this->db->where('password', $oldpassword);
		$query = $this->db->get('user');
		if ($query->num_rows() > 0) {
			$this->db->where('id', $user_id);
			$this->db->update('user', array('password' => $newpassword));
			return true;
		} else {
			return false;
		}
	}
}
?>