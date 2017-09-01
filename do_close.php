<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Closing InfoCard</title>
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

	<?php
		include ('menubar.php');
	?>	
    
	<div id="site_content">		

		<?php
			include ('sidebar.php');
		?>	
	
	  <div id="content">
        <div class="content_item">
			<?php
				require_once ("database_connect.php");
				require_once ("functions.php");
				
				// get parameters using POST
				$id = $_POST["id"];
				$dhfname = $_POST["dhfname"];
				$title = $_POST["title"];
				$revision = $_POST["revision"];
				$author = $_POST["author"];
				$approvers = $_POST["approvers"];
				$owner = $_POST["owner"];
				$file = $_POST["file"];
				$link = $_POST["link"];
				$comment = $_POST["comment"];

				// unlock request
				unlockRequest($conn, $id);
				
				$sql = "UPDATE `tbl_requests` 
				SET `req_status` = 4" . 
				" WHERE `req_id` = " . $id;

				if ($conn->query($sql) === TRUE) 
				{
					echo "<p>Record updated created successfully.</p>";
					
					/* email sender function */
					$sql = "SELECT `usr_mail` 
					FROM `tbl_users` 
					WHERE `usr_short` = '" . $author . "'";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) 
					{
						while($row = $result->fetch_assoc()) 
						{
							$recipient = $row["usr_mail"];
						}
						
						require_once ("notification.php");
						
						$mailCaption = "MasterControl document uploaded";
						$mailBody = "
							<html>
							<head>
							  <title>" . $mailCaption . " </title>
							</head>
							<body>
							  <p>The MasterControl document " . $dhfname . " (ID: " . $id . ") has been uploaded.</p>
							  <p>Please go to the 
							  <a href='http://homqsrgqteam10.qiagen.ads/data/blueskies/list_closed.php'>list of closed InfoCards</a> 
							  for all closed records.</p>
							</body>
							</html>
							";

						
						notify($recipient, $mailCaption, $mailBody);
						
						echo "<p>Sent notification to " . $recipient . "</p>";
					}
				} 
				else 
				{
					echo "<p class='error'>Error: " . $sql . "</p>" . $conn->error;
				}

				$conn->close();
			
			?>
		  
			<p>You may want to go to the <a href="list_closed.php">list of closed InfoCards</a> or <a href="display.php?id=<?php echo $id; ?>">view this request</a>.</p>
		</div>
      </div>
	</div>
	
  </div>
  
  <?php
	include ('footer.php');
  ?>
</body>
</html>
