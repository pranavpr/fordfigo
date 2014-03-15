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
  

  
/*

// The YQL query to get the webdesigntuts+ summary posts from feedburner

$yqlurl = "https://query.yahooapis.com/v1/public/yql?q=";
$yqlurl .= urlencode("select * from feed where url='http://code.tutsplus.com/posts.atom' LIMIT 10");
$yqlurl .= "&format=json";
 
$yqlfeed = file_get_contents($yqlurl, true);  
$yqlfeed = json_decode($yqlfeed);

// The YQL query to get the webdesigntuts+ posts from feedburner - We need this for the comments count only
$yqlurl2 = "https://query.yahooapis.com/v1/public/yql?q=";
$yqlurl2 .= urlencode("select * from feed where url='http://code.tutsplus.com/posts.atom' LIMIT 10");
$yqlurl2 .= "&format=json";
 
$yqlfeed2 = file_get_contents($yqlurl2, true);  
$yqlfeed2 = json_decode($yqlfeed2);


// The YQL query to get the webdesigntuts+ categories.
$yqlurl3 = "https://query.yahooapis.com/v1/public/yql?q=";
$yqlurl3 .= urlencode("SELECT category FROM feed WHERE url='http://code.tutsplus.com/posts.atom' LIMIT 10");
$yqlurl3 .= "&format=json";
 
$yqlfeed3 = file_get_contents($yqlurl3, true);  
$yqlfeed3 = json_decode($yqlfeed3);




//Make a call to the facebook graph api and decode the json to collect the number of likes from the webdesigntuts+ facebook page

$json_url ='https://graph.facebook.com/webdesigntutsplus';
$json = file_get_contents($json_url);
$json_output = json_decode($json);
$likes = 0;
if($json_output->likes){
$likes = $json_output->likes;
}*/

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
            <li><a href=".tab1">Posts</a></li>
            <li><a href=".tab2">About</a></li>
            <li><a href=".tab3">Write For Us</a></li>
             <li><a href=".tab4">Other Blogs</a></li>
         </ul>

<div class="tab_container">
    <div class="tab_content tab1">

	
			 <div class="post">
<?php
# This function reads your DATABASE_URL configuration automatically set by Heroku
# the return value is a string that will work with pg_connect
function pg_connection_string() {
  return "dbname=d56jl9rpuri4us host=ec2-184-73-194-196.compute-1.amazonaws.com port=5432 user=bsegsbwhqrwkvt password=SluOhNXZ9yUxlQaHOtt_8muJCN sslmode=require";
}
 
# Establish db connection
$db = pg_connect(pg_connection_string());
if (!$db) {
    echo "Database connection error.";
    exit;
}
echo "Success";
$result = pg_query($db, "select * from Persons");
?>
            </div><!--End Blog Post-->
		
    </div><!--End Tab 3-->
    
    <div class="tab_content tab2">
    
    <h3>About</h3>
    
    <p>Webdesigntuts+ is a blog made to house and showcase some of the best web design tutorials and articles around. We publish tutorials that not only produce great results and interfaces, but explain the techniques behind them in a friendly, approachable manner.</p>
    
    <p>Web design is a booming industry with a lot of competition. We hope that reading Webdesigntuts+ will help our readers learn a few tricks, techniques and tips that they might not have seen before and help them maximize their creative potential!</p>
    
    <p><strong>Webdesigntuts+ is part of the Tuts+ Network</strong></p>
		

    
    </div><!--End Tab 2 -->
    
    <!--<div class="tab_content tab3">

     <h3>Write For Us</h3>
    
    <p>If you have an idea for an article or tutorial, we’d love to hear about it!</p>
<p><strong>What’s in it for you?</strong> We pay great rates for all content that gets approved and published ($100 – $400*)… we’ll even post a link to your site, an image of you, and a short bio. If good karma, good money, and good exposure aren’t enough to tempt you, we don’t know what is!</p>

