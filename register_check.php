<?php
//Gets the form submitted data
include ('initdb.php');
if(!empty($_POST)) // Checks if the form is submitted or not

{

	//retrieve all submitted data from the form

	$full_name = $_POST['full_name'];
	$full_name = strip_tags($full_name);

	$college = $_POST['collegeid'];
	$college = strip_tags($college);

	$email = $_POST['email'];
	$email = strip_tags($email);

	$phone = $_POST['phone'];
	$phone = strip_tags($phone);

	$username = $_POST['username'];
	$username = strip_tags($username); //strip tags are used to take plain text only, in case the register-er inserts dangours scripts.
	$username = str_replace(' ', '', $username); // to remove blank spaces

	$password1 = $_POST['password1'];
	$password1 = strip_tags($password1); 

	$password2 = $_POST['password2'];
	$password2 = strip_tags($password2); 
	// md5 is used to encrypt your password to make it more secure.


	$sql="SELECT id FROM users WHERE username='$username'"; // checking username already exists
	$qry=$mysqli->query($sql);
	$num_rows = mysqli_num_rows($qry); 


	//alert if it already exists
	if($num_rows > 0) 
	{
		header("location:login.php?register=2");
	}

	else 
	{
		// if username doesn't exist insert new records to database
		$success = $mysqli->query("INSERT INTO student_reg(user, pass, name, phone, clg_id, email) VALUES ('$username', '$password1', '$full_name','$phone','$college','$email')");
		$id = $mysqli->insert_id;
 		//messages if the new record is inserted or not
		if($success) 
		{ 
			session_start();
			$_SESSION['username']= $username; // storing username in session
			$_SESSION['name'] = $full_name;
			$_SESSION['login'] = 1;
			$_SESSION['tat_id'] = $id;
			header("location:index.php");
		} 

		else 
		{
			header("location:login.php?register=2");
		}
	}
}
else 
		{
			header("location:login.php?register=3");
		}
?>