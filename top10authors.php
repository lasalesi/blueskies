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
        <li><a href="index.php">Home</a></li>
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
	 
	  <div id="content">
        <div class="content_item">
		  
			<h1>This page shows the top 10 authors</h1>

			<?php
			
				$sql = "SELECT * FROM `top10authors`";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				echo "<table class='data'><tr><th class='data'>Author</th><th class='data'>Documents</th></tr>";
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
					echo "<tr><td class='data'>" . $row["Author"] . 
						"</td><td class='data'>" . $row["Requests"] . 
						"</tr>";					
				}
					echo "</table>";
				} 
				else {
					echo "There was an error in the author ranking view. Please ask your admin.";
				}

				$conn->close();				
			?>
		  
			<p>In the top 10, the distribution is as follows. <img src="plot/top10authors_plot.php" alt="Plot Image" /></p>
		  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content--> 
    	
  </div><!--close main-->
  
  <?php
	include ('footer.php');
  ?>  
  
</body>
</html>
