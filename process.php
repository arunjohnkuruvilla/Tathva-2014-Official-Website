<?php
require_once("initdb.php");

$errors         = array();  	// array to hold validation errors
$message 		= array();
$data 			= array(); 		// array to pass back data
$username		= $_POST['username'];
$password 		= $_POST['password'];

// validate the variables ======================================================
	// if any of these variables don't exist, add an error to our $errors array

	if (empty($username))
		$errors['username'] = true;

	if (empty($password))
		$errors['password'] = true;

// return a response ===========================================================

	// if there are any errors in our errors array, return a success boolean of false
	if ( ! empty($errors)) {

		// if there are items in our errors array, return those errors
		$data['formIncomplete'] = true;
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {
		//$password = hash('sha256',$password);
  		$result=$mysqli->query("SELECT * FROM student_reg WHERE user='$username' AND pass='$password'");
  		if($row = $result->fetch_assoc()) {
  			session_start();
			$data['formIncomplete'] = false;
			$data['success'] = true;
			$message['username'] = $username;
			$data['message'] = $message;
  		}
  		else {
			$data['formIncomplete'] = false;
			$data['success'] = false;
			$data['message'] = $message;
  		}

		
	}

	echo json_encode($data);
?>