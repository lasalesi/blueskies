<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Edit</title>
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
					$attachements = $row["req_attachements"];				}
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
		  
		  	<h1>Edit item # <?php echo $id; ?></h1>
			<p>Only do this if you know what you are doing. With great power comes great responsibility.</p>
			<form action="do_update.php" method="post"> 
			<table class="data">
				<tr class="entry">
					<td class="data">ID</td>
					<td class="data"><input type="text" name="id" readonly maxlength="6" value="<?php echo $id; ?>" class="readonly"/> </td>
				</tr>
				<tr class="entry">
					<td class="data">Status</td>
					<td class="data"><input type="text" name="status" readonly maxlength="20" value="<?php echo $status; ?>" class="readonly"/> </td>
				</tr>
				<tr class="entry">
					<td class="data">DHF name</td>
					<td class="data"><input type="text" name="dhfname" maxlength="50" value="<?php echo $dhfname; ?>"/></td>
				</tr>
				<tr class="entry">
					<td class="data">Title</td>
					<td class="data"><input type="text" name="title" maxlength="100" value="<?php echo $title; ?>"/> </td>
				</tr>
				<tr class="entry">
					<td class="data">Revision</td>
					<td class="data"><input type="text" name="revision" maxlength="2" value="<?php echo $revision; ?>"/></td>
				</tr>
				<tr class="entry">
					<td class="data">Author</td>
					<td class="data"><input type="text" name="author" maxlength="4" value="<?php echo $author; ?>"/></td>
				</tr>
				<tr class="entry">
					<td class="data">Approver(s)</td>
					<td class="data"><input type="text" name="approvers" maxlength="256" value="<?php echo $approvers; ?>"/></td>
				</tr>
				<tr class="entry">
					<td class="data">Owner</td>
					<td class="data"><input type="text" name="owner" maxlength="4" value="<?php echo $owner; ?>"/></td>
				</tr>
				<tr class="entry">
					<td class="data">Main file</td>
					<td class="data"><textarea name="file" cols="50" rows="5" maxlength="3000"><?php echo $file; ?></textarea></td>
				</tr>
				<tr class="entry">
					<td class="data">Attachement(s)</td>
					<td class="data"><textarea name="attachements" cols="50" rows="5" maxlength="3000"><?php echo $attachements; ?></textarea></td>
				</tr>
				<tr class="entry">
					<td class="data">Link(s)</td>
					<td class="data"><textarea name="link" cols="50" rows="5" maxlength="3000"><?php echo $link; ?></textarea></td>
				</tr>
				<tr class="entry">
					<td class="data">Comment</td>
					<td class="data"><textarea name="comment" cols="50" rows="5" maxlength="3000"><?php echo $comment; ?></textarea></td>
				</tr>
			</table>
			
				<button type="reset">Reset</button> 
				<button type="submit">Save</button> 
				<a href="display.php?id=<?php echo $id ?>">Go back to display</a>
				
			</form>
		</div>
      </div>
	</div>
	
  </div>
  
  <?php
	include ('footer.php');
  ?>
</body>
</html>
