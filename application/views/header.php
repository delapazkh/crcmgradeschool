<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
    <title>CRMC Pre elementary & Elementary Learning Toolkit Module</title>
  </head>
  <body>
<div class="container" style="max-width:1250px">

  <div class="text-center" id="header">

    <div class="row" style="position: center center;">
      <div class="col-sm-3">
          <img class="thumb" src="<?php echo base_url(); ?>/images/img/logo.jpg" alt="Forest">
      </div>
      <div class="col-sm-9">
        <div id="logo" class="text-center">
          <h1>CEBU ROOSEVELT MEMORIAL COLLEGES</h1>
          <h3 class="text-danger">Pre-Elementary & Elementary Department</h3>
          <h5>F. Manubag St., Brgy Lourdes, Bogo City, Cebu</h5>
      </div>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light"  style="background-color: #20C100;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item current">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'AnnouncementsController'; ?>">Announcement</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="worksheets.html">Schedule of classes</a>
      </li>
    </ul>

    <?php  if($this->session->userdata('logged_in') == TRUE){?>
    
        <?php if($this->session->userdata('type') == 'teacher'){ ?>

          <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'login/TeacherDashboardController'; ?>">Dashboard</a>
            </li>
         </ul>

        <?php }else if($this->session->userdata('type') == 'admin'){ ?>
          
          <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'login/DashboardController'; ?>">Dashboard</a>
            </li>
         </ul>

       <?php } ?>
       
    <?php }else{ ?> 
      
      <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'login'; ?>">Login</a>
            </li>
       </ul>
    
    <?php } ?>
  </div>
</nav>
