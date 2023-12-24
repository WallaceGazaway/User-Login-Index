<?php
//session object
session_start();

//Open Database Connection
include("includes/openDbConn.php");

//Prepare SQL Statement
$sql = "DELETE FROM P2Shipping WHERE Login= '{$_SESSION["Login"]}'";

//Execute SQL and store result of execution into $result
$result = mysqli_query($db, $sql);

//Clean
include("includes/closeDbConn.php");

//redirect to default page
header("Location: selectShipping.php");
?>