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

    //empty form errors, process form data and insert record
    if(empty($form_errors)){
      //SQL insert $statement
      $sqlInsert = "INSERT INTO services (user_id, service_name, service_des, service_price)
       VALUES (:user_id, :service_name, :service_des, :service_price)";

       //use PDO prepare to sanitize data
       $statement = $db->prepare($sqlInsert);

       //add data into Database
       $statement->execute(array(':user_id' => $user_id, ':service_name' => $service_name, ':service_des' => $service_des, ':service_price' => $service_price));

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



 ?>
