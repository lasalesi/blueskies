<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Closed InfoCards</title>
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
		<li class="current"><a href="list_closed.php">Closed</a></li>
      </ul>
    </div>	
    
	<div id="site_content">		

		<?php
			include ('sidebar.php');
		?>	
	
	  <div id="content">
        <div class="content_item">
			<h1>List of closed InfoCards</h1>
			<?php

				require_once ("database_connect.php");

				$sql = "SELECT * FROM `tbl_requests` WHERE `req_status` = 4 ORDER BY `req_datetime` DESC LIMIT 200";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				/* echo "<table class='data'><tr><th class='data'>ID</th><th class='data'>Author</th><th class='data'>DHF name</th><th class='data'>Title</th><th class='data'>Approvers</th><th class='data'>Creator/Revisor</th><th class='data'>Process</th></tr>"; */
				echo "<table class='data'><tr><th class='data'>ID</th><th class='data'>Author</th><th class='data'>DHF name</th><th class='data'>Title</th><th class='data'>Process</th></tr>";
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr><td class='data'><a href='display.php?id=" . $row["req_id"]. "'>" . $row["req_id"] . "</a>" .
						"</td><td class='data'>" . $row["req_author"] . 
						"</td><td class='data'>" . $row["req_dhfname"] . 
						/* "</td><td class='data'>" . $row["req_comment"] . */
						"</td><td class='data'>" . $row["req_title"] .
						/* "</td><td class='data'>" . $row["req_approvers"] . */
						/* "</td><td class='data'>" . $row["req_owner"] . */
						"</td><td class='data'><a href='proc_reset.php?id=" . $row["req_id"]."'>Reset</a> <a href='display.php?id=" .$row["req_id"]."'>Display</a></td></tr>";
				}
					echo "</table>";
				} 
				else {
					echo "There are no items. Have a nice day!";
				}

				$conn->close();

			?> 
			<p><i>Latest 200 entries shown.</i></p> 
		</div>
      </div>
	</div>
	
  </div>
  
  <?php
	include ('footer.php');
  ?>
</body>
</html>
