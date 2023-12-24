<?php
//database connection

//The @ bypasses php error handling
//We want our own error message

@ $db = mysqli_connect("goss.tech.purdue.edu", "cgt356web1f", "Enticing1f9597");
mysqli_select_db($db, "cgt356web1f") or die(mysqli_error());

//Check for success
if(!$db)
{
	echo "Error: Could not connect to database. Please try again later.";
	exit;
}

?>