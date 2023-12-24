<?php 
//session object
session_start();

//check for empt session
if(empty($_SESSION["errorMessage"]))
	$_SESSION["errorMessage"] = "";
?>


<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta charset="utf-8" />
	<title>Project 2 - Insert User</title>
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
		li input:focus { border:1px solid #999; }
		fieldset{ padding:10px; border:1px solid #000; width:400px; overflow:auto; margin:10px;}
		legend{ color:#000000; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold; }
	</style>
</head>

<body>
	<h1 style="text-align:center">Project 2 - Insert User</h1>
	<?php 
		include("includes/menu.php");
	?>
	<div style="font-style:italic; text-align:center; font-size:9px;">this set of pages validates as HTML5 compliant <br />&nbsp;</div>
	
	<form id="form0" method="post" action="doInsertUser.php">
		<fieldset>
			<legend>Insert into P2User table</legend>
			<ul>
				<li><label title="Login" for="uLog">Login</label><input name ="uLog" id ="uLog" type="text" size="20" maxlength="15" /></li>

				<li><label title="FirstName" for="firstName">First Name</label><input name ="firstName" id ="firstName" type="text" size="20" maxlength="25"/></li>

				<li><label title="LastName" for="lastName">Last Name</label><input name ="lastName" id ="lastName" type="text" size="20" maxlength="60"/></li>

				<li><label title="Passwd" for="uPass">Password</label><input name ="uPass" id ="uPass" type="password" size="20" maxlength="60"/></li>

				<li><label title="Email" for="uEmail">Email</label><input name ="uEmail" id ="uEmail" type="text" size="20" maxlength="40"/></li>

				<li><label title="NewsLetter" for="uNews">NewsLetter</label>
					<span id="radios" style="float: right;">
						<input name ="uNews" id ="uNews" type="radio" value="Yes" maxlength="4"/>	Yes
						<input name ="uNews" id ="uNews" type="radio" value="No" maxlength="4"/>	No
					</span>
				</li>


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
		document.getElementById("uLog").focus();
	</script>
	
</body>
</html>