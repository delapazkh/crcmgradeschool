<?php $this->load->view('login/t_header'); ?>

      <div class="container-fluid">


        <div class="row">
            <div class="col-8 col-md-8">
              <div class="card" style="margin: 10px">
                  <h5 class="card-header">New Activity</h5>
                  <div class="card-body">
                    <!--Announcements-->

                    <form>
                      <div class="form-group">
                        <label>Add Title</label>
                        <input type="Text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter Title">
                      </div>
                      <div class="form-group">
                          <textarea style="height: 550px" class="form-control" id="mytextarea" rows="3"></textarea>
                        </div>



                    <!--/Announcements-->
                  </div>
                </div>
            </div>
            <div class="col-4 col-md-4">
              <div class="card" style="margin: 20px">
                  <h5 class="card-header">Publish</h5>
                  <div class="card-body">
                    <!--Announcements-->

                    <button type="button" class="btn btn-primary">Preview</button> <button type="submit" class="btn btn-primary">Publish</button>

                    <!--/Announcements-->
                  </div>
                </div>
                </form>
            </div>
          </div>



      </div>
    <!-- /#page-content-wrapper -->
    <?php $this->load->view('login/t_footer'); ?>
