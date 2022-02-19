<?php
class Home extends CI_Controller{
function __construct(){
    parent::__construct();
    $this->load->library(array('session','form_validation'));
    $this->load->helper(array('user_helper','url'));
    $this->load->model(array('question','answer'));
}
public function index(){
if(!isUserlogin()){
    redirect('','refresh');
    }
else{

$sql='select user.Id as user_Id,user.Name, question.Id as question_Id,u_Id,q_title,q_body,likes,q_date from user inner join question on user.Id=question.u_Id order by question_Id DESC';
$result=$this->question->dbqueryrun($sql);
$data['question']=$result;
$data['title']='Home';

// foreach ($question as $key ) {
//     # code...
//     echo $key->q_title;
// }

$this->load->view('home.php',$data);
}
    
}
public function answer($q_id=''){
  
    $q=$this->question->dbqueryrun('select user.Id as user_Id,user.Name,question.Id as question_Id,u_Id,q_title,q_body,likes,q_date from user inner join question on user.Id=question.u_Id where question.Id='.$q_id);
    $a=$this->answer->dbqueryrun('select * from user inner join answer on user.Id=answer.u_Id where q_Id='.$q_id);
$data['question']=$q;
$data['answer']=$a;
$data['title']='Answer';
$this->load->view('answer.php',$data);
        


}
public function like(){

    $value=$this->input->get();

    $question=$this->question->dbqueryrun('select * from question where Id='.$value['q_id']);
    $like=$question[0]->likes;
    $like=$like+1;
    $a=$this->question->insert('insert into question_like (q_Id,u_Id) values('.$value['q_id'].','.$this->session->userdata('id').')');
    $b=$this->question->insert('update question set likes= '.$like.' where Id='.$value['q_id']);
    echo $b;
}
public function unlike(){

    $value=$this->input->get();
    $question=$this->question->dbqueryrun('select * from question where Id='.$value['q_id']);
    $like=$question[0]->likes;
    $like=$like-1;

    $a=$this->question->delete('delete from question_like where q_Id= '.$value['q_id'].' and  u_Id= '.$this->session->userdata('id'));
    $b=$this->question->insert('update question set likes= '.$like.' where Id='.$value['q_id']);
    echo $b;
}
public function submit_answer(){
$values=$this->input->post();
$this->form_validation->set_rules('answer', 'required');
   
if ($this->form_validation->run() == FALSE)
    {$this->session->set_flashdata('message','<span style=background-color:red;color:white;>Please enter Your Thoughts </span>');
        redirect('home/answer/'.$this->session->userdata('question_Id'),'refresh');

    }
    else{

$sql='insert into  answer(q_Id,u_Id,ans_body,likes,date)values('.$this->session->userdata('question_Id').','.$this->session->userdata('id').',\''.$values['answer'].'\','.'0,\''.date('Y-m-d').'\')';
$this->answer->insert($sql);
redirect('home/answer/'.$this->session->userdata('question_Id'),'refresh');
    }
}

}



?>