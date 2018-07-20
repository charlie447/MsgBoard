<?php
session_start();
$_SESSION["username"] = "Charlie J Zhang"
?>

<html>
<head>
<title>首页</title>
<link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
<!-- 新 Bootstrap4 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.1.0/css/bootstrap.min.css">
 
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
 
<!-- popper.min.js 用于弹窗、提示、下拉菜单 -->
<script src="https://cdn.bootcss.com/popper.js/1.12.5/umd/popper.min.js"></script>
 
<!-- 最新的 Bootstrap4 核心 JavaScript 文件 -->
<script src="https://cdn.bootcss.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<!-- 使用自定义的工具js vendor.js -->
<script src="./public/js/vendor.js"></script>
<style>

</style>
</head>
<body>
<!-- Login status Alert: success or failed-->
<div class="alert alert-success alert-dismissable" style="margin-top:1em; display:none"  id="is_login">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <div class="text-center">
            <strong>登陆成功： </strong>  <?php echo $_SESSION["user"]["username"] ?>
        </div>
</div>
<div class="alert alert-danger alert-dismissable " style="margin-top:1em;display:none"  id="not_login">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <div class="text-center">
            <strong>当前未登录：</strong>  <span id="count_down" ></span>秒后跳转至登陆界面。
        </div>
</div>
<!-- end Alert -->
<?php 
    session_start();
    if (isset($_SESSION["user"])) {
        # 已经成功登陆
        echo "<script>loginAlert(true);</script>";
    }else {
        # login failed
        echo "<script>loginAlert(false);</script>";
    }
?>
<!-- Title container-->
<div class="container">
    <div class="jumbotron text-center ">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1>Message Board</h1>
                <h3>Leave your comments </h3>      
            </div>
            <div class="col-md-3 text-right">
                <button type="button" class="btn btn-outline-info" onClick="onAjaxLogout()">退出</button>
            </div>
        </div>

    </div>

</div>
<!-- end Title container-->

<!-- login card -->
<div class="container" >
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