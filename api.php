<?php
require_once("connect.php");

function get_user($username) {
    $result = mysql_query("select * from users where username='".$username."'");
    if(!$result) {
        die("Try again, loser ".mysqli_error);
    }
    
    echo mysql_result($result);
    
}



?>