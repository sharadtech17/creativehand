<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Banner');
		$this->load->model('Event');
		$this->load->model('Blog');
	}
	public function index()
	{
		$data['bannerlist'] = $this->Banner->getBannerList(); 
		$data['bloglist'] = $this->Blog->getBlogList(); 
		$data['eventlist'] = $this->Event->getEventList(); 
		$data['content'] = 'home.php';
		$this->load->view('index',$data);
	}
	public function artist()
	{
		$data['artistlist'] = $this->query->getfront_artists();
		$data['content'] = 'artist.php';
		$this->load->view('index',$data);
	}
	public function artistdetails($artistid)
	{
		$data['artistid'] = $artistid;
	    $data['artdata'] = $this->query->getGalleryProducts($artistid);
		$data['content'] = 'artistdetails.php';
    	$this->load->view('index', $data);
	}
	public function artdetails($artid)
	{
		$data['artid'] = $artid;
    	$this->load->view('artdetails', $data);
	}
}
