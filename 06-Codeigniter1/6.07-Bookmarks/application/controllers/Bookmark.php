<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookmark extends CI_Controller {

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

		$errors[] = '';
		$this->load->model('DBbookmark');
		$results = $this->DBbookmark->get_all_bookmark();

		$view_data = array(
			'errors' => $errors,
			'results' => $results
		);
		$this->load->view('main',$view_data);
	}

	public function add(){

		
		$this->load->library("form_validation");
		$this->form_validation->set_rules("name", "User name", "required|alpha");
		$this->form_validation->set_rules("url", "Url", "required|valid_url");
		$this->form_validation->set_rules("folder", "Folder", "required");

		if($this->form_validation->run() === FALSE)
		{	
			$results[] = 'sample';
			$this->session->set_flashdata('errors',validation_errors());
			$this->view_data["results"] = $results;

/* 			$view_data = array(
				'errors' => array(validation_errors()),
				'results' => $results
			);
		 */
		}
		else
		{
			if($this->input->post('action') == 'New'){
				$name = $this->input->post('name');
				$url = $this->input->post('url');
				$folder = $this->input->post('folder');
				$this->session->set_flashdata('name', $name);
				$this->session->set_flashdata('url', $url);
				$this->session->set_flashdata('folder', $folder);

				redirect('http://localhost/6-Codeigniter1/6.7-Bookmarks/bookmark/new');
				

			}
		}

		$this->load->model('DBbookmark');
		$results = $this->DBbookmark->get_all_bookmark();
			$view_data = array(
				'errors' => array(validation_errors()),
				'results' => $results
			);

		$this->load->view('main',$view_data);

	}

	public function new(){
		$this->load->model('DBbookmark');

		$name = $this->session->flashdata('name');
		$url = $this->session->flashdata('url');
		$folder = $this->session->flashdata('folder');
		if($name !== NULL){
			
			$this->DBbookmark->add_bookmark($name,$url,$folder);

			
		}

		$results = $this->DBbookmark->get_all_bookmark();
			$view_data = array(
				'errors' => array(NULL),
				'results' => $results
			);
			$this->load->view('main',$view_data);

	}

	public function delete(){

		$id =  $this->input->post('id');
		$name =  $this->input->post('name');
		$url =  $this->input->post('url');
		$folder =  $this->input->post('folder');

		$this->session->set_flashdata('id', $id);

		$view_data = array (
			'id' => $id,
			'name'=>$name,
			'url' =>$url,
			'folder' => $folder
		);

		$this->load->view('delete',$view_data);

	}

	public function confirm_delete(){

		$id =  $this->input->post('id');
		$this->load->model('DBbookmark');
		$this->DBbookmark->delete_bookmark($id);

		redirect('/');

	}

}

