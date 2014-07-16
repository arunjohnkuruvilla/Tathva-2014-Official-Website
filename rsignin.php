<?/*php
require_once("initdb.php");
session_start();

//if (isset($_SESSION['user']))
//  echo "[-1,\"$_SESSION[user]\",\"$_SESSION[tat_id]\"]";
//else if (isset($_POST["user"])) {
  $user = $mysqli->real_escape_string(strtolower(trim($_POST["user"])));
  $pass = $_POST["pass"];
  $pass = hash('sha256',$_POST["pass"]);
  $result=$mysqli->query("SELECT id, name, clg_id FROM student_reg WHERE user='$user' AND pass='$pass'");
  //if ($row = $result->fetch_assoc()) {
    $_SESSION['login'] = 1;
    $_SESSION['username'] = $user;
    $_SESSION['name'] = $user;
    $_SESSION['tat_id'] = $row['id'];
    echo "[1,\"$user\",$row[id],\"$row[name]\"]";
  //} else
    //echo '[0,"Invalid username/password!"]';
  $mysqli->close();*/
?>

<?php
require_once("initdb.php");

$errors         = array();    // array to hold validation errors
$message    = array();
$data       = array();    // array to pass back data
$username   = $_POST['username'];
$password     = $_POST['password'];

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
        $_SESSION['login'] = 1;
        $_SESSION['username'] = $row['name'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['tat_id'] = $row['id'];
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