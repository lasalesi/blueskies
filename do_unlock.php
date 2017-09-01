<?php
	if (isset($_GET['id']))
	{
		$id = $_GET['id'];
		
		// get database
		require_once ("database_connect.php");
		require_once ("functions.php");
		
		if (unlockRequest($conn, $id)) 
		{
			// display page again
			header("Location: display.php?id=" . $id);
			die();
		}
		else
		{
			echo "An error occured in the SQL query to unlock.";
		}	
		
	}
	else
	{
		echo "No parameter defined.";
	}
