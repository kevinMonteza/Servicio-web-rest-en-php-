<?php

require_once('dbconn.php');

function get_user_info($id,$pass){
  global $dbconn;
  /*
  print_r($id);
  ?><br>
  <?php
  print_r($pass);
  ?><br>
  <?php
  */
  /*
  $id = implode("",$id);
  $pass = implode("",$pass);
  echo $id;
  ?><br>
  <?php
  echo $pass;
  ?><br>
  <?php
  */
  $sql = "SELECT id, pass
          FROM  usuarios
          WHERE id = '$id' and pass = '$pass'";
  $stmt = $dbconn->prepare($sql);
  $stmt->execute();
  $data = $stmt->fetch(PDO::FETCH_ASSOC);
  $data = json_encode($data);
  return $data;
}

if(isset($_GET["action"])){
  switch ($_GET["action"]) {
    case "get":
      $value = get_user_info($_GET["id"],$_GET["pass"]);
      break;
  }

}

exit(json_encode($value));

?>
