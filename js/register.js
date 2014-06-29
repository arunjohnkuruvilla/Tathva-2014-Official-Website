$(function()
{  
		
	
	var college_xhr;
		$("#college_name").autocomplete({
		source: function( request, response ) {

				college_xhr = $.ajax({
					url: "college-list.php",
					dataType: "json",
					data: { "q": request.term },
					success: function (data) {
						if (!data.length)
							response( [{ id:"newcollege",label: "Click Here to add your college", value: "" }] );
						else{
							response( $.map( data, function( item ) {
								return { id: item.id, label: item.name, value: item.name }
							}));
						}
					},
					error: function (jqXHR, tStat) {
						response([{label: tStat, value: ""}]);
					}
				});
			},
		minLength: 1,
		select: function (event, ui) {
			if (ui.item) {
				clgid=ui.item.id;
				if(clgid == "newcollege")
				{
					addNewCollege();
					document.myForm.collegename.value = "";
				}
				else
				{
				document.myForm.collegeid.value = clgid;
				document.myForm.collegename.value = ui.item.label;
				return false;
				}
			}
		}
	});
		
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
