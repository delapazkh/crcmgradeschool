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

        <div class="row" style="margin: 20px;">
          <div class="col-4">
            <div class="card">
                <div class="card-header">
                  Grade Levels
                  <button type="button" class="btn btn-outline-primary float-right  btn-sm" data-toggle="modal" data-target="#addLevel"><ion-icon style="color:blue;" name="add-outline">
                </div>
                <div class="card-body">
                  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <?php foreach ($glevels as $g_row) { ?>
                      <a class="nav-link" id="v-pills-<?php echo $g_row->g_level_id; ?>-tab" data-toggle="pill" href="#v-pills-<?php echo $g_row->g_level_id; ?>" role="tab" aria-controls="v-pills-<?php echo $g_row->g_level_id; ?>" aria-selected="true"><?php echo $g_row->g_level_name; ?></a>
                    <?php } ?>

                    </div>
                </div>
              </div>
          </div>
          <div class="col-8">

            <div class="tab-content" id="v-pills-tabContent">
              <?php foreach ($glevels as $g_row) { ?>
              <div class="tab-pane fade show" id="v-pills-<?php echo $g_row->g_level_id; ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $g_row->g_level_id; ?>-tab">
                <div class="card">
                    <div class="card-header">
                      <?php echo $g_row->g_level_name; ?>
                    </div>
                    <div class="card-body">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="<?php echo $g_row->g_level_id; ?>-tab" data-toggle="tab" href="#classInfo<?php echo $g_row->g_level_id; ?>" role="tab" aria-controls="classInfo<?php echo $g_row->g_level_id; ?>" aria-selected="true"><?php echo $g_row->g_level_name; ?> Class Information</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="<?php echo $g_row->g_level_id; ?>-tab" data-toggle="tab" href="#classList<?php echo $g_row->g_level_id; ?>" role="tab" aria-controls="classList<?php echo $g_row->g_level_id; ?>" aria-selected="false"><?php echo $g_row->g_level_name; ?> Class List</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="classInfo<?php echo $g_row->g_level_id; ?>" role="tabpanel" aria-labelledby="classInfo<?php echo $g_row->g_level_id; ?>-tab"><h5>Class Information</h5>
                            <?php echo $g_row->fname." ".$g_row->lname; ?>
                          </div>
                          <div class="tab-pane fade" id="classList<?php echo $g_row->g_level_id; ?>" role="tabpanel" aria-labelledby="classList<?php echo $g_row->g_level_id; ?>-tab"><h5>Class List</h5></div>
                        </div>
                    </div>
                  </div>
              </div>
              <?php } ?>

            </div>
          </div>
       </div>

  <!--      <div class="row" style="margin: 20px;">
          <div class="col-6">
            <div class="card">
            <div class="card-header">
            <h5><strong>Subjects</strong><button type="button" class="btn btn-outline-primary float-right  btn-sm" data-toggle="modal" data-target="#addSubjectModal"><ion-icon style="color:blue;" name="add-outline"></ion-icon></h5>
          </div>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Subject</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>
              <?php foreach ($result as $row) { ?>
              <tr>
                <td><?php echo $row->subj_name; ?></td>
                <td>
                  <a type="button" class="btn btn-outline-primary"><ion-icon style="color:blue;" name="create-outline"></ion-icon></ion-icon></a>
                  <a  href="<?php echo site_url('login/dashboardController/deleteSubj');?>/<?php echo $row->sub_id; ?>" type="button" class="btn btn-outline-primary" >
                    <ion-icon style="color:blue;" name="trash-outline"></ion-icon></a>
                </td>

            </tr>
            <?php } ?>
            </tbody>
            </table>
          </div>
          </div>
          <div class="col-6">
            <div class="card">
              <div class="card-header">
                Grade Levels
                <button type="button" class="btn btn-outline-primary float-right  btn-sm" data-toggle="modal" data-target="#addLevel"><ion-icon style="color:blue;" name="add-outline">
              </div>
              <div class="card-body">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Grade level</th>
                      <th scope="col">Adviser</th>
                      <th scope="col">action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($glevels as $g_row) { ?>

                    <tr>
                      <td><?Php echo $g_row->g_level_name; ?></td>
                      <td><?php echo $g_row->fname." ".$g_row->lname; ?></td>
                      <td><button class="btn btn-primary">Manage</button></td>
                    </tr>

                  <?php } ?>
                  </tbody>
                  </table>
              </div>
            </div>
          </div>
        </div> -->




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
                <form method="post" action="<?php echo site_url('login/gradeLevelsController/addSub') ?>">
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

        <div class="modal fade" id="addLevel" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add level</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="<?php echo site_url('login/gradeLevelsController/add_glevel') ?>">
                  <div class="row">
                    <div class="col">
                      <input type="text" name="lvl_name" class="form-control" placeholder="Eg. Nursery">
                    </div>
                    <div class="col">
                        <select name="adviser" class="form-control">
                          <option selected>Adviser</option>
                          <?php foreach ($allT as $trow) { ?>
                              <option value="<?php echo $trow->t_id; ?>"><?php echo $trow->fname." ".$trow->lname; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                  </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
              </form>
              </div>
            </div>
          </div>
        </div>




    </div>
    <!-- /#page-content-wrapper -->
    <?php $this->load->view('login/adm_footer'); ?>
