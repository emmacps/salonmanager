<?php
$page_title = "User Authentication - Profile";
include_once 'partials/headers.php';
include_once 'partials/parseProfile.php';
include_once 'partials/parseAddappoints.php';
include_once 'partials/parseAddservice.php';


if(!isset($_SESSION['id'])) {
	redirectTo('index');
}
?>

<div class="container top-padding">
  <div class="row">
      <div class="col-md-3">
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
      <div class="col-md-9">
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
		<?php if(isset($result)) echo $result; ?>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Full Name</th>
      <th scope="col">Number</th>
      <th scope="col">Email</th>
      <th scope="col">Date</th>
      <th scope="col">Select Selected</th>
      <th scope="col">Mode of Service</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

    <?php if(count($appoints) > 0): 
      foreach ($appoints as $appoint) :
       ?>

        <tr class="<?php echo ($appoint->status == 1) ? 'bg-success text-white': ''; echo ($appoint->status == 2) ? 'bg-warning': ''; echo ($appoint->status == 3) ? 'bg-danger text-white':'' ?>">
          <td><?php echo $appoint->fname; ?></td>
          <td><?php echo $appoint->number; ?></td>
          <td><?php echo $appoint->email; ?></td>
          <td><?php echo date('jS, M, Y', strtotime($appoint->date)); ?></td>
					<?php foreach( $allservices as $service ): 
						if( $service->id == $appoint->select_service ):
					?>
          	<td><?php echo $service->service_name; ?></td>
					<?php 
							endif;
						endforeach; 
					?>
					<td><?php echo $appoint->service_mode; ?></td>
					<td>
						<?php if( $appoint->status == 1 || $appoint->status == 0 ): ?>
							<a href="profile_appointment.php?action=cancel&id=<?php echo $appoint->id ?>" class="btn btn-danger mb-2">Cancel</a>
							<?php if( $appoint->salon_id == $shop_id ): ?>
								<?php if( $appoint->status == 0 ): ?>
									<a href="profile_appointment.php?action=reject&id=<?php echo $appoint->id ?>" class="btn btn-primary mb-2">Reject</a>
								<?php endif; ?>
								<?php if( $appoint->status == 0): ?>
									<a href="profile_appointment.php?action=accept&id=<?php echo $appoint->id ?>" class="btn btn-success mb-2">Accept</a>
								<?php endif; ?>
							<?php endif; ?>
						<?php elseif( $appoint->status == 2 ): ?>
							Rejected
						<?php else: ?>
							Cancelled
						<?php endif; ?>
					</td>
        </tr>
     

     <?php endforeach; 

        else: 

          ?>

          <tr>
              <th colspan="4">No Appointment found.</th>
          </tr>
      <?php endif; ?>
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
