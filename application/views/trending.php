<?php $this->load->view('common/header');  ?>
<div class='container'>
<?php foreach ($question as $key => $value) {
     ?>
     <h3>#<?php echo $key+1 ?> Trending </h3>
<div class="card" style="width: 50%; margin-top:1%;margin-bottom:0%;margin-left:20%;margin-right:20%; background-color:#e3e3e3;">
  <div class="card-body">
  <h6 class="card-title"><?php echo $value->Name ?></h6>
  <h6 class="card-title"><?php echo $value->q_date ?></h6>
  <a style='text-decoration:none !important;
    color:black !important;'  href=<?php echo base_url().'home/answer/'.$value->question_Id ?>><h5 class="card-title"><?php echo $value->q_title ?></h5></a>
    
    <p class="card-text"><?php echo $value->q_body ?></p>

    <span><img src="https://img.icons8.com/material-two-tone/24/000000/thumb-up--v1.png"/></span><span style='margin-left:2px;'><?php echo $value->likes ?></span>
  </div>
</div>
<?php } ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
