<?php
function cleanString ($input)
{
	// $bodytag = str_replace("%body%", "schwarz", "<body text='%body%'>");
	$output = str_replace('\\', '\\\\', $input);
	$output = str_replace('\'', '`', $output);

    return $output;
}

function lockRequest($conn, $id, $user)
{
	$sql = "UPDATE `tbl_requests`
			SET
			`req_locked` = '" . $user . "'
			WHERE `req_id` = " . $id;
	
	if ($conn->query($sql) === TRUE) 
	{
		return true;
	}
	else
	{
		return false;
	}
}
	
function unlockRequest($conn, $id)
{
	$sql = "UPDATE `tbl_requests`
			SET
			`req_locked` = ''
			WHERE `req_id` = " . $id;
	
	if ($conn->query($sql) === TRUE) 
	{
		return true;
	}
	else
	{
		return false;
	}
}
?>
