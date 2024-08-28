<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('User');                                                    
		//$this->output->enable_profiler(TRUE);
	}

	 public function index()
	{ 
		$this->load->view('block/header');
		$this->load->view('user/landing');
		$this->load->view('block/footer');
	}

	public function login()
	{
		$this->load->view('block/header');
		$this->load->view('user/landing');
		$this->load->view('user/login');
		$this->load->view('block/footer');
	}

	public function signup()
	{
		$this->load->view('block/header');
		$this->load->view('user/landing');
		$this->load->view('user/signup');
		$this->load->view('block/footer');
	}

	public function process_login() 
    {

        
        $this->load->Model('User');                                                     //ADDED
        $result = $this->User->validate_signin_form();
        if($result != 'success') {
            $this->session->set_flashdata('input_errors', $result);
            $this->output->enable_profiler(TRUE);
            redirect(base_url("users/login"));
        } 
        else 
        {
            $email = $this->input->post('email');
            $user = $this->User->get_user_by_email($email);

            $result = $this->User->validate_signin_match($user["password"], $this->input->post('password'));
            
            if($result == "success") 
            {
                $this->session->set_userdata(array('id_user'=>$user['id_user'], 'name_first'=>$user['name_first'], 'user_level'=> $user['user_level']));            
                redirect("products");
            }
            else 
            {
                var_dump($this->session->set_flashdata('input_errors', $result));
				redirect(base_url("users/login"));
            }
        } 

    }


	public function process_signup() 
    {

		$this->output->enable_profiler(TRUE);
        $this->load->Model('User');    
        $email = $this->input->post('email');
        $result = $this->User->validate_registration($email);
        
        if($result!=null)
        {
            $this->session->set_flashdata('input_errors', $result);
            redirect(base_url("users/signup"));
        }
        else
        {
            $form_data = $this->input->post();
            $this->User->create_user($form_data);

            $new_user = $this->User->get_user_by_email($form_data['email']);
            $this->session->set_userdata(array('id_user' => $new_user["id_user"], 'name_first'=>$new_user['name_first'], 'user_level'=> $user['user_level']));
            
           redirect("products");
        }
    } 

	public function profile() 
    {
		$view_data['user'] = $this->User->get_user_by_id();
		$this->load->view('block/header_prod');
		$this->load->view('user/profile',$view_data);
		$this->load->view('block/footer');
    }

	public function logout() 
    {
        $this->session->sess_destroy();
        redirect(base_url());   
    }

	public function update() 
    {

		$id_user = $this->input->post('id_user');
        $user = $this->User->get_user_by_id($id_user);

        $result = $this->User->validate_signin_match($user["password"], $this->input->post('password'));

        if($result == "success") 
        {
		
		$result2 = $this->User->validate_update();
			if($result2!=null)
			{
				$this->session->set_flashdata('input_errors_edit', $result2);
				redirect(base_url("users/profile"));
			} else {
				$form_data = $this->input->post();
				$this->User->edit_user($form_data);

				$form_data = $this->User->get_user_by_id($form_data['id_user']);
				$this->session->set_userdata(array('id_user' => $form_data["id_user"], 'name_first' => $form_data['name_first']));

				redirect(base_url("users/profile"));
			}
		}
		else 
		{
			$this->session->set_flashdata('input_errors_edit', $result);
			redirect(base_url("users/profile"));
		}
    } 
	public function reset() 
    {

		$id_user = $this->input->post('id_user');
        $user = $this->User->get_user_by_id($id_user);

        $result = $this->User->validate_signin_match($user["password"], $this->input->post('password'));

        if($result == "success") 
        {
		
		$result2 = $this->User->validate_reset();
			if($result2!=null)
			{
				$this->session->set_flashdata('input_errors_reset', $result2);
				redirect(base_url("users/profile"));
			} else {
				$form_data = $this->input->post();
				$this->User->reset_user($form_data);

				$form_data = $this->User->get_user_by_id($form_data['id_user']);
				$this->session->set_userdata(array('id_user' => $form_data["id_user"], 'name_first' => $form_data['name_first']));

				redirect(base_url("users/profile"));
			}
		}
		else 
		{
			$this->session->set_flashdata('input_errors_reset', $result);
			redirect(base_url("users/profile"));
		}
    } 


}

