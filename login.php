<!-- <php include ("doLogin.php"); ?> -->

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Project 2 - User Login</title>
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
		li input:focus { border:1px solid #999; }
		fieldset{ padding:10px; border:1px solid #000; width:450px; overflow:auto; margin:10px;}
		legend{ color:#000000; margin:0 10px 0 0; padding:0 5px; font-size:11pt; font-weight:bold; }
	</style>
</head>

<body>
<h1 style="font-size:14pt; text-align: center;">Project 2 - User Login</h1>

<form id="form0" method="post" action="doLogin.php">
	<fieldset>
		<legend>Login</legend>
		<ul>
			<li> 
				<label title="Login" for="uLog">User Login</label>
				<input type="text" name="uLog" id="uLog" size="20" maxLength="15" />
			</li>
			<li> 
				<label title="Passwd" for="uPass">User Password</label>
				<input type="password" name="uPass" id="uPass" size="20" maxLength="60" />
			</li>

			<br/><br/>
			<br/><br/>

			<li><input id="LoginBtn" name="LoginBtn" type="submit" value="Login" /></li>
		</ul>
	</fieldset>
	<!--
	<fieldset id="logSubmit">
		<input id="LoginBtn" name="LoginBtn" type="submit" value="Login" />
	</fieldset>
	-->
</form>

<p style="text-align: center; font-weight: bold;">
	<a href="index.php">Return to Landing Page</a>
</p>

<!-- This causes UserID to already be active on page load -->
<script type="text/javascript">
	document.getElementById("uLog").focus();
</script>


</body>
</html>