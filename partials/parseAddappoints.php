<?php 

//add scripts
include_once 'resource/Database.php';
include_once 'resource/utilities.php';
include_once 'resource/send-email.php';


if(isset($_POST['bookappointBtn'], $_POST['token'])){

	if(validate_token($_POST['token'])){

		//store form error data
		$form_errors = array();

		// form validation
		$required_fields = array('shop_id', 'fname', 'number', 'email', 'select_service', 'service_mode', 'transaction', 'date');
		 //check empty Fields
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    //email validation / merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_email($_POST));


    // !empty form errors, process data

    if(empty($form_errors)){
			
			$salon_id = $_POST['shop_id'];
			$fname = $_POST['fname'];
			$number = $_POST['number'];
			$email = $_POST['email'];
			$select_service = $_POST['select_service'];
			$service_mode = $_POST['service_mode'];
			$transaction = $_POST['transaction'];
			$date = $_POST['date'];
		
    	//SQL INSET STATEMENT

    	$sqlInsert = "INSERT INTO appoint (id, salon_id, fname, number, email, select_service, service_mode, transaction, date, status) VALUES(null, :salon_id, :fname, :number, :email, :select_service, :service_mode, :transaction, :date, :status)";

    	 //use PDO prepared to sanitize data
         $statement = $db->prepare($sqlInsert);

         $statement->execute(array(':salon_id' => $salon_id, ':fname' => $fname, ':number' => $number, ':email' => $email, ':select_service' => $select_service, ':service_mode' => $service_mode, ':transaction' => $transaction, ':date' => $date, ':status' => 0));

         //chech if record was inserted
         if($statement->rowCount() == 1){

         	 $result = "<script type=\"text/javascript\">
               swal({
               title: \"BOOKING!\",
               text: \"Thank you for booking an appoint with us.\",
               type: 'success',
               confirmButtonText: \"Thank You!\" });
           </script>";

         } else{
         	  if(count($form_errors) == 1){
               $result = flashMessage("There was 1 error in the form<br>");
           }else{
               $result = flashMessage("There were " .count($form_errors). " errors in the form <br>");
           }
         }

    }


	}
}


//list appoints base on suers

if(isset($_SESSION['id'])){

	$id = $_SESSION['id'];

	$sqlQuery = "SELECT * FROM appoint WHERE salon_id = :sid ";
	$statement = $db->prepare($sqlQuery);
	$statement->execute(array('sid' => $id));

	$appoints = $statement->fetchAll(PDO::FETCH_OBJ);
	
}


	if(isset($_GET['action'], $_GET['id'], $_GET['details'])) {
		
		$id = $_SESSION['id'];
		$aid = $_GET['id'];
		$action = $_GET['action'];
		$user_details = json_decode(base64_decode($_GET['details']));
		$shop = json_decode(base64_decode($_GET['shop']));
		$user_id = $_SESSION['id'];

		if( $action == 'cancel' ) {
			//SQL insert $statement
			$sqlUpdate = "UPDATE appoint SET status = :status WHERE id =:aid ";

			//use PDO prepare to sanitize data
			$statement = $db->prepare($sqlUpdate);

			//add data into Database
			$statement->execute(array(':status' => 3, ':aid' => $aid ));

			//check if one new row was created
			if($statement->rowCount() == 1){

				foreach( $allservices as $service ){
						if( $service->id == $user_details->select_service ){
							$service_name = $service->service_name;
						}
				}

				//prepare email body
				$mail_body = '<html>
						<body style="background-color:#CCCCCC; color:#000; font-family: Arial, Helvetica, sans-serif;
																line-height:1.8em;">
						<h2>Hello '.$user_details->fname.',</h2>
						<p>Your appointment with <strong>'.$shop.'</strong> on '.date('jS, M, Y', strtotime($user_details->date)).' has been cancelled. Below are brief details.<br /><br />
						Appointment ID: '.$user_details->id.' <br />
						Service Selected: '.$service_name.' <br />
						Mode of Service: '.$user_details->service_mode.' <br />
						Payment Transaction ID: '.$user_details->transaction.' <br />
						</p>
						<p>Kindly contact us If you wish to cancel or change the appointment.</p>
						<p><strong>&copy;'.date('Y').'</strong></p>
						</body>
						</html>';

				$mail->addAddress($user_details->email, $user_details->fname);
				$mail->Subject = "Appointment Update";
				$mail->Body = $mail_body;
				
				//Error Handling for PHPMailer
				if(!$mail->Send()){
						
					$result = "<script type=\"text/javascript\">
							swal({
								title: \"UPDATED!\",
								text: \"Appointment Cancelled Successfully. But failed to notify the client. \",
								type: 'success',
								confirmButtonText: \"OKay!\" });

								setTimeout(() => {
									window.location.assign('profile_appointment.php');
								}, 1500)		
						</script>";
				}else{
						
					$result = "<script type=\"text/javascript\">
							swal({
								title: \"UPDATED!\",
								text: \"Appointment Cancelled Successfully.\",
								type: 'success',
								confirmButtonText: \"OKay!\" });

								setTimeout(() => {
									window.location.assign('profile_appointment.php');
								}, 1500)						
						</script>";
				}

			}
		}
		if( $action == 'reject' ) {
			//SQL insert $statement
			$sqlUpdate = "UPDATE appoint SET status = :status WHERE id = :aid ";

			//use PDO prepare to sanitize data
			$statement = $db->prepare($sqlUpdate);

			//add data into Database
			$statement->execute(array(':status' => 2, ':aid' => $aid ));

			//check if one new row was created
			if($statement->rowCount() == 1){

				foreach( $allservices as $service ){
						if( $service->id == $user_details->select_service ){
							$service_name = $service->service_name;
						}
				}

				//prepare email body
				$mail_body = '<html>
						<body style="background-color:#CCCCCC; color:#000; font-family: Arial, Helvetica, sans-serif;
																line-height:1.8em;">
						<h2>Hello '.$user_details->fname.',</h2>
						<p>Your appointment with <strong>'.$shop.'</strong> on '.date('jS, M, Y', strtotime($user_details->date)).' has been rejected. Below are brief details.<br /><br />
						Appointment ID: '.$user_details->id.' <br />
						Service Selected: '.$service_name.' <br />
						Mode of Service: '.$user_details->service_mode.' <br />
						Payment Transaction ID: '.$user_details->transaction.' <br />
						</p>
						<p>Kindly contact us If you wish to cancel or change the appointment.</p>
						<p><strong>&copy;'.date('Y').'</strong></p>
						</body>
						</html>';

				$mail->addAddress($user_details->email, $user_details->fname);
				$mail->Subject = "Appointment Update";
				$mail->Body = $mail_body;
				
				//Error Handling for PHPMailer
				if(!$mail->Send()){
						
					$result = "<script type=\"text/javascript\">
							swal({
								title: \"UPDATED!\",
								text: \"Appointment Rejected Successfully. But failed to notify the client. \",
								type: 'success',
								confirmButtonText: \"OKay!\" });

								setTimeout(() => {
									window.location.assign('profile_appointment.php');
								}, 1500)		
						</script>";
				}else{
						
					$result = "<script type=\"text/javascript\">
							swal({
								title: \"UPDATED!\",
								text: \"Appointment Rejected Successfully.\",
								type: 'success',
								confirmButtonText: \"OKay!\" });

								setTimeout(() => {
									window.location.assign('profile_appointment.php');
								}, 1500)						
						</script>";
				}

			}
		}
		if( $action == 'accept' ) {
			//SQL insert $statement
			$sqlUpdate = "UPDATE appoint SET status = :status WHERE id =:aid ";

			//use PDO prepare to sanitize data
			$statement = $db->prepare($sqlUpdate);

			//add data into Database
			$statement->execute(array(':status' => 1, ':aid' => $aid ));

			//check if one new row was created
			if($statement->rowCount() == 1){

				foreach( $allservices as $service ){
						if( $service->id == $user_details->select_service ){
							$service_name = $service->service_name;
							$service_price = $service->service_price;
						}
				}

				//prepare email body
				$mail_body = '<html>
						<body style="background-color:#CCCCCC; color:#000; font-family: Arial, Helvetica, sans-serif;
																line-height:1.8em;">
						<h2>Hello '.$user_details->fname.',</h2>
						<p>Your appointment with <strong>'.$shop.'</strong> on '.date('jS, M, Y', strtotime($user_details->date)).' has been accepted. Below are brief details.<br /><br />
						Appointment ID: '.$user_details->id.' <br />
						Service Selected: '.$service_name.' <br />
						Service Price: '.$service_price.' <br />
						Mode of Service: '.$user_details->service_mode.' <br />
						Payment Transaction ID: '.$user_details->transaction.' <br />
						</p>
						<h1><a href="https://calendar.google.com/calendar/r" class="btn btn-danger">Add To Calender</a></h1>
						<p>Kindly contact us If you wish to cancel or change the appointment.</p>
						<p><strong>&copy;'.date('Y').'</strong></p>

						</body>
						</html>';

				$mail->addAddress($user_details->email, $user_details->fname);
				$mail->Subject = "Appointment Update";
				$mail->Body = $mail_body;
				
				//Error Handling for PHPMailer
				if(!$mail->Send()){
						
					$result = "<script type=\"text/javascript\">
							swal({
								title: \"UPDATED!\",
								text: \"Appointment Accepted Successfully. But failed to notify the client. \",
								type: 'success',
								confirmButtonText: \"OKay!\" });

								setTimeout(() => {
									window.location.assign('profile_appointment.php');
								}, 1500)		
						</script>";
				}else{
						
					$result = "<script type=\"text/javascript\">
							swal({
								title: \"UPDATED!\",
								text: \"Appointment Accepted Successfully.\",
								type: 'success',
								confirmButtonText: \"OKay!\" });

								setTimeout(() => {
									window.location.assign('profile_appointment.php');
								}, 1500)						
						</script>";
				}

			}
		}
	}


 ?>