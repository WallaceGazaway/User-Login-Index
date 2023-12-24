<?php 
//session object
session_start();

//check for empt session
if(empty($_SESSION["errorMessage"]))
	$_SESSION["errorMessage"] = "";

	//Might not need
	include("includes/openDbConn.php");
?>




<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta charset="utf-8" />
	<title>Project 2 - Insert Shipping</title>
	<style type="text/css">
		form{ width:450px; margin:0px auto;}
		ul{ list-style:none; margin-top:5px;}
		ul li{ display:block; float:left; width:100%; height:1%;}
		ul li label{ float:left; padding:7px;}
		ul li span{ color:#0000ff; font-weight: bold;}
		ul li span#radio{color:black; font-weight:normal; padding:0px; margin-right:160px;}
		ul li input, ul li select{ float:right; margin-right:10px; border:1px solid #000; padding:3px; width:240px;}
		input#submit {width:248px;}
		ul li input[type="radio"]{float:none; margin-right:0px; padding:0px; width:80px;}
		ul li input[type="checkbox"]{float:none; margin-right:0px; padding:0px; width:60px;}
		li input:focus { border:1px solid #999; }
		fieldset{ padding:10px; border:1px solid #000; width:400px; overflow:auto; margin:10px;}
		legend{ color:#000000; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold; }
	</style>
</head>

<body>
	<h1 style="text-align:center">Project 2 - Insert Shipping</h1>
	<?php 
		include("includes/loginMenu.php");

		$sql = "SELECT Login FROM P2User WHERE Login= '{$_SESSION["Login"]}'";

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
			$_SESSION["errorMessage"] = "You must be logged in to create Shipping information";
	?>
	<div style="font-style:italic; text-align:center; font-size:9px;">this set of pages validates as HTML5 compliant <br />&nbsp;</div>
	
	<form id="form0" method="post" action="doInsertShipping.php">
		<fieldset>
			<legend>Insert into P2Shipping table</legend>
			<ul>
				<li><label title="ShippingID" for="shippingID">Shipping ID</label><input name ="shippingID" id ="shippingID" type="text" size="20" maxlength="30"/></li>

				<!-- <li><label title="Login" for="uLogin">Login</label><input name ="uLogin" id ="uLogin" type="text" size="20" maxlength="50"/></li> -->

				<li><label title="Login" for="uLogdis">Login</label>
					<input name ="uLogdis" id ="uLogdis" type="text" size="20" maxlength="50"
						value="<?php if($num_results != 0){echo( trim($row["Login"]) );} ?>" disabled="disabled"/>
					<input name ="uLog" id ="uLog" type="hidden" size="20" maxlength="50"
						value="<?php if($num_results != 0){echo( trim($row["Login"]) );} ?>" />
				</li>

				<li><label title="Name" for="sName">Name</label><input name ="sName" id ="sName" type="text" size="20" maxlength="50"/></li>

				<li><label title="Address" for="sAddress">Address</label><input name ="sAddress" id ="sAddress" type="text" size="20" maxlength="30"/></li>

				<li><label title="City" for="sCity">City</label><input name ="sCity" id ="sCity" type="text" size="20" maxlength="30"/></li>

				<li><label title="State" for="sState">State</label><input name ="sState" id ="sState" type="text" size="20" maxlength="20"/></li>
				
				<li><label title="Zip" for="sZip">Zip</label><input name ="sZip" id ="sZip" type="text" size="20" maxlength="5"/></li>

				<!-- Don't need a yes and no checkbox, change this to a single checkbox with either a default false value or a value of 1 or zero that recognizes being checked as true.
				Then, make an if else statement in post. Something like if value=='1' or 'true' or 'yes' then hardCover/Hardcover='true' and else if it's 0 then set hardCover to false or no -->
				

				<li><span><?php echo $_SESSION["errorMessage"]; ?></span></li>
				<li><input type="submit" value="Insert Info" name="submit" id="submit" /></li>
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

	<!-- remove if turns out don't need open connecton at top -->
	<?php
		include("includes/closeDbConn.php");
	?>
	
</body>
</html>