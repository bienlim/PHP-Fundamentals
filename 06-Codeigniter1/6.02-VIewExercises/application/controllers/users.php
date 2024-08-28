<?php

class users extends CI_Controller {

    public function index()
    {
        $this->load->view('users/index');
    }

    public function new()
    {
        $this->load->view('users/new');
    }

    public function create()
    {

        $user_form['name_first'] = $this->input->post('name_first'); 
        $user_form['name_last'] = $this->input->post('name_last'); 
        $user_form['email'] = $this->input->post('email'); 
        
        if(!isset( $user_form['name_first'])){
            $this->load->view('users/index');
        }else{
            $this->load->view('users/new_success');
        }
    }

    public function count()
    {
        $this->session->set_userdata('visit',  $this->session->userdata('visit') + 1 );

        $this->load->view('users/count');
        
    }

    public function reset()
    {
        $this->session->set_userdata('visit', 1 );

        $this->load->view('users/count');
        
    }

    public function say($say,$count)
    {

        $view_data = array(
            'say' => $say,
            'count' => $count
        );
        $this->load->view('users/say',$view_data);
    }


    public function mprep()
    {
         $view_data = array(
              'name' => "Michael Choi",
              'age'  => 40,
              'location' => "Seattle, WA",
              'hobbies' => array( "Basketball", "Soccer", "Coding", "Teaching", "Kdramas")
          );
          $this->load->view('users/mprep', $view_data);
    }

}