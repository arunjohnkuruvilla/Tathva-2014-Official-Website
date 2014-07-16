<?php
require_once("initdb.php");

$errors         = array();    // array to hold validation errors
$message    = array();
$data       = array();    // array to pass back data


//Form variables
$name       = $_POST['name'];
$phone      = $_POST['phone'];
$email      = $_POST['email'];
$collegeid  = $_POST['college'];
$username   = $_POST['username'];
$password1  = $_POST['password1'];
$password2  = $_POST['password2'];

// validate the variables ======================================================
  // if any of these variables don't exist, add an error to our $errors array
  if (empty($name))
    $errors['name'] = true;

  if (empty($phone))
    $errors['phone'] = true;

  if (empty($email))
    $errors['email'] = true;

  if (empty($collegeid))
    $errors['college'] = true;

  if (empty($username))
    $errors['username'] = true;

  if (empty($password1))
    $errors['password1'] = true;

  if (empty($password2))
    $errors['password2'] = true;

// return a response ===========================================================

  // if there are any errors in our errors array, return a success boolean of false
  if ( ! empty($errors)) {

    // if there are items in our errors array, return those errors
    $data['formIncomplete'] = true;
    $data['success'] = false;
    $data['errors']  = $errors;
  } else {
    //$password = hash('sha256',$password);
      /*$result=$mysqli->query("SELECT * FROM student_reg WHERE user='$username' AND pass='$password'");
      if($row = $result->fetch_assoc()) {
        session_start();
        $_SESSION['login'] = 1;
        $_SESSION['username'] = $row['name'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['tat_id'] = $row['id'];*/
        $data['formIncomplete'] = false;
        $data['success'] = true;
        $message['username'] = $username;
        $data['message'] = $message;
      /*}
      else {
      $data['formIncomplete'] = false;
      $data['success'] = false;
      $data['message'] = $message;
      }*/

    
  }

  echo json_encode($data);
?>