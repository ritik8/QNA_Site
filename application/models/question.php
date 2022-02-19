<?php
class Question extends CI_Model{
function __construct(){
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
public function delete($sql){
    $result=$this->db->query($sql);
    return $result;
}
public function select($data){

    if(isset($data['columns']) && !empty($data['columns']))
    {
    $columns = $data['columns']; 
    $columns = implode(', ',$columns); 
    }else
    {
     $columns = '*';
    }
    if(isset($data['tableName']) && !empty($data['tableName']))
    {
        $tableName = $data['tableName'];
    }else
    {
        return false;
    }
    
    $this->db->select($columns);
    $this->db->from($tableName);

           
    if(isset($data['where']) && !empty($data['where']) && !isset($data['where_type']))
    {
        $this->db->where($data['where']);
    }elseif(isset($data['where']) && !empty($data['where']) && isset($data['where_type']) && $data['where_type']=='IN')
    {
       $colmuns = 'id';
                   if(isset($data['where']['columns']))
                   {
                      $colmuns = $data['where']['columns'];   
                   }    
                   $this->db->where_in($colmuns,$data['where']['id']);
    }
    
    // if(isset($data['limit']) && !empty($data['limit']))
    // {
    //     $this->db->limit($data['limit']);
    // }
    // if(isset($data['limit_array']) && !empty($data['limit_array']))
    // {
    //    // echo "<br/>".$data['limit_array'][1]." - ".$data['limit_array'][0];
    //     $this->db->limit($data['limit_array'][1],$data['limit_array'][0]);
    //    // $this->db->limit(20,0);

    // }
    // if(isset($data['order_by']) && !empty($data['order_by']))
    // {
    //     if(isset($data['order_type']) && !empty($data['order_type']))
    //     {
    //      $order_type = $data['order_type'];
    //     }
    //     else
    //     {
    //      $order_type = "desc";
    //     }
    //     $this->db->order_by($data['order_by'],$order_type);
    // }
    
    $query = $this->db->get();
    $result = $query->result();
    
    // switch($data['select_type']) {
    //         case "row_array":
    //                      $result = $query->row_array();
    //                      break;
    //         case "row":
    //                      $result = $query->row();
    //                      break;
    //         case "result_array":
    //                      $result = $query->result_array();
    //                      break;
    //         default:
    //                      $result = $query->result();
    //  }
     
     
    return $result;

    
}


}




?>