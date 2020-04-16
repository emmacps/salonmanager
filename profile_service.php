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
            <a class="nav-link btn btn-success" href="profile_service.php">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul><br>
        <div class="card p-2">
    <h4>Add Your Services</h4>
    <div>
        <?php if(isset($result)) echo $result; ?>
        <?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
    </div>
        <form action="" method="post">
          <div class="form-group">
        <label for="">Salon Service Name</label>
        <input type="text" name="service_name" class="form-control" autocomplete=" required">
      </div>
      <div class="form-group">
        <label for="">Service Description</label>
        <input type="text" name="service_des" class="form-control">
      </div>
      <div class="form-group">
        <label for="">Price</label>
        <input type="text" name="service_price" class="form-control">
      </div>
      <input type="hidden" name="user_id" value="<?php if(isset($id)) echo $id; ?>">
      <input type="hidden" name="token" value="<?php if(function_exists('_token')) echo _token(); ?>">
      <button type="submit" name="addserviceBtn" class="btn btn-primary">Submit</button>
        </form>

      </div><br><br>

          <!-- list of services -->

          <div class="card p-2">
            <h4>List of Services</h4>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Salon Service Name</th>
                  <th scope="col">Service Description</th>
                  <th scope="col">Price</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
          </div>
      </div>
      </div>
  </div>


<?php include_once 'partials/footers.php'; ?>
</body>
</html>
