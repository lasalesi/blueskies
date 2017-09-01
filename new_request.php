<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Create request</title>
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
	var v3 = document.forms["myForm"]["author"].value;
    if (v3 == null || v3 == "") {
        alert("Author must be filled out");
        return false;
    }
	var v4 = document.forms["myForm"]["approvers"].value;
    if (v4 == null || v4 == "") {
        alert("Approvers must be filled out");
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

	<div id="menubar">
      <ul id="menu">
        <li><a href="index.php">Home</a></li>
        <li class="current"><a href="new_request.php">New request</a></li>
        <li><a href="list_requests.php">Requested</a></li>
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
		  
			<form name="myForm" action="do_request.php" onsubmit="return validateForm()" method="post"> 
				<h1>Create a request</h1>
				<p>Use this form to request a new document or a new revision of an existing info card.</p>
				<p>Fill in at least all fields marked with yellow.</p>
				<table>
				<tr class="entry">
					<td><label for="dhfname">DHF-Name</label> </td>
					<td><input type="text" name="dhfname" maxlength="50" value="" class="mandatory"> </td>
					<td><i>E.g. DHF-14-1106-2-VER-??? for a new VER or DHF-14-1106-2-VER-005-02 for next revision 
					(see <a href="http://homqiapedia01.qiagen.ads/qiapedia/List_of_Design_History_Files" 
					target="_blank">DHFs</a>)</i></td>
				</tr><tr class="entry">
					<td><label for="title">Title</label> </td>
					<td><input type="text" name="title" maxlength="100" class="mandatory"> </td>
					<td><i>Document title</i></td>
				</tr><tr class="entry">
					<td><label for="revision">Revision</label> </td>
					<td><input type="text" name="revision" maxlength="2" value="01"> </td>
					<td><i>01 for a new document<br />0x for a revision change (main file required)</i></td>
				</tr><tr class="entry">
					<td><label for="author">Author</label> </td>
					<td><input type="text" name="author" maxlength="4" class="mandatory"> </td>
					<td><i>Author's initials</i></td>
				</tr><tr class="entry">
					<td><label for="approvers">Approvers</label> </td>
					<td><input type="text" name="approvers" maxlength="256" class="mandatory"> </td>
					<td><i>Full name (see approval matrix; semicolon-separated)</i></td>
				</tr><tr class="entry">
					<td><label for="file">Main file</label> </td>
					<td><input type="text" name="file" maxlength="3000"> </td>
					<td><i>Paste main file link (refer to <a href="http://homqiapedia01.qiagen.ads/qiapedia/CopyPath" target="_blank">CopyPath</a>; semicolon-separated)</i></td>
				</tr><tr class="entry">
					<td><label for="file">Attachement(s)</label> </td>
					<td><input type="text" name="attachements" maxlength="3000"> </td>
					<td><i>Optional. Paste file links (refer to <a href="http://homqiapedia01.qiagen.ads/qiapedia/CopyPath" target="_blank">CopyPath</a>; semicolon-separated)</i></td>
				</tr><tr class="entry">
					<td><label for="link">Link(s)</label> </td>
					<td><input type="text" name="link" maxlength="3000"> </td>
					<td><i>Optional. Infocard names to link to. (semicolon-separated)</i></td>
				</tr><tr class="entry">
					<td><label for="comment">Comment</label> </td>
					<td><input type="text" name="comment" maxlength="3000"> </td>
					<td><i>Optional. Any comments.</i></td>
				</tr>
				<!-- commented out as not desired on 2016-04-29. Note: hidden field!
				<tr class="entry">
					<td>Fasttrack</td>
					<td><input type="checkbox" name="fasttrack" /> </td>
					<td><i>Optional. If this is selected, this ticket will directly be finalised. <strong>Make sure to have the main file.</strong></td>
				</tr>
				-->
				</table>
				<input type="checkbox" name="fasttrack" hidden />
				<button type="reset">Reset</button> 
				<button type="submit">Send</button> 
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
