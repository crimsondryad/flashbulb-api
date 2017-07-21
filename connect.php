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
} 
*/
<?php
   
$servername = getenv('MYSQLCONNSTR_host');
$user = getenv('MYSQLCONNSTR_username');
$password = getenv('MYSQLCONNSTR_password');
$dbname = getenv('MYSQLCONNSTR_schema');

//phpinfo();

// Create connection

$con = mysqli_connect("innovation-terminators.mysql.database.azure.com", "terminators@innovation-terminators", $password, $dbname);
mysqli_select_db($con); or die("Unable to connect to database");

// Check connection
/*
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
*/
?>