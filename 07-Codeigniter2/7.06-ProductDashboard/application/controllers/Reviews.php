<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews extends CI_Controller
{
    public function add(){
        $this->load->Model('review');
        $id_product = $this->input->post('id_product');
        $result = $this->review->validate_review();
        if($result != 'success')
        {
            $this->session->set_flashdata('input_errors_review', $result);
            redirect(base_url('products/detail_product/'.$id_product));
        }
        else
        {
            
            $this->review->add(
                                $this->input->post('content'),
                                $id_product
                            );
            
            redirect(base_url('products/detail_product/'.$id_product));
        }   
    }
}