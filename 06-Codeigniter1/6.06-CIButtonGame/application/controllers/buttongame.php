<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buttongame extends CI_Controller {



	public function index()
	{
		$money = 500;
		$chance = 10;
		$logs[] = array('['.date("m/d/Y h:i:s a", time()).'] Welcome to Money Button Game, risk taker! All you need to do is to push the buttons to try your luck. You have free 10 chances with initial money 500. Choos wisely and good luck!','green');
		$this->session->set_userdata('money',$money);
		$this->session->set_userdata('chance',$chance);
		$this->session->set_userdata('logs',$logs);

		$data_view = array(
			'money' => $money,
			'chance' => $chance,
			'logs'=> $logs
			
		);
		
		$this->load->view('main',$data_view);
	}

	public function submit(){

		$bets = array(
			'low' => array(-25,100),
			'mid' => array(-100,1000),
			'high' => array(-500,2500),
			'severe' => array(-3000,5000),
	
		);

		$money = $this->session->userdata('money');
		$chance = $this->session->userdata('chance');
		$logs = $this->session->userdata('logs');
	
		$this->input->post('low') !== NULL ? $rand = rand($bets['low'][0],$bets['low'][1]):"";
		$this->input->post('mid') !== NULL ? $rand = rand($bets['mid'][0],$bets['mid'][1]):"";
		$this->input->post('high') !== NULL ? $rand =  rand($bets['high'][0],$bets['high'][1]):"";
		$this->input->post('severe') !== NULL ? $rand =  rand($bets['severe'][0],$bets['severe'][1]):"";
		
		if($this->input->post('reset') !== NULL){

			redirect(base_url());

		} 



		

		if($chance > 0){

			if($money > 1){

				$money = $money + $rand;
				$chance = $chance - 1;

				$logs[] = array('['.date("m/d/Y h:i:s a", time()).'] You rolled '.$rand.'. You now have '.$money.' and you only have '.$chance.' chances left. Goodluck!', 
				$rand>0?'green':'red');
			} else{
				$logs[] = array('Game over, No more money!','red');
			}
		} else {
			$logs[] = array('Game over, no more chances!','red');
		}
		
		$this->session->set_userdata('money',$money);
		$this->session->set_userdata('chance',$chance);
		$this->session->set_userdata('logs',$logs );


		$data_view = array(
			'money' => $money,
			'chance' => $chance,
			'logs'=> $logs
			
		);

		$this->load->view('main',$data_view);


	}
}



