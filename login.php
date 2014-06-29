<!DOCTYPE html>
<html lang="en">

  	<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Font Icons -->
	<link href="css.fonts.css" rel="stylesheet">


	<!-- Google Font -->
	<link href="css/css" rel="stylesheet" type="text/css">
    <!-- Le styles -->
	<script src="http://code.jquery.com/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/loginform.css" />
	<link href="css/reg-style.css" rel="stylesheet">
	<link href="css/autocomplete.css" rel="stylesheet">
  	<body>
  
  	<div id="newcollege">
  		<div class="job-form">
		    <div class="epic-subscription">
				<form id="addcollege" name="addcollege">
			        <h2 class="form-signin-heading">Enter your college name</h2>
			        <label></label>
		                <input id="newcollegename" name="newcollegename" placeholder="Enter your college's name" type="text">
			        <div class="field">
		        	 	<input type="submit" id="submitcollege" value="SUBMIT">
		        	 		<label for="register" class="submit">
		        	 			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 225.6 343.7" enable-background="new 0 0 225.6 343.7" class=" iconic-injected-svg js-svg-injected" data-src="images/9bbcc1a2.arrow-right.svg">
		        	 				<path d="M31.1 271.5l97.9-99.8-98.1-96.4 33.4-35 132.2 131.5-132.6 131.9z">
		        	 				</path>
		        	 			</svg>
		        	 		</label>
		        	</div>
		      	</form>	  
			  </div>
		  </div>
  	</div>
  	<div class="job-form" style="background:#2F3238">
    		<div class="epic-subscription">
				<form action="register_check.php" method="post" style="form-signin" name="myForm" onsubmit="return(validate());">
				    <h2 class="form-signin-heading">REGISTER</h2>
				    <label></label>
				    <input name="full_name" type="text" placeholder="NAME">

				    <div>
				        	<label for="reg-clg"></label>
				        		
				        			
				        		<input name="collegename" id="college_name" type="text" placeholder="COLLEGE" />				        			
				        		<input type="hidden" name="collegeid"/>
					</div>
				    <label></label>
				    <input name="email" type="text" placeholder="E-MAIL">

				    <label></label>
				    <input name="phone" type="text" placeholder="MOBILE">
			
				    <label></label>
				    <input name="username" type="text" placeholder="USERNAME">
					
				    <label></label>
				    <input name="password1" type="password" placeholder="PASSWORD">

				    <label></label>
				    <input name="password2" type="password" placeholder="RETYPE PASSWORD">
					
					
				    <div class="field">
        	 			<input type="submit" id="register" value="REGISTER">
	        	 		<label for="register" class="submit">
	        	 			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 225.6 343.7" enable-background="new 0 0 225.6 343.7" class=" iconic-injected-svg js-svg-injected" data-src="images/9bbcc1a2.arrow-right.svg">
	        	 				<path d="M31.1 271.5l97.9-99.8-98.1-96.4 33.4-35 132.2 131.5-132.6 131.9z">
	        	 				</path>
	        	 			</svg>
	        	 		</label>
        			</div>
				</form>
			</div>
		</div>
		<?php 
		if(isset($_GET['register']))
		{
			if($_GET['register'] == 2)
			{
				echo '
				<div class="alert">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>username already exists!</strong> please choose another username
				</div>
				';
			}
			else if($_GET['register'] == 3)
			{
				echo '
				<div class="alert">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>REGISTRATION UNSUCCESSFUL</strong>
				</div>
				';
			}

		}
		?>
    </div>
    <div class="job-form" style="background:#26292E">
    <div class="epic-subscription">
		
		<form action="auth_check.php" method="post">
	        <h2 class="form-signin-heading">Please sign in</h2>
	        <label></label>
                <input name="username" placeholder="Username" type="text">

            <label></label>
                <input name="password" placeholder="Password" type="password">

	        
	        <div class="field">
        	 	<input type="submit" id="register" value="LOGIN">
        	 		<label for="register" class="submit">
        	 			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 225.6 343.7" enable-background="new 0 0 225.6 343.7" class=" iconic-injected-svg js-svg-injected" data-src="images/9bbcc1a2.arrow-right.svg">
        	 				<path d="M31.1 271.5l97.9-99.8-98.1-96.4 33.4-35 132.2 131.5-132.6 131.9z">
        	 				</path>
        	 			</svg>
        	 		</label>
        	</div>

      	</form>
      	<?php 
			$message = 0;;if(isset($_GET['message'])){$message = $_GET['message'];}
			//Alert messages based on integers
			if($message == 1) {
				echo '
				<div class="alert">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>Invalid username or password</strong>
				  <a href="index.php">GO BACK</a>
				</div>
				';
			}
		?>
	  
	  </div>
	  </div>
       
		<?php 
		if(isset($_GET['register']))
		{
			if($_GET['register'] == 2)
			{
				echo '
				<div class="alert">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>username already exists!</strong> please choose another username
				</div>
				';
			}
			else if($_GET['register'] == 3)
			{
				echo '
				<div class="alert">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <strong>REGISTRATION UNSUCCESSFUL</strong>
				</div>
				';
			}

		}
		?>
		
    <script type="text/javascript">
		<!--
		var filter1 = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		var filter2 = /^[a-zA-Z ]+[a-zA-Z]$/;
		var filter3 = /^[0-9]+[0-9]$/;
		function validate()
		{
			if( document.myForm.full_name.value == "" )
		   {
		     alert( "Please provide your Name!" );
		     document.myForm.full_name.focus() ;
		     return false;
		   }
		   else if(!filter2.test(document.myForm.full_name.value))
		   {
		   	 alert( "Please provide a valid Name!" );
		   	 document.myForm.full_name.value = "";
		     document.myForm.full_name.focus() ;
		     return false;
		   }
		   else if( document.myForm.college.value == "" )
		   {
		     alert( "Please provide your College!" );
		     document.myForm.college.focus() ;
		     return false;
		   }
		   else if( document.myForm.email.value == "" )
		   {
		     alert( "Please provide your Email!" );
		     document.myForm.email.focus() ;
		     return false;
		   }
		    
		   else if(!filter1.test(document.myForm.email.value))
		   {
		   	 alert( "Please provide a valid Email!" );
		   	 document.myForm.email.value = "";
		     document.myForm.email.focus() ;
		     return false;
		   }
		   else if( document.myForm.phone.value == "" )
		   {
		     alert( "Please provide your mobile number!" );
		     document.myForm.phone.focus() ;
		     return false;
		   }
		   else if(!filter3.test(document.myForm.phone.value) || (document.myForm.phone.value.length < 10) || (document.myForm.phone.value.length > 14))
		   {
		     alert( "Please provide a valid mobile number!" );
		     document.myForm.phone.value = "";
		     document.myForm.phone.focus() ;
		     return false;
		   }
		   else if( document.myForm.username.value == "" )
		   {
		     alert( "Please provide your username!" );
		     document.myForm.username.focus() ;
		     return false;
		   }
		   else if( document.myForm.password1.value == "" )
		   {
		     alert( "Please provide your password!" );
		     document.myForm.password1.focus() ;
		     return false;
		   }
		   
		   else if( document.myForm.password2.value == "" )
		   {
		     alert( "Please re-type your password!" );
		     document.myForm.password2.focus() ;
		     return false;
		   }
		   else if(document.myForm.password1.value != document.myForm.password2.value)
		   {
		   	 alert( "Re-typed passwords do not match Re-type them again!" );
		   	 document.myForm.password1.value = "";
		   	 document.myForm.password2.value = "";
		     document.myForm.password1.focus() ;
		     return false;
		   }
		   
		   return( true );
		}
		//-->
	</script> 
	<script src="js/jquery-1.10.2.js"></script>
	<script src="js/jquery-ui.custom.min.js"></script>
	<script src="js/jquery.ui.autocomplete.js"></script>
	<script src="js/register.js"></script>
	</body>
</html>