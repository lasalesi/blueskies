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
				SET `req_dhfname` = '" . cleanString($dhfname) .
				"', `req_title` = '" . cleanString($title) .
				"', `req_revision` = '" . cleanString($revision) . 
				"', `req_author` = '" . cleanString($author) . 
				"', `req_approvers` = '" . cleanString($approvers) .
				"', `req_owner` = '" . cleanString($owner) .
				"', `req_file` = '" . cleanString($file) .
				"', `req_attachements` = '" . cleanString($attachements) . 
				"', `req_link` = '" . cleanString($link) . 
				"', `req_comment` = '" . cleanString($comment) . 
				"' WHERE `req_id` = " . $id;

				if ($conn->query($sql) === TRUE) {
					echo "<p>Record updated created successfully.</p>";
				} else {
					echo "<p class='error'>Error: " . $sql . "</p>" . $conn->error;
				}

				$conn->close();
			
			?>
		  
			<p>Go back to the <a href="display.php?id=<?php echo $id ?>">display page</a>.</p>
		</div>
      </div>
	</div>
	
  </div>
  
  <?php
	include ('footer.php');
  ?>
</body>
</html>
