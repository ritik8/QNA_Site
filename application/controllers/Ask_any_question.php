<?php
class Ask_any_question extends CI_Controller{
function __construct(){
parent::__construct();
$this->load->library(array('session','form_validation'));
$this->load->helper(array('user_helper','url'));
$this->load->model(array('question','answer'));
}
public function index(){
if(!isuserlogin()){
redirect('login','refresh');

}
else{
    $data['title']='Ask-Question';
$this->load->view('ask_question',$data);

}


}
public function submit(){
if(!isuserlogin()){
    redirect('login','refresh');
}
else{
    $this->form_validation->set_rules('title', 'required');
    $this->form_validation->set_rules('body','required');
    if ($this->form_validation->run() == FALSE)
		{$this->session->set_flashdata('message','<span style=background-color:red;color:white;>Please enter Title and Body Both </span>');
			redirect('ask-any-question','refresh');

		}
        else{
$values=$this->input->post();
$sql='insert into  question(u_Id,q_title,q_body,likes,q_date)values('.$this->session->userdata('id').',\''.$values['title'].'\','.'\''.$values['body'].'\','.'0,\''.date("Y-m-d").'\')';
$this->question->insert($sql);
redirect('home','refresh');
        }
}
}



}





?>