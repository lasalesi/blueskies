<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Login</title>
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
		  	<h1>Login</h1>
			<form action="do_login.php" method="post"> 
			<table class="entry">
				<tr class="entry">
					<td class="entry">Initials</td>
					<td class="entry"><input type="text" name="initials"  maxlength="4" /> </td>
				</tr>
			</table>
			
				<button type="reset">Reset</button> 
				<button type="submit">Login</button> 
				
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
