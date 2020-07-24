<?php $this->load->view('login/adm_header'); ?>


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
                Admin
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
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
            <div class="col-12 col-md-12">
              <div class="card" style="margin: 20px">
                  <h5 class="card-header">User Management
                    <button type="button" class="btn btn-outline-primary float-right  btn-sm" data-toggle="modal" data-target="#addTeacher"><ion-icon style="color:blue;" name="add-outline"></ion-icon>
                  </button>
                  </h5>
                  <div class="card-body">
                    <!--Announcements-->

                    <ul style="margin: 10px" class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="teachers-tab" data-toggle="tab" href="#teachers" role="tab" aria-controls="teachers" aria-selected="true">Teachers</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents" role="tab" aria-controls="parents" aria-selected="false">Parents</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="admin-tab" data-toggle="tab" href="#admin" role="tab" aria-controls="admin" aria-selected="false">Administrator</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
                            <table style="margin-top: 10px; padding-left: 10px; padding-right: 10px" id="teachersTable" class="table table-hover">
                              <thead>
                                <tr>
                                  <th scope="col">ID Number</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Designation</th>
                                  <th scope="col">Advisory</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($result as $t_row){ ?>

                                <?php $status = ($t_row->status==1)? "Active" : "Inactive" ?>

                                <tr>
                                  <th><?php echo $t_row->idnum; ?></th>
                                  <td><?php echo $t_row->fname." ".$t_row->lname; ?></td>
                                  <td><?php echo $t_row->t_desn; ?></td>
                                  <td><?php echo $t_row->t_adv; ?></td>
                                  <td><?php echo $status; ?></td>
                                  <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
                                </tr>
                                <?php } ?>
                              </tbody>
                            </table>
                          </div>
                          <div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
                            <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                              </tr>
                            </tbody>
                            </table>
                          </div>
                          <div class="tab-pane fade" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">First</th>
                                  <th scope="col">Last</th>
                                  <th scope="col">Handle</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">1</th>
                                  <td>Mark</td>
                                  <td>Otto</td>
                                  <td>@mdo</td>
                                </tr>
                                <tr>
                                  <th scope="row">2</th>
                                  <td>Jacob</td>
                                  <td>Thornton</td>
                                  <td>@fat</td>
                                </tr>
                                <tr>
                                  <th scope="row">3</th>
                                  <td colspan="2">Larry the Bird</td>
                                  <td>@twitter</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                    <!--/Announcements-->
                  </div>
                </div>
            </div>
          </div>

          <!-- Modal for edit Teachers -->
          <!-- <div id="view<?php echo $row->idnum; ?>" class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Edit Teachers</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?php echo site_url('login/dashboardController/add_T') ?>" >
                      <div class="form-row">
                          <input id="upd_id" type="hidden" name="upd_id">
                        <div class="form-group col-md-4">
                          <label for="inputEmail4">Last Name</label>
                          <input id="lname" type="text" name="lname" value="<?php echo $row->lname; ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="inputPassword4">First Name</label>
                          <input id="fname" type="text" name="fname" value="<?php echo $row->fname; ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="inputPassword4">Middle Name</label>
                          <input id="mname" type="text" name="mname" value="<?php echo $row->mname; ?>" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputAddress">Highest Educational Attainment</label>
                        <input id="hea" type="text" name="t_hea" value="<?php echo $row->t_hea; ?>" class="form-control" >
                      </div>
                      <div class="form-group">
                        <label for="inputAddress2">Professional Development Attainment</label>
                        <input id="pda" type="text" name="t_pda" value="<?php echo $row->t_pda; ?>" class="form-control">
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputState">Designation</label>
                          <select id="t_desn" name="t_desn" value="<?php echo $row->t_desn; ?>" class="form-control">
                            <option value="adviser" selected>Adviser</option>
                            <option value="faculty">Faculty</option>
                            <option value="coordinator">Coordinator</option>
                          </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputState">ID number</label>
                          <input id="idnum" type="text" name="idnum" value="<?php echo $row->idnum; ?>" class="form-control">
                        </div>
                      </div> -->

                      <!-- Modal for add Teachers -->
                      <div class="modal fade" id="addTeacher" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="staticBackdropLabel">Add Teachers</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="post" action="<?php echo site_url('login/userManagementController/addTeacher') ?>" >
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

                                  <input type="hidden" name="t_adv" value="g-none">
                                  <input type="hidden" name="status" value="1">

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">submit</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

    </div>
    <!-- /#page-content-wrapper -->
    <?php $this->load->view('login/adm_footer'); ?>
