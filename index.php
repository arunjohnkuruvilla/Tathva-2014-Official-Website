<?php 
    $username = '';
    $name = '';
        session_start();
        if (isset($_SESSION['login']))
        {
            $username = $_SESSION['username'];
            $name = $_SESSION['name'];
            $id = $_SESSION['tat_id'];
            $loginMenu = '
                        <li><a id="button1" idstyle="font-size:1.5em">&#9776;</a></li>
                        <li><a>'.$name.'</a></li>
                        <li><a href="logout.php">Log out</a></li>';
        }
        else
        {
            $loginMenu = '<li><a id="login-button">Register/Login</a></li>';
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

    .has-error
    {
      background: red !important;
    }
    </style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
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


<!-- Font Icons -->
<link href="css.fonts.css" rel="stylesheet">

<!-- Shortcodes -->
<link href="css/shortcodes.css" rel="stylesheet">
<link href="css/autocomplete.css" rel="stylesheet">

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
           <div class="row">
        <div class="span9">
        
          <form id="contact-form" class="contact-form" action="#">
              <p class="contact-name">
                <input id="contact_name" type="text" placeholder="Full Name" value="" name="name">
                </p>
                <p class="contact-email">
                  <input id="contact_email" type="text" placeholder="Email Address" value="" name="email">
                </p>
            </form>
        </div>   
      </div>
          </div>
       
      </div>

      <div id="login-panel">
        <div id="signup-overlay" class="halfpanel">
          <span>REGISTER</span>
        </div> 
        <div id="signin-overlay" class="halfpanel">
          <span>LOGIN</span>
        </div> 
        <div id="signup-left" class="halfpanel">
          <form id="signupForm" name="signupForm" class="signup-form">
              <p>
                <input id="signup-name" type="text" class="form-input" placeholder="Name" value="" name="name">
                <input id="signup-phone" type="text" class="form-input" placeholder="Phone number" value="" name="phonenumber">
              </p>
              <p>
                <input id="signup-email" type="text" class="form-input" placeholder="Email" value="" name="email">
                <input id="signup-username" type="text" class="form-input" placeholder="Username" value="" name="username">
                
              <p >
                <input id="collegename" type="text" class="form-input" placeholder="College" name="collegename" style="width:50%"/>
                <input id="collegeid" type="hidden" class="form-input" name="collegeid"/>
              </p>
              <br>
              <p>
                <input id="signup-pass1" type="password" class="form-input" placeholder="Password" value="" name="pass1">
                <input id="signup-pass2" type="password" class="form-input" placeholder="Retype Password" value="" name="pass2">
              </p>
                <p >
                  <input id="signup" type="submit" class="submit" value="REGISTER" name="signup">
                </p>
            </form>
        </div> 
        <div id="signup-right" class="halfpanel">
          LOGIN
        </div> 
        <div id="signin-left" class="halfpanel">
          <form id="forgot-form" class="forgot-form" action="#">
              <p>
                Forgot your password? Enter your username and we will email your password to your registered email id. Thank you.
              </p>
              <p>
                <input id="forgot-username" type="text" placeholder="Username" value="" name="username">
              </p>
               <p>
              <input id="forgot" type="submit" class="submit" value="GET PASSWORD" name="forgot">
            </p>
            </form>
        </div>
        <div id="signin-right" class="halfpanel">
         
            <form id="signin-form" class="signin-form">
            <p>
              <input id="signin-username" class="form-input" type="text" name="username" placeholder="Username">
            </p>
            <p>
              <input id="signin-password" class="form-input" type="text" name="password" placeholder="Password">
            <p>
              <input id="signin" type="submit" class="submit" value="LOGIN" name="signin">
            </p>
            </form>
        </div>
      </div>
<!-- Homepage Slider -->
<div id="home-slider">	
    

	<video class="fullscreen fill" width="1920" height="1080" autoplay loop muted="muted" style="object-fit: contain;width: 100%; height: 723.375px;position: absolute;top: 0;left: 0;z-index: -9;">
        <source src="video/august_video_04.mp4" type="video/mp4; codecs=&quot;avc1.42E01E, mp4a.40.2&quot;"><source src="video/august_video_04.ogv" type="video/ogg">
        <source src="video/august_video_04.webmhd.webm" type="video/webm">
    </video>
    <form name="myform" style="margin-top: 0px;">
    <!--BEGIN CONTENT-->
        <div id="container"><canvas width="100%" height="100%" id="tathvarotate"></canvas></div> 
    </form>
<div class="bmenu">
                            <ul>
                                
                                <li id="wheels"><a href="#">WHEELS</a></li>
                                <li id="aavishkaar"><a href="#">AAVISHKAAR</a></li>
                                <li id="clueless"><a href="#">CLUELESS</a></li>
                                <li id="bullsandbears"><a href="#">BULLS&nbsp&nbspAND&nbsp&nbspBEARS</a></li>
                                <li id="perspective"><a href="#">PERSPECTIVE</a></li>
                                <li id="android"><a href="#">ANDROID APP</a></li>
                            </ul>
                        </div>
	<div class="control-nav">
        <nav id="menu" style="float:left;margin-left: 50px;">
            <ul id="menu-nav">
                <?php echo $loginMenu; ?>
            </ul>

        </nav>
        <nav id="menu" style="float:right;margin-left: 50px;">
            <ul id="menu-nav">
                <li><a href="schedule.php">Schedule</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="sponsor.php">Sponsors</a></li>
            </ul>
        </nav>
        
        <a id="nextsection" href="#navigation"><i class="font-icon-arrow-simple-down"></i></a>
    </div>
</div>
<!-- End Homepage Slider -->

<!-- Header -->
<header class="navbar" id="navigation">
    <div class="sticky-wrapper" style="height: 50px;"><div class="sticky-nav">
        
        
        
        <nav id="menu">
        	<ul id="menu-nav">
                <li class=""><a href="#services">general Info</a></li>
            </ul>
        </nav>
        
    </div></div>
</header>
<!-- End Header -->

<div id="highlights" class="page-alternate">
  <div class="container">
      <!-- Title Page -->
      <div class="row">
          <div class="span12">
              <div class="title-page">
                  <h2 class="title">Highlights</h2>
                  <h3 class="title-description">Learn About our Team &amp; Culture.</h3>
                  <div class="ui-widget">

<div class="ui-widget">
  <label for="tags">Tags: </label>
  <input id="tags">
</div>
 
</div>

                   
                  <div class="page-description">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sed ligula odio. Sed id metus felis. Ut pretium nisl non justo condimentum id tincidunt nunc faucibus. 
                      Ut neque eros, pulvinar eu blandit quis, lacinia nec ipsum. Etiam vel orci ipsum. Sed eget velit ipsum. Duis in tortor scelerisque felis mattis imperdiet. Donec at libero tellus. 
                      <a href="http://themes.alessioatzeni.com/html/chakra/dark/index.html#">Suspendisse consectetur</a> consectetur bibendum. Pellentesque posuere, ligula volutpat elementum interdum, diam arcu elementum ipsum, vel ultricies est mauris ut nisi.</p>
                  </div>
                  
              </div>
          </div>
      </div>
      <!-- End Title Page -->
      
      
  </div>
</div>

<!-- Our Work Section -->
<div id="events" class="page">
	<div class="container">
    	<!-- Title Page -->
        <div class="row">
            <div class="span12">
                <div class="title-page">
                    <h2 class="title">Events</h2>
                    
                    <h3 class="title-description">Check Out Our Projects on <a href="http://themes.alessioatzeni.com/html/chakra/dark/index.html#">Dribbble</a>.</h3>
                    
                    <div class="page-description">
                		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sed ligula odio. Sed id metus felis. Ut pretium nisl non justo condimentum id tincidunt nunc faucibus. 
                		Ut neque eros, pulvinar eu blandit quis, lacinia nec ipsum. Etiam vel orci ipsum. Sed eget velit ipsum. Duis in tortor scelerisque felis mattis imperdiet. Donec at libero tellus. 
                		<a href="http://themes.alessioatzeni.com/html/chakra/dark/index.html#">Suspendisse consectetur</a> consectetur bibendum. Pellentesque posuere, ligula volutpat elementum interdum, diam arcu elementum ipsum, vel ultricies est mauris ut nisi.</p>
                	</div>
                
                </div>    
            </div>
        </div>
        <!-- End Title Page -->
        
        <!-- Portfolio Projects -->
        
        <!-- End Portfolio Projects -->
    </div>
</div>
<!-- End Our Work Section -->

<!-- About Section -->
<div id="about" class="page-alternate">
<div class="container">
    <!-- Title Page -->
    <div class="row">
        <div class="span12">
            <div class="title-page">
                <h2 class="title">Workshops & Exhibitions</h2>
                <h3 class="title-description">Learn About our Team &amp; Culture.</h3>
                
                <div class="page-description">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sed ligula odio. Sed id metus felis. Ut pretium nisl non justo condimentum id tincidunt nunc faucibus. 
                    Ut neque eros, pulvinar eu blandit quis, lacinia nec ipsum. Etiam vel orci ipsum. Sed eget velit ipsum. Duis in tortor scelerisque felis mattis imperdiet. Donec at libero tellus. 
                    <a href="http://themes.alessioatzeni.com/html/chakra/dark/index.html#">Suspendisse consectetur</a> consectetur bibendum. Pellentesque posuere, ligula volutpat elementum interdum, diam arcu elementum ipsum, vel ultricies est mauris ut nisi.</p>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End Title Page -->
    
    
</div>
</div>
<!-- End About Section -->

<!-- Big Blockquote -->
<div id="nites" class="page">
    <div class="container">
        <!-- Title Page -->
        <div class="row">
            <div class="span12">
                <div class="title-page">
                    <h2 class="title">Nites</h2>
                    <h3 class="title-description">Check Out Our Projects on <a href="http://themes.alessioatzeni.com/html/chakra/dark/index.html#">Dribbble</a>.</h3>
                    
                    <div class="page-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sed ligula odio. Sed id metus felis. Ut pretium nisl non justo condimentum id tincidunt nunc faucibus. 
                        Ut neque eros, pulvinar eu blandit quis, lacinia nec ipsum. Etiam vel orci ipsum. Sed eget velit ipsum. Duis in tortor scelerisque felis mattis imperdiet. Donec at libero tellus. 
                        <a href="http://themes.alessioatzeni.com/html/chakra/dark/index.html#">Suspendisse consectetur</a> consectetur bibendum. Pellentesque posuere, ligula volutpat elementum interdum, diam arcu elementum ipsum, vel ultricies est mauris ut nisi.</p>
                    </div>
                
                </div>    
            </div>
        </div>
        <!-- End Title Page -->
        
        <!-- Portfolio Projects -->
        
        <!-- End Portfolio Projects -->
    </div>
</div>
<!-- End Big Blockquote -->

<!-- Services Section -->
<div id="lectures" class="page-alternate">
<div class="container">
    <!-- Title Page -->
    <div class="row">
        <div class="span12">
            <div class="title-page">
                <h2 class="title">Lectures</h2>
                <h3 class="title-description">The key to a successful network operation is to provide high quality services.</h3>
                
                <div class="page-description">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sed ligula odio. Sed id metus felis. Ut pretium nisl non justo condimentum id tincidunt nunc faucibus. 
                    Ut neque eros, pulvinar eu blandit quis, lacinia nec ipsum. Etiam vel orci ipsum. Sed eget velit ipsum. Duis in tortor scelerisque felis mattis imperdiet. Donec at libero tellus. 
                    <a href="http://themes.alessioatzeni.com/html/chakra/dark/index.html#">Suspendisse consectetur</a> consectetur bibendum. Pellentesque posuere, ligula volutpat elementum interdum, diam arcu elementum ipsum, vel ultricies est mauris ut nisi.</p>
                </div>
                
            </div>
        </div>
    </div>

    
</div>
</div>
<!-- End Services Section -->

<!-- Google Map -->

<!-- End Google Map -->

<!-- Contact Section -->
<div id="services" class="page">
<div class="container">
    <!-- Title Page -->
    <div class="span12">
                <h2 class="title">General Info</h2>
                <div class="tabbable">
                
                    <div class="tabs">
        
       <div class="tab">
           <input type="radio" id="tab-1" name="tab-group-1" checked="">
           <label for="tab-1">Tab One</label>
           
           <div class="content">
               <p>Stuff for Tab One</p>
           </div> 
       </div>
        
       <div class="tab">
           <input type="radio" id="tab-2" name="tab-group-1">
           <label for="tab-2">Tab Two</label>
           
           <div class="content">
               <p>Stuff for Tab Two</p>
               
               <img src="http://placekitten.com/200/100">
           </div> 
       </div>
        
        <div class="tab">
           <input type="radio" id="tab-3" name="tab-group-1">
           <label for="tab-3">Tab Three</label>
         
           <div class="content">
               <p>Stuff for Tab Three</p>
               
               <img src="">
           </div> 
       </div>
        
    </div>
                         

                </div>
                
            </div>
      
</div>
</div>
<!-- End Contact Section -->


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


         <script src="js/jquery-1.9.1.min.js"></script>
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>

<script type="text/javascript" src="js/login.js"></script>

<script src="Canvas - Particles Text_files/Three.js" type="text/javascript"></script>
        <script src="Canvas - Particles Text_files/RequestAnimationFrame.js" type="text/javascript"></script>
        <script src="Canvas - Particles Text_files/Tween.js" type="text/javascript"></script>
        <script src="Canvas - Particles Text_files/Sparks.js" type="text/javascript"></script>

        <!-- load the font file from canvas-text -->
        <script src="Canvas - Particles Text_files/helvetiker_regular.typeface.js" type="text/javascript"></script>
        <script src="Canvas - Particles Text_files/fontastique.js" type="text/javascript"></script>
        
        <script type="text/javascript" src="js/tathvaRotate.js"></script>
        <script type="text/javascript" src="magic.js"></script>
        <script>
 
    

  </script>
</body></html>