<?php

require 'fb/src/facebook.php';

$fbconfig['appUrl'] = "https://apps.facebook.com/fordfigo"; 

// Create An instance of our Facebook Application.
$facebook = new Facebook(array(
  'appId'  => '1415412362043226',
  'secret' => '81845af92074433af04fa5b350948fc9',
  'cookies' => 'true',
));

// Get the app User ID
$user = $facebook->getUser();

if ($user) {
	  try {
		// If the user has been authenticated then proceed
		$user_profile = $facebook->api('/me');
	  } catch (FacebookApiException $e) {
		error_log($e);
		$user = null;
	  }
}

// If the user is authenticated then generate the variable for the logout URL
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Ford Figo</title>

<link rel="stylesheet" type="text/css" href="https://yui.yahooapis.com/3.3.0/build/cssreset/reset-min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script src="https://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
<script src="js/myjava.js" type="text/javascript"></script>
</head>

<body>
<!--Resize Iframe-->
<script src="https://connect.facebook.net/en_US/all.js"></script>
<script>

 FB.Canvas.setAutoResize(7);

 </script>
 <!-- End Resize Iframe-->
<div class="wrapper">

	<div class="maincontent">
    
    	<div class="logo"><img src="images/figo.png" width="353" height="160" alt="webdesigntuts+ logo"></div>
        
        <ul class="tabs">
            <li><a href=".tab1">Tell Us</a></li>
            <li><a href=".tab2">Show Us</a></li>
         </ul>

<div class="tab_container">
    <div class="tab_content tab1">

	
			 <div class="post">
<form name="input" action="submit.php" method="post">
<textarea name="comment" rows="4" cols="50">
Tell us about your Figo experience.
</textarea><br/>
<input type="hidden" name="fbid" value="<?php $user_profile->id ?>">
<input type="hidden" name="name" value="<?php $user_profile->name ?>">
<input type="submit" value="Submit">
</form>
            </div><!--End Blog Post-->
		
    </div><!--End Tab 1-->
    
    <div class="tab_content tab2">
    
    <h3>About</h3>
    
    <p>Webdesigntuts+ is a blog made to house and showcase some of the best web design tutorials and articles around. We publish tutorials that not only produce great results and interfaces, but explain the techniques behind them in a friendly, approachable manner.</p>
    
    <p>Web design is a booming industry with a lot of competition. We hope that reading Webdesigntuts+ will help our readers learn a few tricks, techniques and tips that they might not have seen before and help them maximize their creative potential!</p>
    
    <p><strong>Webdesigntuts+ is part of the Tuts+ Network</strong></p>

    </div>
    
</div>
    </div><!--End Main Content-->
</div><!--End Wrapper -->


</body>
</html>

<?php  
} else {
  $loginUrl = $facebook->getLoginUrl(array('redirect_uri' => $fbconfig['appUrl']));
  print "<script type='text/javascript'>top.location.href = '$loginUrl';</script>";
}

?>
