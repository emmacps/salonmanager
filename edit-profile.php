<?php
$page_title = "User Authentication - Edit Profile";
include_once 'partials/headers.php';
include_once 'partials/parseProfile.php';
?>

<div class="container">
    <section class="col-lg-12">
        <h2>Edit Profile </h2><hr>
        <div>
            <?php if(isset($result)) echo $result; ?>
            <?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
        </div>
        <div class="clearfix"></div>

        <?php if(!isset($_SESSION['username'])): ?>
            <P class="lead">You are not authorized to view this page <a href="login.php">Login</a>
                Not yet a member? <a href="signup.php">Signup</a> </P>
        <?php else: ?>
                <form method="post" action="" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                          <label for="emailField"><b>Shop Name</b></label>
                          <input type="text" name="shop_name" class="form-control" id="" value="<?php if(isset($shop_name)) echo $shop_name; ?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                          <label for="emailField"><b>Email</b></label>
                          <input type="email" name="email" class="form-control" id="emailField" value="<?php if(isset($email)) echo $email; ?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                          <label for="usernameField"><b>Username</b></label>
                          <input type="text" name="username" value="<?php if(isset($username)) echo $username; ?>" class="form-control" id="usernameField">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                          <label for=""><b>Contact</b></label>
                          <input type="text" name="contact" value="<?php if(isset($contact)) echo $contact; ?>" class="form-control" id="contactField">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                          <label for=""><b>Facebook Handle</b></label>
                          <input type="text" name="facebook" value="<?php if(isset($facebook)) echo $facebook; ?>" class="form-control" id="">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                          <label for=""><b>Twitter Handle</b></label>
                          <input type="text" name="twitter" value="<?php if(isset($twitter)) echo $twitter; ?>" class="form-control" id="">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                          <label for=""><b>Instagram Handle</b></label>
                          <input type="text" name="instagram" value="<?php if(isset($instagram)) echo $instagram; ?>" class="form-control" id="">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                          <label for=""><b>Youtube Handle</b></label>
                          <input type="text" name="youtube" value="<?php if(isset($youtube)) echo $youtube; ?>" class="form-control" id="">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                          <label><b>Share your Google Map Location</b></label>
                          <input type="text" name="map" class="form-control" value="<?php if(isset($map)) echo $map; ?>">
                      </div>
                      <div class="form-group">
                          <label for="fileField"><b>Avatar</b></label>
                          <input type="file" name="avatar" id="fileField">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                          <label for="emailField"><b>Shop Description</b></label>
                          <textarea class="form-control" name="des" rows="8" cols="80">
                            <?php if(isset($des)) echo $des; ?>
                          </textarea>
                      </div>
                    </div>


                    <input type="hidden" name="hidden_id" value="<?php if(isset($id)) echo $id; ?>">
                    <input type="hidden" name="token" value="<?php if(function_exists('_token')) echo _token(); ?>">

                    <button type="submit" name="updateProfileBtn" class="m-2 btn btn-primary pull-right">
                        Update Profile</button> <br />
                        </div>
                </form>

        <?php endif ?>
    </section>

</div>
<?php include_once 'partials/footers.php'; ?>
</body>
</html>
