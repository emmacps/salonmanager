<?php

include_once 'partials/headers.php';
include_once 'partials/parseSignup.php';
?>

<div class="container">
    <div class="row">
      <div class="col-sm-8 col-md-8 bottompadding">
          <h2>Registration Form </h2><hr>
          <div>
              <?php if(isset($result)) echo $result; ?>
              <?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
          </div>
          <div class="clearfix"></div>

          <form action="" method="post">
              <div class="form-group">
                  <label for="emailField">Email Address</label>
                  <input type="text" class="form-control" name="email" id="emailField" placeholder="Email">
              </div>

              <div class="form-group">
                  <label for="usernameField">Username</label>
                  <input type="text" class="form-control" name="username" id="usernameField" placeholder="Username">
              </div>
              <div class="form-group">
                  <label for="passwordField">Password</label>
                  <input type="password" name="password" class="form-control" id="passwordField" placeholder="Password">
              </div>
              <input type="hidden" name="token" value="<?php if(function_exists('_token')) echo _token(); ?>">
              <button type="submit" name="signupBtn" class="btn btn-primary pull-right">Register</button>
          </form>
      </div>
      <div class="col-sm-4 col-md-4">
        <p>Hello</p>
      </div>
    </div>

</div>

<?php include_once 'partials/footers.php'; ?>
</body>
</html>
