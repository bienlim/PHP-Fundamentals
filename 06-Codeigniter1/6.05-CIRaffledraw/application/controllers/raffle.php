<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class raffle extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->session->set_userdata('count',0);
		$count = $this->session->userdata('count');
		$rand =rand(1000000,9999999);

		$data_view = array(
			'rand' => $rand,
			'count' => $count,
		);
		$this->load->view('raffle',$data_view);
	}

	public function submit()
	{
		$count = $this->session->userdata('count');
		$this->session->set_userdata('count', $count +1);
		$rand =rand(1000000,9999999);

		$data_view = array(
			'rand' => $rand,
			'count' => $count,
		);

		if($count<11)
		{
			$this->load->view('raffle',$data_view);
		} else{
			$this->load->view('noraffle');
		}
	}
}

