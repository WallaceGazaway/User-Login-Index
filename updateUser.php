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
	<title>Project 2 - Update User</title>
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
	<h1 style="text-align:center">Project 2 - Update User</h1>
	<?php 
		include("includes/loginMenu.php");

		//Going to see if I can do this without echoes.
		$sql = "SELECT Login, FirstName, LastName, Passwd, Email, NewsLetter FROM P2User WHERE Login= '{$_SESSION["Login"]}'";

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
			$_SESSION["errorMessage"] = "You must be logged in to update information";
	?>

	<div style="font-style:italic; text-align:center; font-size:9px;">this set of pages validates as HTML5 compliant <br />&nbsp;</div>
	
	<form id="form0" method="post" action="doUpdateUser.php">
		<fieldset>
			<legend>Update P2User table</legend>
			<ul>
				<li><label title="Login" for="uLogdis">Login</label>
					<input name ="uLogdis" id ="uLogdis" type="text" size="20" maxlength="50"
						value="<?php if($num_results != 0){echo( trim($row["Login"]) );} ?>" disabled="disabled"/>
					<input name ="uLog" id ="uLog" type="hidden" size="20" maxlength="50"
						value="<?php if($num_results != 0){echo( trim($row["Login"]) );} ?>" />
				</li>

				<li><label title="FirstName" for="firstName">First Name</label>
					<input name ="firstName" id ="firstName" type="text" size="20" maxlength="50"
						value="<?php if($num_results != 0){echo( trim($row["FirstName"]) );} ?>"/>
				</li>

				<li><label title="LastName" for="lastName">Last Name</label>
					<input name ="lastName" id ="lastName" type="text" size="20" maxlength="30"
						value="<?php if($num_results != 0){echo( trim($row["LastName"]) );} ?>"/>
				</li>

				<li><label title="Passwd" for="uPass">Password</label>
					<input name ="uPass" id ="uPass" type="text" size="20" maxlength="30"
						value="<?php if($num_results != 0){echo( trim($row["Passwd"]) );} ?>"/>
				</li>

				<li><label title="Email" for="uEmail">Email</label>
					<input name ="uEmail" id ="uEmail" type="text" size="20" maxlength="30"
						value="<?php if($num_results != 0){echo( trim($row["Email"]) );} ?>"/>
				</li>

				<li><label title="NewsLetter" for="uNews">Newsletter</label>
					<span id="radios" style="float: right;">
						<input name ="uNews" id ="uNews" type="radio" value="Yes" <?php if( ($num_results != 0) && (trim($row["NewsLetter"])=="Yes") ){echo(" checked='checked'");} ?>/>Yes
						<input name ="uNews" id ="uNews" type="radio" value="No" <?php if( ($num_results != 0) && (trim($row["NewsLetter"])=="No") ){echo(" checked='checked'");} ?>/>No
					</span>
				</li>



				<li><span><?php echo $_SESSION["errorMessage"]; ?></span></li>
				<li><input type="submit" value="Update User" name="submit" id="submit" /></li>
			</ul>
		</fieldset>
	</form>
	
	<?php 
	//Clear Error Msg
	$_SESSION["errorMessage"] = "";
	?>
	
	<script type = "text/javascript">
		document.getElementById("uLog").focus();
	</script>
	
</body>
</html>