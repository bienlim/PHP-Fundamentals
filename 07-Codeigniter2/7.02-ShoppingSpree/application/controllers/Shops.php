<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shops extends CI_Controller {

	public function index()
	{	
		$this->load->model('Shop');
		$cartCount = count($this->Shop->get_cart());

		$view_data = array(
			'cartCount' => $cartCount
		);
		$this->load->view('catalog',$view_data);
	}
	
	public function add()
	{
		$product = $this->input->post('product');
		$qty = $this->input->post('qty');
		$product = $this->security->xss_clean($product);
		$qty= $this->security->xss_clean($qty);
		
		$this->session->set_flashdata('product',$product);
		$this->session->set_flashdata('qty',$qty);
		redirect(base_url('shops/cart_update'));
	}


		public function cart_update(){
			$product = $this->session->flashdata('product');
			$qty =$this->session->flashdata('qty');
			//$current_cart = $this->session->userdata();
			$this->load->model('Shop');
			$myCart = $this->Shop->get_cart_by_product($product);
			//var_dump($myCart);
			if(count($myCart) > 0)
				{
					//echo $myCart['qty'];
					$newQty = $myCart['qty'] + $qty;
					//echo $newQty;
					$this->Shop->update_cart_by_product($newQty,$product);

				} 
			else 
				{
					$this->Shop->add_cart_by_product($product,$qty);
					//$this->session->set_userdata($product, $new_qty);
				}
/* 		echo '<pre>';
		var_dump($_SESSION);
		echo '</pre>';	 */
		redirect(base_url());
		}
	
	public function cart()
	{	

		
		$this->load->model('Shop');
		$cart_list = $this->Shop->view_cart();

		$view_data = array(
			'cart_list' => $cart_list
		);
		//echo '<pre>';
		//var_dump($view_data);
		$this->load->view('cart',$view_data);
	}

	public function remove(){
		$this->load->model('Shop');
		$product_id = $this->input->post('id');
		$this->Shop->remove_cart_by_product($product_id);
		$cart_list = $this->Shop->view_cart();

		$view_data = array(
			'cart_list' => $cart_list
		);
		//echo '<pre>';
		//var_dump($view_data);
		$this->load->view('cart',$view_data);
	}


	public function checkout(){
		$this->output->enable_profiler(TRUE);
		$this->load->model('Shop');
		$cart_list = $this->Shop->view_cart();

		foreach($cart_list as $records){
			$product_id = $records['id'];
			$qty = $records['qty'];
			$price = $records['price'];
			$this->Shop->add_transaction($product_id,$qty,$price);
			$this->Shop->remove_cart_by_product($product_id);
		}

		redirect(base_url());
	}
}

