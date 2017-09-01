<?php

 // server connection
 $servername = "localhost";
 $username = "mcupload";
 $password = "mcupload123";
 $dbname = "mcupload";

 // Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 }

 // echo "connected!";
?>
