<?php $this->load->view('header'); ?>

<div class="container  bg-light text-dark" style="opacity: 0.9; max-width:1250px">


      <div class="row">
          <div class="col-2"></div>
          <div class="col-8">
            <div class="card"  style="margin: 100px">
              <div class="card-header text-center">
                <h3 class="card-title" style="margin: 20px">Login to your account</h3>
              </div>
              <div class="card-body">
              <?php echo $this->session->flashdata('fail'); ?>
                <form method="post" action="login/Login/verify">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" name="u_name" class="form-control" id="inputEmail3" placeholder="134N4562">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="p_word" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-3"><a href="#">Forgot password?</a></div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                  </div>
                  </form>
              </div>
              </div>
          </div>
          <div class="col-2"></div>
    </div>

    </div>

<?php $this->load->view('footer'); ?>
