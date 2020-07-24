<?php $this->load->view('login/t_header'); ?>

      <div class="container-fluid">


        <div class="row">
            <div class="col-12 col-md-12">
              <div class="card" style="margin: 20px">
                  <h5 class="card-header">Academic Announcements</h5>
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



      </div>
    <!-- /#page-content-wrapper -->


    <?php $this->load->view('login/t_footer'); ?>