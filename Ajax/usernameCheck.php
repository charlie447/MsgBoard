<?php
  include_once("../model/conn.php");

  $new_username = isset($_POST[newUsername])?htmlspecialchars($_POST[newUsername]):"admin" ;
  $sql_query_username = "SELECT * FROM T_USER_LOGIN WHERE username='$new_username' limit 1";
  $result = $conn->query($sql_query_username);
  if (!$result) {
    // if query has no result
    $data = array(
      'ok' => 1,
      "newUsername"=> $new_username,
      "msg"=>"no result."
    );
  }else {
    // user alredy existed
    if ($result->num_rows > 0) {
      // code...
      $data = array(
        'ok' => 0,
        "newUsername"=> $new_username,
        "msg"=>"no result have rows"
     );
    }else {
      $data = array(
        'ok' => 1,
        "newUsername"=> $new_username,
        "msg"=>"no result no rows"
      );
    }

  }
  echo json_encode($data);
 ?>
