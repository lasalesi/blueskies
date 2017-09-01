<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Display</title>
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

			 // load parameter value for id
			 $id = $_GET["id"];
			 
			 // echo "ID is " . $id;

			 $sql = "SELECT * FROM `tbl_requests` WHERE `req_id` = " . $id;
			 $result = $conn->query($sql);

			 if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$author = $row["req_author"];
					$dhfname = $row["req_dhfname"];
					$title = $row["req_title"];
					$comment = $row["req_comment"];;
					$approvers = $row["req_approvers"];
					$file = $row["req_file"];
					$link = $row["req_link"];
					$revision = $row["req_revision"];
					$owner = $row["req_owner"];
					$state_id = $row["req_status"];
					$attachements = $row["req_attachements"];
					$locked = $row["req_locked"];
				}
			 } 
			 else {
				echo "<p class='error'>Invalid record.</p>";
			 }
			
			$sql = "SELECT * FROM `tbl_states` WHERE `state_id` = " . $state_id;
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$status = $row["state_name"];
				}
			} 
			else {
				echo "<p class='error'>Status engine error</p>";
			}
			 
			$conn->close();
			
			?>
		  
		  	<h1>Display item # <?php echo $id; ?></h1>
			
			<table class="data">
				<tr><td class="data">ID</td><td class="data"><?php echo $id; ?></td></tr>
				<tr><td class="data">Status</td><td class="data"><?php echo $status; ?></td></tr>
				<tr><td class="data">DHF name</td><td class="data"><?php echo $dhfname; ?></td></tr>
				<tr><td class="data">Title</td><td class="data"><?php echo $title; ?></td></tr>
				<tr><td class="data">Revision</td><td class="data"><?php echo $revision; ?></td></tr>
				<tr><td class="data">Author</td><td class="data"><?php echo $author; ?></td></tr>
				<tr><td class="data">Approver(s)</td><td class="data"><?php echo $approvers; ?></td></tr>
				<tr><td class="data">Owner</td><td class="data"><?php echo $owner; ?></td></tr>
				<tr><td class="data">Main file</td><td class="data"><?php echo $file; ?></td></tr>
				<tr><td class="data">Attachement(s)</td><td class="data"><?php echo $attachements; ?></td></tr>
				<tr><td class="data">Link(s)</td><td class="data"><?php echo $link; ?></td></tr>
				<tr><td class="data">Comment</td><td class="data"><?php echo $comment; ?></td></tr>
			</table>
			<p></p>
			<p>Click <a href="edit.php?id=<?php echo $id; ?>">here</a> if you want to edit this entry.</p>
			<?php
			if ($locked != "")
			{
				echo "<p>This item is locked. <a href='do_unlock.php?id=" . $id . "'><img src='images/lock_break.png' /> remove lock</a><p>";
			}
			?>
			<p>
		</div>
      </div>
	</div>
	
  </div>
  
  <?php
	include ('footer.php');
  ?>
</body>
</html>
