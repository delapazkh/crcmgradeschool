<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $this->session->userdata('fname')." ".$this->session->userdata('lname'); ?> | Dashboard</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Custom styles for this template -->
  <link href="<?php echo base_url(); ?>css/simple-sidebar.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src='https://cdn.tiny.cloud/1/8d34wwbhy1ivqvp2jksj2z3ry51vdm9urkkegdzo2x6du0qx/tinymce/5/tinymce.min.js' referrerpolicy="origin">
</script>

</head>

<body>

  <div class="d-flex" id="wrapper">

  <?php if($this->session->userdata('t_adv') == 'Nursery'){ ?>

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><img src="<?php echo base_url(); ?>images/img/logo.png" alt="Logo" style="width:40px;"> CRMC Dashboard</div>
      <div class="list-group list-group-flush">
        <a href="<?php echo base_url(); ?>login/TeacherDashboardController" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="<?php echo base_url(); ?>login/ManageActsController" class="list-group-item list-group-item-action bg-light">Activities</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Lessons</a>
        <a href="<?php echo base_url(); ?>login/WorksheetsController" class="list-group-item list-group-item-action bg-light">Worksheets</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Stories</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Songs</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Games</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Gallery</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

  <?php }else{  ?>
    
     <!-- Sidebar -->
     <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><img src="<?php echo base_url(); ?>images/img/logo.png" alt="Logo" style="width:40px;"> CRMC Dashboard</div>
      <div class="list-group list-group-flush">
        <a href="<?php echo base_url(); ?>login/teacherDashboardController" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="<?php echo base_url(); ?>login/manageActsController" class="list-group-item list-group-item-action bg-light">Activities</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Lessons</a>
        <a href="<?php echo base_url(); ?>login/worksheetsController" class="list-group-item list-group-item-action bg-light">Worksheets</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Gallery</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

 <?php  } ?>

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-outline-primary" id="menu-toggle"><ion-icon style="color:blue;" name="menu-outline"></ion-icon></button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <!-- <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Link</a>
            </li> -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Hi, Teacher <?php echo $this->session->userdata('fname'); ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" data-toggle="modal" data-target="#tProfile">Profile</a>
                <a class="dropdown-item" data-toggle="modal" data-target="#mAccount">Manage Account</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo site_url('login/dashboardController/logout')?>">logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div id="tProfile" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="tProfile" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
             <div class="row" style="margin: auto">
                  <div class="col-8">
                     <form>
                     <div class="form-group">
                          <label for="exampleInputEmail1"><strong>ID Number:</strong></label>
                          <?php echo $this->session->userdata('idnum'); ?>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1"><strong>Name:</strong></label>
                          <?php echo $this->session->userdata('fname')." ".$this->session->userdata('lname'); ?>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"><strong>Highest Educational Attainment:</strong></label>
                          <?php echo $this->session->userdata('t_hea'); ?>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"><strong>Professional Development Attainment:</strong></label>
                          <?php echo $this->session->userdata('t_pda'); ?>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"><strong>Designation: </strong></label>
                          <?php echo $this->session->userdata('t_desn'); ?>
                        </div>

                    </form>
                           
                      
                  </div>
                  <div class="col-4">
                    2 of 2
                  </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Update Profile</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
          </div>
        </div>
      </div>

      <div id="mAccount" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="tProfile" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Manage Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
     
              <div class="col-12">

                  <form>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1"><h5>Change Password</h5></label>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Current Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Retype Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Retype Password">
                    </div>
                   
                  </form>

              </div>
     
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Update Account</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
          </div>
        </div>
      </div>