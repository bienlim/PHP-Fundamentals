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
        $u = new User();
        $u->include_related('course',array('course'));
        $view_data['users'] = $u->get();

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
        $u->course_id = $this->input->post('course_id');
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

        $u->delete();
        $this->partial();
    }

    public function edit_dialog($id){

        $u = new User();
        $u->db->where('id',$id);
        $u->get();
        $genders = array (
                    'male',
                    'female'
        );

        foreach($genders AS $gender){
            if($u->gender == $gender){
                $view_data[$gender] = "checked";
            } else {
                $view_data[$gender] = "";
            }
        }

        $view_data['user'] = $u;
        $this->load->view('dialog_edit',$view_data);

    }
    public function edit_confirm($id){

        $u = new User();
        $u->db->where('id',$id);
        $u->get();
        // Enter values into required fields
        $u->name_first = $this->input->post('name_first');
        $u->name_last = $this->input->post('name_last');
        $u->gender = $this->input->post('gender');
        $u->course_id = $this->input->post('course_id');
        $u->class = $this->input->post('class'); 

        // Save new user
        $u->save();
        redirect('/');
    }

}