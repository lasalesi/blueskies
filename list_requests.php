<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Requested InfoCards</title>
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
        <li class="current"><a href="list_requests.php">Requested</a></li>
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
			<h1>List of requested InfoCards</h1>
			<p>These documents wait for an InfoCard to be created by a <b>creator/revisor</b>.</p>
			<?php

				require_once ("database_connect.php");

				$sql = "SELECT * FROM `tbl_requests` WHERE `req_status` = 1";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				echo "<table class='data'><tr><th class='data'>ID</th><th class='data'>Author</th><th class='data'>DHF name</th><th class='data'>Comment</th><th class='data'>Approvers</th><th class='data'>Process</th></tr>";
				// output data of each row
				while($row = $result->fetch_assoc()) 
				{
					echo "<tr><td class='data'><a href='display.php?id=" . $row["req_id"]. "'>" . $row["req_id"] . "</a>" . 
							"</td><td class='data'>" . $row["req_author"] . 
							"</td><td class='data'>" . $row["req_dhfname"] . 
							"</td><td class='data'>" . $row["req_comment"] . 
							"</td><td class='data'>" . $row["req_approvers"] . 
							"</td>";
							
					if ($auth_user_iscreator)
					{
						if ($row["req_locked"] != "")
						{
							echo "<td class='data'><img src='images/lock.png' alt='Locked' title='Locked by " . $row["req_locked"] . "' /> ";
						}
						else
						{
							echo "<td class='data'><a href='proc_created.php?id=" . $row["req_id"]."'>Process</a> ";
						}
					}
					else
					{
						echo "<td class='data'>";
					}
					
					echo "<a href='display.php?id=" .$row["req_id"]."'>Display</a></td></tr>";
				}
					echo "</table>";
				} 
				else {
					echo "There are no items. Have a nice day!";
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
