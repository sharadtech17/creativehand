<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HandArtController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('pagination');
	}
	public function index()
	{
		$query = $this->input->get('query');
	
		$config['base_url'] = base_url('HandArtController/index');
		$config['total_rows'] = $this->query->countHandArtProduct(); // Get total number of products
		$config['per_page'] = 9; // Number of products per page
		$config['uri_segment'] = 3; // URL segment that contains the page number
		$this->pagination->initialize($config);
	
		// Get products for the current page
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	
		// Get products based on search query if provided, otherwise get all products
		if (!empty($query)) {
			$data['handartlist'] = $this->query->searchArtByHandArtArtist($query, $config['per_page'], $page);
		} else {
			$data['handartlist'] = $this->query->getArtByHandArtArtist($config['per_page'], $page);
		}
	
		// Load view with pagination links and products data
		$data['pagination_links'] = $this->pagination->create_links();
		$data['content'] = 'hand_made_art.php';
		$this->load->view('index', $data);
	}	
	public function viewHandArtDetails($id)
	{
		$data['hand_art'] = $this->query->getHandArtArtistByArtId($id);
		$data['content'] = 'hand_made_art_detail.php';
		$this->load->view('index',$data);
	}
	public function viewPainting()
	{
		$this->load->library('pagination');
		$query = $this->input->get('query');
	
		$config['base_url'] = base_url('HandArtController/viewPainting');
		$config['total_rows'] = $this->query->countPaitingArt(); // Get total number of products
		$config['per_page'] = 9; // Number of products per page
		$config['uri_segment'] = 3; // URL segment that contains the page number
		$this->pagination->initialize($config);
	
		// Get products for the current page
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		if (!empty($query)) {
			$data['paintinglist'] = $this->query->searchPaintingByArtist($query,$config['per_page'], $page);
        } else {
            $data['paintinglist'] = $this->query->getPaintingByArtist($config['per_page'], $page);
        }
		// Load view with pagination links and products data
		$data['pagination_links'] = $this->pagination->create_links();
		$data['content'] = 'painting.php';
		$this->load->view('index',$data);
	}
	public function viewPaintingDetails($id)
	{
		$data['hand_art'] = $this->query->getHandArtArtistByArtId($id);
		$data['content'] = 'painting_details.php';
		$this->load->view('index',$data);
	}
}
