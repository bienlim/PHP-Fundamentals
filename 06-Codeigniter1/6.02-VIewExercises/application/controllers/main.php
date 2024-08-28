<?php

class main extends CI_Controller {

    public function index($view)
    {
        $this->load->view('main/'.$view);
    }

    public function world()
    {
        $this->load->view('main/world');
    }

    
    public function ninjas($count)
    {
        $view_data = array(
            'count' => $count,
        );
        $this->load->view('main/ninjas',$view_data);
    }
}
