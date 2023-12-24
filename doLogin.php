<!-- This doesnt seem to work, it is just acting as if I put in the right information and logging in-->
<?php 
session_start();

//include ("includes/openDbConn.php");

//see if getting rid of these and relying wholy on the else if works. Have blank versions but this might just make it where it's always treated as empty. Might need to turn back on posted variance.

//$Login 			= addslashes($_POST["uLogin"]);		
//$Passwd 		= addslashes($_POST["uPass"]);

$Login  = addslashes($_POST["uLog"]);
$Passwd = addslashes($_POST["uPass"]);

	
if(($Login=="") || ($Passwd==""))
{ 		//Ensure forms arent empty
	$_SESSION["errorMessage"] = "You must enter a value for all boxes!";
	header("Location: login.php");
	exit;
}

else
{
	$_SESSION["errorMessage"] = "";
}

include ("includes/openDbConn.php");


$sql = "SELECT Login FROM P2User WHERE Login= '$Login'";

$result = mysqli_query($db, $sql);

if(empty($result))
	$num_results = 0;
else
	$num_results = mysqli_num_rows($result);

if($num_results != 0)
{
	$_SESSION["errorMessage"] = "";
	$_SESSION["Login"] = $Login;
  	//$_SESSION["success"] = "You are now logged in";
  	header("Location: loginSuccess.php");
}
else
{
	$_SESSION["errorMessage"] = "User not found!";
	header("Location: login.php");
	exit;
}

include("includes/closeDbConn.php");
//original openDB spot


//header("Location: loginSuccess.php");
//exit;
?>

</body>
</html>