<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Completing InfoCard</title>
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
				$attachements = $_POST["attachements"];
				$link = $_POST["link"];
				$comment = $_POST["comment"];

				$sql = "UPDATE `tbl_requests` 
				SET `req_title` = '" . cleanString($title) .
				"', `req_approvers` = '" . cleanString($approvers) .
				"', `req_file` = '" . cleanString($file) .
				"', `req_link` = '" . cleanString($link) . 
				"', `req_attachements` = '" . cleanString($attachements) . 
				"', `req_comment` = '" . cleanString($comment) . 
				"', `req_status` = 3" . 
				" WHERE `req_id` = " . $id;

				if ($conn->query($sql) === TRUE) 
				{
					echo "<p>Record updated created successfully.</p>";
					
					/* email sender function */
					$sql = "SELECT `usr_mail` 
					FROM `tbl_users` 
					WHERE `usr_short` = '" . $owner . "'";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) 
					{
						while($row = $result->fetch_assoc()) 
						{
							$recipient = $row["usr_mail"];
						}
						
						require_once ("notification.php");
						
						$mailCaption = "MasterControl InfoCard completed";
						$mailBody = "
							<html>
							<head>
							  <title>" . $mailCaption . " </title>
							</head>
							<body>
							  <p>The MasterControl InfoCard " . $dhfname . " (ID: " . $id . ") has been completed.</p>
							  <p>Please go to the 
							  <a href='http://homqsrgqteam10.qiagen.ads/data/blueskies/list_completed.php'>list of completed InfoCards</a> 
							  to perform the upload of the file(s).</p>
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
		  
			<p>You may want to go to the <a href="list_completed.php">list of completed InfoCards</a> or <a href="display.php?id=<?php echo $id; ?>">view this request</a>.</p>
		</div>
      </div>
	</div>
	
  </div>
  
  <?php
	include ('footer.php');
  ?>
</body>
</html>
