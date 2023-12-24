<?php
session_start();
include ("includes/openDbConn.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Project 2 - Select Billing</title>
</head>

<body>
	<?php
	//Prepare sql statement
	$sql = "SELECT BillingID, Login, BillName, BillAddress, BillCity, BillState, BillZip, CardType, CardNumber, ExpDate FROM P2Billing ORDER BY BillingID ASC";
	
	//execute sql query and store result of execute in $result
	// the $db was made in OpenDbConn.php
	$result = mysqli_query($db, $sql);
	
	//Check for records in the result, if not set to 0
	if( empty($result))
		$num_results = 0;
	else
		$num_results = mysqli_num_rows($result);
	?>
	
	<h1 style="text-align: center;">Project 2 - Select Billing</h1>
	<?php
	include ("includes/loginMenu.php");
	?>
	
	<table style="border: 0px; width: 1000px; padding: 0px; margin: 0px auto; border-spacing: 0px;" title="Listing of Billing">
		<thead>
			<tr>
				<th colspan="10" style="font-weight: bold; background-color: #add8e6; text-align: center; text-decoration: underline;">P2Billing table</th>
			</tr>
			<tr>
				<th style="background-color: #add8e6; font-weight: bold;">BillingID</th>
				<th style="background-color: #add8e6; font-weight: bold;">Login</th>
				<th style="background-color: #add8e6; font-weight: bold;">BillName</th>
				<th style="background-color: #add8e6; font-weight: bold;">BillAddress</th>
				<th style="background-color: #add8e6; font-weight: bold;">BillCity</th>
				<th style="background-color: #add8e6; font-weight: bold;">BillState</th>
				<th style="background-color: #add8e6; font-weight: bold;">BillZip</th>
				<th style="background-color: #add8e6; font-weight: bold;">CardType</th>
				<th style="background-color: #add8e6; font-weight: bold;">CardNumber</th>
				<th style="background-color: #add8e6; font-weight: bold;">ExpDate</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="10" style="text-align: center; font-style:italic;">Information pulled from MySQL Database</td>
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
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["BillingID"] ) ); ?></td>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["Login"] ) ); ?></td>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["BillName"] ) ); ?></td>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["BillAddress"] ) ); ?></td>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["BillCity"] ) ); ?></td>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["BillState"] ) ); ?></td>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["BillZip"] ) ); ?></td>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["CardType"] ) ); ?></td>
					<td style="border-right: 1px solid #000000;"><?php echo( trim( $row["CardNumber"] ) ); ?></td>
					<td><?php echo( trim( $row["ExpDate"] ) ); ?></td>
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