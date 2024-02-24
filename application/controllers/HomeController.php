<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Banner');
		$this->load->model('Event');
		$this->load->model('Blog');
		$this->load->model('Promotive');
		$this->load->model('News');
		$this->load->model('Artist');
		$this->load->model('Shop');
	}
	public function index()
	{
		$data['bannerlist'] = $this->Banner->getBannerList(); 
		$data['bloglist'] = $this->Blog->getBlogList(); 
		$data['eventlist'] = $this->Event->getActiveEventList(); 
		$data['promotivelist'] = $this->Promotive->getActivePromotiveList(); 
		$data['newslist'] = $this->News->getNewsList(); 
		$data['paintingArt'] = $this->query->getPaintingByArtist(4,0);
		$data['handArt'] = $this->query->getArtByHandArtArtist(4,0);
		$data['shoplist'] = $this->Shop->getShopList();
		$data['bestsellerlist'] = $this->Shop->getBestSellerList();
		$data['artistlist'] = $this->Artist->getfront_artists();
		$data['content'] = 'home.php';
		$this->load->view('index',$data);
	}
	public function artist()
	{
		$query = $this->input->get('query');
		if (!empty($query)) {
			$data['artistlist'] = $this->query->searchartists($query);
        } else {
            $data['artistlist'] = $this->query->getfront_artists();
        }
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
	public function privacy_policy()
	{
		$data['content'] = 'privacy_policy.php';
		$this->load->view('index',$data);
	}
	public function term_condition()
	{
		$data['content'] = 'term_condition.php';
		$this->load->view('index',$data);
	}
	
}
