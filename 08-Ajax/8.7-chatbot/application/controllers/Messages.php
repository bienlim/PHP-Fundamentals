<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

	public function __Construct()
	{
		Parent::__Construct();
		//$this->load->model('/*  */');

		//$this->output->enable_profiler(TRUE);
	}
	public function index()
	{
		if(!isset($_SESSION['messages'])){
			$_SESSION['messages']=[];
		 }
		$this->load->view('home');
	}
	public function search()
	{
	$ch = curl_init();

	$message = $this->input->post('message');
	$_SESSION['messages'][] = 	array ($message,'text-end');
	curl_setopt($ch, CURLOPT_URL, 'https://wsapi.simsimi.com/190410/talk');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"utext\": \"".$message."\", \"lang\": \"en\" }");

	$headers = array();
	$headers[] = 'Content-Type: application/json';
	$headers[] = 'X-Api-Key: hOnlgcK8vgDdWZZ.pl8Ve_xPEPNwABICudLU6_uG';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}
		$resultArr = json_decode($result);	
		$_SESSION['messages'][] = 	array($resultArr->atext, 'text-start');
		$this->show_messages();

	}

	public function show_messages(){
		$view_data['messages'] = $_SESSION['messages'];
		$this->load->view('partial',$view_data);

	}
}