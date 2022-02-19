<html>

<head>
<style>



</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel='stylesheet' href='<?php echo base_url()?>public/css/login.css'/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="login">
            <div class="login_main">
                <div class="log">
                <div class="login_header">
                    <img src='<?php echo base_url()?>public/logo.png' width="100px" height="100px"/>
                    <p><strong>A place where you can ask anything Independently</strong></p>
                </div>
                <div class="log-body">
                <div class="login-left">
                    <p>Don't have account <button class='btn btn-secondary' id='register'>Click Here</button></p>
                    <?php echo $this->session->flashdata('register_message'); ?>
                    <div style="text-align:center;display:none;" id='reg_form' >
                  
                    <?php echo form_open('login/register');   ?>
                    <div class="mb-3">
    <label for="email" class="form-label" style='float:left;'>Email</label>
    <input type="text" class="form-control" id="email" name='email' >
  </div>      
  <div class="mb-3">
    <label for="name" class="form-label" style='float:left;'>Name</label>
    <input type="text" class="form-control" id="name" name='name' >
  </div>
  <div class="mb-3">
    <label for="clg_name" class="form-label" style='float:left;'>College Name</label>
    <input type="text" class="form-control" id="clg_name" name='clg_name'>
  </div>
  <div class="mb-3">
    <label for="ph_no" class="form-label" style='float:left;'>Phone Number</label>
    <input type="text" class="form-control" id="ph_no" name='ph_no'>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label" style='float:left;'>Password</label>
    <input type="password" class="form-control" id="password" name='password'>
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
</form>
</div>
                </div>

                <div class="login-form">
                    <div class="login-form-top">
                    <p>Login</p>


                    </div>

                    <div>
                    <?php echo $this->session->flashdata('message'); ?>
                    <?php echo validation_errors(); ?>

                <?php echo form_open('login/login');   ?>
               
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" id="email" name='email' >
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name='password'>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
               
                </div>

                </div>
                
                </div>
                <div class=footer1>Language</div>
                <div class=footer2>Copyright</div>
                </div>

            </div>
            
        </div>
</div>
        <div style='width:100%;height:100%;background-color:#e0dcdc;'>
</div>
  
        <script>
$('#register').on('click',function(){

  $('#reg_form').css('display','');

})

        </script>



       
</body>

</html>