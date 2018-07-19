<?php
session_start();
$_SESSION["username"] = "Charlie J Zhang"
?>

<html>
<head>
<title>用户注册</title>
<link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
<!-- 新 Bootstrap4 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.1.0/css/bootstrap.min.css">
 
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
 
<!-- popper.min.js 用于弹窗、提示、下拉菜单 -->
<script src="https://cdn.bootcss.com/popper.js/1.12.5/umd/popper.min.js"></script>
 
<!-- 最新的 Bootstrap4 核心 JavaScript 文件 -->
<script src="https://cdn.bootcss.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<style>

</style>
</head>
<body>

<!-- Title container-->
<div class="container">
    <div class="jumbotron text-center">
        
        <h1>Message Board</h1>
        <h3>Leave your comments </h3>
        <?php 
            echo $_SESSION["username"];
            include_once('./model/conn.php');

            $sql = "SELECT * FROM T_USER_LOGIN WHERE username='admin' AND password='admin123' limit 1";
            $result = $conn->query($sql);
 
            if ($result->num_rows > 0) {
                // 输出数据
                while($row = $result->fetch_assoc()) {
                    $data = array(
                        'uuid' => $row["uuid"],
                        'username' => $row["username"],
                        'password' => $row["password"],
                        'ip_reg' => $row["ip_reg"],
                        'time_reg' => $row["time_reg"],
                        'permission' => $row["permission"],
                        'ok' => 1
                    );
                    
                    echo json_encode($data);
                }
            } else {
                echo "0 结果";
            }
            $conn->close();
        ?>
    </div>

</div>
<!-- end Title container-->

<!-- login card -->
<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 offset-md-3 col-sm-8 offset-md-2">  
        <div class="card bg-info text-white">
            <div class="card-header">
                <h3 class="card-title"> Information</h3>
            </div>
            <div class="card-body">
                <!-- alert -->
                <div class="alert alert-info alert-dismissable" style="margin-top:1em;"  id="login_error">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Session->Username:</strong>  <?php echo $_SESSION["user"]["username"] ?>
                </div>
                <div class="alert alert-info alert-dismissable" style="margin-top:1em;"  id="login_error">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Session->Password:</strong>  <?php echo $_SESSION["user"]["password"] ?>
                </div>


            </div>
        </div>
    </div>
</div>
<!-- end login card-->
</body>
</html>