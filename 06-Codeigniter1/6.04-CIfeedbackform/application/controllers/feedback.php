<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class feedback extends CI_Controller {

	public function index()
	{
		$this->load->view('feedback');
	}

    public function submit()
	{
        $name = $this->input->post('name'); 
        $score = $this->input->post('score');
        $course = $this->input->post('course');
        $reason = $this->input->post('reason');

        $view_data = array(
            'name' => $name,
            'score' => $score,
            'course' => $course,
            'reason' => $reason
        );
		$this->load->view('result',$view_data);
	}
}

