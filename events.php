<?php 
    include ('initdb.php');
    $username = '';
    $name = '';
        session_start();
        if (isset($_SESSION['login']))
        {
            $username = $_SESSION['username'];
            $name = $_SESSION['name'];
            $id = $_SESSION['tat_id'];
            $loginMenu = '
                        <li><a id="button1" idstyle="font-size:1.5em" data-effect="st-effect-11">&#9776;</a></li>
                        <li><a>'.$name.'</a></li>
                        <li><a href="logout.php">Log out</a></li>';
        }
        else
        {
            $loginMenu = '<li><a href="login.php">Register/Login</a></li>';
        }

?>
<!DOCTYPE html>
<html lang="en-US"><!--<![endif]-->
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<!-- Meta Tags -->
<style>
    .tabs {
      position: relative;   
      min-height: 200px; /* This part sucks */
      clear: both;
      margin: 25px 0;
    }
    .tab {
      float: left;
    }
    .tab label {
      background: #DE5E60; 
      padding: 10px; 
      margin-right: 10px;
      position: relative;
      z-index: 1000; 
      color: white;
    }
    .tab [type=radio] {
      display: none;   
    }
    .content {
      position: absolute;
      top: 45px;
      left: 0;
      background: white;
      right: 0;
      bottom: 0;
      padding: 20px;
      border: 1px solid #ccc; 
      
      overflow: hidden;
    }
    .content > * {
      opacity: 0;
      
      -webkit-transform: translate3d(0, 0, 0);
    
      -webkit-transform: translateX(-100%);
      -moz-transform:    translateX(-100%);
      -ms-transform:     translateX(-100%);
      -o-transform:      translateX(-100%);
      
      -webkit-transition: all 0.6s ease;
      -moz-transition:    all 0.6s ease;
      -ms-transition:     all 0.6s ease;
      -o-transition:      all 0.6s ease;
    }
    [type=radio]:checked ~ label {
      background: #DE5E60;
      z-index: 2;
    }
    [type=radio]:checked ~ label ~ .content {
      z-index: 1;
    }
    [type=radio]:checked ~ label ~ .content > * {
      opacity: 1;
      
      -webkit-transform: translateX(0);
      -moz-transform:    translateX(0);
      -ms-transform:     translateX(0);
      -o-transform:      translateX(0);
    }
    </style>

<title></title>   

<meta name="description" content=""> 

<!-- Mobile Specifics -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="HandheldFriendly" content="true">
<meta name="MobileOptimized" content="320">   

<!-- Mobile Internet Explorer ClearType Technology -->
<!--[if IEMobile]>  <meta http-equiv="cleartype" content="on">  <![endif]-->

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Main Style -->
<link href="css/main.css" rel="stylesheet">

<!-- Supersized -->

<link rel="stylesheet" type="text/css" href="css/eventmenu.css" />
<script src="js/modernizr.custom.js"></script>
<!-- Font Icons -->
<link href="css.fonts.css" rel="stylesheet">

<!-- Shortcodes -->
<link href="css/shortcodes.css" rel="stylesheet">

<!--
<link href="http://themes.alessioatzeni.com/html/chakra/dark/_include/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://themes.alessioatzeni.com/html/chakra/dark/_include/css/responsive.css" rel="stylesheet">
-->

<!-- Google Font -->
<link href="css/css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/sidebar.css">

<!-- Fav Icon -->

<!-- Modernizr -->

<body>


      <div id="dashbar-panel">
        
          <div class="span4" style="height:400px;background:green">
            <div id="loggedin-profile">
              <div id=""></div>
              <div id="profile"><span class="grey">Profile</span></div>
              <div id="usid" class="inprofile" style="cursor:default"></div><br/>
              <div id="uscollege" class="inprofile" style="cursor:default"></div><br/>
              <div id="usphone" class="inprofile" style="cursor:default"></div><br/>
              <div id="usmail" class="inprofile" style="cursor:default"></div><br/>
              
          </div>
          </div>
          <div class="span6" style="height:400px;background:red;">
            <div id="usevents" style="cursor:default">
                <div id="usersevents">
                  <div id="noevent" class="profileevent">No events registered!</div>
                </div>
            </div>
          </div>
          <div class="span6" style="height:400px;background:blue;">
            <button type="button" class="close" data-dismiss="modal"></button>
          </div>
       
      </div>
