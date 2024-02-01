<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShopController extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->model('Shop'); // Load the Shop model if not loaded automatically
		$this->load->model('Artist'); 
		$this->load->model('User');
		$this->load->model('Cart');
	}
	public function index()
	{
		$query = $this->input->get('query');
		if (!empty($query)) {
			$data['shoplist'] = $this->Shop->searchArtShop($query);
        } else {
            $data['shoplist'] = $this->Shop->getShopList();
        }
		$data['title'] = "Shop";
		$data['content'] = "shop.php";
		$this->load->view('index',$data);
	}
	public function viewShopDetail($id)
	{
		$data['shoplist'] = $this->Shop->get_Shop_by_id($id);
		$data['title'] = "Shop Details";
		$data['content'] = "shop_details.php";
		$this->load->view('index',$data);
	}
	public function ViewArtShopList()
	{
		$data['shoplist'] = $this->Shop->getShopList();
		$data['title'] = "Shop List";
		$data['content'] = 'art-shop-list.php';
		$this->load->view('admin/index',$data);
	}
	public function addViewArtShop()
	{
		$data['categorylist'] = $this->query->getCategoryList();
		$data['artistlist'] = $this->Artist->getfront_artists();
		$data['title'] = 'Add Art Shop';
		$data['content'] = 'add-art-shop.php';
		$this->load->view('admin/index', $data);
	}
	public function StoreArtShopPost()
	{
		$config['file_name'] = time();
		$config['upload_path'] = './uploads/arts/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 20048;
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);
		$image_gallrys = array();
		$image='';
		if ($this->upload->do_upload('mainimage')) {
			$mainImageData = $this->upload->data();
			$image = 'uploads/arts/' .  $mainImageData['file_name'];
		}
		foreach ($_FILES['image_gallry']['name'] as $key => $value) {
			$_FILES['image']['name']     = $_FILES['image_gallry']['name'][$key];
			$_FILES['image']['type']     = $_FILES['image_gallry']['type'][$key];
			$_FILES['image']['tmp_name'] = $_FILES['image_gallry']['tmp_name'][$key];
			$_FILES['image']['error']    = $_FILES['image_gallry']['error'][$key];
			$_FILES['image']['size']     = $_FILES['image_gallry']['size'][$key];

			if ($this->upload->do_upload('image')) {
				$mainImageData = $this->upload->data();
				$image_gallrys[] = 'uploads/arts/' .  $mainImageData['file_name'];
			}
		}
		$artshop_data = array(
			'artist_id' => $this->input->post('artist_id'),
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'mainimage' => $image,
			'category' => $this->input->post('category'),
			'subcategories' => $this->input->post('subcategory'),
			'tags' => $this->input->post('tags'),
			'size' => $this->input->post('size'),
			'price' => $this->input->post('price'),
			'shortdescription' => $this->input->post('shortdesc'),
			'galleryimage'   => json_encode($image_gallrys),
			'feature_status'   => $this->input->post('feature_status'),
			'best_seller_status' => $this->input->post('best_seller_status'),
		);
		$this->Shop->store_artshop($artshop_data); // Call the correct method on the loaded model
		$this->session->set_flashdata('success', 'Art shop added.');
		redirect('administrator/art-shop-list');
	}
	public function editArtShop($id)
	{
		$data['categorylist'] = $this->query->getCategoryList();
		$data['artistlist'] = $this->Artist->getfront_artists();
		$data['artshop'] = $this->Shop->get_Shop_by_id($id);
		$data['subcategorylist'] = $this->query->fetchSubcategoriesByCategoryID($data['artshop']->shop_category);
		$data['title'] = 'Edit Art Shop';
		$data['content'] = 'edit-art-shop.php';
		$this->load->view('admin/index', $data);
	}
	public function updateArtShop()
	{
		$config['file_name'] = time();
		$config['upload_path'] = './uploads/arts/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 20048;
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);
		$image_gallrys = array();
		$image='';
		if ($this->upload->do_upload('mainimage')) {
			$mainImageData = $this->upload->data();
			$image = 'uploads/arts/' .  $mainImageData['file_name'];
		}
		foreach ($_FILES['image_gallry']['name'] as $key => $value) {
			$_FILES['image']['name']     = $_FILES['image_gallry']['name'][$key];
			$_FILES['image']['type']     = $_FILES['image_gallry']['type'][$key];
			$_FILES['image']['tmp_name'] = $_FILES['image_gallry']['tmp_name'][$key];
			$_FILES['image']['error']    = $_FILES['image_gallry']['error'][$key];
			$_FILES['image']['size']     = $_FILES['image_gallry']['size'][$key];

			if ($this->upload->do_upload('image')) {
				$mainImageData = $this->upload->data();
				$image_gallrys[] = 'uploads/arts/' .  $mainImageData['file_name'];
			}
		}
		$artshop_data = array(
			'artist_id' => $this->input->post('artist_id'),
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'category' => $this->input->post('category'),
			'subcategories' => $this->input->post('subcategory'),
			'tags' => $this->input->post('tags'),
			'size' => $this->input->post('size'),
			'price' => $this->input->post('price'),
			'shortdescription' => $this->input->post('shortdesc'),
			'feature_status'   => $this->input->post('feature_status'),
			'best_seller_status' => $this->input->post('best_seller_status'),
		);
		if (!empty($image)) {
			$artshop_data['mainimage']=$image;
		}
		if (!empty($image_gallrys)) {
			$artshop_data['galleryimage']=json_encode($image_gallrys);
		}
		$id= $this->input->post('artshop_id');
		$this->Shop->update_Shop($id,$artshop_data); // Call the correct method on the loaded model
		$this->session->set_flashdata('success', 'Art Shop updated.');
		redirect('administrator/art-shop-list');
	}
	public function deleteArtShop($id) {
		$existing_ArtShop = $this->Shop->get_Shop_by_id($id);
		if (!$existing_ArtShop) {
			show_error('ArtShop not found!', 404);
		}
		$this->Shop->delete_Shop($id);
		$this->session->set_flashdata('success', 'Art Shop removed.');
		redirect('administrator/art-shop-list');
	}
	// cart
	public function viewShopCart()
	{
		if (empty($this->session->userdata['creativehandsuser']['usr_id'])) {
			// Redirect the user to the login page or display a message
			$this->session->set_flashdata('error', 'Please log in to view items to your cart.');
			redirect('user-login'); // Adjust the redirection URL as needed
			return;
		}
		$user_id=$this->session->userdata['creativehandsuser']['usr_id'];
		$data['cartlist'] = $this->Cart->getCartByUserId($user_id);
		$data['title'] = "Cart";
		$data['content'] = "view_cart.php";
		$this->load->view('index',$data);
	}
	public function viewShopCheckout()
	{
		if (empty($this->session->userdata['creativehandsuser']['usr_id'])) {
			// Redirect the user to the login page or display a message
			$this->session->set_flashdata('error', 'Please log in to view items to your cart.');
			redirect('user-login'); // Adjust the redirection URL as needed
			return;
		}
		$user_id=$this->session->userdata['creativehandsuser']['usr_id'];
		$data['cartlist'] = $this->Cart->getCartByUserId($user_id);
		$data['title'] = "Checkout";
		$data['content'] = "checkout.php";
		$this->load->view('index',$data);
	}
	
	// user login
	public function viewUserlogin()
	{
		$data['content'] = 'userlogin.php';
		$this->load->view('index',$data);
	}
	public function user_login()
	{
		// Retrieve POST data using CodeIgniter input class
		$email = $this->input->post('email');
		$password = $this->input->post('password');
	
		// Authenticate user
		$userdata = $this->User->authenticate_user($email, $password);
	
		if ($userdata) {
			// Set session data
			$session_data = array(
				'usr_id' => $userdata['id'],
				'usr_email' => $userdata['email']
			);
			$this->session->set_userdata('creativehandsuser', $session_data);
			$response = array('success' => true);
		} else {
			$response = array('success' => false);
		}
		$this->session->set_flashdata('success', 'User Login.');
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}
	
	public function userregister()
	{
		$data['content'] = 'userregister.php';
		$this->load->view('index',$data);
	}
	public function storeUser()
	{
		// Extracting POST data
		$name = $this->input->post('name');
		$number = $this->input->post('number');
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// Check if user already exists
		$user_exists = $this->User->check_user_exists($email);

		if ($user_exists) {
			$this->session->set_flashdata('success', 'Email Already Registered.');
			redirect('home');
		} else {
			// User doesn't exist, proceed with registration
			$data = array(
				'first_name' => trim($name),
				'phone' => trim($number),
				'email' => trim($email),
				'password' => base64_encode($password) // You might want to use a more secure hashing algorithm instead of base64 encoding
			);

			// Register the user
			$userid = $this->User->register_user($data);
			if ($userid > 0) {
				// Registration successful, create session data
				$session_data = array(
					'usr_id' => $userid,
					'usr_email' => $email
				);
				// Set user session data
				$this->session->set_userdata('creativehandsuser', $session_data);
				$this->session->set_flashdata('success', 'User Register.');
				redirect('home');
			} else {
				$this->session->set_flashdata('error', 'Registration failed.');
				redirect('home');
			}
		}
	}
	public function viewUserProfile()
	{
		$user_id=$this->session->userdata['creativehandsuser']['usr_id'];
		$data['user'] = $this->User->get_user_by_id($user_id);
		$data['content'] = 'user_account.php';
		$this->load->view('index',$data);
	}
	public function updateUser()
	{
		// Retrieve POST data
		$f_name = $this->input->post('f_name');
		$l_name = $this->input->post('l_name');
		$number = $this->input->post('number');
		$email = $this->input->post('email');
		$oldpassword = $this->input->post('password');
		$newpassword = $this->input->post('newpassword');
	
		// Trim and encode passwords
		$oldpassword = base64_encode(trim($oldpassword));
		$newpassword = base64_encode(trim($newpassword));
	
		// Prepare user data array
		$data = array(
			'first_name' => trim($f_name),
			'last_name' => trim($l_name),
			'phone' => trim($number),
			'email' => trim($email)
		);
	
		// Get user ID from session
		$user_id = $this->session->userdata['creativehandsuser']['usr_id'];
	
		// Check if new password is provided
		if (!empty($newpassword)) {
			// Update user password
			$result = $this->User->updateUserPassword($oldpassword, $newpassword, $user_id);
			if (!$result) {
				// Handle password update failure
				$this->session->set_flashdata('error', 'Failed to update password. Please try again.');
				redirect('user/account');
				return;
			}
			// Password updated successfully
			$this->session->set_flashdata('success', 'Password updated successfully.');
		}
	
		// Update user information
		$result = $this->User->update_user($user_id, $data);
		if (!$result) {
			// Handle user update failure
			$this->session->set_flashdata('error', 'Failed to update user information. Please try again.');
			redirect('user/account');
			return;
		}
	
		// User information updated successfully
		$this->session->set_flashdata('success', 'User information updated successfully.');
		redirect('user/account');
	}
	
	public function userLogout()
	{
		$this->session->unset_userdata('creativehandsuser');
		$this->session->set_flashdata('success', 'User Logout.');
		redirect('user-login');
	}
	public function viewAddress()
	{
		$user_id=$this->session->userdata['creativehandsuser']['usr_id'];
		$data['user'] = $this->User->get_user_by_id($user_id);
		$data['content'] = 'user_address.php';
		$this->load->view('index',$data);
	}
	public function editAddress()
	{
		$bill_address = $this->input->post('bill_address');
		$ship_address = $this->input->post('ship_address');
		$data = array(
			'bill_address' => trim($bill_address),
			'ship_address' => trim($ship_address)
		);
		$user_id=$this->session->userdata['creativehandsuser']['usr_id'];
		$data['user'] = $this->User->update_user($user_id,$data);
		$this->session->set_flashdata('success', 'User Updated.');
		redirect('user/address');
	}
	// order 
	public function viewOrderHistory()
	{
		$user_id=$this->session->userdata['creativehandsuser']['usr_id'];
		$data['orderlist'] = $this->Shop->getOrderByUserId($user_id);
		$data['content'] = 'order_details.php';
		$this->load->view('index',$data);
	}
	// cart
	public function StoreCart($id,$price)
	{
		// Check if the user is logged in
		if (empty($this->session->userdata['creativehandsuser']['usr_id'])) {
			// Redirect the user to the login page or display a message
			$this->session->set_flashdata('error', 'Please log in to add items to your cart.');
			redirect('user-login'); // Adjust the redirection URL as needed
			return;
		}
	
		// Get the user ID from the session data
		$user_id = $this->session->userdata['creativehandsuser']['usr_id'];
		$existing_cart_item = $this->Cart->getCartItem($id, $user_id);
		if ($existing_cart_item) {
			// If the product is already in the cart, you can update the quantity or display a message
			$this->session->set_flashdata('error', 'This item is already in your cart.');
			redirect('view-cart'); // Adjust the redirection URL as needed
			return;
		}
		// Prepare data to add to the cart
		$data = array(
			'product_id' => trim($id),
			'qty' => '1',
			'user_id' => $user_id,
			'price' => $price,
			'total_amount' => $price,
		);
		// Add the product to the cart
		$result = $this->Cart->addCart($data);
		if (!$result) {
			// Handle cart addition failure
			$this->session->set_flashdata('error', 'Failed to add item to the cart. Please try again.');
			redirect('view-cart'); // Adjust the redirection URL as needed
			return;
		}
		// Cart addition successful
		$this->session->set_flashdata('success', 'Item added to the cart.');
		redirect('view-cart'); // Adjust the redirection URL as needed
	}	
	public function updateCartItem() {
        // Get data from POST request
        $cart_id = $this->input->post('cart_id');
        $qty = $this->input->post('quantity');
        $price = $this->input->post('price');
		$totalamount=$price*$qty;
		$data = array(
			'qty' => $qty,
			'price' => $price,
			'total_amount' => $totalamount,
		);
        $this->Cart->editCartItem($cart_id, $data);
		$this->session->set_flashdata('success', 'Cart Updated.');
        redirect('view-cart');
    }
	public function deleteCart($cart_id)
	{
		$result = $this->Cart->deleteCartItem($cart_id);
		if ($result) {
			$this->session->set_flashdata('success', 'Item removed from cart.');
		} else {
			$this->session->set_flashdata('error', 'Failed to remove item from cart.');
		}
		redirect('view-cart'); // Redirect to the cart page or any other appropriate page
	}
	// order place
	public function orderPlace() 
	{
		$orderno = rand(10000000, 99999999);
		$user_id = $this->session->userdata['creativehandsuser']['usr_id'];
        $order_data = array(
            'order_no' => $orderno,
            'bill_name' => $this->input->post('f_name').$this->input->post('l_name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone'),
            'date' => $this->input->post('date'),
            'user_id' => $user_id,
            'total_amount' => $this->input->post('total_amount'),
            'bill_address' => $this->input->post('bill_address'),
            'company' => $this->input->post('company'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'country' => $this->input->post('country'),
            'pincode' => $this->input->post('pincode'),
            'note' => $this->input->post('note'),
        );
        $order_id = $this->Shop->place_order($order_data);
        
        if ($order_id) {
            $cart_items = $this->Cart->getCartByUserId($user_id);
            foreach ($cart_items as $item) {
                $order_item_data = array(
                    'order_id' => $order_id,
                    'product_id' => $item->product_id,
                    'qty' => $item->qty,
                    'price' => $item->price,
                    'subtotal' => $item->total_amount,
                    
                );
                $this->Shop->add_order_item($order_item_data);
            }
            $this->Cart->clear_cart($user_id);
			$this->session->set_flashdata('success', 'Order Place.');
            redirect('user/orders');
        } else {
			$this->session->set_flashdata('success', 'Order Place.');
            redirect('user/orders');
        }
    }

	// admin view order
	public function viewOrderList()
	{
		$data['orderlist'] = $this->Shop->getAllOrders();
		$data['title'] = "Order List";
		$data['content'] = 'order-list.php';
		$this->load->view('admin/index',$data);
	}
	public function viewOrderDetails($id)
	{
		$data['orders'] = $this->Shop->getOrdersById($id);
		$data['orderitem'] = $this->Shop->getOrdersItemById($id);
		$data['title'] = "Order Details";
		$data['content'] = 'view-order-details.php';
		$this->load->view('admin/index',$data);
	}
	public function updateOrderStatus()
	{
		$orderId = $this->input->post('order_id');
        $newStatus = $this->input->post('order_status');
		$this->Shop->updateOrderStatus($orderId, $newStatus);
        redirect('administrator/orders');
	}
	
}
