<?php
require_once("connect.php");
$username = $_GET['username'];

function get_user($username, $db) {
  $query = "select * from users where users.username='".$username."'";
  $result = mysqli_query($db, $query);
  $row = mysqli_fetch_array($result);
    $json = "{";
    foreach($row as $line) {
        $json .= $line . "\n";
      }
      $json .= "\n\n";
    $json .= "}";

echo json_encode($row);
}

$possible_url = array("get_user","get_message");

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
{
  switch ($_GET["action"])
    {
      case "get_user":
        $value = get_user($_GET['username'],$db);
        break;
      case "get_messages":
        if (isset($_GET["uid"]))
          $value = get_messages_by_user($_GET["uid"],$db);
        else
          $value = "Missing argument";
        break;
    }
}

?>