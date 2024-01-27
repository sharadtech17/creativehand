<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShopController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->model('Shop'); // Load the Shop model if not loaded automatically
		$this->load->model('Artist'); 
		$this->load->model('User');
	}
	public function index()
	{
		$data['shoplist'] = $this->Shop->getShopList();
		$data['title'] = "Shop";
		$data['content'] = "shop.php";
		$this->load->view('index',$data);
	}
	public function viewShopDetail($id)
	{
		$data['shoplist'] = $this->Shop->get_Shop_by_id($id);
		$data['title'] = "Shop Details";
		$data['content'] = "shop_details.php";
		$this->load->view('index',$data);
	}
	public function ViewArtShopList()
	{
		$data['shoplist'] = $this->Shop->getShopList();
		$data['title'] = "Shop List";
		$data['content'] = 'art-shop-list.php';
		$this->load->view('admin/index',$data);
	}
	public function addViewArtShop()
	{
		$data['categorylist'] = $this->query->getCategoryList();
		$data['artistlist'] = $this->Artist->getfront_artists();
		$data['title'] = 'Add Art Shop';
		$data['content'] = 'add-art-Shop.php';
		$this->load->view('admin/index', $data);
	}
	public function StoreArtShopPost()
	{
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
		} else {
			echo json_encode(array('success' => false, 'message' => $this->upload->display_errors()));
			return;
		}
		foreach ($_FILES['image_gallry']['name'] as $key => $value) {
			$_FILES['image']['name']     = $_FILES['image_gallry']['name'][$key];
			$_FILES['image']['type']     = $_FILES['image_gallry']['type'][$key];
			$_FILES['image']['tmp_name'] = $_FILES['image_gallry']['tmp_name'][$key];
			$_FILES['image']['error']    = $_FILES['image_gallry']['error'][$key];
			$_FILES['image']['size']     = $_FILES['image_gallry']['size'][$key];

			if ($this->upload->do_upload('image')) {
				$mainImageData = $this->upload->data();
				$image_gallrys[] = 'uploads/arts/' .  $mainImageData['file_name'];
			}
		}
		$artshop_data = array(
			'artist_id' => $this->input->post('artist_id'),
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'mainimage' => $image,
			'category' => $this->input->post('category'),
			'subcategories' => $this->input->post('subcategory'),
			'tags' => $this->input->post('tags'),
			'size' => $this->input->post('size'),
			'price' => $this->input->post('price'),
			'shortdescription' => $this->input->post('shortdesc'),
			'galleryimage'   => json_encode($image_gallrys),
		);
		$this->Shop->store_artshop($artshop_data); // Call the correct method on the loaded model
		$this->session->set_flashdata('success', 'Art shop added.');
		redirect('administrator/art-shop-list');
	}
	public function editArtShop($id)
	{
		$data['categorylist'] = $this->query->getCategoryList();
		$data['artistlist'] = $this->Artist->getfront_artists();
		$data['artshop'] = $this->Shop->get_Shop_by_id($id);
		$data['subcategorylist'] = $this->query->fetchSubcategoriesByCategoryID($data['artshop']->category);
		$data['title'] = 'Edit Art Shop';
		$data['content'] = 'edit-art-shop.php';
		$this->load->view('admin/index', $data);
	}
	public function updateArtShop()
	{
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
		foreach ($_FILES['image_gallry']['name'] as $key => $value) {
			$_FILES['image']['name']     = $_FILES['image_gallry']['name'][$key];
			$_FILES['image']['type']     = $_FILES['image_gallry']['type'][$key];
			$_FILES['image']['tmp_name'] = $_FILES['image_gallry']['tmp_name'][$key];
			$_FILES['image']['error']    = $_FILES['image_gallry']['error'][$key];
			$_FILES['image']['size']     = $_FILES['image_gallry']['size'][$key];

			if ($this->upload->do_upload('image')) {
				$mainImageData = $this->upload->data();
				$image_gallrys[] = 'uploads/arts/' .  $mainImageData['file_name'];
			}
		}
		$artshop_data = array(
			'artist_id' => $this->input->post('artist_id'),
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'category' => $this->input->post('category'),
			'subcategories' => $this->input->post('subcategory'),
			'tags' => $this->input->post('tags'),
			'size' => $this->input->post('size'),
			'price' => $this->input->post('price'),
			'shortdescription' => $this->input->post('shortdesc'),
		);
		if (!empty($image)) {
			$artshop_data['mainimage']=$image;
		}
		if (!empty($image_gallrys)) {
			$artshop_data['galleryimage']=json_encode($image_gallrys);
		}
		$id= $this->input->post('artshop_id');
		$this->Shop->update_Shop($id,$artshop_data); // Call the correct method on the loaded model
		$this->session->set_flashdata('success', 'Art Shop updated.');
		redirect('administrator/art-shop-list');
	}
	public function deleteArtShop($id) {
		$existing_ArtShop = $this->Shop->get_Shop_by_id($id);
		if (!$existing_ArtShop) {
			show_error('ArtShop not found!', 404);
		}
		$this->Shop->delete_Shop($id);
		$this->session->set_flashdata('success', 'Art Shop removed.');
		redirect('administrator/art-shop-list');
	}
	// cart
	public function viewShopCart()
	{
		$data['title'] = "Cart";
		$data['content'] = "view_cart.php";
		$this->load->view('index',$data);
	}
	public function viewShopCheckout()
	{
		$data['title'] = "Checkout";
		$data['content'] = "checkout.php";
		$this->load->view('index',$data);
	}
	
	// user login
	public function viewUserlogin()
	{
		$data['content'] = 'userlogin.php';
		$this->load->view('index',$data);
	}
	public function userlogin()
	{
		extract($_POST);
		$userdata = $this->query->authenticate_user($email, $password);
		if ($userdata) {
			$session_data = array(
				'usr_id' => $userdata['id'],
				'usr_email' => $userdata['email']
			);
			$this->session->set_userdata('creativehandsuser', $session_data);
			$response = array('success' => true);
		} else {
			$response = array('success' => false);
		}		
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	public function userregister()
	{
		$data['content'] = 'userregister.php';
		$this->load->view('index',$data);
	}
	public function storeUser()
	{
		// Extracting POST data
		$name = $this->input->post('name');
		$number = $this->input->post('number');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// Check if user already exists
		$user_exists = $this->User->check_user_exists($email);

		if ($user_exists) {
			// User already exists, set response accordingly
			$response = array('exists' => true);
		} else {
			// User doesn't exist, proceed with registration
			$data = array(
				'name' => trim($name),
				'number' => trim($number),
				'email' => trim($email),
				'password' => base64_encode($password) // You might want to use a more secure hashing algorithm instead of base64 encoding
			);

			// Register the user
			$userid = $this->User->register_user($data);

			if ($userid > 0) {
				// Registration successful, create session data
				$session_data = array(
					'usr_id' => $userid,
					'usr_email' => $email
				);

				// Set user session data
				$this->session->set_userdata('creativehandsuser', $session_data);

				// Set response indicating successful registration
				$response = array('exists' => false);
			} else {
				// Registration failed, set response accordingly
				$response = array('error' => 'Registration failed');
			}
		}
		// Set JSON response
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($response));
	}

}
