<?php
  include_once("./conn.php");
  $conn->query("SET NAMES utf8");
  // SQL example
  // insert into T_USER_MESSAGE(ip_user_post, name_user_post, content, time_post, lock_message)
  // values
  // ("localhost", "user9527", "It's been so long.", 1532225788, 1)
  //
  $ipUserPost = $_SERVER[REMOTE_ADDR];
  //设置标准时区
  date_default_timezone_set("PRC");
  $timePost=date("Y-m-d H:i:s");
  //标准时间转换为时间戳
  if(!$timePost=(strtotime($timePost))){
      echo '时间戳转换失败!';
  }
  $content= $_POST[content];
  $content = htmlspecialchars(addslashes($content),ENT_QUOTES,UTF-8);
  // 暂时默认为1
  $lock_message = 1;

  if ($_POST[post_user_name]) {
    // 如果留言者留下用户名
    $postUserName = $_POST[post_user_name];
  }else {
    // 留言者没有留下用户名
    $postUserName = "Your Predestiny";
  }

  $insert_sql = "INSERT INTO T_USER_MESSAGE(ip_user_post, name_user_post, content, time_post, lock_message) VALUES ('$ipUserPost', '$postUserName', '$content', '$timePost', $lock_message)";
  if (!$conn->query($insert_sql)) {
    // error report
    // echo '插入数据错误！';
    $data = array(
      'ok' => 0
    );

  }else {
    // code...
    // echo '发布成功<br/>2秒后返回！';
    $data = array(
      'ok' => 1
    );

  }
  echo json_encode($data);

 ?>
