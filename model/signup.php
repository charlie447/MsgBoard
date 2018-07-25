<?php
include_once("./conn.php");
$newUsername = isset($_POST['new_username']) ? htmlspecialchars($_POST['new_username']) : '';
$password = isset($_POST['pwd']) ? htmlspecialchars($_POST['pwd']) : '';

//客户端IP
$ipReg = $_SERVER[REMOTE_ADDR];
//设置标准时区
date_default_timezone_set("PRC");
$timeReg = date("Y-m-d H:i:s");
$sql_insert ="INSERT INTO T_USER_LOGIN(username,password,ip_reg,time_reg)VALUES('$newUsername','$password','$ipReg','$timeReg')";
$result = $conn->query($sql_insert);
if (!$result) {
  // code...
  $data = array('ok' => 0);
}else {
  $data = array('ok' => 1 );
}
echo jaon_encode($data);
 ?>
