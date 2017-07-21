<?php
$servername = getenv("MYSQLCONNSTR_host");
$username = getenv("MYSQLCONNSTR_username");
$password = getenv("MYSQLCONNSTR_mysql_password");
$dbname = getenv("MYSQLCONNSTR_schema");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>