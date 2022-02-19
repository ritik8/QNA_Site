<?php 


function isUserlogin(){

    $CI=get_instance();
    if($CI->session->userdata('id'))
    {
          return TRUE;
    }
    else
    {
             return FALSE;
    }
}
function like($q_id,$u_id){
    $CI=get_instance();
    $a=$CI->answer->dbqueryrun('select * from question_like where q_Id='.$q_id.' and '.'u_Id='.$u_id);
    if(count($a)>0 ){
        return 1;
    }
    else{
        return 0;
    }

} 
function checkpassword($result,$password){
for($i=0;$i<60;$i++){
    if($result[$i]!=$password[$i]){
        return 0;
    }
}
return 1;


}
function hash_password($password){
    return password_hash($password, PASSWORD_BCRYPT);
 }


?>