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
                  <h5 class="card-header">Academic Announcements
                    <button type="button" class="btn btn-outline-primary float-right  btn-sm" data-toggle="modal" data-target="#newAnnouncement"><ion-icon style="color:blue;" name="add-outline"></ion-icon>
                  </button>
                  </h5>
                  <div class="card-body">
                    <!--Announcements-->

                    <?php foreach ($announcements as $ann_row) { ?>

                    <div class="row" style="margin-bottom: 20px">
                      <div class="col-2"><img src="<?php echo base_url(); ?>images/empty_prof.png" class="img-thumbnail"></img></div>
                      <div class="col-10">
                        <h5><?php echo $ann_row->ann_title ?></h5>
                        <?php if ($ann_row->ann_by_id == '1'){ ?>

                        <h5 class="font-weight-light"><?php echo "Admin" ?></h5>
                        <h6 class="font-weight-light">System Administrator</h6>

                        <?php }else{ ?>
                          <h5 class="font-weight-light"><?php echo "Jane Doe" ?></h5>
                            <h6 class="font-weight-light">Principal</h6>
                          <?php } ?>
                        <h6 class="font-weight-light"><?php echo $ann_row->date; ?></h6>
                        <p style="margin-top: 10px"><?php echo $ann_row->ann_body ?></p>
                      </div>
                    </div>

                   <?php } ?>
                    <!--/Announcements-->
                  </div>
                </div>
            </div>
          </div>


          <!!-- Modal for Announcements -->

          <div id="newAnnouncement" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">New Announcement</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post"  action="<?php echo site_url('login/dashboardController/newAnn') ?>" style="margin: 20px">
                      <div class="form-group row">
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="ann_subj" placeholder="Subject">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-11">
                          <input type="hidden" name="ann_by" class="form-control" value="<?php echo $this->session->userdata('u_id'); ?>" name placeholder="eg. No Classes">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-11">
                          <input type="hidden" name="ann_date" class="form-control" value="<?php echo date("Y/m/d"); ?>" name placeholder="eg. No Classes">
                        </div>
                      </div>
                      <div class="form-group">
                        <textarea class="form-control" name="ann_cont" rows="3" placeholder="Announcement"></textarea>
                      </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Post</button>
                  </form>
                </div>

              </div>
            </div>
          </div>

          <!!-- /Modal for Announcements -->

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






    </div>
    <!-- /#page-content-wrapper -->

    <?php $this->load->view('login/adm_footer'); ?>