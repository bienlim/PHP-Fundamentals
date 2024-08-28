<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
        $this->load->model('Product');

	}
    public function index(){

        $this->load->model('Product');
        $view_data['products'] = $this->Product->get_all_products();

		$this->load->view('block/header_prod');

		if($_SESSION['user_level']==9)
        {
            $this->load->view('product/addbutton');
            $view_data['nonadmin'] = '';
        } 
        else
        {
            $view_data['nonadmin'] = 'd-none';

        }
		$this->load->view('product/dashboard',$view_data);
		$this->load->view('block/footer');
    }

    public function remove_product()
    {
        $view_data['product_remove'] = $this->Product->get_product($this->input->post('id_product'));
        $this->index();
        $this->load->view('product/remove',$view_data);
    }
    public function remove_product_confirm()
    {
        $this->Product->remove_product($this->input->post('id_product'));
        redirect(base_url('products'));
    }
    public function edit_product()
    {
        $view_data['product_edit'] = $this->Product->get_product($this->input->post('id_product'));
        $this->index();
        $this->load->view('product/edit',$view_data);
    }

        public function edit_product_confirm()
        {
            $result = $this->Product->validate_edit_product();

            if($result != 'success') {
                $this->session->set_flashdata('input_errors', $result);
                $this->edit_product();
            } 
            else 
            {
                $edit_product = $this->input->post(NULL, TRUE);
                $this->Product->edit_product($edit_product);
                redirect(base_url('products'));
            }
    /*         $this->Product->edit_product($this->input->post('id_product'));
            redirect(base_url('products')); */
        }
    public function add_product()
    {
        
        $this->load->model('Product');
        $view_data['products'] = $this->Product->get_all_products();
        $view_data['nonadmin'] = '';
        
		$this->load->view('block/header_prod');
        $this->load->view('product/add');


		$this->load->view('product/dashboard',$view_data);
		$this->load->view('block/footer');
    }


        public function add_product_confirm()
        {
            $result = $this->Product->validate_edit_product();

            if($result != 'success') {
                $this->session->set_flashdata('input_errors', $result);
                $this->add_product();
            } 
            else 
            {
                $edit_product = $this->input->post(NULL, TRUE);
                $this->Product->add_product($edit_product);
                redirect(base_url('products'));
            }
    /*         $this->Product->edit_product($this->input->post('id_product'));
            redirect(base_url('products')); */
        }
    
    public function detail_product($product){

        $this->load->Model('review');

        
        $reviews= $this->review->get_reviews_by_product($product);
        
        $inbox = array();
        foreach($reviews as $review) 
        {
            $this->load->model('comment');

            $comments = $this->comment->get_comments_by_review($review['id_review']);
            $review['comments'] = $comments;
            //$review['comments'] = $comments;
            $inbox[] = $review;
        }

        $view_data['product'] = $this->Product->get_product($product);
        $view_data['inbox'] = $inbox;
        $this->load->view('block/header_prod');
        $this->load->view('product/detail',$view_data);
        $this->load->view('block/footer');
    }

    

}