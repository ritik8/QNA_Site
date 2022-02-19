<?php $this->load->view('common/header');  ?>
<div class='container'>
<div class="card" style="width: 50%; margin-top:1%;margin-bottom:0%;margin-left:20%;margin-right:20%; background-color:#e3e3e3;">
<div class="card-body">
<?php echo $this->session->flashdata('message'); ?>
                   

                <?php echo form_open('ask-any-question/submit');   ?>
               
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name='title' required >
  </div>
  <div class="mb-3">
    <label for="body" class="form-label">Body</label>
    <textarea class="form-control" id="body" name='body' rows='5' required></textarea>
   
  </div>
  <button type="submit" class="btn btn-primary">Ask</button>
</form>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>