<?php
	$cookie_name = "mcupload_user";
	$auth_isset = false;
	if(!isset($_COOKIE[$cookie_name])) 
	{
		$auth_isset = false;
		$auth_user = "";
		$auth_user_iscreator = false;
	} 
	else 
	{
		$auth_isset = true;
		$auth_user_id = $_COOKIE[$cookie_name];
		$auth_user_name = $auth_user_id;
		$auth_user_iscreator = false;
		
		/* database lookup of full user name */
		/* email sender function */
		$sql = "SELECT `usr_name` 
		FROM `tbl_users` 
		WHERE `usr_short` = '" . $auth_user_id . "'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
			{
				$auth_user_name = $row["usr_name"];
			}
			
			/* database lookup to check if the user is a creator */
			$sql = "SELECT `crt_user` 
			FROM `tbl_creators` 
			WHERE `crt_user` = '" . $auth_user_id . "'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) 
			{
				// user is a creator
				$auth_user_iscreator = true;
			}

		}
		

	}
?>
