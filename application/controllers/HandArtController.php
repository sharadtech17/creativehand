<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HandArtController extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}
	public function index()
	{
		$query = $this->input->get('query');
		if (!empty($query)) {
			$data['handartlist'] = $this->query->searchArtByHandArtArtist($query);
        } else {
            $data['handartlist'] = $this->query->getArtByHandArtArtist();
        }
		$data['content'] = 'hand_made_art.php';
		$this->load->view('index',$data);
	}
	public function viewHandArtDetails($id)
	{
		$data['hand_art'] = $this->query->getHandArtArtistByArtId($id);
		$data['content'] = 'hand_made_art_detail.php';
		$this->load->view('index',$data);
	}
	public function viewPainting()
	{
		$query = $this->input->get('query');
		if (!empty($query)) {
			$data['paintinglist'] = $this->query->searchPaintingByArtist($query);
        } else {
            $data['paintinglist'] = $this->query->getPaintingByArtist();
        }
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
