<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
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
}