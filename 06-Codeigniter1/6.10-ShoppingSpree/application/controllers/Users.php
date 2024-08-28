<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {


	
    
    public function index()
	{
        
        
        $view_data = array(
            'msg_register' => array(),
            'msg_login' => array()
        );
		$this->load->view('homepage',$view_data);
	}

    public function register()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("name_first", "First Name", "required|alpha");
		$this->form_validation->set_rules("name_last", "Last Name", "required|alpha");
		$this->form_validation->set_rules("contact_number", "Contact Number", "required|numeric");
		$this->form_validation->set_rules("password", "Password", "required|min_length[8]");
		$this->form_validation->set_rules("confirm_password", "Confirm Password", "required|matches[password]");
        
        if ($this->form_validation->run() == FALSE)
            {
                $msg_register[] = validation_errors();
            }
            else
            {
                $this->load->model('User');
                $contact_number = $this->input->post('contact_number');
                if($this->User->get_user_by_contact($contact_number))
                    {
                        $msg_register[] = "Contact Number alreay registered";
                    }
                    else
                    {

                        $name_first = $this->input->post('name_first');
                        $name_last = $this->input->post('name_last');
                        $password = $this->input->post('password');
                        $salt = bin2hex(openssl_random_pseudo_bytes(22));
                        $npassword = md5($password.''.$salt);

                        $this->session->set_flashdata(array(
                            'name_first' => $name_first,
                            'name_last' => $name_last,
                            'contact_number' => $contact_number,
                            'salt' => $salt,
                            'password' => $npassword
                        ));

                        redirect(base_url('users/register_success'));
                    }
            }

        $view_data = array(
            'msg_register' => $msg_register,
            'msg_login' => array()

        );
        
        $this->load->view('homepage',$view_data);
    }

    public function register_success(){

        $msg_register[] = "Successfully registered!";

        $name_first = $this->session->flashdata('name_first');
        $name_last = $this->session->flashdata('name_last');
        $contact_number = $this->session->flashdata('contact_number');
        $npassword = $this->session->flashdata('password');
        $salt = $this->session->flashdata('salt');

        $this->load->model('User');
        $this->User->add_user($name_first,$name_last,$contact_number,$npassword,$salt);

        $view_data = array(
            'msg_register' => $msg_register,
            'msg_login' => array()
        );

        $this->load->view('homepage',$view_data);
    }

    public function login(){

        $contact_number = $this->input->post('contact_number');
        $password = $this->input->post('password');

        $this->load->model('User');
        $user_query = $this->User->get_user_by_contact($contact_number);

        if(!empty($user_query)){
            $npassword =  md5($password . '' . $user_query['salt']);
            if($user_query['password']==$npassword){
                $this->session->set_userdata('name_first',$user_query['name_first']);
                $this->session->set_userdata('name_last',$user_query['name_last']);
                $this->session->set_userdata('contact_number',$user_query['contact_number']);

                redirect(base_url('users/profile'));
            }else{
                $msg_login[] = 'Incorrect Password!';
            }
        }else{
            $msg_login[] = 'Login failed!';
        }

        $view_data = array(
            'msg_register' => array(),
            'msg_login' => $msg_login

        );
        
        $this->load->view('homepage',$view_data);

    }

    public function profile(){

        $view_data = array(
            'name_first' => $this->session->userdata('name_first'),
            'name_last' => $this->session->userdata('name_last'),
            'contact_number' =>$this->session->userdata('contact_number')

        );
        $this->load->view('profile',$view_data);
    }

    public function logout(){
        $this->session->unset_userdata('name_first','name_last','contact_number');
        redirect(base_url());

    }



}

