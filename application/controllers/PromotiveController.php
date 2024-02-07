<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PromotiveController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Promotive');
		$this->load->model('News');
		$this->load->library('upload');
		$this->load->library('pagination');
	}
	public function ViewPromotiveList()
	{
		$this->load->model('Promotive'); // Load the Promotive model if not loaded automatically
		$data['Promotivelist'] = $this->Promotive->getPromotiveList(); // Retrieve Promotive list from the model
		$data['title'] = 'Promotive List';
		$data['content'] = 'promotive-list.php';
		$this->load->view('admin/index', $data);
	}
	public function StorePromotivePost()
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
		}else {
			$this->session->set_flashdata('error',$this->upload->display_errors());
			redirect('administrator/promotive-list');
		}
		$Promotive_data = array(
			'name'   => $this->input->post('name'),
			'link'   => $this->input->post('link'),
			'image'   => $image,
			'status' => $this->input->post('status')
		);
		$this->Promotive->store_Promotive($Promotive_data); // Call the correct method on the loaded model
		$this->session->set_flashdata('success', 'Promotive added.');
		redirect('administrator/promotive-list');
	}
	public function updatePromotive()
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
		}else {
			$this->session->set_flashdata('error',$this->upload->display_errors());
			redirect('administrator/promotive-list');
		}
		$Promotive_data = array(
			'name'   => $this->input->post('name'),
			'link'   => $this->input->post('link'),
			'status' => $this->input->post('status')
		);
		if (!empty($image)) {
			$Promotive_data['image']=$image;
		}
		$id= $this->input->post('Promotive_id');
		$this->Promotive->update_Promotive($id,$Promotive_data); // Call the correct method on the loaded model
		$this->session->set_flashdata('success', 'Promotive updated.');
		redirect('administrator/promotive-list');
	}
	public function deletePromotive($id) {
		$existing_Promotive = $this->Promotive->get_Promotive_by_id($id);
		if (!$existing_Promotive) {
			show_error('Promotive not found!', 404);
		}
		$this->Promotive->delete_Promotive($id);
		$this->session->set_flashdata('success', 'Promotive removed.');
		redirect('administrator/promotive-list');
	}

	public function ViewNewsList()
	{
		$this->load->model('News'); // Load the News model if not loaded automatically
		$data['Newslist'] = $this->News->getNewsList(); // Retrieve News list from the model
		$data['title'] = 'News List';
		$data['content'] = 'news-list.php';
		$this->load->view('admin/index', $data);
	}
	public function StoreNewsPost()
	{
		$News_data = array(
			'title'   => $this->input->post('name'),
		);
		$this->News->store_News($News_data); // Call the correct method on the loaded model
		$this->session->set_flashdata('success', 'News added.');
		redirect('administrator/news-list');
	}
	public function updateNews()
	{
		$News_data = array(
			'title'   => $this->input->post('name'),
		);
		$id= $this->input->post('News_id');
		$this->News->update_News($id,$News_data); // Call the correct method on the loaded model
		$this->session->set_flashdata('success', 'News updated.');
		redirect('administrator/news-list');
	}
	public function deleteNews($id) {
		$existing_News = $this->News->get_News_by_id($id);
		if (!$existing_News) {
			show_error('News not found!', 404);
		}
		$this->News->delete_News($id);
		$this->session->set_flashdata('success', 'News removed.');
		redirect('administrator/news-list');
	}

}
