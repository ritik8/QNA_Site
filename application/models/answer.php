<?php
class Answer extends CI_Model{

function __contruct(){
parent::__contruct();
$this->load->database();


}
public function dbqueryrun($sql){
    $result=$this->db->query($sql);
    return $result->result();
}
public function insert($sql){
    $result=$this->db->query($sql);
    return $result;
}
}



?>