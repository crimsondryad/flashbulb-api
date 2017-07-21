<?php
require_once("connect.php");
$username = $_GET['username'];

function get_user($username) {
  $sql = "select * from users where users.username = 'hodor'";
    $result = mysqli_query($con, $sql);
    if(!$result) {
        die("Try again, loser ".mysqli_error);
    }
    echo $result;
   if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        print_r($row);
    }
} else {
    echo "0 results";
} 
    return mysql_result($result);
    
}
$possible_url = array("get_username");

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
{
  switch ($_GET["action"])
    {
      case "get_user":
        $value = get_user();
        break;
      case "get_app":
        if (isset($_GET["id"]))
          $value = get_app_by_id($_GET["id"]);
        else
          $value = "Missing argument";
        break;
    }
}

?>