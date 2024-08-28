<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends CI_Controller
{
    public function add(){
        $this->output->enable_profiler(TRUE);
        $this->load->Model('comment');
        $id_product = $this->input->post('id_product');
        $result = $this->comment->validate_comment();
        if($result != 'success')
        {
            $this->session->set_flashdata('input_errors_comment', $result);
            redirect(base_url('products/detail_product/'.$id_product));
        }
        else
        {
            $this->comment->add(
                                $this->input->post('id_review'),
                                $this->input->post('content')
                            );
            redirect(base_url('products/detail_product/'.$id_product));
        }
    }
}

