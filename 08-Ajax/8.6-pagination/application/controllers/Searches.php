<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Searches extends CI_Controller {

	public function __construct()
	{
		Parent::__construct();
		//$this->output->Enable_profiler(TRUE);
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
		$_SESSION['search'] = $view_data['search'];

		$_SESSION['page'] = 1;
		$view_data['end'] = 5; 
		$view_data['start'] = 0;
		$count = count($_SESSION['search']);
		$view_data['pagination']= ($count/5);
		if(($count % 5) > 0 ){
			$view_data['pagination'] = $view_data['pagination'] +1;
		}

		$this->load->view('data',$view_data);
	}

	public function pagination($page)
	{
		$_SESSION['page'] = $page;
		$view_data['end'] = ($_SESSION['page'] * 5); 
		$view_data['start'] = $view_data['end'] - 5;
		$count = count($_SESSION['search']);
		$view_data['search'] = $_SESSION['search'] ;
		$view_data['pagination']= ($count/5);
		if($count%5 > 0 ){
			$view_data['pagination'] = $view_data['pagination'] +1;
		}
		$this->load->view('data',$view_data);
	}
}

