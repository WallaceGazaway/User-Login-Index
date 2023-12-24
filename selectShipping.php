<?php
session_start();
include ("includes/openDbConn.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Project 2 - Select Shipping</title>
</head>

<body>
	<?php
	//Prepare sql statement
	$sql = "SELECT ShippingID, Login, Name, Address, City, State, Zip FROM P2Shipping ORDER BY ShippingID ASC";
	
	//execute sql query and store result of execute in $result
	// the $db was made in OpenDbConn.php
	$result = mysqli_query($db, $sql);
	
	//Check for records in the result, if not set to 0
	if( empty($result))
		$num_results = 0;
	else
		$num_results = mysqli_num_rows($result);
	?>
	
	<h1 style="text-align: center;">Project 2 - Select Shipping</h1>
	<?php
	include ("includes/loginMenu.php");
	?>
	
	<table style="border: 0px; width: 1000px; padding: 0px; margin: 0px auto; border-spacing: 0px;" title="Listing of User Shipping IDs">
		<thead>
			<tr>
				<th colspan="8" style="font-weight: bold; background-color: #add8e6; text-align: center; text-decoration: underline;">P2Shipping table</th>
			</tr>
			<tr>
				<th style="background-color: #add8e6; font-weight: bold;">ShippingID</th>
				<th style="background-color: #add8e6; font-weight: bold;">Login</th>
				<th style="background-color: #add8e6; font-weight: bold;">Name</th>
				<th style="background-color: #add8e6; font-weight: bold;">Address</th>
				<th style="background-color: #add8e6; font-weight: bold;">City</th>
				<th style="background-color: #add8e6; font-weight: bold;">State</th>
				<th style="background-color: #add8e6; font-weight: bold;">Zip</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="8" style="text-align: center; font-style:italic;">Information pulled from MySQL Database</td>
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
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["ShippingID"] ) ); ?></td>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["Login"] ) ); ?></td>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["Name"] ) ); ?></td>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["Address"] ) ); ?></td>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["City"] ) ); ?></td>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["State"] ) ); ?></td>
					<td><?php echo( trim( $row["Zip"] ) ); ?></td>
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