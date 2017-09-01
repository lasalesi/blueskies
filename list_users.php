<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Users</title>
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
			<h1>List of users</h1>
			<p>The following people are registred in the MC Upload App.</p>
			<?php

				require_once ("database_connect.php");

				$sql = "SELECT * FROM `tbl_users` ORDER BY `usr_name`";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				echo "<table class='data'><tr><th class='data'>ID</th><th class='data'>Name</th><th class='data'>Email</th></tr>";
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
					echo "<tr><td class='data'>" . $row["usr_short"] . 
							"</td><td class='data'>" . $row["usr_name"] . 
							"</td><td class='data'>" . $row["usr_mail"] . 
							"</td></tr>";
							
				}
					echo "</table>";
				} 
				else {
					echo "There are no creators. Something went badly wrong!";
				}

				$conn->close();

			?> 

		</div>
      </div>
	</div>
	
  </div>
  
  <?php
	include ('footer.php');
  ?>
</body>
</html>
