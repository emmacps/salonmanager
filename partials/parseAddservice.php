<?php

//add scripts
include_once 'resource/Database.php';
include_once 'resource/utilities.php';


// process add service date_create_from_format
if(isset($_POST['addserviceBtn'], $_POST['token'])){

    if(validate_token($_POST['token'])){

    //store form error ArrayAccess
    $form_errors = array();

    //form validation
    $required_fields = array('service_name', 'service_des', 'service_price');

    //check empty Fields
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    //collect form data
    // try{
    //   $sqlQuery = "SELECT * FROM users WHERE id =:id";
    //   $statement = $db->prepare($sqlQuery);
    //   $statement->execute(array(':id' => $id));



    $user_id = $_POST['user_id'];
    $service_name = $_POST['service_name'];
    $service_des = $_POST['service_des'];
		$service_price = $_POST['service_price'];
		
		// Check if activate service input field value is sent and also if the value is 1 then 
		// set the $service_active variable to 1 and else set it to 0
    $service_active = (isset($_POST['service_active']) && $_POST['service_active'] == 1 ) ? 1 : 0 ;

    //empty form errors, process form data and insert record
    if(empty($form_errors)){
      //SQL insert $statement
      $sqlInsert = "INSERT INTO services (id, user_id, service_name, service_des, service_price, service_active)
       VALUES (null, :user_id, :service_name, :service_des, :service_price, :service_active)";

       //use PDO prepare to sanitize data
       $statement = $db->prepare($sqlInsert);

       //add data into Database
       $statement->execute(array(':user_id' => $user_id, ':service_name' => $service_name, ':service_des' => $service_des, ':service_price' => $service_price, ':service_active' => $service_active));

         //check if one new row was created
         if($statement->rowCount() == 1){

           $result = "<script type=\"text/javascript\">
               swal({
               title: \"UPDATED!\",
               text: \"New service added Successfully\",
               type: 'success',
               confirmButtonText: \"Thank You!\" });
           </script>";

         }else{
           if(count($form_errors) == 1){
               $result = flashMessage("There was 1 error in the form<br>");
           }else{
               $result = flashMessage("There were " .count($form_errors). " errors in the form <br>");
           }
         }

       }

    // }catch (PDOException $ex){
    //     $result = flashMessage("An error occurred: " .$ex->getMessage());
    }

  }

	// Check if url contains a "u" a parameter
	if(isset($_GET['u'])) {
		
		$uname = $_GET['u'];

		$sqlQuery = "SELECT id FROM users WHERE username = :uname ";
		$statement = $db->prepare($sqlQuery);
		$statement->execute(array(':uname' => $uname));

		$uid = $statement->fetch(PDO::FETCH_OBJ)->id;

		$sqlQuery = "SELECT * FROM services WHERE user_id = :userid AND service_active = 1";
		$statement = $db->prepare($sqlQuery);
		$statement->execute(array(':userid' => $uid));

		$shopservices = $statement->fetchAll(PDO::FETCH_OBJ);

	}

	if(isset($_SESSION['id'])) {
			
		$id = $_SESSION['id'];

		$sqlQuery = "SELECT * FROM services WHERE user_id = :id";
		$statement = $db->prepare($sqlQuery);
		$statement->execute(array(':id' => $id));

		$services = $statement->fetchAll(PDO::FETCH_OBJ);

		$sqlQuery = "SELECT * FROM services";
		$statement = $db->prepare($sqlQuery);
		$statement->execute(array(':id' => $id));

		$allservices = $statement->fetchAll(PDO::FETCH_OBJ);

	}
	
	if(isset($_GET['action'], $_GET['id'])) {
		
		$id = $_SESSION['id'];
		$sid = $_GET['id'];
		$action = $_GET['action'];
		$user_id = $_SESSION['id'];
		
		if( $action == 'edit' ) {

			$sqlQuery = "SELECT * FROM services WHERE user_id = :id AND id = :sid ";
			$statement = $db->prepare($sqlQuery);
			$statement->execute(array(':id' => $id, ':sid' => $sid));

			$serviceToUpdate = $statement->fetch(PDO::FETCH_OBJ);

		}
		if( $action == 'delete' ) {
			//SQL insert $statement
			$sqlUpdate = "DELETE FROM services WHERE user_id =:uid AND id =:sid ";

			//use PDO prepare to sanitize data
			$statement = $db->prepare($sqlUpdate);

			//add data into Database
			$statement->execute(array(':uid' => $user_id, ':sid' => $sid ));

			//check if one new row was created
			if($statement->rowCount() == 1){

				$result = "<script type=\"text/javascript\">
						swal({
						title: \"UPDATED!\",
						text: \"Service Deleted Successfully\",
						type: 'success',
						confirmButtonText: \"OKay!\" });

						setTimeout(() => {
							window.location.assign('profile_service.php');
						}, 1500)						
				</script>";

			}
		}
		if( $action == 'activate' ) {
			//SQL insert $statement
			$sqlUpdate = "UPDATE services SET service_active =:service_active WHERE user_id =:uid AND id =:sid ";

			//use PDO prepare to sanitize data
			$statement = $db->prepare($sqlUpdate);

			//add data into Database
			$statement->execute(array(':service_active' => 1, ':uid' => $user_id, ':sid' => $sid ));

			//check if one new row was created
			if($statement->rowCount() == 1){

				$result = "<script type=\"text/javascript\">
						swal({
						title: \"UPDATED!\",
						text: \"Service Updated Successfully\",
						type: 'success',
						confirmButtonText: \"OKay!\" });

						setTimeout(() => {
							window.location.assign('profile_service.php');
						}, 1500)						
				</script>";

			}
		}
		if( $action == 'deactivate' ) {
			//SQL insert $statement
			$sqlUpdate = "UPDATE services SET service_active =:service_active WHERE user_id =:uid AND id =:sid ";

			//use PDO prepare to sanitize data
			$statement = $db->prepare($sqlUpdate);

			//add data into Database
			$statement->execute(array(':service_active' => 0, ':uid' => $user_id, ':sid' => $sid ));

			//check if one new row was created
			if($statement->rowCount() == 1){

				$result = "<script type=\"text/javascript\">
						swal({
						title: \"UPDATED!\",
						text: \"Service Updated Successfully\",
						type: 'success',
						confirmButtonText: \"OKay!\" });

						setTimeout(() => {
							window.location.assign('profile_service.php');
						}, 1500)

				</script>";

			}
		}
	}

	if(isset($_POST['updateserviceBtn'], $_POST['token'], $_GET['id'], $_GET['action'])){

		$action = $_GET['action'];
		$user_id = $_SESSION['id'];
		$sid = $_GET['id'];
		$service_name = $_POST['service_name'];
		$service_des = $_POST['service_des'];
		$service_price = $_POST['service_price'];

		if( $action == 'edit' ) {
			if(validate_token($_POST['token'])){

				//store form error ArrayAccess
				$form_errors = array();

				//form validation
				$required_fields = array('service_name', 'service_des', 'service_price');

				//check empty Fields
				$form_errors = array_merge($form_errors, check_empty_fields($required_fields));
				
				// Check if activate service input field value is sent and also if the value is 1 then 
				// set the $service_active variable to 1 and else set it to 0
				$service_active = (isset($_POST['service_active']) && $_POST['service_active'] == 1 ) ? 1 : 0 ;

				//empty form errors, process form data and insert record
				if(empty($form_errors)){
					//SQL insert $statement
					$sqlUpdate = "UPDATE services SET service_name =:service_name, service_des =:service_des, service_price =:service_price, service_active =:service_active WHERE user_id =:uid AND id =:sid ";

					//use PDO prepare to sanitize data
					$statement = $db->prepare($sqlUpdate);

					//add data into Database
					$statement->execute(array(':service_name' => $service_name, ':service_des' => $service_des, ':service_price' => $service_price, ':service_active' => $service_active, ':uid' => $user_id, ':sid' => $sid ));

						//check if one new row was created
						if($statement->rowCount() == 1){

							$result = "<script type=\"text/javascript\">
									swal({
									title: \"UPDATED!\",
									text: \"Service Updated Successfully\",
									type: 'success',
									confirmButtonText: \"OKay!\" });

									setTimeout(() => {
										window.location.assign('profile_service.php');
									}, 1500)
							</script>";

						}else{
							if(count($form_errors) == 1){
									$result = flashMessage("There was 1 error in the form<br>");
							}else{
									$result = flashMessage("There were " .count($form_errors). " errors in the form <br>");
							}
						}

				}
			}
		}
	}


 ?>
