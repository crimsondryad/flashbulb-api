<?php
require_once("connect.php");

function get_user($username) {
    $result = mysql_query("select * from users where username='".$username."'");
    if(!$result) {
        die("Try again, loser ".mysqli_error);
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