<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artist extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	public function index()
	{
		$data['title'] = "Dashboard";
		$data['content'] = "dashboard.php";
		$this->load->view('artist/index',$data);
	}
	public function login()
	{
		$data['content'] = 'artistlogin.php';
		$this->load->view('index',$data);
	}
	public function artistlogin()
	{
		extract($_POST);
		$artistdata = $this->query->authenticate_artist($email, $password);
		if ($artistdata) {
			$session_data = array(
				'usr_id' => $artistdata['id'],
				'usr_email' => $artistdata['email']
			);
			$this->session->set_userdata('creativehandsartist', $session_data);
			$response = array('success' => true);
		} else {
			$response = array('success' => false);
		}		
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	public function artistregister()
	{
		$data['content'] = 'artistregister.php';
		$this->load->view('index',$data);
	}
	public function newregister()
	{
		extract($_POST);
		$artist_exists = $this->query->check_artist_exists($email);

		if ($artist_exists) {
			$response = array('exists' => true);
		} else {
			$data = array('name' => trim($name), 'number' => trim($number), 'email' => trim($email), 'password' => base64_encode($password),'socialaccount' => '["","","","","",""]', 'categories' => '[""]', 'subcategories' => '[""]');
			$artistid = $this->query->register_artist($data);
			if ($artistid > 0) {
				$session_data = array(
					'usr_id' => $artistid,
					'usr_email' => $email
				);
				$this->session->set_userdata('creativehandsartist', $session_data);
			}
			$response = array('exists' => false);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	public function artistlogout()
	{
		$this->session->unset_userdata('creativehandsartist');
		redirect (base_url());
	}
	public function viewprofile()
	{
		$data['title'] = "View Profile";
		$data['content'] = "viewprofile.php";
		$this->load->view('artist/index',$data);
	}
	public function editprofile()
	{
		$artistid = $this->session->userdata['creativehandsartist']['usr_id'];
		$data['categoriesdata'] = $this->query->categoriesdata($artistid);
		$data['subcategoriesdata'] = $this->query->subcategoriesdata($artistid);		
		$data['title'] = "Edit Profile";
		$data['content'] = "editprofile.php";
		$this->load->view('artist/index',$data);
	}
	public function editpassword()
	{
		extract($_POST);
		$oldpassword = base64_encode($oldpassword);
		$newpassword = base64_encode($newpassword);
		$artist_id = $this->session->userdata['creativehandsartist']['usr_id'];
		$result = $this->query->editpassword($oldpassword, $newpassword, $artist_id);
		echo json_encode($result);
	}
	public function updateprofile() {
		extract($_POST);
		$artist_id = $this->session->userdata['creativehandsartist']['usr_id'];
		$config['upload_path'] = './profileimages/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['file_name'] = $artist_id;
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('artistprofileimage')) {
			$upload_data = $this->upload->data();
			$image_path = 'profileimages/' . $upload_data['file_name'];
		} else {
			$image_path = '';
		}
		$artistcategories = isset($artistcategories) ? $artistcategories : [];
		$artistsubcategories = isset($artistsubcategories) ? $artistsubcategories : [];
		$numbervisibly = !isset($artistnumbervisibly) ? '0' : '1';
		$wpnumbervisibly = !isset($artistwpnumbervisibly) ? '0' : '1';
		$update_data = array(
			'name' => $artistname,
			'category' => $category,
			'companyname' => $artistcompanyname,
			'representing' => $artistrepresenting,
			'number' => $artistnumber,
			'wpnumber' => $artistwpnumber,
			'email' => $artistemail,
			'website' => $artistwebsite,
			'categories' => json_encode($artistcategories),
			'subcategories' => json_encode($artistsubcategories),
			'skills' => $artistskills,
			'socialaccount' => json_encode($socialaccount),
			'address' => $artistaddress,
			'city' => $artistcity,
			'state' => $artiststate,
			'country' => $artistcountry,
			'zipcode' => $artistzipcode,
			'description'=> $artistdescription,
			'numbervisibly' => $numbervisibly,
			'wpnumbervisibly' => $wpnumbervisibly,			
			
		);
		if($image_path != ''){
			$update_data['profileimage'] = $image_path;
		}
		$result = $this->query->updateartistprofile($artist_id, $update_data);

		if ($result) {
			echo json_encode(['success' => true]);
		} else {
			echo json_encode(['success' => false]);
		}
	}
	public function getCategories()
	{
		$category = $this->input->post('category');
		$categories = $this->query->fetchcategories($category);
		echo json_encode(['categories' => $categories]);
	}
	public function getSubcategories()
	{
		$categories = $this->input->post('categories');
		$subcategories = $this->query->fetchsubcategories($categories);
		echo json_encode(['subcategories' => $subcategories]);
	}
	public function viewallarts()
	{
		$artist_id = $this->session->userdata['creativehandsartist']['usr_id'];
		$data['artdata'] = $this->query->myallart($artist_id);
		$data['title'] = "View All Arts";
		$data['content'] = "viewallarts.php";
		$this->load->view('artist/index',$data);
	}
	public function addart()
	{
		$artist_id = $this->session->userdata['creativehandsartist']['usr_id'];
		$data['subcategoriesdata'] = $this->query->mysubcategoriesdata($artist_id);
		$data['title'] = "Add Art";
		$data['content'] = "addart.php";
		$this->load->view('artist/index',$data);
	}
	public function mysubscription()
	{
		$data['title'] = "My Subscription";
		$data['content'] = "mysubscription.php";
		$this->load->view('artist/index',$data);
	}
	public function subscriptionhistory()
	{
		$data['title'] = "Subscription History";
		$data['content'] = "subscriptionhistory.php";
		$this->load->view('artist/index',$data);
	}
	public function eventlist()
	{
		$data['title'] = "View All Events";
		$data['content'] = "eventlist.php";
		$this->load->view('artist/index',$data);
	}
	public function addevent()
	{
		$data['title'] = "Add Event";
		$data['content'] = "addevent.php";
		$this->load->view('artist/index',$data);
	}
	public function eventspayments()
	{
		$data['title'] = "Events + Payments";
		$data['content'] = "eventspayments.php";
		$this->load->view('artist/index',$data);
	}

	public function addnewart() {
		$artist_id = $this->session->userdata['creativehandsartist']['usr_id'];
		$this->load->library('upload');
		$data = array(
			'artist_id' => $artist_id,
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'mainimage' => '',
			'subcategories' => json_encode($this->input->post('subcategories')),
			'tags' => $this->input->post('tags'),
			'size' => $this->input->post('size'),
			'price' => $this->input->post('price'),
			'shortdescription' => $this->input->post('shortdescription'),
		);
		if (empty($data['title']) || empty($data['description']) || empty($data['price']) || empty($data['subcategories'])) {
			echo json_encode(array('success' => false, 'message' => 'Required fields are missing.'));
			return;
		}
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 2048;
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);
		if ($this->upload->do_upload('mainimage')) {
			$mainImageData = $this->upload->data();
			$data['mainimage'] = 'uploads/' .  $mainImageData['file_name'];
		} else {
			echo json_encode(array('success' => false, 'message' => $this->upload->display_errors()));
			return;
		}
		$inserted = $this->query->insert_art($data);
		if ($inserted) {
			echo json_encode(array('success' => true));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Failed to insert data into the database.'));
		}
	}
	public function deleteart() {
		if (!$this->input->is_ajax_request()) {
			show_404();
		}
		$art_id = $this->input->post('art_id');
		$user_id = $this->session->userdata['creativehandsartist']['usr_id'];
		$art = $this->query->get_art_by_id($art_id);
		if (!$art || $art->artist_id != $user_id) {
			echo json_encode(['success' => false, 'message' => 'Unauthorized access or art not found.']);
			return;
		}
		$result = $this->query->delete_art($art_id);

		if ($result) {
			echo json_encode(['success' => true, 'message' => 'Art deleted successfully.']);
		} else {
			echo json_encode(['success' => false, 'message' => 'Failed to delete art.']);
		}
	}
}