<p>We’ll even help promote your products if you’re an author on one of the Envato marketplaces!</p>
<p><em>* Payment rates depend on the topic, depth, quality, and type of content; For example: complete design tutorials pay more than short articles, and we’ll gladly let you know what how much we can offer for your idea if you pitch it to us.</em><p>


    
    
    </div><!--End Tab 3 -->
    
     <!--<div class="tab_content tab4">

     <h3>Other Blogs</h3>
     
     <p><strong>Webdesigntuts+ is part of the Tuts+ Network. Here's some of our other blogs</strong></p>
     
     <a href="http://psd.tutsplus.com/" target="_blank">psdtuts+</a>
     <p>Adobe Photoshop is a fantastically powerful program and there are a million ways to do anything, we hope that reading Psdtuts+ will help our readers learn a few tricks, techniques and tips that they might not have seen before and help them maximize their creative potential!</p>
     <a href="http://net.tutsplus.com/" target="_blank">nettuts+</a>
     <p>Nettuts+ is a site aimed at web developers and designers offering tutorials and articles on technologies, skills and techniques to improve how you design and build websites. We cover HTML, CSS, Javascript, CMS’s, PHP and Ruby on Rails.</p>
     <a href="http://vector.tutsplus.com/" target="_blank">vectortuts+</a>
     <p>Vectortuts+ is a blog of tutorials, articles, freebies and more on all things vector! We publish tutorials on techniques and effects to make awesome vector graphics in programs like Adobe Illustrator and Inkscape.</p>
     <a href="http://audio.tutsplus.com/" target="_blank">audiotuts+</a>
     <p>Audiotuts+ is a blog for musicians, producers and audio junkies! We feature tutorials on the tools and techniques to record, produce, mix and master tracks. We also feature weekly articles for the music obsessive. </p>
     <a href="http://ae.tutsplus.com/" target="_blank">aetuts+</a>
     <p>Aetuts+ is a site made to house and showcase some of the best After Effects tutorials around. We publish tutorials that not only produce great effects, but explain them in a friendly, approachable manner. We also stock up links to tutorials, articles, presets and plugins from around the web to help you get the most out of After Effects.</p>
     <a href="http://active.tutsplus.com/" target="_blank">activetuts+</a>
     <p>Activetuts+ — named for the awsomely interactive stuff it will teach you to create — is a site aimed at designers and developers, offering tutorials, tips and articles to improve your skills at creating browser-based games and apps. We publish tutorials that not only produce great graphics and effects, but explain in a friendly, approachable manner, covering Flash, Unity, Silverlight and HTML5.</p>
     <a href="http://cg.tutsplus.com/" target="_blank">cgtuts+</a>
     <p>Cgtuts+ is a source of learning on all aspects of computer graphics. We pump out regular tutorials on Maya, 3Ds Max, Cinema 4D, ZBrush, Blender, Mudbox and more. We cater to beginner, intermediate and advanced CG artists.</p>
     <a href="http://photo.tutsplus.com/" target="_blank">phototuts+</a>
     <p>Phototuts+ is a source of learning on all aspects of photography. We pump out regular tutorials on composition, equipment settings, post-processing, film photography, retouching and much more. If you love photography, you will find a treasure trove of useful advice at Phototuts+.</p>
     <a href="http://mobile.tutsplus.com/" target="_blank">mobiletuts+</a>
     <p>Mobiletuts+ is all about quality tutorials for mobile developers – all mobile developers. Topics will include native development with the iPhone, Android, Windows and Blackberry platforms, cross-platform development with tools like Appcelerator and Phone Gap, and techniques for building mobile accessible web sites with HTML 5.</p>
     <a href="http://wp.tutsplus.com/" target="_blank">wptuts+</a>
     <p>Wptuts+ is a site dedicated to teaching people how to use WordPress, develop widgets, plugins and themes, successfully scale sites, find interesting WordPress resources, and build a freelance business around the platform. Over 25 million people have chosen WordPress to power the place on the web they call “home”, and it’s by far and away the most successful blogging platform online.</p>
    </div><!--End Tab 4 -->

    
</div>
    
       
    
    
    </div><!--End Main Content-->
    
    <!--<div class="sidebar">
    
            <form action="" method="get">
            <input name="search" class="search" placeholder="Filter webdesigntuts+ posts">
            </form>
            
            <div class="line"></div>
            
            <span class="likesCount"><?php echo $likes;?></span>
            <p>People like webdesigntuts+</p>
            
                <div class="tabHeader">Hi <?php echo $user_profile['name']; ?></div>
            
            <img class="profileimage" name="" src="https://graph.facebook.com/<?php echo $user; ?>/picture" width="50" height="50" alt="">
            
            <p>We're glad you stopped by at webdesigntuts+. We hope you enjoy our blog</p>
            
            <div class="tabHeader">webdesigntuts+</div>
            
            <a class="button left" href="http://webdesign.tutsplus.com/" target="_blank"><span class="buttonimage left"></span>Website</a>
            <div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#appId=253432341349745&amp;xfbml=1"></script><fb:like href="http://apps.facebook.com/fbtuttts" layout="button_count" width="90" show_faces="true" action="like" font="lucida grande"></fb:like>
           <a class="button right" href="<?php echo $logoutUrl; ?>"><span class="buttonimage left"></span>Logout</a>
            
        
            <div class="tabHeader">Categories on webdesigntuts+</div>
            

            
            <div class="tabHeader">A Little Bit About Us</div>
            
            <p>Webdesigntuts+ is a blog made to house and showcase some of the best web design tutorials and articles around. We publish tutorials that not only produce great results and interfaces, but explain the techniques behind them in a friendly, approachable manner. <a href="http://webdesign.tutsplus.com/about-us/" target="_blank">Read more</a></p>
            
            <div class="tabHeader">This series</div>
            
            <p>Part of the <a href="#">Design & Code an Integrated Facebook App</a> series by <a href="http://www.aaronlumsden.com" target="_blank">Aaron Lumsden</a> for  <a href="http://webdesign.tutsplus.com/" target="_blank" >webdesigntuts+</a></p>
            
          
    
    
    </div>--><!--End Sidebar-->


</div><!--End Wrapper -->


</body>
</html>

<?php  
} else {
  $loginUrl = $facebook->getLoginUrl(array('redirect_uri' => $fbconfig['appUrl']));
  print "<script type='text/javascript'>top.location.href = '$loginUrl';</script>";
}

?>
