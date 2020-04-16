<?php
$page_title = "User Authentication -  {$_GET['u']}'s Profile";
include_once 'partials/headers.php';
include_once 'partials/parseProfile.php';
include_once 'partials/parseAddservice.php';

?>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Welcome to
      <small><?php if(isset($shop_name)) echo $shop_name; ?></small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active"><?php if(isset($username)) echo $username; ?></li>
    </ol>

    <!-- Portfolio Item Row -->
    <div class="row">

      <div class="col-md-8">
        <img class="img-fluid" src="<?php if(isset($profile_picture)) echo $profile_picture; ?>" alt="">
      </div>

      <div class="col-md-4">
        <h3 class="my-3">Salon Description</h3>
        <p><?php if(isset($des)) echo $des; ?></p>
        <h3 class="my-3">Services Provided</h3>
        <ul class="shop_profile_services">
					<?php
						if( count($shopservices) > 0 ):
							foreach( $shopservices as $service ):
					?>
								<li>
									<h3><?php echo $service->service_name ?></h3>
									<small><strong>Amount:</strong> <?php echo $service->service_price ?></small>
								</li>
					<?php
							endforeach;
						endif;
					?>
        </ul>
      </div>

    </div>
    <!-- /.row -->

    <!-- Related Projects Row -->


    <div class="row">
      <div class="col-lg-8 mb-4">
        <h3>Book an Appointment</h3>
        <form name="">
          <div class="control-group form-group">
            <div class="controls">
              <label>Full Name:</label>
              <input type="text" class="form-control" name="" required>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Phone Number:</label>
              <input type="text" class="form-control" name="" required="">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Email Address:</label>
              <input type="email" class="form-control" name="" required="">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Select Service</label>
              <select class="form-control" name="">
								<option value="">Slect your service</option>
								<?php
									if( count($shopservices) > 0 ):
										foreach( $shopservices as $service ):
								?>											
                			<option value="<?php echo $service->id ?>"><?php echo $service->service_name." - ". $service->service_price ?></option>
								<?php
										endforeach;
									endif;
								?>
              </select>
            </div>
          </div>

          <div class="control-group form-group">
            <label>Prefered Mode of Service:  </label>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="contact" value="phone">
            <label class="form-check-label">Home Service</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="contact" value="email">
            <label class="form-check-label" for="inlineRadio2">Walk-in Service</label>
          </div>
          </div>

          <div class="control-group form-group">
            <div class="controls">
              <label>Appointment Date</label>
              <input type="date" name="meeting-time" class="form-control" required>
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Appointment Time</label>
              <input type="time" name="meeting-time" class="form-control" required>
            </div>
          </div>

          <div id="success"></div>
          <!-- For success/fail messages -->
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
        </form>
      </div>

    </div>


    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
