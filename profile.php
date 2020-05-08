<?php
$page_title = "User Authentication - Profile";
include_once 'partials/headers.php';
include_once 'partials/parseProfile.php';
include_once 'partials/parseAddservice.php';

if(!isset($_SESSION['id'])) {
	redirectTo('index');
}

?>

<div class="container top-padding">
  <div class="row">
      <div class="col-md-4">
        <div class="card">
          <img src="<?php if(isset($profile_picture)) echo $profile_picture; ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h4 class="card-title"><?php if(isset($shop_name)) echo $shop_name; ?></h4>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Username: </b><?php if(isset($username)) echo $username; ?></li>
            <li class="list-group-item"><b>Email: </b><?php if(isset($email)) echo $email; ?></li>
            <li class="list-group-item"><b>Date Joined: </b><?php if(isset($date_joined)) echo $date_joined; ?></li>
          </ul>
          <div class="card-body">
            <a href="edit-profile.php?user_identity=<?php if(isset($encode_id)) echo $encode_id; ?>" class="btn btn-info mb-2">Edit Profile</a>
            <a href="update-password.php?user_identity=<?php if(isset($encode_id)) echo $encode_id; ?>" class="btn btn-warning mb-2">Change Password</a>
            <a href="deactivate-account.php?user_identity=<?php if(isset($encode_id)) echo $encode_id; ?>" class="btn btn-danger">Deactivate Account</a>
          </div>
        </div>
      </div>
      <div class="col-md-8">
          <ul class="nav justify-content-center">
            <li class="nav-item">
              <a class="nav-link btn btn-primary mr-2" href="profile.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-success mr-2" href="profile_service">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-info" href="profile_appointment.php">Appointments</a>
            </li>
            
          </ul><br>
          <div class="card p-2">
            <h4>Profile</h4>
            <?php if(isset($des)) echo $des; ?> <br><br>
          </div>
      </div>
      </div>
  </div>



<?php include_once 'partials/footers.php'; ?>
</body>
</html>
