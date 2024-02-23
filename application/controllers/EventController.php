<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->model('Event'); // Load the Event model if not loaded automatically
		$this->load->model('Artist'); // Load the Event model if not loaded automatically
	}
	public function index()
	{
		$query = $this->input->get('query');
		if (!empty($query)) {
			$data['eventlist'] = $this->Event->searchEvent($query);
        } else {
            $data['eventlist'] = $this->Event->getActiveEventList();
        }
		$data['title'] = "Event";
		$data['content'] = "events.php";
		$this->load->view('index',$data);
	}
	public function ViewEventList()
	{
		$data['eventlist'] = $this->Event->getEventList(); // Retrieve Event list from the model
		$data['title'] = 'Event List';
		$data['content'] = 'event-list.php';
		$this->load->view('admin/index', $data);
	}
	public function ViewArtistEvent()
	{
		$artist_id =  $this->session->userdata['creativehandsartist']['usr_id'];
		$data['eventlist'] = $this->Event->getEventListByArtist($artist_id); // Retrieve Event list from the model
		$data['title'] = 'Event List';
		$data['content'] = 'event-list.php';
		$this->load->view('artist/index', $data);
	}
	public function viewEventDetail($id)
	{
		$data['event'] = $this->Event->get_Event_by_id($id); // Retrieve Event list from the model
		$data['title'] = 'Event Details';
		$data['content'] = 'events_detail.php';
		$this->load->view('index', $data);
	}
	public function addViewEvent()
	{
		$data['artistlist'] = $this->Artist->getfront_artists();
		$data['eventlist'] = $this->Event->getEventList(); // Retrieve Event list from the model
		$data['title'] = 'Add Event';
		$data['content'] = 'add-event.php';
		$this->load->view('admin/index', $data);
	}
	public function addViewEventArtist()
	{
		$data['title'] = 'Add Event';
		$data['content'] = 'add-event.php';
		$this->load->view('artist/index', $data);
	}
	public function StoreEventPost()
	{
		$config['file_name'] = time();
		$config['upload_path'] = './uploads/events/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 200000048;
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);
		$product_images = array();
		$event_image='';
		$artist_status=0;
		$artist_status=$this->input->post('is_artist');
		if (empty($artist_status)) {
			$artist_status=0;
		}
		if ($this->upload->do_upload('banner_image')) {
			$mainImageData = $this->upload->data();
			$event_image = 'uploads/events/' .  $mainImageData['file_name'];
		}
		else {
			$this->session->set_flashdata('error',$this->upload->display_errors());
			if ($artist_status==='1') {
				redirect('artist-panel/event-list');
			}
			redirect('administrator/event-list');
		}
		foreach ($_FILES['product_image']['name'] as $key => $value) {
			$_FILES['image']['name']     = $_FILES['product_image']['name'][$key];
			$_FILES['image']['type']     = $_FILES['product_image']['type'][$key];
			$_FILES['image']['tmp_name'] = $_FILES['product_image']['tmp_name'][$key];
			$_FILES['image']['error']    = $_FILES['product_image']['error'][$key];
			$_FILES['image']['size']     = $_FILES['product_image']['size'][$key];

			if ($this->upload->do_upload('image')) {
				$mainImageData = $this->upload->data();
				$product_images[] = 'uploads/events/' .  $mainImageData['file_name'];
			}
		}
		$Event_data = array(
			'name'   => $this->input->post('name'),
			'artist_id'   => $this->input->post('artist_id'),
			'event_details'   => $this->input->post('event_details'),
			'start_date'   => $this->input->post('start_date'),
			'date'   => $this->input->post('date'),
			'time'   => $this->input->post('time'),
			'address'   => $this->input->post('address'),
			'city'   => $this->input->post('city'),
			'event_type'   => $this->input->post('event_type'),
			'total_seat'   => $this->input->post('total_seat'),
			'ticket_price'   => $this->input->post('ticket_price'),
			'event_status'   => $this->input->post('event_status'),
			'goolge_location_link'   => $this->input->post('goolge_location_link'),
			'youtube_link'   => $this->input->post('youtube_link'),
			'youtube_video_desc'   => $this->input->post('youtube_video_desc'),
			'product_image'   => json_encode($product_images),
			'event_image'   => $event_image,
			'status'   => $artist_status,
		);
		$this->Event->store_Event($Event_data); // Call the correct method on the loaded model
		$this->session->set_flashdata('success', 'Event added.');
		if ($artist_status==='1') {
			redirect('artist-panel/event-list');
		}
		redirect('administrator/event-list');
	}
	public function editEvent($id)
	{
		$data['artistlist'] = $this->Artist->getfront_artists();
		$data['event'] = $this->Event->get_Event_by_id($id); // Retrieve Event list from the model
		$data['title'] = 'Edit Event';
		$data['content'] = 'edit-event.php';
		$this->load->view('admin/index', $data);
	}
	public function editArtistEvent($id)
	{
		$data['artistlist'] = $this->Artist->getfront_artists();
		$data['event'] = $this->Event->get_Event_by_id($id); // Retrieve Event list from the model
		$data['title'] = 'Edit Event';
		$data['content'] = 'edit-event.php';
		$this->load->view('artist/index', $data);
	}
	public function updateEvent()
	{
		$config['file_name'] = time();
		$config['upload_path'] = './uploads/events/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 200000048;
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);
		
		$event_image = '';
		$product_images = array();
		$artist_status=$this->input->post('is_artist');
		if (empty($artist_status)) {
			$artist_status=0;
		}
		if ($this->upload->do_upload('event_image')) {
			$event_image_data = $this->upload->data();
			$event_image = 'uploads/events/' . $event_image_data['file_name'];
		}
		foreach ($_FILES['product_image']['name'] as $key => $value) {
			$_FILES['image']['name']     = $_FILES['product_image']['name'][$key];
			$_FILES['image']['type']     = $_FILES['product_image']['type'][$key];
			$_FILES['image']['tmp_name'] = $_FILES['product_image']['tmp_name'][$key];
			$_FILES['image']['error']    = $_FILES['product_image']['error'][$key];
			$_FILES['image']['size']     = $_FILES['product_image']['size'][$key];

			if ($this->upload->do_upload('image')) {
				$productimages = $this->upload->data();
				$product_images[] = 'uploads/events/'.$productimages['file_name'];
			}
		}
		$Event_data = array(
			'name'   => $this->input->post('name'),
			'artist_id'   => $this->input->post('artist_id'),
			'event_details'   => $this->input->post('event_details'),
			'start_date'   => $this->input->post('start_date'),
			'date'   => $this->input->post('date'),
			'time'   => $this->input->post('time'),
			'address'   => $this->input->post('address'),
			'city'   => $this->input->post('city'),
			'event_type'   => $this->input->post('event_type'),
			'total_seat'   => $this->input->post('total_seat'),
			'ticket_price'   => $this->input->post('ticket_price'),
			'event_status'   => $this->input->post('event_status'),
			'goolge_location_link'   => $this->input->post('goolge_location_link'),
			'youtube_link'   => $this->input->post('youtube_link'),
			'youtube_video_desc'   => $this->input->post('youtube_video_desc')
		);
		$status=$this->input->post('status');
		if (!is_null($status)) {
			$Event_data['status']=$status;
		}
		if (!empty($event_image)) {
			$Event_data['event_image']=$event_image;
		}
		if (!empty($product_images)) {
			$Event_data['product_image']=json_encode($product_images);
		}
		$id= $this->input->post('event_id');
		$this->Event->update_Event($id,$Event_data);
		$this->session->set_flashdata('success', 'Event updated.');
		if ($artist_status==='1') {
			redirect('artist-panel/event-list');
		}
		redirect('administrator/event-list');
	}
	
	public function deleteGalleryImg($id,$status,$folder,$folder1,$image) {
		$existing_Event = $this->Event->get_Event_by_id($id);
		$removeArray=$folder.'/'.$folder1.'/'.$image;
		if (!$existing_Event) {
			show_error('Event not found!', 404);
		}
		$jsonString=$existing_Event->product_image;
		$imageArray = json_decode($jsonString, true);
		$index = array_search($removeArray, $imageArray);
		if ($index !== false) {
			unset($imageArray[$index]);
		}
		$newJsonString = json_encode(array_values($imageArray));
		$data=array(
			'product_image'=> $newJsonString
		);
		$this->Event->update_Event($id,$data);
		$this->session->set_flashdata('success', 'Event Gallery Image removed.');
		if ($status==1) {
			redirect('artist-panel/event-list');
		}
		redirect('administrator/event-list');
	}
	public function deleteEvent($id) {
		$existing_Event = $this->Event->get_Event_by_id($id);
		if (!$existing_Event) {
			show_error('Event not found!', 404);
		}
		$this->Event->delete_Event($id);
		$this->session->set_flashdata('success', 'Event removed.');
		redirect('administrator/event-list');
	}
	public function deleteArtistEvent($id) {
		$existing_Event = $this->Event->get_Event_by_id($id);
		if (!$existing_Event) {
			show_error('Event not found!', 404);
		}
		$this->Event->delete_Event($id);
		$this->session->set_flashdata('success', 'Event removed.');
		redirect('artist-panel/event-list');
	}
}
