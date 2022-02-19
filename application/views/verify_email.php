<html>

<head>
<style>
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel='stylesheet' href='<?php echo base_url()?>public/css/login.css'/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class='container' style='width:500px;'>
<div class="login_header">
                    <img src='<?php echo base_url()?>public/logo.png' width="100px" height="100px"/>
                    <p><strong>A place where you can ask anything Independently</strong></p>
                </div>
                <div>
                <?php echo $this->session->flashdata('otp-message') ?>
                
                </div>
<?php echo form_open('login/verify-otp');   ?>
               
               <div class="mb-3">
                 <label for="otp" class="form-label"> Otp Sends on Your Email Id </label>
                 <input type="text" placeholder='enter your otp here'  class="form-control" id="otp" name='otp' >
               </div>
               <button type="submit" class="btn btn-primary">Confirm</button>
             </form>
             </div>
             </body>


             </html>
