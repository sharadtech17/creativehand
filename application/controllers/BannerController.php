<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BannerController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Banner');
		$this->load->library('upload');
		$this->load->library('pagination');
	}
	public function ViewBannerList()
	{
		$this->load->model('Banner'); // Load the Banner model if not loaded automatically
		$data['bannerlist'] = $this->Banner->getBannerList(); // Retrieve banner list from the model
		$data['title'] = 'Banner List';
		$data['content'] = 'banner-list.php';
		$this->load->view('admin/index', $data);
	}
	public function StoreBannerPost()
	{
		$config['file_name'] = time();
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 2048;
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);
		if ($this->upload->do_upload('image')) {
			$mainImageData = $this->upload->data();
			$image = 'uploads/' .  $mainImageData['file_name'];
		} else {
			echo json_encode(array('success' => false, 'message' => $this->upload->display_errors()));
			return;
		}
		$banner_data = array(
			'name'   => $this->input->post('name'),
			'link'   => $this->input->post('link'),
			'image'   => $image,
			'description' => $this->input->post('description'),
			'status' => $this->input->post('status')
		);
		$this->Banner->store_banner($banner_data); // Call the correct method on the loaded model
		$this->session->set_flashdata('success', 'Banner added.');
		redirect('administrator/banner-list');
	}
	public function updateBanner()
	{
		$config['file_name'] = time();
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 2048;
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);
		$image='';
		if ($this->upload->do_upload('image')) {
			$mainImageData = $this->upload->data();
			$image = 'uploads/' .  $mainImageData['file_name'];
		}
		$banner_data = array(
			'name'   => $this->input->post('name'),
			'link'   => $this->input->post('link'),
			'description' => $this->input->post('description'),
			'status' => $this->input->post('status')
		);
		if (!empty($image)) {
			$banner_data['image']=$image;
		}
		$id= $this->input->post('banner_id');
		$this->Banner->update_banner($id,$banner_data); // Call the correct method on the loaded model
		$this->session->set_flashdata('success', 'Banner updated.');
		redirect('administrator/banner-list');
	}
	public function deleteBanner($id) {
		$existing_banner = $this->Banner->get_banner_by_id($id);
		if (!$existing_banner) {
			show_error('Banner not found!', 404);
		}
		$this->Banner->delete_banner($id);
		$this->session->set_flashdata('success', 'Banner removed.');
		redirect('administrator/banner-list');
	}

}