<!-- Homepage Slider -->
<div id="home-slider">	
    

	
    <form name="myform" action="">
    <!--BEGIN CONTENT-->
        <div id="container"><canvas width="100%" height="100%"></canvas></div> 
    </form>
<div id="ac_background" class="ac_background">
              <img class="ac_bgimage" src="images/image8.jpg" alt="Background"/>
              <div class="ac_overlay"></div>
              <div class="ac_loading"></div>
            </div>
            <div id="ac_content" class="ac_content">
              <div class="ac_menu">
              <?php 
                $query1="SELECT name,cat_id FROM `event_cats` WHERE `par_cat`='1' ORDER BY FIELD(cat_id, 10, 9, 8, 7, 5) DESC";
                  $result1=$mysqli->query($query1);
                  echo "<ul style='padding-left:0px;margin-top: 50px;'>";
                  while($row1=$result1->fetch_assoc())
                  {
                  echo'
                  <li>
                    <a href="images/MainCourse.jpg">'.$row1['name'].'</a>
                    <div class="ac_subitem">
                      <span class="ac_close"></span>
                      <h2>'.$row1['name'].'</h2>
                      <ul>';
                  $catid=$row1['cat_id'];
                  $query2="SELECT code,name FROM `events` WHERE `cat_id`='$row1[cat_id]'";
                  $result2=$mysqli->query($query2);
                  while($row2=$result2->fetch_assoc())
                  {
                    $name=str_replace(' ', '_', $row2['name']);
                    echo "<li class='showEvent' id='".$row2['code']."'>".$row2['name']."</li>";
                  }
                  $result2->free();
                  echo "</ul>
                    </div>
                  </li>";
                  }
                  $result1->free();
                  echo "</ul>";
              ?>
                
              </div>
              
            </div>
	<div class="control-nav">
        <nav id="menu" style="float:left;margin-left: 50px;">
            <ul id="menu-nav">
                <?php echo $loginMenu;?>
            </ul>
        </nav>
        
    </div>
</div>
<!-- End Homepage Slider -->

<!-- Header -->
<header class="navbar" id="navigation" style="position:fixed;top:0;">
    <div class="sticky-wrapper" style="height: 60px;"><div class="sticky-nav">
        
        
        
        <nav id="menu" style="float:left !important;margin-left:30px">
        	<ul id="menu-nav" >
                <li><a href="#services">workshops</a></li>
            </ul>
        </nav>
        
    </div></div>
</header>
<!-- End Header -->

<!-- Footer -->
<footer>
	<p class="credits">©2014 CREATIVE@TATHVA.ORG</p>
</footer>
<!-- End Footer -->

<!-- Back To Top -->
<a id="back-to-top" href="http://themes.alessioatzeni.com/html/chakra/dark/index.html#">
	<i class="font-icon-arrow-simple-up"></i>
</a>
<!-- End Back to Top -->
<!-- Js -->

         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script type="text/javascript">
//alert($('#home-slider').offset().top);
//alert($('#highlights').offset().top);

$('#button1').click(function() {
  $.ajax("/profile-details.php", 
    {
      dataType: "json",
      success: fillProfile,
      error: function(){salert("Something went wrong!");}
    });
  $('#dashbar-panel').slideToggle('fast');
});

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
    $(window).scroll(function () {
    winHeight = $(window).height();
    if ($(window).scrollTop() > $('#highlights').offset().top) {
        $('.navbar').css('position', 'fixed');
        $('.navbar').css('top', '0');
    }
    else if($(window).scrollTop() < $('#highlights').offset().top) {
        $('.navbar').css('position', 'relative');
        $('.navbar').css('top', '0');
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

    

</script>


<script src="Canvas - Particles Text_files/Three.js" type="text/javascript"></script>
        <script src="Canvas - Particles Text_files/RequestAnimationFrame.js" type="text/javascript"></script>
        <script src="Canvas - Particles Text_files/Tween.js" type="text/javascript"></script>
        <script src="Canvas - Particles Text_files/Sparks.js" type="text/javascript"></script>

        <!-- load the font file from canvas-text -->
        <script src="Canvas - Particles Text_files/helvetiker_regular.typeface.js" type="text/javascript"></script>
        <script src="Canvas - Particles Text_files/fontastique.js" type="text/javascript"></script>
        
<script type="text/javascript" src="js/eventsRotate.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/eventmenu.js"></script>
</body></html>