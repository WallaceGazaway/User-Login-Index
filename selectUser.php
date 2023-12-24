<?php
session_start();
include ("includes/openDbConn.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Project 2 - User Table</title>
</head>

<body>
	<?php
	//Prepare sql statement
	$sql = "SELECT Login, FirstName, LastName, Passwd, Email, NewsLetter FROM P2User ORDER BY Login ASC";
	
	//execute sql query and store result of execute in $result
	// the $db was made in OpenDbConn.php
	$result = mysqli_query($db, $sql);
	
	//Check for records in the result, if not set to 0
	if( empty($result))
		$num_results = 0;
	else
		$num_results = mysqli_num_rows($result);
	?>
	
	<h1 style="text-align: center;">Project 2 - User Table</h1>
	<?php
	include ("includes/loginMenu.php");
	?>
	
	<table style="border: 0px; width: 1000px; padding: 0px; margin: 0px auto; border-spacing: 0px;" title="Listing of Users">
		<thead>
			<tr>
				<th colspan="6" style="font-weight: bold; background-color: #add8e6; text-align: center; text-decoration: underline;">P2User Table</th>
			</tr>
			<tr>
				<th style="background-color: #add8e6; font-weight: bold;">Login</th>
				<th style="background-color: #add8e6; font-weight: bold;">First Name</th>
				<th style="background-color: #add8e6; font-weight: bold;">Last Name</th>
				<th style="background-color: #add8e6; font-weight: bold;">Password</th>
				<th style="background-color: #add8e6; font-weight: bold;">Email</th>
				<th style="background-color: #add8e6; font-weight: bold;">NewsLetter</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="6" style="text-align: center; font-style:italic;">Information pulled from MySQL Database</td>
			</tr>
		</tfoot>
		<tbody>
			<?php
			//loop results
			for( $i=0; $i<$num_results; $i++)
			{
				//store single record from $result to $row
				$row = mysqli_fetch_array($result);
				
				//below, ALWAYS use trim() on data from the database
				?>
				<tr>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["Login"] ) ); ?></td>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["FirstName"] ) ); ?></td>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["LastName"] ) ); ?></td>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["Passwd"] ) ); ?></td>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["Email"] ) ); ?></td>
					<td><?php echo( trim( $row["NewsLetter"] ) ); ?></td>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
	
	<p>&nbsp;</p>
	
	
<?php 
	//close connection
	include("includes/closeDbConn.php");
?>

</br>
	
<p style="text-align: center; font-weight: bold;">
	<a href="loginSuccess.php">Return to User Directory</a>
</p>
	
</body>
</html>