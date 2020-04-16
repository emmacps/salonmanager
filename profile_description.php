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
