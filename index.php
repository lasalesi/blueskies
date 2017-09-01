<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>MasterControl Upload</title>
  <meta name="description" content="MasterControl upload web application" />
  <meta name="keywords" content="MasterControl Upload" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/image_slide.js"></script>
</head>

<body>
  <div id="main">
	<?php
		include ('header.php');
	?>

	<div id="menubar">
      <ul id="menu">
        <li class="current"><a href="index.php">Home</a></li>
        <li><a href="new_request.php">New request</a></li>
        <li><a href="list_requests.php">Requested</a></li>
        <li><a href="list_created.php">Created</a></li>
        <li><a href="list_completed.php">Completed</a></li>
		<li><a href="list_closed.php">Closed</a></li>
      </ul>
    </div><!--close menubar-->	
    
	<div id="site_content">		

		<?php
			include ('sidebar.php');
		?>
	
	  <div class="slideshow">
	    <ul class="slideshow">
          <li class="show"><img width="680" height="250" src="images/home_1.jpg" alt="&quot;The sky is the limit&quot;" /></li>
          <li><img width="680" height="250" src="images/home_2.jpg" alt="&quot;The best solutions are often the simple ones&quot;" /></li>
        </ul>
      </div>	  	 
	 
	  <div id="content">
        <div class="content_item">
		  
			<h1>This workflow follows the following steps:</h1>
			<ul>
				<li>The <b>requester</b> fills the <a href="new_request.php">request form</a>.</li>
				<li>The new request appears in the <a href="list_requests.php">list of requests</a>, 
				where it is picked up by a <b>creator/revisor</b>.</li>
				<li>The <b>creator/revisor</b> picks the request, creates a new InfoCard and processes 
				the request to the new status <i>created</i>, where it is listed in the 
				<a href="list_created.php">list of created InfoCards</a>.</li>
				<li>As soon as the content is ready, the <b>requester</b> picks the InfoCard from the 
				<a href="list_created.php">list of created InfoCards</a> and fills all remaining field. 
				The task move to the <a href="list_completed.php">list of completed requests</a> and has the status <i>completed</i>.</li>
				<li>The <b>creator/revisor</b> now picks the completed request from 
				<a href="list_completed.php">list of completed requests</a>, completes the InfoCard closes the task. 
				The task is now <i>closed</i>.</li>
			</ul>
		  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content--> 
    
	<!-- 
	<div id="content_bottom">
	  <div class="content_bottom_container_box">
		<h4>Latest Blog Post</h4>
	    <p> Phasellus laoreet feugiat risus. Ut tincidunt, ante vel fermentum iaculis.</p>
		<div class="readmore">
		  <a href="#">Read more</a>
		</div>
	  </div>
      <div class="content_bottom_container_box">
       <h4>Latest News</h4>
	    <p> Phasellus laoreet feugiat risus. Ut tincidunt, ante vel fermentum iaculis.</p>
	    <div class="readmore">
		  <a href="#">Read more</a>
		</div>
	  </div>
      <div class="content_bottom_container_boxl">
		<h4>Latest Projects</h4>
	    <p> Phasellus laoreet feugiat risus. Ut tincidunt, ante vel fermentum iaculis.</p>
	    <div class="readmore">
		  <a href="#">Read more</a>
		</div>	  
	  </div>      
	  <br style="clear:both"/>
    </div>   
	-->
	
  </div><!--close main-->
  
  <?php
	include ('footer.php');
  ?>  
  
</body>
</html>
