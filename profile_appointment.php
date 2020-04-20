<?php
$page_title = "User Authentication - Profile";
include_once 'partials/headers.php';
include_once 'partials/parseProfile.php';
include_once 'partials/parseAddservice.php';
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
              <a class="nav-link btn btn-info" href="#">Appointments</a>
            </li>
            
          </ul><br>
        <div class="card">
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active m-3" id="salon" role="tabpanel" aria-labelledby="home-tab">
    <h4>Appointment List</h4>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Full Name</th>
      <th scope="col">Number</th>
      <th scope="col">Email</th>
      <th scope="col">Select Selected</th>
      <th scope="col">Mode of Service</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

    <?php if(count($appoints) > 0): 
      foreach ($appoints as $appoint) :
       ?>

        <tr>
          <th><?php echo $appoint->fname; ?></th>
          <th><?php echo $appoint->number; ?></th>
        </tr>
     

     <?php endforeach; 

        else: 

          ?>

          <tr>
              <th colspan="4">No Appointment found.</th>
          </tr>
      <?php endif; ?>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td><a href="" class="btn btn-warning">Edit</a>  <a href="" class="btn btn-danger">Delete</a></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td><a href="" class="btn btn-warning">Edit</a>  <a href="" class="btn btn-danger">Delete</a></td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
      <td><a href="" class="btn btn-warning">Edit</a>  <a href="" class="btn btn-danger">Delete</a></td>
    </tr>
  </tbody>
</table>
  </div>


</div>
      </div>
      </div>
  </div>
</div>


<?php include_once 'partials/footers.php'; ?>
</body>
</html>
