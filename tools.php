<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Tools</title>
  <meta name="description" content="MasterControl upload web application" />
  <meta name="keywords" content="MasterControl Upload" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>
  <div id="main">
	<?php
		include ('header.php');
	?>

	<div id="menubar">
      <ul id="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="new_request.php">New request</a></li>
        <li><a href="list_requests.php">Requested</a></li>
        <li><a href="list_created.php">Created</a></li>
        <li><a href="list_completed.php">Completed</a></li>
		<li><a href="list_closed.php">Closed</a></li>
      </ul>
    </div>	
    
	<div id="site_content">		

		<?php
			include ('sidebar.php');
		?>	
	
	  <div id="content">
        <div class="content_item">
			<h1>This page contains some tools.</h1>
			<h2>Statistics</h2>
			<p><a href="http://homqsrgqteam10.qiagen.ads/data/blueskies/dailyrequests.php">Daily requests of the last 3 months</a></p>
			<p><a href="http://homqsrgqteam10.qiagen.ads/data/blueskies/top10authors.php">Authors with most documents</a></p>
			
			<h2>Database</h2>
			<p><a href="http://homqsrgqteam10.qiagen.ads/data/blueskies/list_creatorrevisors.php">List of creator/revisors</a></p>
			<p><a href="http://homqsrgqteam10.qiagen.ads/data/blueskies/list_users.php">List of users</a></p>
		</div>
      </div>
	</div>
	
  </div>
  
  <?php
	include ('footer.php');
  ?>
</body>
</html>
