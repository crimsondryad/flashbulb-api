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

function get_messages($uid, $db) {
  $query = "select * from base_message where base_message.b_uid ='".$uid."'";
  $result = mysqli_query($db, $query);
  $num_rows = mysqli_num_rows($result);
  
  while($row = mysqli_fetch_assoc($result)) {
    
   $json .= json_encode($row);
   /*
    foreach($row as $val) {
      foreach($val as $line) {
        $json_object .= json_encode($line);
      }
      
      $json .= json_encode($json_object);
    }
   */
  }
  
  /*
  $row = mysqli_fetch_assoc($result);
    $json = "{";
    foreach($row as $line) {
        $json .= $line . "\n";
      }
      $json .= "\n\n";
    $json .= "}";
*/
return $json;
}

function send_message($_POST, $db) {

   $message = $_POST['text'];
   $b_username = $_POST['sender']; // is this really the sender field?
   $b_uid = $_POST['b_uid'];  // sender or recipient?
    
  $query = "insert into base_message (bid, b_username, bdate, bmsg, b_uid) values  ('', $b_username, NOW(), $message, $b_uid)'";
  $result = if (mysqli_query($db, $query)) {
    return "Message sent";
  } else {
    return "Message failed.  Please try again." .mysqli_error($db);
  }
  
}

$possible_url = array("get_user","get_messages","send_message");

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url))
{
  switch ($_GET["action"])
    {
      case "get_user":
        $value = get_user($_GET['username'],$db);
        break;
      case "get_messages":
        if (isset($_GET["uid"]))
         echo $value = get_messages($_GET["uid"],$db);
        else
          $value = "Missing argument";
        break;
    case "send_message":
         echo $value = send($_POST,$db);
        else
          $value = "Missing argument";
        break;
    }
}

?>