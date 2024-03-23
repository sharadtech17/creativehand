<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubscriptionController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Subscription');
		$this->load->model('SubscriptionOrder');
		$this->load->library('upload');
		$this->load->library('pagination');
	}
	public function ViewSubscriptionList()
	{
		$this->load->model('Subscription'); // Load the Subscription model if not loaded automatically
		$data['Subscriptionlist'] = $this->Subscription->getSubscriptionList(); // Retrieve Subscripition List from the model
		$data['title'] = 'Subscripition List';
		$data['content'] = 'subscription-list.php';
		$this->load->view('admin/index', $data);
	}
	public function StoreSubscriptionPost()
	{
		$Subscription_data = array(
			'name'   => $this->input->post('name'),
			'amount'   => $this->input->post('amount'),
			'type'   => $this->input->post('type'),
			'qty_art'   => $this->input->post('qty_art'),
			'qty_value'   => $this->input->post('qty_value'),
			'description' => $this->input->post('description'),
			'status' => $this->input->post('status')
		);
		$this->Subscription->store_Subscription($Subscription_data); // Call the correct method on the loaded model
		$this->session->set_flashdata('success', 'Subscription added.');
		redirect('administrator/subscriptionList');
	}
	public function updateSubscription()
	{
		$Subscription_data = array(
			'name'   => $this->input->post('name'),
			'amount'   => $this->input->post('amount'),
			'type'   => $this->input->post('type'),
			'qty_art'   => $this->input->post('qty_art'),
			'qty_value'   => $this->input->post('qty_value'),
			'description' => $this->input->post('description'),
			'status' => $this->input->post('status')
		);
		$id= $this->input->post('subscription_id');
		$this->Subscription->update_Subscription($id,$Subscription_data); // Call the correct method on the loaded model
		$this->session->set_flashdata('success', 'Subscription updated.');
		redirect('administrator/subscriptionList');
	}
	public function deleteSubscription($id) {
		$existing_Subscription = $this->Subscription->get_Subscription_by_id($id);
		if (!$existing_Subscription) {
			show_error('Subscription not found!', 404);
		}
		$this->Subscription->delete_Subscription($id);
		$this->session->set_flashdata('success', 'Subscription removed.');
		redirect('administrator/subscriptionList');
	}
	// billing subscription
	public function storeSubscriptionBilling($id)
	{
		$plandata = $this->Subscription->get_Subscription_by_id($id); 
		$artistid = $this->session->userdata['creativehandsartist']['usr_id'];
		$end_date = date('Y-m-d', strtotime('+' . $plandata->qty_value . ' years'));
		$subscription_data = array(
			'artist_id'         => $artistid,
			'subscription_id' => $plandata->id,
			'subscription_type' => $plandata->type,
			'amount'            => $plandata->amount,
			'payment_status'    => 0,
			'payment_type'      => 'Online',
			'transaction_no'    => 'IUAGHSDAOSHD223OIJ',
			'start_date'        => date('Y-m-d'), // Current date
			'end_date'          => $end_date, // End date 30 days from now
			'status'            => 0
		);
		$this->SubscriptionOrder->store_SubscriptionOrder($subscription_data); // Call the correct method on the loaded model
		$this->session->set_flashdata('success', 'Subscription Order added.');
		redirect('artist-panel/subscription-history');
	}
	
}
