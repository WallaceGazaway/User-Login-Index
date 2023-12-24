<?php 
//session object
session_start();

//check for empt session
if(empty($_SESSION["errorMessage"]))
	$_SESSION["errorMessage"] = "";

	include("includes/openDbConn.php");
?>


<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta charset="utf-8" />
	<title>Project 2 - Update Shipping</title>
	<style type="text/css">
		form{ width:400px; margin:0px auto;}
		ul{ list-style:none; margin-top:5px;}
		ul li{ display:block; float:left; width:100%; height:1%;}
		ul li label{ float:left; padding:7px;}
		ul li span{ color:#0000ff; font-weight: bold;}
		ul li span#radio{color:black; font-weight:normal; padding:0px; margin-right:130px;}
		ul li input, ul li select{ float:right; margin-right:10px; border:1px solid #000; padding:3px; width:240px;}
		input#submit {width:248px;}
		ul li input[type="radio"]{float:none; margin-right:0px; padding:0px; width:40px;}
		ul li input[type="checkbox"]{float:none; margin-right:0px; padding:0px; width:40px;}
		li input:focus { border:1px solid #999; }
		fieldset{ padding:10px; border:1px solid #000; width:400px; overflow:auto; margin:10px;}
		legend{ color:#000000; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold; }
	</style>
</head>

<body>
	<h1 style="text-align:center">Project 2 - Update Shipping</h1>
	<?php 
		include("includes/loginMenu.php");

		$sql = "SELECT ShippingID, Login, Name, Address, City, State, Zip FROM P2Shipping WHERE Login= '{$_SESSION["Login"]}'";

		$result = mysqli_query($db, $sql);

		if(empty($result))
		{
			$num_results = 0;
		}
		else
		{
			$num_results = mysqli_num_rows($result);
			$row = mysqli_fetch_array($result);
		}

		if($num_results == 0)
			$_SESSION["errorMessage"] = "You must first insert Shipping Information for this user";
	?>

	<div style="font-style:italic; text-align:center; font-size:9px;">this set of pages validates as HTML5 compliant <br />&nbsp;</div>
	
	<form id="form0" method="post" action="doUpdateShipping.php">
		<fieldset>
			<legend>Update P2Shipping table</legend>
			<ul>
				<li><label title="ShippingID" for="shippingIDdis">Shipping ID</label>
					<input name ="shippingIDdis" id ="shippingIDdis" type="text" size="20" maxlength="30"
						value="<?php if($num_results != 0){echo( trim($row["ShippingID"]) );} ?>" disabled="disabled"/>
					<input name ="shippingID" id ="shippingID" type="hidden" size="20" maxlength="30"
						value="<?php if($num_results != 0){echo( trim($row["ShippingID"]) );} ?>" />
				</li>

				<li><label title="Login" for="uLogdis">Login</label>
					<input name ="uLogdis" id ="uLogdis" type="text" size="20" maxlength="50"
						value="<?php if($num_results != 0){echo( trim($row["Login"]) );} ?>" disabled="disabled"/>
					<input name ="uLog" id ="uLog" type="hidden" size="20" maxlength="50"
						value="<?php if($num_results != 0){echo( trim($row["Login"]) );} ?>" />
				</li>

				<li><label title="Name" for="sName">Name</label>
					<input name ="sName" id ="sName" type="text" size="20" maxlength="50"
						value="<?php if($num_results != 0){echo( trim($row["Name"]) );} ?>"/>
				</li>

				<li><label title="Address" for="sAddress">Address</label>
					<input name ="sAddress" id ="sAddress" type="text" size="20" maxlength="30"
						value="<?php if($num_results != 0){echo( trim($row["Address"]) );} ?>"/>
				</li>

				<li><label title="City" for="sCity">City</label>
					<input name ="sCity" id ="sCity" type="text" size="20" maxlength="30"
						value="<?php if($num_results != 0){echo( trim($row["City"]) );} ?>"/>
				</li>

				<li><label title="State" for="sState">State</label>
					<input name ="sState" id ="sState" type="text" size="20" maxlength="20"
						value="<?php if($num_results != 0){echo( trim($row["State"]) );} ?>"/>
				</li>

				<li><label title="Zip" for="sZip">Zip</label>
					<input name ="sZip" id ="sZip" type="text" size="20" maxlength="5"
						value="<?php if($num_results != 0){echo( trim($row["Zip"]) );} ?>"/>
				</li>
				

				<li><span><?php echo $_SESSION["errorMessage"]; ?></span></li>
				<li><input type="submit" value="Update Shipping" name="submit" id="submit" /></li>
			</ul>
		</fieldset>
	</form>
	
	<?php 
	//Clear Error Msg
	$_SESSION["errorMessage"] = "";
	?>
	
	<script type = "text/javascript">
		document.getElementById("shippingID").focus();
	</script>
	
</body>
</html>