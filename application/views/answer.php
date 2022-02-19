<?php $this->load->view('common/header');  ?>
<div class='container'>
<?php foreach ($question as $key => $value) {
     ?>
<div class="card" style="width: 50%;margin-top:1%;margin-bottom:0%;margin-left:20%;margin-right:20%;background-color:#e3e3e3;">
  <div class="card-body">
  <h6 class="card-title"><?php echo $value->Name ?></h6>
    <h5 class="card-title"><?php echo $value->q_title ?></h5>
    
    <p class="card-text"><?php echo $value->q_body ?></p>
    <?php $this->session->set_userdata('question_Id',$value->question_Id); ?>
  </div>
  <?php echo $this->session->flashdata('message'); ?>
</div>
<?php } ?>

<div style="width: 50%;margin-top:1%;margin-bottom:0%;margin-left:20%;margin-right:20%;background-color:#e3e3e3;">

<button style='border:0px !important;'id='ans'>
<img src="https://img.icons8.com/ios-glyphs/60/000000/hand-with-pen.png"/></button><span style='margin-left:5px;'> Share your thoughts on this topic</span>

</div>
<div id='answer'style=" display:none;width: 50%;margin-top:1%;margin-bottom:0%;margin-left:20%;margin-right:20%;background-color:#e3e3e3;">
<?php echo form_open('home/submit-answer') ?>
<textarea  style='width:100%;'name='answer' rows='8' required></textarea>
<div>
<button type='submit' class='btn btn-secondary'>Submit</button>

<button type='button' class='btn btn-secondary' id='close'>Close</button>
</div>
</form>

</div>
<?php foreach ($answer as $key => $value) {
     ?>
<div class="card" style="width: 50%;margin-top:1%;margin-bottom:0%;margin-left:20%;margin-right:20%;background-color:#999999;">
  <div class="card-body">
  <h6 class="card-title"><?php echo $value->Name ?></h6>
    
    <p class="card-text"><?php echo $value->ans_body ?></p>
  </div>
</div>
<?php } ?>
<script>
$('document').ready(function(){
$('#ans').on('click',function(){
$('#answer').css('display','block');




})
$('#close').on('click',function(){
$('#answer').css('display','none');




})
})



</script>
</body>



</html>