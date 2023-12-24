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
	<title>Project 2 - Delete Billing</title>
	<style type="text/css">
		form{ width:500px; margin:0px auto;}
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
		fieldset{ padding:10px; border:1px solid #000; width:500px; overflow:auto; margin:10px;}
		legend{ color:#000000; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold; }
	</style>
</head>

<body>
	<h1 style="text-align:center">Project 2 - Delete Billing</h1>
	<?php 
		include("includes/loginMenu.php");

		$sql = "SELECT BillingID, Login, BillName, BillAddress, BillCity, BillState, BillZip, CardType, CardNumber, ExpDate FROM P2Billing WHERE Login= '{$_SESSION["Login"]}'";

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
			$_SESSION["errorMessage"] = "You must first insert Billing Information for this user";
	?>

	<div style="font-style:italic; text-align:center; font-size:9px;">this set of pages validates as HTML5 compliant <br />&nbsp;</div>
	
	<form id="form0" method="post" action="doDeleteBilling.php">
		<fieldset>
			<legend>Are you sure you want to delete this Billing Information?</legend>
			<ul>
				<li><label title="BillingID" for="billingIDdis">Billing ID</label>
					<span class="values"><?php if($num_results != 0){echo( trim($row["BillingID"]) );} ?></span>
				</li>

				<li><label title="Login" for="uLogdis">Login</label>
					<span class="values"><?php if($num_results != 0){echo( trim($row["Login"]) );} ?></span>
				</li>

				<li><label title="BillName" for="bName">Billing Name</label>
                	<span class="values"><?php if($num_results != 0){echo( trim($row["BillName"]) );} ?></span>
				</li>

				<li><label title="BillAddress" for="bAddress">Billing Address</label>
					<span class="values"><?php if($num_results != 0){echo( trim($row["BillAddress"]) );} ?></span>
				</li>

				<li><label title="BillCity" for="bCity">Billing City</label>
					<span class="values"><?php if($num_results != 0){echo( trim($row["BillCity"]) );} ?></span>
				</li>

				<li><label title="BillState" for="bState">Billing State</label>
					<span class="values"><?php if($num_results != 0){echo( trim($row["BillState"]) );} ?></span>
				</li>

				<li><label title="BillZip" for="bZip">Billing Zip</label>
					<span class="values"><?php if($num_results != 0){echo( trim($row["BillZip"]) );} ?></span>
				</li>

				<li><label title="CardType" for="card">Card Type</label>
					<span class="values"><?php if($num_results != 0){echo( trim($row["CardType"]) );} ?></span>
				</li>

				<li><label title="CardNumber" for="cNumber">Card Number</label>
					<span class="values"><?php if($num_results != 0){echo( trim($row["CardNumber"]) );} ?></span>
				</li>

				<li><label title="ExpDate" for="startMonth">Expiration Date</label>
					<span class="values"><?php if($num_results != 0){echo( trim($row["ExpDate"]) );} ?></span>
				</li>


				<li><span><?php echo $_SESSION["errorMessage"]; ?></span></li>
				<li><input type="submit" value="Confirm Delete Billing" name="submit" id="submit" /></li>
			</ul>
		</fieldset>
	</form>
	
	<?php 
	//Clear Error Msg
	$_SESSION["errorMessage"] = "";
	?>
	
	
</body>
</html>