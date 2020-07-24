<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Teacher's Dashboard</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Custom styles for this template -->
  <link href="<?php echo base_url(); ?>css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><img src="<?php echo base_url(); ?>images/img/logo.png" alt="Logo" style="width:40px;"> CRMC Dashboard</div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Activities</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Lessons</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Worksheets</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Stories</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Songs</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Games</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Gallery</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

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
                Hi, <?php echo $this->session->userdata('u_name'); ?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="#">Manage Account</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo site_url('login/dashboardController/logout')?>">logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <?php echo $this->session->flashdata('success'); ?>
        <div class="row">
          <div class="col-sm-2">
            <h2 style="margin: 20px">Worksheets<button type="button" class="btn btn-outline-primary btn-sm float-right"  data-toggle="modal" data-target="#addSubjectModal"><ion-icon style="color:blue, width: 100%;" name="add-outline"></ion-icon></button></h2>
          </div>
        </div>

        <div class="row" style="margin: 10px;">

          <?php foreach ($mysubs as $subrow) {  ?>
          <div class="col-3">

            <div class="card" style="width: 24rem;">
              <div class="card-header">
                <?php echo $subrow->subj_name; ?>
                <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button> -->
                <button type="button" class="btn btn-outline-primary btn-sm float-right" data-toggle="modal" data-target="#addUnit">
                  add Unit/Chapter
                </button>
              </div>
               <div id="accordion">

                  <div class="card">
                    <div class="card-header" id="headingOne">
                      <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="" aria-expanded="true" aria-controls="collapseOne">
                        </button>
                      </h5>
                    </div>



                      <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>login/teacherDashboardController/new_WS" style="margin:20px">
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Worksheet name</label>
                          <input type="text" class="form-control" name="ws_name" placeholder="eg. Things that are the same">
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlFile1">Upload file</label>
                          <input type="file" class="form-control-file" name="ws_file">
                        </div>
                        <div class="form-group">
                          <input type="hidden" class="form-control-file" name="glevel" value="<?php echo $subrow->g_level; ?>">
                        </div>
                        <div class="form-group">
                          <input type="hidden" class="form-control-file" name="sub_id" value="<?php echo $subrow->sub_id; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                      <div class="card-body">
                        <ul class="list-group list-group-flush">
                          <?php foreach ($myws as $wrow) { ?>
                            <li class="list-group-item"><?php echo $wrow->ws_title; ?></li>
                            <?php    } ?>
                          </ul>
                      </div>

                  </div>

                  <!-- <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseTwo">
                          UNIT 2: Learning the vowels
                        </button>
                      </h5>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Vowel Aa</li>
                            <li class="list-group-item">Vowel Ee</li>
                            <li class="list-group-item">Vowel Ii</li>
                            <li class="list-group-item">Vowel Oo</li>
                            <li class="list-group-item">Vowel Uu</li>
                          </ul>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingThree">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
                          UNIT 3: Learning th3 Consonants
                        </button>
                      </h5>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                      <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Cras justo odio</li>
                            <li class="list-group-item">Dapibus ac facilisis in</li>
                            <li class="list-group-item">Morbi leo risus</li>
                            <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li>
                          </ul>
                      </div>
                    </div>
                  </div> -->
                </div>
            </div>



          </div>

          <?php } ?>


        </div>



        <!-- Modal for add subject -->
        <div class="modal fade" id="addSubjectModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add new subject </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="<?php echo site_url('login/teacherDashboardController/addSub') ?>">
                  <input name="su_name" class="form-control" type="text" placeholder="Add new subject">

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">add</button>
                </form>

              </div>
            </div>
          </div>
        </div>


        <!-- Modal for add Teachers -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Teachers</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="<?php echo site_url('login/dashboardController/add_T') ?>" >
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="inputEmail4">Last Name</label>
                        <input type="text" name="lname" class="form-control" id="inputEmail4">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">First Name</label>
                        <input type="text" name="fname" class="form-control" id="inputPassword4">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputPassword4">Middle Name</label>
                        <input type="text" name="mname" class="form-control" id="inputPassword4">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress">Highest Educational Attainment</label>
                      <input type="text" name="t_hea" class="form-control" id="inputAddress" >
                    </div>
                    <div class="form-group">
                      <label for="inputAddress2">Professional Development Attainment</label>
                      <input type="text" name="t_pda" class="form-control" id="inputAddress2">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputState">Designation</label>
                        <select name="t_desn" class="form-control">
                          <option value="adviser" selected>Adviser</option>
                          <option value="faculty">Faculty</option>
                          <option value="coordinator">Coordinator</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputState">ID number</label>
                        <input type="text" name="idnum" class="form-control" id="inputPassword4">
                      </div>
                    </div>



              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>


        <!-- modal for new ws -->

        <!-- <div class="modal fade" id="addWorkSheet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload new worksheet for  <span id="spanDis"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container">
                  <form method="post" enctype="multipart/form-data" action="teacherDashboardController/new_WS">
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Worksheet name</label>
                      <input type="text" class="form-control" name="ws_name" placeholder="eg. Things that are the same">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlFile1">Upload file</label>
                      <input type="file" class="form-control-file" name="ws_file">
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control-file" name="glevel" value="<?php echo $subrow->g_level; ?>">
                    </div>


                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
              </div>
            </div>
          </div>
        </div> -->

        <!-- Add Unit -->
        <div class="modal fade" id="addUnit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Chapter/Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container">
                  <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>login/teacherDashboardController/newUnit">
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Unit name</label>
                      <input type="text" class="form-control" name="unit_name" placeholder="eg. Things that are the same">
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control-file" name="glevel_id" value="<?php echo $subrow->g_level; ?>">
                    </div>
                    <div class="form-group">
                      <input type="hidden" class="form-control-file" name="subj_id" value="<?php echo $subrow->sub_id; ?>">
                    </div>


                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
              </div>
            </div>
          </div>
        </div>



    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url(); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>vendor/bootstrap/js/script.js"></script>
  <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>


  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
