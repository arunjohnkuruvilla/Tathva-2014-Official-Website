// magic.js

$(document).ready(function() {

	// process the signup form
	$('#signupForm').submit(function(event) {
		$('.form-input').removeClass('has-error'); // remove the error class
		// get the form data
		var formData = {
			'name'					: $('#signup-name').val(),
			'phone'					: $('#signup-phone').val(),
			'email'					: $('#signup-email').val(),
			'username' 				: $('#signup-username').val(),
			'college'				: $('#collegeid').val(),
			'password1' 			: $('#signup-pass1').val(),
			'password2'				: $('#signup-pass2').val()
		};
		// process the form
		$.ajax({
			type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
			url 		: 'rsignup.php', // the url where we want to POST
			data 		: formData, // our data object
			dataType 	: 'json', // what type of data do we expect back from the server
			encode 		: true
		})
			.done(function(data) {
				console.log(data); 
				//response to login 
				updateSignUp(data);
				
			})

			.fail(function(data) {
				//console.log(data);
			});
		// stop the form from submitting the normal way and refreshing the page
		event.preventDefault();
	});

	// process the signup form
	$('#signin-form').submit(function(event) {
		$('.form-input').removeClass('has-error'); // remove the error class
		// get the form data
		var formData = {
			'username' 				: $('#signin-username').val(),
			'password' 				: $('#signin-password').val(),
		};
		// process the form
		$.ajax({
			type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
			url 		: 'rsignin.php', // the url where we want to POST
			data 		: formData, // our data object
			dataType 	: 'json', // what type of data do we expect back from the server
			encode 		: true
		})
			.done(function(data) {
				console.log(data); 
				//response to login 
				updateSignIn(data);
				
			})

			.fail(function(data) {
				//console.log(data);
			});
		// stop the form from submitting the normal way and refreshing the page
		event.preventDefault();
	});

});


//function to update panel after login
function updateSignIn(data)
{
	if (data.formIncomplete) {
					
		// handle errors for username ---------------
		if (data.errors.username) {
			$('#signin-username').addClass('has-error'); // add the error class to show red input
		}
		// handle errors for password ---------------
		if (data.errors.password) {
			$('#signin-password').addClass('has-error'); // add the error class to show red input
		}

	} 
	else if(! data.success){
		$("#signin-username").val("");
		$("#signin-password").val("");
		$('#signin-form').append('<p>Invalid Username/Password combination</p>');
	}
	else
	{
		$('#signin-form').empty();
		resetPanels();
		$('#login-panel').hide('slide', {direction: 'down'}, 1000,function() {
			$('#menu-nav').append('<li><a id="button1" idstyle="font-size:1.5em">&#9776;</a></li>');
			$('#menu-nav').append('<li><a>' + data.message.username + '</a></li>');
				$('#menu-nav').append('<li><a href="logout.php">LOG OUT</a></li>');
		});
		$('#menu-nav').empty();
	}
}

//function to update panel after register
function updateSignUp(data) {
	if (data.formIncomplete) {
		
		// handle errors for name ---------------
		if (data.errors.name) {
			$('#signup-name').addClass('has-error'); // add the error class to show red input
		}			
		// handle errors for name ---------------
		if (data.errors.phone) {
			$('#signup-phone').addClass('has-error'); // add the error class to show red input
		}
		// handle errors for name ---------------
		if (data.errors.email) {
			$('#signup-email').addClass('has-error'); // add the error class to show red input
		}
		// handle errors for name ---------------
		if (data.errors.college) {
			$('#collegename').addClass('has-error'); // add the error class to show red input
		}
		// handle errors for name ---------------
		if (data.errors.username) {
			$('#signup-username').addClass('has-error'); // add the error class to show red input
		}
		// handle errors for email ---------------
		if (data.errors.password1) {
			$('#signup-pass1').addClass('has-error'); // add the error class to show red input
		}
		// handle errors for email ---------------
		if (data.errors.password2) {
			$('#signup-pass2').addClass('has-error'); // add the error class to show red input
		}

	} 
	else if(! data.success){
		//$("#signin-username").val("");
		//$("#signin-password").val("");
		//$('#signin-form').append('<p>sorry Registeration Failed...Please try again</p>');
		alert('Registeration unsuccessfull');
	}
	else
	{
		alert("Registeration successfull");
		/*$('#signin-form').empty();
		resetPanels();
		$('#login-panel').hide('slide', {direction: 'down'}, 1000,function() {
			$('#menu-nav').append('<li><a id="button1" idstyle="font-size:1.5em">&#9776;</a></li>');
			$('#menu-nav').append('<li><a>' + data.message.username + '</a></li>');
				$('#menu-nav').append('<li><a href="logout.php">LOG OUT</a></li>');
		});
		$('#menu-nav').empty();*/
	}
	
}

//function to reset the login panel after signin or signup
function resetPanels()
{
  currLeft.hide('slide', {direction: 'up'}, 1000);
  currRight.hide('slide', {direction: 'up'}, 1000);
  $('#signup-overlay').show();
  $('#signin-overlay').show();
  panelVisible = 1;
}
    $(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

//autocomplete for college list...have to complete new college addition part
    $( "#collegename" ).autocomplete({
      	source: function( request , response ){
      		$.ajax({
      			type: "GET",
      			url:"collegeList.php",
      			dataType: "json",
      			data: {"q":request.term},
      			success: function(data){
      				if(!data.length) {
      					response( [{ label: "No matches!", value: "",id:"0" }] );
      				}
      				else {
      					response( $.map( data, function( item ) {
							return { id: item.id, label: item.label, value: item.value }
						}));
      				}
      			},
      			error: function (jqXHR, tStat) {
						response([{label: tStat, value: "",id:"-1"}]);
				} 

      		});
      	},
      	minLength: 1,
      	select: function(event, ui){
      		if(ui.item.id == 0) {
      			alert("hi");
      		}
      		else {
      		document.signupForm.collegeid.value = ui.item.id;
      		alert(document.signupForm.collegeid.value);
      		}
      	}
    });