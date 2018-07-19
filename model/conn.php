<?php
$servername = "localhost:3306";
$username = "root";
$password = "CHARLIE4494";
$dbname = "MessageBoard";
// 面向对象连接, object-oriented
// 创建连接
$conn = new mysqli($servername, $username, $password,$dbname);
// 检测连接
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
// echo "连接成功";
?>