<?php
$cookie_name = "mcupload_user";
$initials = $_POST["initials"];
$cookie_value = $initials;
// setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
setcookie($cookie_name, $cookie_value);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>Login</title>
  <meta name="description" content="MasterControl upload web application" />
  <meta name="keywords" content="MasterControl Upload" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=9" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <meta http-equiv="refresh" content="0; url=index.php" />
</head>

<body>
	<p><a href="index.php">Redirect to homepage</a></p>
</body>
</html>
