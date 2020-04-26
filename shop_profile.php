<?php
$page_title = "User Authentication -  {$_GET['u']}'s Profile";
include_once 'partials/headers.php';
include_once 'partials/parseProfile.php';
include_once 'partials/parseAddservice.php';
include_once 'partials/parseAddappoints.php';

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

      <div class="col-md-4">
        <img class="img-fluid" src="<?php if(isset($profile_picture)) echo $profile_picture; ?>" alt="">
      </div>

      <div class="col-md-8">
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

    </div> <br><br>
    <!-- /.row -->

    <!-- Related Projects Row -->


    <div class="row">
      <div class="col-lg-8 mb-4">
        <h3>Book an Appointment</h3>
        <div>
        <?php if(isset($result)) echo $result; ?>
        <?php if(!empty($form_errors)) echo show_errors($form_errors); ?>
    </div>
        <form action="" method="post">
          <div class="control-group form-group">
            <div class="controls">
              <label>Full Name:</label>
              <input type="text" class="form-control" name="fname">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Phone Number:</label>
              <input type="text" class="form-control" name="number">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Email Address:</label>
              <input type="email" class="form-control" name="email">
            </div>
          </div>
          <div class="control-group form-group">
            <div class="controls">
              <label>Select Service</label>
              <select class="form-control" name="select_service">
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
            <input class="form-check-input" type="radio" name="service_mode" value="Home Service">
            <label class="form-check-label">Home Service</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="service_mode" value="Walk-in Service">
            <label class="form-check-label" for="inlineRadio2">Walk-in Service</label>
          </div>
          </div>          
          <div class="control-group form-group">
            <div class="controls">
              <label>Date:</label>
              <input type="text" class="form-control dpicker" name="date">
            </div>
          </div>
           <input type="hidden" name="user_id" value="<?php if(isset($id)) echo $id; ?>">
           <input type="hidden" name="shop_id" value="<?php if(isset($shop_id)) echo $shop_id; ?>">
      <input type="hidden" name="token" value="<?php if(function_exists('_token')) echo _token(); ?>">
          <button type="submit" name="bookappointBtn" class="btn btn-primary">Book Appointment</button>
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
  <script src="js/datepicker.min.js"></script>
	<script type="text/javascript">
		const dateField = document.querySelector('.dpicker');
		if (dateField != null) {
			const datepicker = new Datepicker(dateField, {
				// Whether or not to close the datepicker immediately when a date is selected.
				autohide: false,

				// Whether or not to show week numbers to the left of week rows.
				calendarWeeks: false,

				// If true, displays a "Clear" button at the bottom of the datepicker to clear the input value.
				// If 'autoclose' is also set to true, this button will also close the datepicker.
				clearBtn: false,

				// Delimiter string to separate the dates in a multi-date string.
				dateDelimiter: ',',

				// Days of the week that should be highlighted. Values are 0 (Sunday) to 6 (Saturday).
				daysOfWeekHighlighted: [0, 6],

				// Date to view when initially opening the calendar.
				// Date, String or Object with keys year, month, and day.
				// Defaults to today() by the program
				defaultViewDate: undefined,

				// If true, no keyboard will show on mobile devices.
				disableTouchKeyboard: false,

				// Date format string.
				format: 'yyyy-mm-dd',

				// The date format, combination of d, dd, D, DD, m, mm, M, MM, yy, yyyy.
				language: 'en',

				// Maximum limit to selectable date. No limit is applied if null is set.
				maxDate: null,

				// Maximum number of dates users can select. No limit is applied if 0 is set.
				maxNumberOfDates: 1,

				// Muximum limit to the view that the date picker displayes. 0:days – 3:decades.
				maxView: 3,

				// Minimum limit to selectable date. No limit is applied if null is set.
				minDate: null,

				// HTML (or plain text) for the button label of the "Next" and "Prev" button.
				nextArrow: '»',
				prevArrow: '«',

				// left|right|auto for horizontal and top|bottom|auto for virtical.
				orientation: 'auto',

				// Whether or not to show the day names of the week.
				showDaysOfWeek: true,

				// If false, the datepicker will be prevented from showing when the input field associated with it receives focus.
				showOnFocus: true,

				// The view that the datepicker should show when it is opened.
				// Accepts: 0 or "days" or "month", 1 or "months" or "year", 2 or "years" or "decade", 3 or "decades" or "century", and 4 or "centuries" or "millenium".
				// Useful for date-of-birth datepickers.
				startView: 0,

				// The string that will appear on top of the datepicker. If empty the title will be hidden.
				title: '',

				// If true or "linked", displays a "Today" button at the bottom of the datepicker to select the current date.
				// If true, the "Today" button will only move the current date into view;
				// if "linked", the current date will also be selected.
				todayBtn: false,

				// 0  focus Move the focused date to the current date without changing the selection
				// 1 select  Select (or toggle the selection of) the current date
				todayBtnMode: 0,

				// If true, highlights the current date.
				todayHighlight: false,

				// Day of the week start. 0 (Sunday) to 6 (Saturday)
				weekStart: 0,
			});
		}
	</script>
</body>

</html>
