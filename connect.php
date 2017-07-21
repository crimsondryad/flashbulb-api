<?php
   
$servername = getenv('MYSQLCONNSTR_host');
$user = getenv('MYSQLCONNSTR_username');
$password = getenv('MYSQLCONNSTR_password');
$dbname = getenv('MYSQLCONNSTR_schema');

//phpinfo();

// Create connection

/*
$con=mysqli_init();
//mysqli_ssl_set($con, NULL, NULL, {ca-cert filename}, NULL, NULL);
mysqli_real_connect($con, "innovation-terminators.mysql.database.azure.com", "terminators@innovation-terminators", $password, $dbname, 3306);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);

//phpinfo();
*/

// Create connection - old skool
@ $db = mysqli_connect("innovation-terminators.mysql.database.azure.com", "terminators@innovation-terminators", $password) or die ("Could not connect");
mysql_select_db("flashbulb_dev", $db) or die("No db selected");

// Check connection
/*
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
*/
?>