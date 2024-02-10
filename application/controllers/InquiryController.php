<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InquiryController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Inquiry');
	}
	public function index()
	{
		$data['content'] = 'Inquiry_us.php';
		$this->load->view('index',$data);
	}
	public function ViewInquiryList()
	{
		$artist_id = $this->session->userdata['creativehandsartist']['usr_id'];
		$data['inquirylist'] = $this->Inquiry->getInquiryList($artist_id); // Retrieve Inquiry list from the model
		$data['title'] = 'Inquiry List';
		$data['content'] = 'inquiry-list.php';
		$this->load->view('artist/index', $data);
	}
	public function StoreInquiryPost()
	{
		$Inquiry_data = array(
			'artist_id'   => $this->input->post('artist_id'),
			'subject'   => $this->input->post('subject'),
			'message'   => $this->input->post('message')
		);
		$this->Inquiry->store_Inquiry($Inquiry_data); // Call the correct method on the loaded model
		$this->session->set_flashdata('success', 'Inquiry Send.');
		
		// Redirect back to the previous page
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function deleteInquiry($id) {
		$existing_Inquiry = $this->Inquiry->get_Inquiry_by_id($id);
		if (!$existing_Inquiry) {
			show_error('Inquiry not found!', 404);
		}
		$this->Inquiry->delete_Inquiry($id);
		$this->session->set_flashdata('success', 'Inquiry removed.');
		redirect('artist/inquiry-list');
	}
}
