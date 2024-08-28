<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{

    /*  DOCU: This function is triggered by default which displays the sign in/wall page.
    Owner: Karen
    */
    public function index()
    {
        $current_user_id = $this->session->userdata('user_id');
        $this->load->helper('security'); //ADDED
        if (!$current_user_id) {
            $this->load->view('templates/header');
            $this->load->view('users/signin');
            //$this->load->view('users/register');
        } else {
            redirect(base_url("wall"));
        }

    }

    public function signin() 
    {
        $current_user_id = $this->session->userdata('user_id');
        
        if(!$current_user_id) { 
            $this->load->view('templates/header');
            $this->load->view('users/signin');
        } 
        else {
            redirect("wall");
        }
    }

    /*  DOCU: This function is triggered to display registration page if there's no user session yet.
        Owner: Karen
    */
    public function register() 
    {
        $current_user_id = $this->session->userdata('user_id');
        
        if(!$current_user_id) { 
            $this->load->view('templates/header');
            $this->load->view('users/register');
        } 
        else {
            //redirect("wall");
            //echo 'shoot';
        }
    }

    public function logoff() 
    {
        $this->session->sess_destroy();
        redirect("/");   
    }

    public function process_signin() 
    {

        
        $this->load->Model('User');                                                     //ADDED
        $result = $this->User->validate_signin_form();
        if($result != 'success') {
            $this->session->set_flashdata('input_errors', $result);
            $this->output->enable_profiler(TRUE);
            redirect(base_url());
        } 
        else 
        {
            $email = $this->input->post('email');
            $user = $this->User->get_user_by_email($email);
            
            $result = $this->User->validate_signin_match($user, $this->input->post('password'));
            
            if($result == "success") 
            {
                $this->session->set_userdata(array('user_id'=>$user['id'], 'first_name'=>$user['first_name']));            
                redirect("wall");
            }
            else 
            {
                var_dump($this->session->set_flashdata('input_errors', $result));
                redirect("signin");
            }
        } 

    }

        /*  DOCU: This function is triggered when the register button is clicked. 
        This validates the required form inputs then checks if the email is already taken. 
        If no problem occured, user information will be stored in database 
        and said user will be routed to the Wall page.
        Owner: Karen
    */
    public function process_registration() 
    {
        $this->load->Model('User');    
        $email = $this->input->post('email');
        $result = $this->User->validate_registration($email);
        
        if($result!=null)
        {
            $this->session->set_flashdata('input_errors', $result);
            redirect("register");
        }
        else
        {
            $form_data = $this->input->post();
            $this->User->create_user($form_data);

            $new_user = $this->User->get_user_by_email($form_data['email']);
            $this->session->set_userdata(array('user_id' => $new_user["id"], 'first_name'=>$new_user['first_name']));
            
            redirect("wall");
        }
    }
}