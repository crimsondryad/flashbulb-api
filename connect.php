<?php
   
$servername = getenv('MYSQLCONNSTR_host');
$user = getenv('MYSQLCONNSTR_username');
$password = getenv('MYSQLCONNSTR_password');
$dbname = getenv('MYSQLCONNSTR_schema');

// Create connection
@ $db = mysqli_connect("innovation-terminators.mysql.database.azure.com", "terminators@innovation-terminators", $password) or die ("Could not connect");
mysqli_select_db($db, "flashbulb_dev") or die("No db selected");

$GLOBALS['db'];
?>