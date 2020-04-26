<?php 

//add scripts
include_once 'resource/Database.php';
include_once 'resource/utilities.php';


if(isset($_POST['bookappointBtn'], $_POST['token'])){

	if(validate_token($_POST['token'])){

		//store form error data
		$form_errors = array();

		// form validation
		$required_fields = array('user_id', 'shop_id', 'fname', 'number', 'email', 'select_service', 'service_mode', 'date');
		$_POST['user_id'] = isset($_SESSION['id']) ? $_SESSION['id']:'';
		 //check empty Fields
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    //email validation / merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_email($_POST));


    // !empty form errors, process data

    if(empty($form_errors)){
			
			$user_id = $_POST['user_id'];
			$salon_id = $_POST['shop_id'];
			$fname = $_POST['fname'];
			$number = $_POST['number'];
			$email = $_POST['email'];
			$select_service = $_POST['select_service'];
			$service_mode = $_POST['service_mode'];
			$date = $_POST['date'];
		
    	//SQL INSET STATEMENT

    	$sqlInsert = "INSERT INTO appoint (id, user_id, salon_id, fname, number, email, select_service, service_mode, date, status) VALUES(null, :user_id, :salon_id, :fname, :number, :email, :select_service, :service_mode, :date, :status)";

    	 //use PDO prepared to sanitize data
         $statement = $db->prepare($sqlInsert);

         $statement->execute(array(':user_id' => $user_id, ':salon_id' => $salon_id, ':fname' => $fname, ':number' => $number, ':email' => $email, ':select_service' => $select_service, ':service_mode' => $service_mode, ':date' => $date, ':status' => 0));

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

	$sqlQuery = "SELECT * FROM appoint WHERE user_id = :id OR salon_id = :sid ";
	$statement = $db->prepare($sqlQuery);
	$statement->execute(array('id' => $id, 'sid' => $id));

	$appoints = $statement->fetchAll(PDO::FETCH_OBJ);
	
}


	if(isset($_GET['action'], $_GET['id'])) {
		
		$id = $_SESSION['id'];
		$aid = $_GET['id'];
		$action = $_GET['action'];
		$user_id = $_SESSION['id'];
		
		if( $action == 'cancel' ) {
			//SQL insert $statement
			$sqlUpdate = "UPDATE appoint SET status = :status WHERE id =:aid ";

			//use PDO prepare to sanitize data
			$statement = $db->prepare($sqlUpdate);

			//add data into Database
			$statement->execute(array(':status' => 4, ':aid' => $aid ));

			//check if one new row was created
			if($statement->rowCount() == 1){

				$result = "<script type=\"text/javascript\">
						swal({
						title: \"UPDATED!\",
						text: \"Appointment Cancelled Successfully\",
						type: 'success',
						confirmButtonText: \"OKay!\" });

						setTimeout(() => {
							window.location.assign('profile_appointment.php');
						}, 1500)						
				</script>";

			}
		}
		if( $action == 'reject' ) {
			//SQL insert $statement
			$sqlUpdate = "UPDATE appoint SET status = :status WHERE id =:aid ";

			//use PDO prepare to sanitize data
			$statement = $db->prepare($sqlUpdate);

			//add data into Database
			$statement->execute(array(':status' => 2, ':aid' => $aid ));

			//check if one new row was created
			if($statement->rowCount() == 1){

				$result = "<script type=\"text/javascript\">
						swal({
						title: \"UPDATED!\",
						text: \"Appointment Rejected Successfully\",
						type: 'success',
						confirmButtonText: \"OKay!\" });

						setTimeout(() => {
							window.location.assign('profile_appointment.php');
						}, 1500)						
				</script>";

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

				$result = "<script type=\"text/javascript\">
						swal({
						title: \"UPDATED!\",
						text: \"Appointment Accepted Successfully\",
						type: 'success',
						confirmButtonText: \"OKay!\" });

						setTimeout(() => {
							window.location.assign('profile_appointment.php');
						}, 1500)						
				</script>";

			}
		}
	}


 ?>