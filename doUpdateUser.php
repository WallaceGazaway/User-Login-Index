<?php 
//use sesion object
session_start();

//data comes from form
//addslashes escape special characters, like an apostrphe
$Login 			= addslashes($_POST["uLog"]);			//Must only be a number. Check is below
$FirstName 		= addslashes($_POST["firstName"]);		
$LastName 		= addslashes($_POST["lastName"]);			//Dropdown. No slashes.
$Passwd		 	= addslashes($_POST["uPass"]);
$Email		 	= addslashes($_POST["uEmail"]);
$NewsLetter 	= $_POST["uNews"];

$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$Login 		= str_replace($removeThese, "", $Login);
$FirstName	= str_replace($removeThese, "", $FirstName);
$LastName	= str_replace($removeThese, "", $LastName);
$Passwd		= str_replace($removeThese, "", $Passwd);
$Email		= str_replace($removeThese, "", $Email);

if(($Login=="") || ($FirstName=="") || ($LastName=="") || ($Passwd=="") || ($Email=="") || ($NewsLetter==""))
{ 		//Ensure forms arent empty
	$_SESSION["errorMessage"] = "You must enter a value for all boxes!";
	header("Location: updateUser.php");
	exit;
}
else
{ 
	//No found errors
	$_SESSION["errorMessage"] = "";
}

//DB Connection point
//Waits till after potential redirects happen
include("includes/openDbConn.php");


//Prepare SQL Statement
$sql = "UPDATE P2User SET FirstName='".$FirstName."', LastName='".$LastName."', Passwd='".$Passwd."', Email='".$Email."', NewsLetter='".$NewsLetter."' WHERE Login= '{$_SESSION["Login"]}'";

//execute SQL Query and store the result of execution in $result
$result = mysqli_query($db, $sql);

//Clean
include("includes/closeDbConn.php");

//redirect
header("Location: selectUser.php");
exit;
?>