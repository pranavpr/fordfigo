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
<script type="text/javascript">
function getRandomComment () {
     var randpid = Math.floor((Math.random()*10)+1);
    $.ajax({
        url: '/get.php',
        type: 'POST',
        dataType: 'json',
        data: {pid: randpid}
    })
    .done(function(data) {
        $("#comments").html(data);
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
}
jQuery(document).ready(function($) {
    setInterval( getRandomComment, 30000 );
    // variable to hold request
    var request;
    $("#myform").submit(function(event){
    // abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var $form = $(this);
    // let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");
    // serialize the data in the form
    var serializedData = $form.serialize();

    // let's disable the inputs for the duration of the ajax request
    $inputs.prop("disabled", true);

    // fire off the request to /form.php
    $.ajax({
        url: '/submit.php',
        type: 'POST',
        data: serializedData
    })
    .done(function(result) {
        if(result == 'Success'){
            $form.css({
                display: 'none'
            });
            $("#result").html("Thanks for sharing your experience.");
            $("#result").css({
                display: 'block'
            });
        }
        else{
            $form.css({
                display: 'none'
            });
            $("#result").html("Oh! Something went wrong.");
            $("#result").css({
                display: 'block'
            });
        }
    })
    .fail(function() {
        $form.css({
                display: 'none'
            });
            $("#result").html("Oh! Something went wrong.");
            $("#result").css({
                display: 'block'
            });
    })
    .always(function() {
        $inputs.prop("disabled", false);
    });
    // prevent default posting of form
    event.preventDefault();
});
});
</script>
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
<form name="input" id="myform" method="post">
<textarea name="comment" rows="4" cols="50">
Tell us about your Figo experience.
</textarea><br/>
<input type="hidden" name="fbid" value=<?php echo $user_profile['id']; ?>><br/>
<input type="hidden" name="name" value=<?php echo $user_profile['name']; ?>><br/>
<input type="submit" value="Submit">
</form>
<div id='result' style="display:none;"></div>
<div id='comments'>
</div>
            </div>
    </div><!--End Tab 1-->
    
    <div class="tab_content tab2">
    
    <h3>Upload your image.</h3>
<form action="upload.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br/><br/>
<input type="submit" name="submit" value="Submit">
</form>


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
