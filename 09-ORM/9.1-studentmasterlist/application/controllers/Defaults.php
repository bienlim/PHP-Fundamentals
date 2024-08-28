<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

	public function __Construct()
	{
		Parent::__Construct();
		$this->load->model('/*  */');
		$this->output->enable_profiler(TRUE);
	}
	public function index()
	{
		$this->load->view('/*  */');
	}
	public function index_html()
	{
		$view_data['/*  */'] = $this->/*    */->fetch_all();
		$this->load->view('/*  */',$view_data);
	}


}