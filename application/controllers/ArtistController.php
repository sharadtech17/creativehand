<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ArtistController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('upload');
		$this->load->model('Artist');
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
		$artistdata = $this->db->select('*')->get_where('artist', ['id' => $artistid])->row();
		$category_type=$artistdata->category;
		$category_id=explode(',',$artistdata->categories);
		$data['categoriesdata'] = $this->query->fetchcategories($category_type);
		$data['subcategoriesdata'] = $this->Artist->fetchsubcategories($category_id);
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
		$selected_categories = $this->input->post('artistcategories');
		$selected_subcategories = $this->input->post('artistsubcategories');
		$categories_string = implode(',', $selected_categories);
		$subcategories_string = implode(',', $selected_subcategories);
		$numbervisibly = !isset($artistnumbervisibly) ? '0' : '1';
		$wpnumbervisibly = !isset($artistwpnumbervisibly) ? '0' : '1';
		$update_data = array(
			'name' => $artistname,
			'category' => $category_type,
			'companyname' => $artistcompanyname,
			'representing' => $artistrepresenting,
			'number' => $artistnumber,
			'wpnumber' => $artistwpnumber,
			'email' => $artistemail,
			'website' => $artistwebsite,
			'categories' => $categories_string,
			'subcategories' => $subcategories_string,
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
		$subcategories = $this->Artist->fetchsubcategories($categories);
		echo json_encode(['subcategories' => $subcategories]);
	}
	public function getSubcategoriesByCategoryID()
	{
		$categories = $this->input->post('category_id');
		$subcategories = $this->query->fetchSubcategoriesByCategoryID($categories);
		echo json_encode($subcategories);
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
		$artistdata = $this->db->select('*')->get_where('artist', ['id' => $artist_id])->row();
		$category_type=$artistdata->category;
		$data['categoriesdata'] = $this->query->fetchcategories($category_type);
		$data['title'] = "Add Art";
		$data['content'] = "addart.php";
		$this->load->view('artist/index',$data);
	}
	public function editart($id)
	{
		$artist_id = $this->session->userdata['creativehandsartist']['usr_id'];
		$artistdata = $this->db->select('*')->get_where('artist', ['id' => $artist_id])->row();
		$category_type=$artistdata->category;
		$category_type=$artistdata->category;
		$category_id=$artistdata->categories;
		$data['categoriesdata'] = $this->query->fetchcategories($category_type);
		$data['subcategoriesdata'] = $this->query->fetchsubcategories($category_id);
		$data['artdata'] = $this->query->getartById($id);
		$data['title'] = "Edit Art";
		$data['content'] = "editart.php";
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
	public function addnewart() {
		$artist_id = $this->session->userdata['creativehandsartist']['usr_id'];
		$this->load->library('upload');
		$data = array(
			'artist_id' => $artist_id,
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'mainimage' => '',
			'categories' =>$this->input->post('categories'),
			'subcategories' => $this->input->post('subcategories'),
			'tags' => $this->input->post('tags'),
			'size' => $this->input->post('size'),
			'price' => $this->input->post('price'),
			'shortdescription' => $this->input->post('shortdescription'),
		);
		if (empty($data['title']) || empty($data['description']) || empty($data['price']) || empty($data['subcategories'])) {
			echo json_encode(array('success' => false, 'message' => 'Required fields are missing.'));
			return;
		}
		$config['upload_path'] = './uploads/arts/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 2048;
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);
		if ($this->upload->do_upload('mainimage')) {
			$mainImageData = $this->upload->data();
			$data['mainimage'] = 'uploads/arts/' .  $mainImageData['file_name'];
		} else {
			echo json_encode(array('success' => false, 'message' => $this->upload->display_errors()));
			return;
		}
		foreach ($_FILES['galleryimage']['name'] as $key => $value) {
			$_FILES['image']['name']     = $_FILES['galleryimage']['name'][$key];
			$_FILES['image']['type']     = $_FILES['galleryimage']['type'][$key];
			$_FILES['image']['tmp_name'] = $_FILES['galleryimage']['tmp_name'][$key];
			$_FILES['image']['error']    = $_FILES['galleryimage']['error'][$key];
			$_FILES['image']['size']     = $_FILES['galleryimage']['size'][$key];

			if ($this->upload->do_upload('image')) {
				$galleryData = $this->upload->data();
				$image_gallrys[] = 'uploads/arts/' .  $galleryData['file_name'];
			}
		}
		if (!empty($image_gallrys)) {
			$data['galleryimage'] = json_encode($image_gallrys);
		}
		$inserted = $this->query->insert_art($data);
		if ($inserted) {
			echo json_encode(array('success' => true));
		} else {
			echo json_encode(array('success' => false, 'message' => 'Failed to insert data into the database.'));
		}
	}
	public function updateart() {
		
		$config['file_name'] = time();
		$config['upload_path'] = './uploads/arts/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 20048;
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);
		$image_gallrys = array();
		$image='';
		if ($this->upload->do_upload('mainimage')) {
			$mainImageData = $this->upload->data();
			$image = 'uploads/arts/' .  $mainImageData['file_name'];
		}
		foreach ($_FILES['galleryimage']['name'] as $key => $value) {
			$_FILES['image']['name']     = $_FILES['galleryimage']['name'][$key];
			$_FILES['image']['type']     = $_FILES['galleryimage']['type'][$key];
			$_FILES['image']['tmp_name'] = $_FILES['galleryimage']['tmp_name'][$key];
			$_FILES['image']['error']    = $_FILES['galleryimage']['error'][$key];
			$_FILES['image']['size']     = $_FILES['galleryimage']['size'][$key];

			if ($this->upload->do_upload('image')) {
				$galleryData = $this->upload->data();
				$image_gallrys[] = 'uploads/arts/' .  $galleryData['file_name'];
			}
		}
		$artist_id = $this->session->userdata['creativehandsartist']['usr_id'];
		$this->load->library('upload');
		$data = array(
			'artist_id' => $artist_id,
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'categories' => $this->input->post('categories'),
			'subcategories' => $this->input->post('subcategories'),
			'tags' => $this->input->post('tags'),
			'size' => $this->input->post('size'),
			'price' => $this->input->post('price'),
			'shortdescription' => $this->input->post('shortdescription'),
		);
		$id = $this->input->post('art_id');
		if (!empty($image_gallrys)) {
			$data['galleryimage'] = json_encode($image_gallrys);
		}
		if (!empty($image)) {
			$data['mainimage']=$image;
		}
		$inserted = $this->query->update_art($id, $data);
		return redirect('artist-panel/view-all-arts')->with('success','Art Updated..');
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
