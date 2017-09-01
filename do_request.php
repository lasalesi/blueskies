<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Creating request</title>
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

				if ((isset($_POST["dhfname"])) && (isset($_POST["title"])))
				{
					// get parameters using POST
					$dhfname = $_POST["dhfname"];
					$title = $_POST["title"];
					$revision = $_POST["revision"];
					$author = $_POST["author"];
					$approvers = $_POST["approvers"];
					$file = $_POST["file"];
					$attachements = $_POST["attachements"];
					$link = $_POST["link"];
					$comment = $_POST["comment"];
					$fasttrack = $_POST["fasttrack"];
					
					if ($fasttrack)
					{
						$fasttrack_int = 1;
					}
					else
					{
						$fasttrack_int = 0;
					}
					$sql = "INSERT INTO `tbl_requests` 
					(`req_datetime`, `req_author`, `req_dhfname`, `req_title`, `req_file`, `req_status`, 
					 `req_comment`, `req_approvers`, `req_owner`, `req_revision`, `req_link`, `req_attachements`, `req_fasttrack`) 
					VALUES ('" . date('Y-m-d H:i:s') . "', '" . cleanString($author) . "', '" .
					cleanString($dhfname) . "', '" . cleanString($title) . "', '" . cleanString($file) . "', 1, '" . cleanString($comment) . 
					"', '" . cleanString($approvers) . "', '', '". cleanString($revision) . "', '". cleanString($link) . "', '" . cleanString($attachements) . 
					"', " . $fasttrack_int . ");";

					if ($conn->query($sql) === TRUE) 
					{
						echo "<p>New record created successfully.</p>";
						
						/* email sender function */
						$sql = "SELECT `usr_mail` 
						FROM `tbl_creators` 
						INNER JOIN `tbl_users`
						ON `tbl_creators`.`crt_user` = `tbl_users`.`usr_short`";
						$result = $conn->query($sql);
						$recipient = "";
						$recipients = "";
						if ($result->num_rows > 0) 
						{
					
							require_once ("notification.php");
							
							$mailCaption = "New MasterControl request";
							$mailBody = "
								<html>
								<head>
								  <title>" . $mailCaption . " </title>
								</head>
								<body>
								  <p>There is a new MasterControl document request available.</p>
								  <p>Please go to the 
								  <a href='http://homqsrgqteam10.qiagen.ads/data/blueskies/list_requests.php'>list of requests</a>.</p>
								</body>
								</html>
								";

							while($row = $result->fetch_assoc()) 
							{
								$recipient = $row["usr_mail"];
								notify($recipient, $mailCaption, $mailBody);
								
								$recipients .= $row["usr_mail"] . ", ";
							}
							$recipients = substr($recipients, 0, -2);	// crop trailing comma and space
							
							
							echo "<p>Sent notification to " . $recipients . "</p>";
						}
					} 
					else 
					{
						echo "<p class='error'>Error: " . $sql . "</p>" . $conn->error;
					}
					
					$conn->close();
				}
				else
				{
					echo "<p>No parameters found. Please fill in the <a href='new_request.php'>request form</a></p>";
				}
			?>
		  
			<p>You may want to <a href="new_request.php">create a new request</a> or look at the
			<a href="list_requests.php">list of requested InfoCards</a>.</p>
		</div>
      </div>
	</div>
	
  </div>
  
  <?php
	include ('footer.php');
  ?>
</body>
</html>
