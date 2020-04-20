<?php 

//add scripts
include_once 'resource/Database.php';
include_once 'resource/utilities.php';


if(isset($_POST['bookappointBtn'], $_POST['token'])){

	if(validate_token($_POST['token'])){

		//store form error data
		$form_errors = array();

		// form validation
		$required_fields = array('fname', 'number', 'email', 'select_service', 'service_mode');

		 //check empty Fields
    $form_errors = array_merge($form_errors, check_empty_fields($required_fields));

    //email validation / merge the return data into form_error array
    $form_errors = array_merge($form_errors, check_email($_POST));

    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $select_service = $_POST['select_service'];
    $service_mode = $_POST['service_mode'];

    // !empty form errors, process data

    if(empty($form_errors)){
    	//SQL INSET STATEMENT

    	$sqlInsert = "INSERT INTO appoint (user_id, fname, number, email, select_service, service_mode) VALUES(:user_id, :fname, :number, :email, :select_service, :service_mode)";

    	 //use PDO prepared to sanitize data
         $statement = $db->prepare($sqlInsert);

         $statement->execute(array(':user_id' => $user_id, ':fname' => $fname, ':number' => $number, ':email' => $email, ':select_service' => $select_service, ':service_mode' => $service_mode));

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

	$sqlQuery = "SELECT * FROM appoint WHERE user_id = :id";
	$statement = $db->prepare($sqlQuery);
	$statement->execute(array('id' => $id));

	$appoints = $statement->fetchAll(PDO::FETCH_OBJ);
	
}else{
									$result = flashMessage("There were " .count($form_errors). " errors in the form <br>");
							}




 ?>