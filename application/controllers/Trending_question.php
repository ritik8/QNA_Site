<?php 
class Trending_question extends CI_Controller{

function __construct(){

    parent::__construct();
    $this->load->library(array('session','form_validation'));
    $this->load->helper(array('user_helper','url'));
    $this->load->model(array('question','answer'));
}

    public function index(){

$result=$this->question->dbqueryrun('select user.Id as user_Id,user.Name,question.Id as question_Id,u_Id,q_title,q_body,likes,q_date from question inner join user on question.u_Id=user.Id ORDER BY likes DESC limit 10');
// foreach ($result as $key => $value) {
//     # code...
//     echo $key." ".$value->q_title;
// }
$data['question']=$result;
$data['title']='Trending';
       $this->load->view('trending',$data);
    }
}




?>