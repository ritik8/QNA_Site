
<?php $this->load->view('common/header');  ?>
<div class='container'>
<?php foreach ($question as $key => $value) {
     ?>
<div class="card" style="width: 50%; margin-top:1%;margin-bottom:1%;margin-left:20%;margin-right:20%; background-color:#e3e3e3;">
  <div class="card-body">
  <h6 class="card-title"><?php echo $value->Name ?></h6>
  <h6 class="card-title"><?php echo $value->q_date ?></h6>
  <a style='text-decoration:none !important;
    color:black !important;'  href=<?php echo base_url().'home/answer/'.$value->question_Id ?>><h5 class="card-title"><?php echo $value->q_title ?></h5></a>
    
    <p class="card-text"><?php echo $value->q_body ?></p>

    <button class='btn' id='like<?php echo $value->question_Id;?>' style='background-color:grey;'value='<?php if(like($value->question_Id,$this->session->userdata('id'))){
  echo 'Down_Vote';
}else{
  echo 'Up_Vote';
} ?>' onclick='liked(<?php echo $value->question_Id ?>)'><?php if(like($value->question_Id,$this->session->userdata('id'))){
  echo '<img src="https://img.icons8.com/material-two-tone/24/000000/thumbs-down.png"/>';
}else{
  echo '<img src="https://img.icons8.com/material-two-tone/24/000000/thumb-up--v1.png"/>';
} ?><span style='margin-left:2px;'><?php echo $value->likes ?></span></button>
  </div>
</div>
<?php } ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
 function liked(q){
 console.log(q);
 const b=$('#like'+q).val();
 if(b=='Up_Vote'){
  $.ajax({
  url: "home/like",
  data: {
    q_id: q,
  },
  success: function(result) {

    window.location='';
    
  }
 });
  }
  else{
    $.ajax({
  url: "home/unlike",
  data: {
    q_id: q,
  },
  success: function(result) {
    window.location='';
    
  }
 }); 
  }




 }

</script>

</body>



</html>