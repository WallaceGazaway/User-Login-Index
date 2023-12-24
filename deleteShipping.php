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
	<title>Project 2 - Delete Shipping</title>
	<style type="text/css">
		form{ width:400px; margin:0px auto;}
		ul{ list-style:none; margin-top:5px;}
		ul li{ display:block; float:left; width:100%; height:1%;}
		ul li label{ float:left; padding:7px;}
		ul li span{ color:#0000ff; font-weight: bold;}
		ul li span#radio{color:black; font-weight:normal; padding:0px; margin-right:130px;}
		ul li input, ul li select, span.values { float:right; margin-right:10px; border:1px solid #000; padding:3px; width:240px;}
		input#submit {width:248px;}
		ul li input[type="radio"]{float:none; margin-right:0px; padding:0px; width:40px;}
		ul li input[type="checkbox"]{float:none; margin-right:0px; padding:0px; width:40px;}
		li input:focus { border:1px solid #999; }
		fieldset{ padding:10px; border:1px solid #000; width:400px; overflow:auto; margin:10px;}
		legend{ color:#000000; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold; }
	</style>
</head>

<body>
	<h1 style="text-align:center">Project 2 - Delete Shipping</h1>
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
	
	<form id="form0" method="post" action="doDeleteShipping.php">
		<fieldset>
			<legend>Are you sure you want to delete this Shipping Information?</legend>
			<ul>
				<li><label title="ShippingID" for="shippingIDdis">Shipping ID</label>
					<span class="values"><?php if($num_results != 0){echo( trim($row["ShippingID"]) );} ?></span>
				</li>

				<li><label title="Login" for="uLogdis">Login</label>
					<span class="values"><?php if($num_results != 0){echo( trim($row["Login"]) );} ?></span>
				</li>

				<li><label title="Name" for="sName">Name</label>
                	<span class="values"><?php if($num_results != 0){echo( trim($row["Name"]) );} ?></span>
				</li>

				<li><label title="Address" for="sAddress">Address</label>
					<span class="values"><?php if($num_results != 0){echo( trim($row["Address"]) );} ?></span>
				</li>

				<li><label title="City" for="sCity">City</label>
					<span class="values"><?php if($num_results != 0){echo( trim($row["City"]) );} ?></span>
				</li>

				<li><label title="State" for="sState">State</label>
					<span class="values"><?php if($num_results != 0){echo( trim($row["State"]) );} ?></span>
				</li>

				<li><label title="Zip" for="sZip">Zip</label>
					<span class="values"><?php if($num_results != 0){echo( trim($row["Zip"]) );} ?></span>
				</li>



				<li><span><?php echo $_SESSION["errorMessage"]; ?></span></li>
				<li><input type="submit" value="Confirm Delete Shipping" name="submit" id="submit" /></li>
			</ul>
		</fieldset>
	</form>
	
	<?php 
	//Clear Error Msg
	$_SESSION["errorMessage"] = "";
	?>
	
	
</body>
</html>