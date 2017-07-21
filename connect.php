<?php
$servername = getenv("MYSQLCONNSTR_host");
$username = getenv("MYSQLCONNSTR_username");
$password = getenv("MYSQLCONNSTR_mysql_password");
$dbname = getenv("MYSQLCONNSTR_schema");

print_r($getenv);

// Create connection

$con=mysqli_init();
//mysqli_ssl_set($con, NULL, NULL, {ca-cert filename}, NULL, NULL);
mysqli_real_connect($con, "innovation-terminators.mysql.database.azure.com", "terminators@innovation-terminators", $password, $dbname, 3306);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
echo "Connected successfully";
?>