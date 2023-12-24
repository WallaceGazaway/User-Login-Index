<?php 
//use sesion object
session_start();

//data comes from form
//addslashes escape special characters, like an apostrphe
$ShippingID 		= addslashes($_POST["shippingID"]);			//Must only be a number. Check is below
$Login 				= addslashes($_POST["uLog"]);		
$Name 				= addslashes($_POST["sName"]);			//Dropdown. No slashes.
$Address		 	= addslashes($_POST["sAddress"]); 
$City		 		= addslashes($_POST["sCity"]);
$State		 		= addslashes($_POST["sState"]);
$Zip 				= addslashes($_POST["sZip"]);			//Dropdown. No slashes.


$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$ShippingID 	= str_replace($removeThese, "", $ShippingID);
$Login			= str_replace($removeThese, "", $Login);
$Name			= str_replace($removeThese, "", $Name);
$Address 		= str_replace($removeThese, "", $Address);
$City			= str_replace($removeThese, "", $City);
$State			= str_replace($removeThese, "", $State);
$Zip			= str_replace($removeThese, "", $Zip);

if(($ShippingID=="") || ($Login=="") || ($Name=="") || ($Address=="") || ($City=="") || ($State=="") || ($Zip==""))
{ 		//Ensure forms arent empty
	$_SESSION["errorMessage"] = "You must enter a value for all boxes!";
	header("Location: updateShipping.php");
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
$sql = "UPDATE P2Shipping SET ShippingID='".$ShippingID."', Name='".$Name."', Address='".$Address."', City='".$City."', State='".$State."', Zip='".$Zip."' WHERE Login= '{$_SESSION["Login"]}'";

//execute SQL Query and store the result of execution in $result
$result = mysqli_query($db, $sql);

//Clean
include("includes/closeDbConn.php");

//redirect
header("Location: selectShipping.php");
exit;
?>