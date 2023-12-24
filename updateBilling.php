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
	<title>Project 2 - Update Billing</title>
	<style type="text/css">
		form{ width:500px; margin:0px auto;}
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
		fieldset{ padding:10px; border:1px solid #000; width:500px; overflow:auto; margin:10px;}
		legend{ color:#000000; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold; }
	</style>
</head>

<body>
	<h1 style="text-align:center">Project 2 - Update Billing</h1>
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
	
	<form id="form0" method="post" action="doUpdateBilling.php">
		<fieldset>
			<legend>Update P2Billing table</legend>
			<ul>
			<li><label title="BillingID" for="billingIDdis">Shipping ID</label>
					<input name ="billingIDdis" id ="billingIDdis" type="text" size="20" maxlength="30"
						value="<?php if($num_results != 0){echo( trim($row["BillingID"]) );} ?>" disabled="disabled"/>
					<input name ="billingID" id ="billingID" type="hidden" size="20" maxlength="30"
						value="<?php if($num_results != 0){echo( trim($row["BillingID"]) );} ?>" />
				</li>

				<li><label title="Login" for="uLogdis">Login</label>
					<input name ="uLogdis" id ="uLogdis" type="text" size="20" maxlength="50"
						value="<?php if($num_results != 0){echo( trim($row["Login"]) );} ?>" disabled="disabled"/>
					<input name ="uLog" id ="uLog" type="hidden" size="20" maxlength="50"
						value="<?php if($num_results != 0){echo( trim($row["Login"]) );} ?>" />
				</li>

				<li><label title="BillName" for="bName">Billing Name</label>
					<input name ="bName" id ="bName" type="text" size="20" maxlength="50"
						value="<?php if($num_results != 0){echo( trim($row["BillName"]) );} ?>"/>
				</li>

				<li><label title="BillAddress" for="bAddress">Billing Address</label>
					<input name ="bAddress" id ="bAddress" type="text" size="20" maxlength="30"
						value="<?php if($num_results != 0){echo( trim($row["BillAddress"]) );} ?>"/>
				</li>
				
				<li><label title="BillCity" for="bCity">Billing City</label>
					<input name ="bCity" id ="bCity" type="text" size="20" maxlength="30"
						value="<?php if($num_results != 0){echo( trim($row["BillCity"]) );} ?>"/>
				</li>
				
				<li><label title="BillState" for="bState">Billing State</label>
					<input name ="bState" id ="bState" type="text" size="20" maxlength="20"
						value="<?php if($num_results != 0){echo( trim($row["BillState"]) );} ?>"/>
				</li>

				<li><label title="BillZip" for="bZip">Billing Zip</label>
					<input name ="bZip" id ="bZip" type="text" size="20" maxlength="5"
						value="<?php if($num_results != 0){echo( trim($row["BillZip"]) );} ?>"/>
				</li>

				<li><label title="CardType" for="card">Card Type</label>
					<span id="radios" style="float: right;">
						<input name ="card" id ="card" type="radio" value="Visa" <?php if( ($num_results != 0) && (trim($row["CardType"])=="Visa") ){echo(" checked='checked'");} ?>/>Visa
						<input name ="card" id ="card" type="radio" value="MasterCard" <?php if( ($num_results != 0) && (trim($row["CardType"])=="MasterCard") ){echo(" checked='checked'");} ?>/>MasterCard
						<input name ="card" id ="card" type="radio" value="Discover" <?php if( ($num_results != 0) && (trim($row["CardType"])=="Discover") ){echo(" checked='checked'");} ?>/>Discover
						<input name ="card" id ="card" type="radio" value="AmericanExpress" <?php if( ($num_results != 0) && (trim($row["CardType"])=="AmericanExpress") ){echo(" checked='checked'");} ?>/>AmericanExpress
					</span>
				</li>

				<li><label title="CardNumber" for="cNumber">Card Number</label>
					<input name ="cNumber" id ="cNumber" type="text" size="20" maxlength="16"
						value="<?php if($num_results != 0){echo( trim($row["CardNumber"]) );} ?>"/>
				</li>
				<?php
				
				//Date is stored as Month Day. Get month with substream of whole string, starting from pos 0 to space " "
				//Get day with substream of whole, starting from space "" and going to length (last character)
				$StartMonth = trim( substr(trim($row["ExpDate"]), 0, strpos(trim($row["ExpDate"]), " ")) );
				$StartDay	= trim( substr(trim($row["ExpDate"]), strpos(trim($row["ExpDate"]), " "), strlen(trim($row["ExpDate"]))) );
			
				?>
				<li><label title="StartMonth" for="startMonth">Billing Month</label>
				<select name="startMonth" id="startMonth">
                <option value="- Month -">- Billing Month -</option>
                <option value="01" <?php if( ($num_results != 0) && ($StartMonth=="01") ){echo("selected='selected'");} ?>>Jan</option>
				<option value="02" <?php if( ($num_results != 0) && ($StartMonth=="02") ){echo("selected='selected'");} ?>>Feb</option>
				<option value="03" <?php if( ($num_results != 0) && ($StartMonth=="03") ){echo("selected='selected'");} ?>>Mar</option>
				<option value="04" <?php if( ($num_results != 0) && ($StartMonth=="04") ){echo("selected='selected'");} ?>>Apr</option>
				<option value="05" <?php if( ($num_results != 0) && ($StartMonth=="05") ){echo("selected='selected'");} ?>>May</option>
				<option value="06" <?php if( ($num_results != 0) && ($StartMonth=="06") ){echo("selected='selected'");} ?>>Jun</option>
				<option value="07" <?php if( ($num_results != 0) && ($StartMonth=="07") ){echo("selected='selected'");} ?>>Jul</option>
				<option value="08" <?php if( ($num_results != 0) && ($StartMonth=="08") ){echo("selected='selected'");} ?>>Aug</option>
				<option value="09" <?php if( ($num_results != 0) && ($StartMonth=="09") ){echo("selected='selected'");} ?>>Sep</option>
				<option value="10" <?php if( ($num_results != 0) && ($StartMonth=="10") ){echo("selected='selected'");} ?>>Oct</option>
				<option value="11" <?php if( ($num_results != 0) && ($StartMonth=="11") ){echo("selected='selected'");} ?>>Nov</option>
				<option value="12" <?php if( ($num_results != 0) && ($StartMonth=="12") ){echo("selected='selected'");} ?>>Dec</option>
        		</select>
				</li>

				<li><label title="StartDay" for="startDay">Billing Year</label>
				<select name="startDay" id="startDay">
                <option value="- Year -">- Billing Year -</option>
				<option value="22" <?php if( ($num_results != 0) && ($StartDay=="22") ){echo("selected='selected'");} ?>>2022</option>
				<option value="23" <?php if( ($num_results != 0) && ($StartDay=="23") ){echo("selected='selected'");} ?>>2023</option>
				<option value="24" <?php if( ($num_results != 0) && ($StartDay=="24") ){echo("selected='selected'");} ?>>2024</option>
				<option value="25" <?php if( ($num_results != 0) && ($StartDay=="25") ){echo("selected='selected'");} ?>>2025</option>
				<option value="26" <?php if( ($num_results != 0) && ($StartDay=="26") ){echo("selected='selected'");} ?>>2026</option>
				<option value="27" <?php if( ($num_results != 0) && ($StartDay=="27") ){echo("selected='selected'");} ?>>2027</option>
				<option value="28" <?php if( ($num_results != 0) && ($StartDay=="28") ){echo("selected='selected'");} ?>>2028</option>
				<option value="29" <?php if( ($num_results != 0) && ($StartDay=="29") ){echo("selected='selected'");} ?>>2029</option>
				<option value="30" <?php if( ($num_results != 0) && ($StartDay=="30") ){echo("selected='selected'");} ?>>2030</option>
				<option value="31" <?php if( ($num_results != 0) && ($StartDay=="31") ){echo("selected='selected'");} ?>>2031</option>
				<option value="32" <?php if( ($num_results != 0) && ($StartDay=="32") ){echo("selected='selected'");} ?>>2032</option>
        		</select>
				</li>



				<li><span><?php echo $_SESSION["errorMessage"]; ?></span></li>
				<li><input type="submit" value="Update Billing" name="submit" id="submit" /></li>
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
	
</body>
</html>