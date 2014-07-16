$(function()
{  
		
	
	
		
	/*$("#college_overshadow").bind("click",function()
		{
				$("#college_overshadow").html("").hide();
				$("#college_name").val("").show();
		})
		$("#new_college_details form").submit(function () {
		$.ajax("/rnewclg.php", {
			dataType: "json",
			data: { "newclg": $("#ncname").val() },
			type: "POST",
			success: function (data) {
				if (data[0] == 1) {
					
					salert("College successfully added!");
$("#clgwrap").fadeOut();
				} else {
					salert("Sorry, something went wrong! If the problem persists, contact Event Coordinator.");
$("#clgwrap").fadeOut();
					
				}
			},
			error: function (jqXHR, textStatus) {
					salert("Sorry, something went wrong! If the problem persists, contact Event Coordinator.");
					$("#clgwrap").fadeOut();
			}
		});
		return false;
	});

	*/
});
function addNewCollege(){
	$('#newcollege').slideToggle('slow');
	$("#addcollege").submit(function () {
		$.ajax("/rnewclg.php", {
			dataType: "json",
			data: { "newclg": $("#newcollegename").val() },
			type: "POST",
			success: function (data) {
				if (data[0] == 1) {
					
					alert("College successfully added!");
					document.myForm.collegeid.value = data[1];
					document.myForm.collegename.value = data[2];
					$('#newcollege').slideToggle('slow');
				}
				else {
					alert("Sorry");
					$('#newcollege').slideToggle('slow');
					//$("#clgwrap").fadeOut();
				}
			},
			error: function (jqXHR, textStatus) {
				salert("Sorry, something went wrong! If the problem persists, contact Event Coordinator.");
				$('#newcollege').slideToggle('slow');
				//$("#clgwrap").fadeOut();
			}
		});
		return false;
	});
}
