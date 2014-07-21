//alert($('#home-slider').offset().top);
//alert($('#highlights').offset().top);
var currLeft;
var currRight;
var panelVisible = 0;
var selectionMade = 0;
/*$('#button1').click(function() {
  $.ajax("profile-details.php", 
    {
      dataType: "json",
      success: fillProfile,
      error: function(){salert("Something went wrong!");}
    });
  $('#dashbar-panel').slideToggle('fast');
});
*/

$('#login-button').hover(function () {
  //if(panelVisible == 0)
  //{
    //panelVisible = 1;
    //$('#login-panel').show('slide', {direction: 'down'}, 1000);
  //}
  /*else
  {
    if(selectionMade){
      resetPanels();
    }
    $('#login-panel').slideToggle('slow');
  }*/
});
$('#login-panel').mouseleave(function() {
  if(selectionMade){
      //resetPanels();
    }
    //$('#login-panel').hide('slide', {direction: 'down'}, 1000);

});



$('#signin-overlay').click(function() {
    $('#signin-left').addClass('overlayToShow',function() {
      $('#signin-right').addClass('overlayToShow',function() {
        $('#signup-overlay').hide('slide', {direction: 'up'}, 1000);
        $('#signin-overlay').hide('slide', {direction: 'down'}, 1000);
        currLeft = $('#signin-left');
        currRight = $('#signin-right');
        selectionMade = 1;
    });
  });
});

$('#signup-overlay').click(function() {
    $('#signup-left').addClass('overlayToShow',function() {
      $('#signup-right').addClass('overlayToShow',function() {
        $('#signup-overlay').hide('slide', {direction: 'up'}, 1000);
        $('#signin-overlay').hide('slide', {direction: 'down'}, 1000);
        currLeft = $('#signup-left');
        currRight = $('#signup-right');
        selectionMade = 1;
    });
  });
});
$(function() {
  if ($(window).scrollTop() > $('#highlights').offset().top-100) {
        $('.navbar').css('position', 'fixed');
        $('.navbar').css('top', '0');
    }
});

    $(window).scroll(function () {
    winHeight = $(window).height();
    if ($(window).scrollTop() > $('#highlights').offset().top-100) {
        $('.navbar').css('position', 'fixed');
        $('.navbar').css('top', '0');
    }
    else if($(window).scrollTop() < $('#highlights').offset().top) {
        $('.navbar').css('position', 'absolute');
        $('.navbar').css('top', 'auto');
        $('.navbar').css('bottom', '0');
    }
});
function fillProfile(d)  //tat_id: "", name: "", college: "", phone: "", email: "", events: []
{
  $("#usid").html("<span class=\"grey\">Tathva ID : </span>TAT"+d['tat_id']);
  $("#uscollege").html("<span class=\"grey\">College: </span>"+d['college']);
  $("#usphone").html("<span class=\"grey\">Phone: </span>"+d['phone']);
  $("#usmail").html("<span class=\"grey\">Email: </span>"+d['email']);
  myevents=d['events'];
  if(myevents[0]['team_id'] != '')
    {
    $("#usersevents").html("<div id=\"eventhead\"></div>");
    $.each(myevents, function(i, item) 
    {
        $("#usersevents").append("<div class=\"profileevent\"><div class=\"everight\" id=\"t"+i+"\"></div><div class=\"eveleft\">"+item.eventname+"</div><div class=\"eveleft\">"+item.eventcode+""+item.team_id+"</div></div>");
        mymates=myevents[i]['mates'];
        $.each(mymates, function(j, itema) 
      {
        var teammateid = 10000 + itema.tat_id;
        $("#t"+i).append(itema.name+" - TAT"+teammateid+"<br>");
        }); 
      });
    }
    else
    {
      salert("123");
    }
}
/*$("#signin").submit(function(event){
    var name = $("#signin-username").val();  
    var password = $("#signin-password").val();  
    if (name == "") { 
      //alert("Please Enter Username") ; 
      $("#signin-username").focus();  
       
    }  
    else if (password == "") {  
      //alert("Please Enter Password") ;  
      $("input#password").focus();  
      return false;  
    } 
    else {
      var formData = {
      'name'        : name,
      'password'       : password,
    };

    // process the form
    $.ajax({
      type    : 'POST', // define the type of HTTP verb we want to use (POST for our form)
      url     : 'rsignin.php', // the url where we want to POST
      data    : formData, // our data object
      dataType  : 'json', // what type of data do we expect back from the server
                        encode          : true
    })
      // using the done promise callback
      .done(function(data) {

        // log data to the console so we can see
        console.log(data); 

        // here we will handle errors and validation messages
      });

    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
    }
    return false;  
}); 

function updateLogIn()
{
  alert("hi");
  //$('#pre-login-menu').hide();
  //$('#post-login-menu').show();
  resetPanels();
  $('#login-panel').slideToggle('slow');
}   
*/