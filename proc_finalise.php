<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Finalise InfoCard</title>
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
			
			if (isset($_GET["id"]))
			{
				 // load parameter value for id
				 $id = $_GET["id"];
				 
				 // echo "ID is " . $id;
				 // lock this item
				 lockRequest($conn, $id, $auth_user_id);
					 
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
						$attachements = $row["req_attachements"];
						$link = $row["req_link"];
						$revision = $row["req_revision"];
						$owner = $row["req_owner"];
						$state_id = $row["req_status"];
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
			}
			else
			{
				echo "Parameter not found.";
			}
			?>
		  
		  	<h1>Finalise upload for <?php echo $dhfname; ?></h1>
			<p>Please upload below contents and confirm the completion.</p>
			<form action="do_close.php" method="post"> 
			<table>
				<tr class="entry">
					<td>ID</td>
					<td><input type="text" name="id" readonly maxlength="6" value="<?php echo $id; ?>" class="readonly" /> </td>
					<td><i>Database ID for this request</i></td>
				</tr>
				<tr class="entry">
					<td>Status</td>
					<td><input type="text" name="status" readonly maxlength="20" value="<?php echo $status; ?>" class="readonly" /> </td>
					<td><i>Workflow status</i></td>
				</tr>
				<tr class="entry">
					<td>DHF name</td>
					<td><input type="text" name="dhfname" readonly maxlength="50" value="<?php echo $dhfname; ?>" class="readonly" /></td>
					<td><i>Name of the InfoCard</i></td>
					</tr>
				<tr class="entry">
					<td>Title</td>
					<td><input type="text" name="title" readonly maxlength="100" value="<?php echo $title; ?>" class="readonly" /> </td>
					<td><i>Document title</i></td>
				</tr>
				<tr class="entry">
					<td>Revision</td>
					<td><input type="text" name="revision" readonly maxlength="2" value="<?php echo $revision; ?>" class="readonly" /></td>
					<td><i>Revision</i></td>
				</tr>
				<tr class="entry">
					<td>Author</td>
					<td><input type="text" name="author" readonly maxlength="4" value="<?php echo $author; ?>" class="readonly" /></td>
					<td><i>Author's initials</i></td>
				</tr>
				<tr class="entry">
					<td>Approver(s)</td>
					<td><input type="text" name="approvers" readonly maxlength="256" value="<?php echo $approvers; ?>" class="readonly" /></td>
					<td><i>Full name (see approval matrix; semicolon-separated)</i></td>
				</tr>
				<tr class="entry">
					<td>Creator/revisor</td>
					<td><input type="text" name="owner" readonly maxlength="10" value="<?php echo $owner; ?>" class="readonly" /></td>
					<td><i>Owner's initials</i></td>
				</tr>
				<tr class="entry">
					<td>Main file</td>
					<td><textarea name="file" cols="50" rows="5" readonly maxlength="3000" class="readonly"><?php echo $file; ?></textarea></td>
					<td><i>Main file link (refer to <a href="http://homqiapedia01.qiagen.ads/qiapedia/CopyPath" target="_blank">CopyPath</a>; semicolon-separated)</i></td>
				</tr>
				<tr class="entry">
					<td>Attachement(s)</td>
					<td><textarea name="file" cols="50" rows="5" readonly maxlength="3000" class="readonly"><?php echo $attachements; ?></textarea></td>
					<td><i>Optional. Paste attachement file links (refer to <a href="http://homqiapedia01.qiagen.ads/qiapedia/CopyPath" target="_blank">CopyPath</a>; semicolon-separated)</i></td>
				</tr>
				<tr class="entry">
					<td>Link(s)</td>
					<td><textarea name="link" cols="50" rows="5" readonly maxlength="3000" class="readonly"><?php echo $link; ?></textarea></td>
					<td><i>Optional. Infocard names to link to. (semicolon-separated)</i></td>
				</tr>
				<tr class="entry">
					<td>Comment</td>
					<td><textarea name="comment" cols="50" rows="5" readonly maxlength="3000" class="readonly"><?php echo $comment; ?></textarea></td>
					<td><i>Optional. Any comments.</i></td>
				</tr>
			</table>
			
			<p><strong>Note: only click save if you are a creator/revisor and have uploaded this InfoCard!</strong></p>
				<!-- <button type="reset">Reset</button>  -->
			<p><button type="submit">Confirm</button> </p>
				
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
