<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Searches extends CI_Controller {

	public function __construct()
	{
		Parent::__construct();
		$this->output->Enable_profiler(TRUE);
		$this->load->model('search');
	}

	public function index()
	{
		$this->load->view('home');
	}
	public function index_html()
	{
		
		$search = $this->input->post(NULL,TRUE);
		
		$view_data['search'] = $this->search->get_search($search);
		$this->load->view('data',$view_data);
	}

}

