<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __Construct()
	{
		Parent::__construct();
		$this->load->model('order');
		//$this->output->enable_profiler(TRUE);
	}
	public function index()
	{
		//$view_data['orders'] = $this->order->fetch_all();
		$this->load->view('order');
	}
	public function index_html()
	{
		$view_data['orders'] = $this->order->fetch_all();
		$this->load->view('partialorder',$view_data);
	}
	public function create()
	{
		$new_order = $this->input->post('content');
		$this->order->create($new_order);
		$this->index_html();
	}

	public function update()
	{
	  $update_order = $this->input->post('content');
	  $id_order = $this->input->post('id_order');
	  $this->order->update($update_order,$id_order);
	  $this->index_html();
	}
	public function remove($id_order)
	{
	  $this->order->remove($id_order);
	  $this->index_html();
	}


}

