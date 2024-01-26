<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HandArtController extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	public function index()
	{
		$data['content'] = 'hand_made_art.php';
		$this->load->view('index',$data);
	}
	public function viewPainting()
	{
		$data['content'] = 'painting.php';
		$this->load->view('index',$data);
	}

}
