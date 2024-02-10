<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Contact');
	}
	public function index()
	{
		$data['content'] = 'contact_us.php';
		$this->load->view('index',$data);
	}
	public function ViewContactList()
	{
		$data['contactlist'] = $this->Contact->getContactList(); // Retrieve Contact list from the model
		$data['title'] = 'Contact List';
		$data['content'] = 'contact-list.php';
		$this->load->view('admin/index', $data);
	}
	public function StoreContactPost()
	{
		$Contact_data = array(
			'name'   => $this->input->post('name'),
			'email'   => $this->input->post('email'),
			'phone'   => $this->input->post('phone'),
			'subject'   => $this->input->post('subject'),
			'comment'   => $this->input->post('comment')
		);
		$this->Contact->store_Contact($Contact_data); // Call the correct method on the loaded model
		$this->session->set_flashdata('success', 'Contact Send.');
		redirect('view-contact');
	}
	public function deleteContact($id) {
		$existing_Contact = $this->Contact->get_Contact_by_id($id);
		if (!$existing_Contact) {
			show_error('Contact not found!', 404);
		}
		$this->Contact->delete_Contact($id);
		$this->session->set_flashdata('success', 'Contact removed.');
		redirect('administrator/contact-list');
	}
}
