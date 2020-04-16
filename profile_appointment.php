<?php
$page_title = "User Authentication - Profile";
include_once 'partials/headers.php';
include_once 'partials/parseProfile.php';
include_once 'partials/parseAddservice.php';
?>

<div class="container top-padding">
  <div class="row">
      <div class="col-md-4">
        <div class="card" style="width: 18rem;">
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
        <div class="card">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#salon" role="tab" aria-controls="home" aria-selected="true">Salon Description</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#appoint" role="tab" aria-controls="profile" aria-selected="false">Appointments</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Services</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active m-3" id="salon" role="tabpanel" aria-labelledby="home-tab">
    <h4>Profile</h4>
    <?php if(isset($des)) echo $des; ?> <br><br>
    <h4>List of Services</h4>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Service Name</th>
      <th scope="col">Service Description</th>
      <th scope="col">Price</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
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
  <div class="tab-pane fade m-3" id="appoint" role="tabpanel" aria-labelledby="profile-tab">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Tel.</th>
      <th scope="col">Service</th>
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
  <div class="tab-pane fade m-3" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <h4>Add Your Services</h4>
    <div>
        <?php if(isset($result)) echo $result; ?>
        <?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
    </div>
        <form class="" action="" method="post">
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

      <button type="submit" name="addserviceBtn" class="btn btn-primary">Submit</button>
        </form>
  </div>
</div>
      </div>
      </div>
  </div>
</div>

<!-- <div class="container">
    <div >
        <h1>Profile</h1>
        <?php if(!isset($_SESSION['username'])): ?>
        <P class="lead">You are not authorized to view this page <a href="login.php">Login</a>
            Not yet a member? <a href="signup.php">Signup</a> </P>
        <?php else: ?>
            <section class="col col-lg-7">

                <div class="row col-lg-3" style="margin-bottom: 10px;">
                    <img src="<?php if(isset($profile_picture)) echo $profile_picture; ?>" class="img img-rounded" width="200"/>
                </div>

                <table class="table table-bordered table-condensed">
                    <tr>
                        <th style="width: 20%;">Username:</th>
                        <td><?php if(isset($username)) echo $username; ?></td>
                    </tr>
                     <tr>
                        <th style="width: 20%;">Shope Name:</th>
                        <td><?php if(isset($shop_name)) echo $shop_name; ?></td>
                    </tr>
                    <tr><th>Email:</th><td><?php if(isset($email)) echo $email; ?></td></tr>
                    <tr><th>Date Joined:</th><td><?php if(isset($date_joined)) echo $date_joined; ?></td></tr>
                    <tr><th></th><td>
                            <a class="" href="edit-profile.php?user_identity=<?php if(isset($encode_id)) echo $encode_id; ?>">
                                <span class="glyphicon glyphicon-edit"></span>Edit Profile</a> &nbsp; &nbsp;
                            <a class="" href="update-password.php?user_identity=<?php if(isset($encode_id)) echo $encode_id; ?>">
                                <span class="glyphicon glyphicon-edit"></span>Change Password</a> &nbsp; &nbsp;
                            <a class="pull-right alert-warning" href="deactivate-account.php?user_identity=<?php if(isset($encode_id)) echo $encode_id; ?>">
                                <span class="glyphicon glyphicon-trash"></span> Deactivate Account</a>
                        </td></tr>
                </table>
            </section>
        <?php endif ?>
    </div>
</div> -->
<?php include_once 'partials/footers.php'; ?>
</body>
</html>
