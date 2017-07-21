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

function send_message($post, $db) {

   $message = $post['text'];
   $b_username = $post['sender']; // is this really the sender field?
   $b_uid = $post['b_uid'];  // sender or recipient?
   $bstat = $post['category'];
    
  $query = "insert into base_message (bid, b_username, bstat, bdate, bmsg, b_uid) values  ('', $b_username, $bstat, '', $message, $b_uid)";
  if (mysqli_query($db, $query)) {
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
    
    }

} else {
   if (isset($_POST["action"]) && in_array($_POST["action"], $possible_url)) {
    switch {
    case "send_message":
        $post = $_POST;
         echo $value = send_message($post,$db);
        else
          $value = "Missing argument";
        break;
    }
    }
}



?>