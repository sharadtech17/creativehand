<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BlogController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Blog');
		$this->load->library('upload');
		$this->load->library('pagination');
	}
	public function index()
	{
		$data['bloglist'] = $this->Blog->getBlogList(); // Retrieve Blog list from the model
		$data['title'] = 'Blog';
		$data['content'] = 'blog.php';
		$this->load->view('index',$data);
	}
	public function viewblogdetails($id)
	{
		$data['blog'] = $this->Blog->get_Blog_by_id($id); // Retrieve Blog list from the model
		$data['title'] = 'Blog';
		$data['content'] = 'blog_detail.php';
		$this->load->view('index',$data);
	}
	public function ViewBlogList()
	{
		$this->load->model('Blog'); // Load the Blog model if not loaded automatically
		$data['bloglist'] = $this->Blog->getBlogList(); // Retrieve Blog list from the model
		$data['title'] = 'Blog List';
		$data['content'] = 'blog-list.php';
		$this->load->view('admin/index', $data);
	}
	public function StoreBlogPost()
	{
		$config['file_name'] = time();
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 20048;
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);
		if ($this->upload->do_upload('image')) {
			$mainImageData = $this->upload->data();
			$image = 'uploads/' .  $mainImageData['file_name'];
		} else {
			$this->session->set_flashdata('error',$this->upload->display_errors());
			redirect('administrator/blog-list');
		}
		$blog_data = array(
			'name'   => $this->input->post('name'),
			'date'   => $this->input->post('date'),
			'image'   => $image,
			'description' => $this->input->post('description')
		);
		$this->Blog->store_Blog($blog_data); // Call the correct method on the loaded model
		$this->session->set_flashdata('success', 'Blog added.');
		redirect('administrator/blog-list');
	}
	public function updateBlog()
	{
		$config['file_name'] = time();
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 20048;
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);
		$image='';
		if ($this->upload->do_upload('image')) {
			$mainImageData = $this->upload->data();
			$image = 'uploads/' .  $mainImageData['file_name'];
		} else {
			$this->session->set_flashdata('error',$this->upload->display_errors());
			redirect('administrator/blog-list');
		}
		$blog_data = array(
			'name'   => $this->input->post('name'),
			'date'   => $this->input->post('date'),
			'description' => $this->input->post('description'),
			'status' => $this->input->post('status')
		);
		if (!empty($image)) {
			$blog_data['image']=$image;
		}
		$id= $this->input->post('Blog_id');
		$this->Blog->update_Blog($id,$blog_data); // Call the correct method on the loaded model
		$this->session->set_flashdata('success', 'Blog updated.');
		redirect('administrator/blog-list');
	}
	public function deleteBlog($id) {
		$existing_Blog = $this->Blog->get_Blog_by_id($id);
		if (!$existing_Blog) {
			show_error('Blog not found!', 404);
		}
		$this->Blog->delete_Blog($id);
		$this->session->set_flashdata('success', 'Blog removed.');
		redirect('administrator/blog-list');
	}
}
