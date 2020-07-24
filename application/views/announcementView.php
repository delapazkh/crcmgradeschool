<?php $this->load->view('header'); ?>


  <!--     <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo base_url(); ?>/images/banners/home1.jpg" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo base_url(); ?>/images/banners/banner_home2.jpg" alt="Second slide">
          </div>
           <div class="carousel-item">
            <img class="d-block w-100" src="..." alt="Third slide">
          </div>
        </div>
      </div> -->


       <div class="container  bg-light text-dark" style="opacity: 0.9; max-width:1250px">


      <div class="row" style="padding-top: 50px; padding-bottom: 50px">
        <div class="col-3">
          <div class="card" style="width: 18rem;">
            <div class="card-header">
            <h5><strong>Grade Levels </strong></h5>
            </div>
            <div class="list-group">
            <a href="nursery.html" style="background-color: #F958E3;" type="button" class="text-white list-group-item list-group-item-action">Nursery</a>
            <button type="button"  style="background-color: #D355FF;" class="text-white list-group-item list-group-item-action">Kinder 1</button>
            <button type="button"  style="background-color: #20C100;" class="text-white list-group-item list-group-item-action">Kinder 2</button>
            <a href="grade1.html" style="background-color: #55B7FF;" type="button" class="text-white list-group-item list-group-item-action">Grade 1</a>
            <button type="button" style="background-color: #F93333;" class="text-white list-group-item list-group-item-action">Grade 2</button>
            <button type="button" style="background-color: #FAA300;" class="text-white list-group-item list-group-item-action">Grade 3</button>
            <button type="button" style="background-color: #FFED17;" class="text-white list-group-item list-group-item-action">Grade 4</button>
            <button type="button" style="background-color: #AFA31A;" class="text-white list-group-item list-group-item-action">Grade 5</button>
            <button type="button"  class="text-black list-group-item list-group-item-action">Grade 6</button>
            </div>
        </div>
        </div>
        <div class="col-9" style="padding: 30px">

            <h3 class="text-left" style="padding-bottom: 20px"><strong>Announcements</strong></h3>

            <?php foreach($announcements as $ann_row){ ?>

            <h4><?php echo $ann_row->ann_title; ?></h4>
            <p class="text-justify miss-viss"><?php echo $ann_row->ann_body; ?></p>

          <?php } ?>

        </div>
      </div>

    </div>


    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Log in</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12">
            <form>
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputEmail3" placeholder="134N4562">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-3">Remember me</div>
                <div class="col-sm-19">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1">

                  </div>
                </div>
              </div>
              </form>
          </div>
          <!-- <div class="col-4">col-4</div> -->
        </div>
      </div>
      <div class="modal-footer">
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Sign in</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('footer'); ?>
