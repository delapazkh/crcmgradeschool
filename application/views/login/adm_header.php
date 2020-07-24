<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin | Dashboard</title>

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

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><img src="<?php echo base_url(); ?>images/img/logo.png" alt="Logo" style="width:40px;"> CRMC Dashboard</div>
      <div class="list-group list-group-flush">
        <a href="<?php echo base_url(); ?>login/dashboardController" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="<?php echo base_url(); ?>login/userManagementController" class="list-group-item list-group-item-action bg-light">User Management</a>
        <a href="<?php echo base_url(); ?>login/gradeLevelsController" class="list-group-item list-group-item-action bg-light">Grade Levels</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->