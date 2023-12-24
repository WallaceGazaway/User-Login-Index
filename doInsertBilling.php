<?php 
//use sesion object
session_start();

//data comes from form
//addslashes escape special characters, like an apostrphe
$BillingID 			= addslashes($_POST["billingID"]);			//Must only be a number. Check is below
$Login 				= addslashes($_POST["uLog"]);		
$BillName 			= addslashes($_POST["bName"]);			//Dropdown. No slashes.
$BillAddress		= addslashes($_POST["bAddress"]);
$BillCity		 	= addslashes($_POST["bCity"]);
$BillState		 	= addslashes($_POST["bState"]);
$BillZip		 	= addslashes($_POST["bZip"]);
$CardType		 	= $_POST["card"];
$CardNumber		 	= addslashes($_POST["cNumber"]);
$StartMonth 		= $_POST["startMonth"];			//Dropdown. No slashes.
$StartDay 			= $_POST["startDay"]; 				//Dropdown. No slashes.


$removeThese = array("<?php", "<?", "</", "<", "?>", "/>", ">", ";");
$BillingID 			= str_replace($removeThese, "", $BillingID);
$Login				= str_replace($removeThese, "", $Login);
$BillName			= str_replace($removeThese, "", $BillName);
$BillAddress 		= str_replace($removeThese, "", $BillAddress);
$BillCity			= str_replace($removeThese, "", $BillCity);
$BillState			= str_replace($removeThese, "", $BillState);
$BillZip			= str_replace($removeThese, "", $BillZip);
$CardNumber			= str_replace($removeThese, "", $CardNumber);

if(($BillingID=="") || ($Login=="") || ($BillName=="") || ($BillAddress=="") || ($BillCity=="") || ($BillState=="") || ($BillZip=="") || ($CardType=="") || ($CardNumber=="") || ($StartMonth=="- Billing Month -") || ($StartDay=="- Billing Year -"))
{ 		//Ensure forms arent empty
	$_SESSION["errorMessage"] = "You must enter a value for all boxes!";
	header("Location: insertBilling.php");
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

//removed BillingID restriction on duplicates


$ExpDate = $StartMonth."/".$StartDay;

//Prepare SQL Statement
$sql = "INSERT INTO P2Billing(BillingID, Login, BillName, BillAddress, BillCity, BillState, BillZip, CardType, CardNumber, ExpDate) VALUES('".$BillingID."', '".$Login."', '".$BillName."', '".$BillAddress."', '".$BillCity."', '".$BillState."', '".$BillZip."', '".$CardType."', '".$CardNumber."', '".$ExpDate."')";

//execute SQL Query and store the result of execution in $result
$result = mysqli_query($db, $sql);

//Clean
include("includes/closeDbConn.php");

//redirect
header("Location: selectBilling.php");
exit;
?>