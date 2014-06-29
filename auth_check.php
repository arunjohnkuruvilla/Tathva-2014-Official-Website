<?php

include ('initdb.php'); 

// Getting username and password from login form
$username = $_POST['username']; 
$password = $_POST['password'];

// To protect MySQL injection
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$sql="SELECT * FROM student_reg WHERE user='$username' and pass='$password'";
$result=$mysqli->query($sql);

// Mysql_num_row is to count number of row from the above query
$count=mysqli_num_rows($result);

// count is 1 if the above username and password matches
if($count==1){
$row = mysqli_fetch_array($result);
// now redirect to dashboard page, we also store the username in session for further use in dashboard
//session_register("username"); // session checker for pages
session_start();
$_SESSION['username']= $username; // storing username in session
$_SESSION['name'] = $row[1];
$_SESSION['login'] = 1;
$_SESSION['tat_id'] = $row[0];
header("location:index.php");
}

//if the username and password doesn't match redirect to homepage with message=1
else {
    echo '
    <script language="javascript" type="text/javascript">
window.location.href="login.php?message=1";
</script>';

}
?>