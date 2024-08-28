<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __Construct()
	{
		Parent::__Construct();
		$this->load->model('order');

	}
	public function index_html()
	{
		$view_data['orders'] = $this->order->fetch_all();
		$this->load->view('partialorder',$view_data);
	}
	public function index()
	{
		//$view_data['orders'] = $this->order->fetch_all();
		$this->load->view('order');
	}

	public function create()
	{
		$new_order = $this->input->post('content');
		$this->order->create($new_order);
		$view_data['orders'] = $this->order->fetch_all();
		$this->load->view('partialorder',$view_data);
	}
}

