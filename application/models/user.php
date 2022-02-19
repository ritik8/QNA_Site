<?php 
class User extends CI_Model{
function __construct(){
parent::__construct();
$this->load->database();
}
public function dbqueryrun($sql){
    $result=$this->db->query($sql);
    return $result->row_array();
}
public function insert($sql){
    $result=$this->db->query($sql);
    return $result;
}

}




?>