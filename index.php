<?php

include_once 'partials/headers.php';
?>

<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url('vendor/images/slide1.jpg')">
          <div class="carousel-caption d-none d-md-block">
            
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('vendor/images/slide2.jpg')">
          <div class="carousel-caption d-none d-md-block">
            
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('vendor/images/slide3.jpg')">
          <div class="carousel-caption d-none d-md-block">
            
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>


  <!-- Page Content -->
  <div class="container">
    <div class="row">
     <h1 class="display-4 leftpadding text-center">Welcome To Our Salon Management System</h1>
    </div>

    <!-- Features Section -->
    <div class="row leftpadding">
      <div class="col-sm-8 col-md-8">
        <h2>We present to you your dream salon closer to your door step.</h2>
        
        <ul>
          <li>Salon</li>
          <li>Spa</li>
          <li>Make-ups</li>
          <li>Massage</li>
          <li>Relaxation</li>
        </ul>
        <p>We present to you the most convience means to book an appointment for all your salon attandnace.</p>
      </div>
      <div class="col-sm-4 col-md-4">
        <img class="img-fluid rounded" src="vendor/images/woman.jpg" alt="">
      </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Call to Action Section -->
    <div class="row mb-4">
      <div class="col-md-8">
        <h3>Click here to starting booking.</h3>
      </div>
      <div class="col-md-4">
        <a class="btn btn-lg btn-secondary btn-block" href="shops.php">Book Your Appointment Now</a>
      </div>
    </div>

  </div>
  <!-- /.container -->

<?php  include_once 'partials/footers.php'; ?>
</body>
</html>
