<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('SubscriptionOrder');
	}
	public function index()
	{
		$data['content'] = 'adminlogin.php';
		$this->load->view('index',$data);
	}
	public function dashboard()
	{
		$data['title'] = "Dashboard";
		$data['content'] = "dashboard.php";
		$this->load->view('admin/index',$data);
	}
	public function listarts()
	{
		$data['artsdata'] = $this->query->allarts();
		$data['title'] = "List of Arts";
		$data['content'] = "listarts.php";
		$this->load->view('admin/index',$data);
	}
	public function deleteart()
	{
		$artId = $this->input->post('artId');
		$result = $this->query->deletearts($artId);		
		if ($result) {
			echo 'Art deleted successfully';
		} else {
			echo 'Error deleting art';
		}
	}
	public function administratorlogin()
	{
		extract($_POST);
		$admindata = $this->query->authenticate_admin($administratoremail, $administratorpassword);
		if ($admindata) {
			$session_data = array(
				'usr_id' => $admindata['id'],
				'usr_email' => $admindata['email']
			);
			$this->session->set_userdata('creativehandsadmin', $session_data);
			$response = array('success' => true);
		} else {
			$response = array('success' => false);
		}		
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	public function artistlist()
	{
		$data['artistlist'] = $this->query->get_artists();
		$data['title'] = "List of Artist";
		$data['content'] = "artistlist.php";
		$this->load->view('admin/index',$data);
	}
	public function artistdetail($artistid)
	{
		$data['artistid'] = $artistid;
		$data['title'] = "Artist Detail";
		$data['content'] = "artistdetail.php";
		$this->load->view('admin/index',$data);
	}
	public function verificationstatus()
	{
		$artistid = $this->input->post('artistid');
		$status = $this->input->post('status');
		$result = $this->query->verificationstatus($artistid,$status);
		echo json_encode($result);
	}
	public function adminlogout()
	{
		$this->session->unset_userdata('creativehandsadmin');
		redirect (base_url('administrator/login'));
	}
	public function ViewCategoryList()
	{
		$data['categorylist'] = $this->query->getCategoryList(); // Retrieve Category list from the model
		$data['title'] = 'Category List';
		$data['content'] = 'category-list.php';
		$this->load->view('admin/index', $data);
	}
	public function StoreCategoryPost()
	{
		// Load form validation library
		$this->load->library('form_validation');
	
		// Set validation rules
		$this->form_validation->set_rules('name', 'Category Name', 'required|trim|is_unique[categories.categoriesname]', array(
			'is_unique' => 'The %s already exists.'
		));
		if ($this->form_validation->run() == FALSE) {
			// Validation failed, redirect back to the form with error messages
			$this->session->set_flashdata('error', validation_errors());
			redirect('administrator/category-list');
		} else {
			// Validation passed, proceed to store the category
			$Category_data = array(
				'category'   => $this->input->post('name'),
				'categoriesname'   => $this->input->post('name'),
				'category_type'   => $this->input->post('category_type')
			);
			$this->query->store_Category($Category_data); // Call the correct method on the loaded model
			$this->session->set_flashdata('success', 'Category added.');
			redirect('administrator/category-list');
		}
	}	
	public function updateCategory()
	{
		// Load form validation library
		$this->load->library('form_validation');
	
		// Set validation rules
		$this->form_validation->set_rules('name', 'Category Name', 'required|trim|is_unique[categories.categoriesname]', array(
			'is_unique' => 'The %s already exists.'
		));
		if ($this->form_validation->run() == FALSE) {
			// Validation failed, redirect back to the form with error messages
			$this->session->set_flashdata('error', validation_errors());
			redirect('administrator/category-list');
		} else {
			$Category_data = array(
				'category'   => $this->input->post('name'),
				'categoriesname'   => $this->input->post('name'),
				'category_type'   => $this->input->post('category_type')
			);
			$id= $this->input->post('category_id');
			$this->query->update_Category($id,$Category_data); // Call the correct method on the loaded model
			$this->session->set_flashdata('success', 'Category updated.');
			redirect('administrator/category-list');
		}
	}
	public function deleteCategory($id) {
		$existing_Category = $this->query->get_Category_by_id($id);
		if (!$existing_Category) {
			show_error('Category not found!', 404);
		}
		$this->query->delete_Category($id);
		$this->session->set_flashdata('success', 'Category removed.');
		redirect('administrator/category-list');
	}

	// sub category
	public function ViewSubCategoryList()
	{
		$data['categorylist'] = $this->query->getCategoryList(); // Retrieve SubCategory list from the model
		$data['Subcategorylist'] = $this->query->getSubCategoryList(); // Retrieve SubCategory list from the model
		$data['title'] = 'SubCategory List';
		$data['content'] = 'subcategory-list.php';
		$this->load->view('admin/index', $data);
	}
	public function StoreSubCategoryPost()
	{
		// Load form validation library
		$this->load->library('form_validation');

		// Set validation rules
		$this->form_validation->set_rules('name', 'Subcategory Name', 'required|trim|is_unique[subcategories.subcategoriesname]', array(
			'is_unique' => 'The %s already exists.'
		));

		// Run the validation
		if ($this->form_validation->run() == FALSE) {
			// Validation failed, redirect back to the form with error messages
			$this->session->set_flashdata('error', validation_errors());
			redirect('administrator/subcategories-list');
		} else {
			// Validation passed, proceed to store the subcategory
			$SubCategory_data = array(
				'categories'   => $this->input->post('category'),
				'subcategoriesname'   => $this->input->post('name')
			);
			$this->query->store_SubCategory($SubCategory_data); // Call the correct method on the loaded model
			$this->session->set_flashdata('success', 'Sub Category added.');
			redirect('administrator/subcategories-list');
		}
	}
	public function updateSubCategory()
	{
		
		$SubCategory_data = array(
			'categories'   => $this->input->post('category'),
			'subcategoriesname'   => $this->input->post('name')
		);
		$id= $this->input->post('subcategory_id');
		$this->query->update_SubCategory($id,$SubCategory_data); // Call the correct method on the loaded model
		$this->session->set_flashdata('success', 'Sub Category updated.');
		redirect('administrator/subcategories-list');
	}
	public function deleteSubCategory($id) {
		$existing_SubCategory = $this->query->get_SubCategory_by_id($id);
		if (!$existing_SubCategory) {
			show_error('SubCategory not found!', 404);
		}
		$this->query->delete_SubCategory($id);
		$this->session->set_flashdata('success', 'Sub Category removed.');
		redirect('administrator/subcategories-list');
	}
	public function editart($id)
	{
		$data['artdata'] = $this->query->getartById($id);
		$artistdata = $this->db->select('*')->get_where('artist', ['id' => $data['artdata']->artist_id])->row();
		$category_type=$artistdata->category;
		$category_type=$artistdata->category;
		$category_id=$artistdata->categories;
		$data['categoriesdata'] = $this->query->fetchcategories($category_type);
		$data['subcategoriesdata'] = $this->query->fetchsubcategories($category_id);
		$data['title'] = "Edit Art";
		$data['content'] = "editart.php";
		$this->load->view('admin/index',$data);
	}
	public function subscriptionOrderHistory()
	{
		$data['subscription_order'] = $this->SubscriptionOrder->getSubscriptionOrderList(); 
		$data['title'] = "Subscription History";
		$data['content'] = "subscriptionhistory.php";
		$this->load->view('admin/index',$data);
	}
}