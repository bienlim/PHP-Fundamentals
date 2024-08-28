<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {

	public function index()
	{
		!isset($_SESSION['startdate'])?$_SESSION['startdate']='2011-01-01':'';
		!isset($_SESSION['enddate'])?$_SESSION['enddate']='2012-04-01':'';
		$this->load->model('Client');
		$data = $this->Client->get_monthYear_total($_SESSION['startdate'],$_SESSION['enddate']);
		$view_data['data'] = $data;
		$this->load->view('dashboard', $view_data);
	}

	public function lookup(){
		
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');
		echo $startdate.$enddate;
		$this->security->xss_clean($startdate);
		$this->security->xss_clean($enddate);
		echo $startdate.$enddate;
		$this->session->set_userdata('startdate',$startdate);
		$this->session->set_userdata('enddate',$enddate);

		redirect(base_url());
		
	}
}

