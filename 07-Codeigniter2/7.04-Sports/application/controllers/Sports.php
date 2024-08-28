<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sports extends CI_Controller {

	public function __Construct(){
		parent::__Construct();
		$this->load->model('Sport');
	}
	
	
	public function index()
	{
		if(!isset($_SESSION['athletes'])){
			$_SESSION['athletes'] = $this->Sport->get_all_athletes();
		}
		if(!isset($_SESSION['sports'])){
			$_SESSION['sports'] = $this->Sport->get_all_sports();
		}

		$view_data['sportnames'] = $this->Sport->get_all_sportnames();
		$view_data['athletes'] = $_SESSION['athletes'];
		$view_data['sports'] = $_SESSION['sports'];
		$this->load->view('dashboard',$view_data);

	}

	public function search()
	{
		$this->output->enable_profiler(TRUE);
		$this->input->post(NULL, TRUE);
		$name = isset($_POST['name'])?$_POST['name']:NULL;
		$gender = isset($_POST['gender'])?$_POST['gender']:NULL;
		$sport=[];  
		$sportnames= $this->Sport->get_all_sportnames();

		foreach($sportnames as $sportname)
		{
			
			if(isset($_POST[$sportname['name_sport']]))
			{
				$sport[$sportname['id_sport']] = $_POST[$sportname['name_sport']];
			}
			else
			{
				$sport[$sportname['id_sport']] = NULL;
			}

			$this->session->set_userdata($sportname['name_sport'],$sport[$sportname['id_sport']]);

		}
		/* $swim = isset($_POST['swim'])?$_POST['swim']:NULL;
		$dart = isset($_POST['dart'])?$_POST['dart']:NULL;
		$chess = isset($_POST['chess'])?$_POST['chess']:NULL; */
		
		
		$array = $this->Sport->get_athletes_by($name,$gender,$sport);

		$_SESSION['athletes'] = $array;
		redirect(base_url());
	}

}

