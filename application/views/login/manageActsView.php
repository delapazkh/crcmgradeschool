<?php $this->load->view('login/t_header'); ?>

      <div class="container-fluid">


        <div class="row">
            <div class="col-12 col-md-12">
              <div class="card" style="margin: 10px">
                  <h5 class="card-header">My Activities 
                  <a href="<?php echo base_url(); ?>login/newActsController" type="button" class="btn btn-outline-primary  btn-sm"><ion-icon style="color:blue;" name="add-outline"></h5></a>
                  <div class="card-body">
                    <!--Announcements-->
                    <table id="acts" class="table">
                              <thead>
                                <tr>
                                  <th scope="col">Title</th>
                                  <th scope="col">Author</th>
                                  <th scope="col">Date</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Paper Machet Volcano</td>
                                  <td>Christy Fernan</td>
                                  <td>July 25, 2020</td>
                                  <td>Published</td>
                                  <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
                                </tr>
                              </tbody>
                            </table>
                    <!--/Announcements-->
                  </div>
                </div>
            </div>
            

          </div>



      </div>
    <!-- /#page-content-wrapper -->

    <?php $this->load->view('login/t_footer'); ?>
