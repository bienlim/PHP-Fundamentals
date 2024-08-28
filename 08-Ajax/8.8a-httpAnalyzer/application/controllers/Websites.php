<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Websites extends CI_Controller {
	public function index()
	{
		$this->load->view('home');
	}
	public function get_page()
	{
		$html = file_get_html($this->input->post('url'));
		
		foreach ($html->find("*")  as $element) {

			$elements[]=$element->tag;
		}

		$domset = array_count_values($elements);

	  	$view_data['domset'] = ($domset); 
		$view_data['html']  = htmlspecialchars($html);

		$this->load->view('partial',$view_data);
	}
}