<?php 
//session object
session_start();

//check for empt session
if(empty($_SESSION["errorMessage"]))
	$_SESSION["errorMessage"] = "";

	//Might be unneeded or cause problems
	include("includes/openDbConn.php");
?>




<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta charset="utf-8" />
	<title>Project 2 - Insert Billing</title>
	<style type="text/css">
		form{ width:500px; margin:0px auto;}
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
		fieldset{ padding:10px; border:1px solid #000; width:500px; overflow:auto; margin:10px;}
		legend{ color:#000000; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold; }
	</style>
</head>

<body>
	<h1 style="text-align:center">Project 2 - Insert Billing</h1>
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
			$_SESSION["errorMessage"] = "You must be logged in to create Billing information";
	?>
	<div style="font-style:italic; text-align:center; font-size:9px;">this set of pages validates as HTML5 compliant <br />&nbsp;</div>
	
	<form id="form0" method="post" action="doInsertBilling.php">
		<fieldset>
			<legend>Insert into P2Billing table</legend>
			<ul>
				<li><label title="BillingID" for="billingID">Billing ID</label><input name ="billingID" id ="billingID" type="text" size="20" maxlength="30"/></li>

				<li><label title="Login" for="uLogdis">Login</label>
					<input name ="uLogdis" id ="uLogdis" type="text" size="20" maxlength="50"
						value="<?php if($num_results != 0){echo( trim($row["Login"]) );} ?>" disabled="disabled"/>
					<input name ="uLog" id ="uLog" type="hidden" size="20" maxlength="50"
						value="<?php if($num_results != 0){echo( trim($row["Login"]) );} ?>" />
				</li>

				<li><label title="BillName" for="bName">Billing Name</label>
					<input name ="bName" id ="bName" type="text" size="20" maxlength="50"/>
				</li>

				<li><label title="BillAddress" for="bAddress">Billing Address</label>
					<input name ="bAddress" id ="bAddress" type="text" size="20" maxlength="30"/>
				</li>

				<li><label title="BillCity" for="bCity">Billing City</label>
					<input name ="bCity" id ="bCity" type="text" size="20" maxlength="30"/>
				</li>

				<li><label title="BillState" for="bState">Billing State</label>
					<input name ="bState" id ="bState" type="text" size="20" maxlength="20"/>
				</li>

				<li><label title="BillZip" for="bZip">Billing Zip</label>
					<input name ="bZip" id ="bZip" type="text" size="20" maxlength="5"/>
				</li>

				<li><label title="CardType" for="card">Card Type</label>
					<span id="radios" style="float: right;">
						<input name ="card" id ="card" type="radio" value="Visa"/>				Visa
						<input name ="card" id ="card" type="radio" value="MasterCard"/>		MasterCard
						<input name ="card" id ="card" type="radio" value="Discover"/>			Discover
						<input name ="card" id ="card" type="radio" value="AmericanExpress"/>	American Express
					</span>
				</li>

				<li><label title="CardNumber" for="cNumber">Card Number</label>
					<input name ="cNumber" id ="cNumber" type="text" size="20" maxlength="16"/>
				</li>
				
				<li><label title="StartMonth" for="startMonth">Billing Month</label>
				<select name="startMonth" id="startMonth">
                <option value="- Publish Month -">- Billing Month -</option>
                <option value="01">Jan</option>
				<option value="02">Feb</option>
				<option value="03">Mar</option>
				<option value="04">Apr</option>
				<option value="05">May</option>
				<option value="06">Jun</option>
				<option value="07">Jul</option>
				<option value="08">Aug</option>
				<option value="09">Sep</option>
				<option value="10">Oct</option>
				<option value="11">Nov</option>
				<option value="12">Dec</option>
        		</select>
				</li>

				<li><label title="StartDay" for="startDay">Billing Year</label>
				<select name="startDay" id="startDay">
                <option value="- Publish Year -">- Billing Year -</option>
				<option value="22">2022</option>
				<option value="23">2023</option>
				<option value="24">2024</option>
				<option value="25">2025</option>
				<option value="26">2026</option>
				<option value="27">2027</option>
				<option value="28">2028</option>
				<option value="29">2029</option>
				<option value="30">2030</option>
				<option value="31">2031</option>
				<option value="32">2032</option>
        		</select>
				</li>

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
		document.getElementById("billingID").focus();
	</script>

	<!--Get rid of if I remove openDb at top -->
	<?php
		include("includes/closeDbConn.php");
	?>
	
</body>
</html>