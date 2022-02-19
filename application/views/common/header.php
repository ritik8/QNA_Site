<html>
<head>
<title><?php echo $title ;?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style='background-color:#e3e3e3;'>
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo base_url().'home';?>"><img src="https://img.icons8.com/ios-filled/50/000000/home.png"/></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url().'trending-question';?>"><img src="https://img.icons8.com/ios/50/000000/hashtag-key.png"/></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url().'ask-any-question';?>"><img src="https://img.icons8.com/ios-filled/50/000000/ask-question.png"/></a>
        </li>
      </ul>
      <?php if( $title=='Home'){ ?>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <?php } ?>
      <ul class="navbar-nav" style='margin-right:70px;'>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://img.icons8.com/ios-glyphs/50/000000/user-male--v2.png"/>
          </a>
          <ul class="dropdown-menu" style='width:5px !important;' aria-labelledby="navbarDropdown">
          <!-- <li><a class="dropdown-item" href="<?php echo base_url().'login/profile';   ?>">Profile</a></li> -->
            <li><a class="dropdown-item" href="<?php echo base_url().'login/logout';   ?>">Logout</a></li>
          
          </ul>
        </li>
        </ul>
      
    </div>
  </div>
</nav>
