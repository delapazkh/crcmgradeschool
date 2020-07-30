<?php $this->load->view('login/t_header'); ?>

      <div class="container-fluid">


        <div class="row">
            <div class="col-12 col-md-12">
              <div class="card" style="margin: 10px">
                  <h5 class="card-header">Manage Lessons 
                  <a type="button" class="btn  btn-outline-primary btn-sm" data-toggle="modal" data-target="#newSubject"><ion-icon style="color:blue;" name="add-outline"></h5></a>
                  <div class="card-body">
                    <!--Announcements-->
    
                        <!-- <div class="row" style="margin: 20px;">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">
                                Grade Levels
                                <button type="button" class="btn btn-outline-primary float-right  btn-sm" data-toggle="modal" data-target="#addLevel"><ion-icon style="color:blue;" name="add-outline">
                                </div>
                                <div class="card-body">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <?php foreach ($result as $g_row) { ?>
                                    <a class="nav-link" id="v-pills-<?php echo $g_row->sub_id; ?>-tab" data-toggle="pill" href="#v-pills-<?php echo $g_row->sub_id; ?>" role="tab" aria-controls="v-pills-<?php echo $g_row->sub_id; ?>" aria-selected="true"><?php echo $g_row->subj_name; ?></a>
                                    <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">

                            <div class="tab-content" id="v-pills-tabContent">
                            <?php foreach ($result as $g_row) { ?>
                            <div class="tab-pane fade show" id="v-pills-<?php echo $g_row->sub_id; ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $g_row->sub_id; ?>-tab">
                                <div class="card">
                                    <div class="card-header">
                                    <?php echo $g_row->subj_name; ?>
                                    </div>
                                    <div class="card-body">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="<?php echo $g_row->sub_id; ?>-tab" data-toggle="tab" href="#classInfo<?php echo $g_row->sub_id; ?>" role="tab" aria-controls="classInfo<?php //echo $g_row->g_level_id; ?>" aria-selected="true"><?php echo $g_row->subj_name; ?> Class Information</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="<?php echo $g_row->sub_id; ?>-tab" data-toggle="tab" href="#classList<?php echo $g_row->sub_id; ?>" role="tab" aria-controls="classList<?php //echo $g_row->g_level_id; ?>" aria-selected="false"><?php echo $g_row->subj_name; ?> Class List</a>
                                        </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="classInfo<?php //echo $g_row->sub_id; ?>" role="tabpanel" aria-labelledby="classInfo<?php echo $g_row->sub_id; ?>-tab"><h5>Class Information</h5>
                                            <?php// echo $g_row->fname." ".$g_row->lname; ?>
                                        </div>
                                        <div class="tab-pane fade" id="classList<?php// echo $g_row->sub_id; ?>" role="tabpanel" aria-labelledby="classList<?php echo $g_row->sub_id; ?>-tab"><h5>Class List</h5></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                            </div>
                        </div>
                    </div> -->

                
                    
                    <!--/Announcements-->
                  </div>
                </div>
            </div>
            

          </div>


    <!-- /#page-content-wrapper -->

          <!-- Add Subject Modal -->
        <div class="modal fade" id="newSubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add new subject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="containter">
                <form method="post" action="<?php echo site_url('login/worksheetsController/addSub') ?>" >
                    <div class="form-group">
                      <input type="text" name="su_name" class="form-control"  aria-describedby="emailHelp" placeholder="Subject Name">
                      <input type="hidden" name="g_level" value="<?php  echo $this->session->userdata('t_adv'); ?>" class="form-control"  aria-describedby="emailHelp" placeholder="Subject Name">
                    </div>
                    
                  
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        

        <!-- Add Worksheet Modal -->
        <div class="modal fade" id="addWorksheet" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Upload worksheet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="containter">
                <form>
                    <div class="form-group">
                      <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Worksheet title">
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div> 
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add</button>
                </form>
              </div>
            </div>
          </div>
        </div>

    <?php $this->load->view('login/t_footer'); ?>
