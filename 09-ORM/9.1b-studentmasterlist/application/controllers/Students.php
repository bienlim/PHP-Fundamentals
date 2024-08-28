<?php
Class Students extends CI_Controller{

    public function __construct(){

        parent::__construct();
        //$this->output->enable_profiler(TRUE);
    }

    public function index(){

        $this->load->view('home');
    }

    public function partial(){
        $all_user = new User();
        //$view_data['users'] = $all_user->get();

        $view_data['users'] = $all_user->get();


        echo '<pre>';
        //var_dump($view_data['users']);
        $this->load->view('partial',$view_data);
    }

    public function new(){

        // Create new User
        $u = new User();

        // Enter values into required fields
        $u->name_first = $this->input->post('name_first');
        $u->name_last = $this->input->post('name_last');
        $u->gender = $this->input->post('gender');
        $u->class = $this->input->post('class'); 

        // Save new user
        $u->save();
        $this->partial();
    }

    public function remove_user(){

        $id = $this->input->post('id');
        $u = new User();
        $u->db->where('id',$id);
        $u->get();
        //echo $u->name_first; */A


        $u->delete();
        $this->partial();
    }

}