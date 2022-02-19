<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function  __construct(){
parent::__construct();
$this->load->library(array('session','form_validation'));
$this->load->helper(array('user_helper','url','form'));
$this->load->model('user');

	}
	public function index()
	{
        
		if(!isUserlogin()){
			$this->load->library('form_validation');
			$this->load->view('login');
		}
		else{

			redirect('home','refresh');
		}
	}
	public function logout(){
$this->session->unset_userdata('id');
redirect('login','refresh');

	}
	public function send_email($randomid){




		// $fromName="Admin";
        $to=$this->session->userdata('email');
        $subject='Verify Email address';
        $message= 'Otp:-'.$randomid;
        $from ='enter_your_email';

		$config['protocol']    = 'smtp';
		$config['smtp_host']    = 'ssl://smtp.gmail.com';
		$config['smtp_port']    = '465';
		$config['smtp_timeout'] = '7';
		$config['smtp_user']    = 'enter_your_email';    // Important
		$config['smtp_pass']    = 'enter_your_email_password';  //Important
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['smtp_crypto'] = 'tls';
		$config['mailtype'] = 'html'; // or html
		$config['validation'] = TRUE; // bool whether to validate email or not
		$fromname='Enter_your_user_name';
		$this->load->library('email',$config);
		$this->email->set_mailtype('text');
        $this->email->from($from,$fromname);
        $this->email->to($to);

        $this->email->subject($subject);
        $this->email->message($message);

        if($this->email->send())
        {
            echo "Mail Sent Successfully";
        }
        else
        {
            echo "Failed to send email";
            show_error($this->email->print_debugger());             
                }


	}
	public function verify_otp(){
$values=$this->input->post();
$this->form_validation->set_rules('otp', 'OTP', 'required');
if ($this->form_validation->run() == FALSE)
		{$this->session->set_flashdata('otp-message','<span style=background-color:red;color:white;>Enter Otp </span>');
			redirect('login/check','refresh');

		}
		else{
			$sql='select * from user where email=\''.$this->session->userdata('email').'\'';
			$result=$this->user->dbqueryrun($sql);
			if($result['otp']==$values['otp']){
				$this->session->set_userdata('id',$result['Id']);
				redirect('home','refresh');
			}
			else{
if($this->session->userdata('count')>0){
	$count=$this->session->userdata('count');
	$this->session->set_userdata('count',$count-1);
	$this->session->set_flashdata('otp-message','<span style=background-color:red;color:white;>'.$count.' chances remaining</span>');
	$this->load->view('verify_email');
}
else{
	$this->session->unset('email');
	$this->session->unset('count');
	redirect('login/','refresh');

}


			}

		}

	}
	public function login(){
		$this->form_validation->set_rules('email', 'Email', 'required');
$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{$this->session->set_flashdata('message','<span style=background-color:red;color:white;>Invalid Username and Password </span>');
			redirect('login','refresh');

		}
		else
		{$value=$this->input->post();
			$sql='select * from user where email=\''.$value['email'].'\'';
$result=$this->user->dbqueryrun($sql);
if(password_verify($value['password'],$result['password'])){
	$this->session->set_userdata('id',$result['Id']);
	redirect('home','refresh');

}
else{
	$this->session->set_flashdata('message','<span style=background-color:red;color:white;>Invalid Username and Password </span>');
	redirect('login','refresh');

}

			
				
		}


	}
	public function register(){
		$value=$this->input->post();

$this->form_validation->set_rules('name', 'Name', 'required');
$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{$this->session->set_flashdata('register_message','<span style=background-color:red;color:white;> Please provide all data </span>');
			redirect('login','refresh');

		}
		else
		{
$sql='select * from user where email=\''.$value['email'].'\'';
$result=$this->user->dbqueryrun($sql);
if(isset($result)){
	$this->session->set_flashdata('register_message','<span style=background-color:red;color:white;>User already Present </span>');
	redirect('login','refresh');


}
	else{

		 $result= hash_password($value['password']);
		 $randomid = mt_rand(100000,999999); 
		 $sql='insert into user(Name,email,u_phone,clg_name,otp,q_ask,q_ans,password)values(\''.$value['name'].'\',\''.$value['email'].'\','.$value['ph_no'].',\''.$value['clg_name'].'\','.$randomid.',0,0,\''. $result.'\')';
		 
		 $ans=$this->user->insert($sql);
		 if($ans){
			 $this->session->set_userdata('email',$value['email']);
			 $this->send_email( $randomid);
			 $this->session->set_userdata('count',2);
			 $this->load->view('verify_email');
		 }
		 else{
			 echo 'Error';
		 }
		 
		 
	}		

		//  $result= hash_password($value['password']);


		

		}
	}
	function run(){
		$this->session->set_userdata('count',2);
	}
	function check(){
		echo date("Y-m-d");
		// $this->load->view('verify_email');
		// echo $this->session->userdata('email');
	}
}
