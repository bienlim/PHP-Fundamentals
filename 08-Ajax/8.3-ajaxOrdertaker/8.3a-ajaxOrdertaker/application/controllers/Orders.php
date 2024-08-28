<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __Construct()
	{
		Parent::__construct();
		$this->load->model('order');

	}
	public function index()
	{
		$view_data['orders'] = $this->order->fetch_all();
		$this->load->view('order',$view_data);
	}

	public function create()
	{
	  $new_order = $this->input->post('content');
	  $this->order->create($new_order);
	  redirect("/");
	}

}

