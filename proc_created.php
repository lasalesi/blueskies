<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Create InfoCard</title>
  <meta name="description" content="MasterControl upload web application" />
  <meta name="keywords" content="MasterControl Upload" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  
  <script>
  function validateForm() {
    var v1 = document.forms["myForm"]["dhfname"].value;
    if (v1 == null || v1 == "") {
        alert("DHF name must be filled out");
        return false;
    }
	var v2 = document.forms["myForm"]["title"].value;
    if (v2 == null || v2 == "") {
        alert("Title must be filled out");
        return false;
    }
	var v3 = document.forms["myForm"]["revision"].value;
    if (v3 == null || v3 == "") {
        alert("Revision must be filled out");
        return false;
    }
	var v4 = document.forms["myForm"]["owner"].value;
    if (v4 == null || v4 == "") {
        alert("Creator/revisor must be filled out");
        return false;
    }
  }
  </script>
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
			
			 // load parameter value for id
			 if (isset($_GET['id']))
			 {
				 $id = $_GET["id"];
				 
				 // echo "ID is " . $id;
				 // lock this item
				 lockRequest($conn, $id, $auth_user_id);
				 
				 $sql = "SELECT * FROM `tbl_requests` WHERE `req_id` = " . $id;
				 $result = $conn->query($sql);

				 if ($result->num_rows > 0) 
				 {
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
						$fasttrack_int = $row["req_fasttrack"];
					}
					
					if ($fasttrack_int == 1)
					{
						$fasttrack = true;
					}
					else
					{
						$fasttrack = false;
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
				 echo "No parameters found.";
			 }
			?>
		  
		  	<h1>Create InfoCard for item #<?php echo $id; ?></h1>
			<p>Please create the InfoCard in MasterControl and complete the yellow fields.</p>
			<form name="myForm" action="do_created.php" onsubmit="return validateForm()" method="post"> 
			<table>
				<tr class="entry">
					<td>ID</td>
					<td><input type="text" name="id" readonly maxlength="6" value="<?php echo $id; ?>" class="readonly"/> </td>
					<td><i>Database ID for this request</i></td>
				</tr>
				<tr class="entry">
					<td>Status</td>
					<td><input type="text" name="status" readonly maxlength="20" value="<?php echo $status; ?>" class="readonly"/> </td>
					<td><i>Workflow status</i></td>
				</tr>
				<tr class="entry">
					<td>DHF name</td>
					<td><input type="text" name="dhfname" maxlength="50" value="<?php echo $dhfname; ?>" class="mandatory" /></td>
					<td><i>E.g. DHF-14-1106-2-VER-??? for a new VER or DHF-14-1106-2-VER-005-02 for next revision 
					(see <a href="http://homqiapedia01.qiagen.ads/qiapedia/List_of_Design_History_Files" 
					target="_blank">DHFs</a>)</i></td>
					</tr>
				<tr class="entry">
					<td>Title</td>
					<td><input type="text" name="title" maxlength="100" value="<?php echo $title; ?>" class="mandatory" /> </td>
					<td><i>Document title</i></td>
				</tr>
				<tr class="entry">
					<td>Revision</td>
					<td><input type="text" name="revision" maxlength="2" value="<?php echo $revision; ?>" class="mandatory" /></td>
					<td><i>Revision</i></td>
				</tr>
				<tr class="entry">
					<td>Author</td>
					<td><input type="text" name="author" maxlength="4" value="<?php echo $author; ?>"/></td>
					<td><i>Author's initials</i></td>
				</tr>
				<tr class="entry">
					<td>Approver(s)</td>
					<td><input type="text" name="approvers" maxlength="256" value="<?php echo $approvers; ?>"/></td>
					<td><i>Full name (see approval matrix; semicolon-separated)</i></td>
				</tr>
				<tr class="entry">
					<td>Creator/revisor</td>
					<td><input type="text" name="owner" maxlength="10" value="<?php echo $owner; ?>" class="mandatory" /></td>
					<td><i>Owner's initials (creator/revisor or <a href="http://homqiapedia01.qiagen.ads/qiapedia/HOM-PFL" 
					target="_blank">HOM-PFL</a>)</i></td>
				</tr>
				<!-- commented out as requested on http://homqiapedia01.qiagen.ads/qiapedia/Talk:MCUpload#Review_2016-04-04
				     ... and commented in as a request in http://homqiapedia01.qiagen.ads/qiapedia/Talk:MCUpload#Feedback_2016-04-12 -->
				<tr class="entry">
					<td>File(s)</td>
					<td><textarea name="file" cols="50" rows="5" maxlength="3000"><?php echo $file; ?></textarea></td>
					<td><i>Optional. Paste main file link (refer to <a href="http://homqiapedia01.qiagen.ads/qiapedia/CopyPath" target="_blank">CopyPath</a></i></td>
				</tr>
				</tr><tr class="entry">
					<td><label for="file">Attachement(s)</label> </td>
					<td><textarea name="attachements" cols="50" rows="5" maxlength="3000"><?php echo $attachements; ?></textarea></td>
					<td><i>Optional. Paste file links (refer to <a href="http://homqiapedia01.qiagen.ads/qiapedia/CopyPath" target="_blank">CopyPath</a>; semicolon-separated)</i></td>
				</tr>
				<tr class="entry">
					<td>Link(s)</td>
					<td><textarea name="link" cols="50" rows="5" maxlength="3000"><?php echo $link; ?></textarea></td>
					<td><i>Optional. Infocard names to link to. (semicolon-separated)</i></td>
				</tr>
				<tr class="entry">
					<td>Comment</td>
					<td><textarea name="comment" cols="50" rows="5" maxlength="3000"><?php echo $comment; ?></textarea></td>
					<td><i>Optional. Any comments.</i></td>
				</tr>
				<tr class="entry">
					<td>Fasttrack</td>
					<td><input type="checkbox" name="fasttrack" <?php if ($fasttrack) { echo "checked"; }; ?> /> </td>
					<td><i>Optional. If this is selected, this ticket will directly be finalised. Only click if all inputs are completed and all steps in MasterControl arre complete.</i></td>
				</tr>
			</table>
			<p><strong>Note: only click save if you are a creator/revisor and have created this InfoCard!</strong></p>
			
			<p><button type="reset">Reset</button> <button type="submit">Confirm &amp; save</button></p>
				
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
