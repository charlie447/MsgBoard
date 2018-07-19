<head>
<title>用户登录</title>
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

<?php

?>
<!-- Title container-->
<div class="container">
    <div class="jumbotron text-center">
        
        <h1>Message Board</h1>
        <h3>Leave your comments </h3>
        
    </div>

</div>
<!-- end Title container-->
<!-- login card -->
<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 offset-md-3 col-sm-8 offset-md-2">  
        <div class="card bg-info text-white">
            <div class="card-header">
                <h3 class="card-title"> Please login</h3>
            </div>
            <div class="card-body">
                <!-- alert -->

                <!-- form -->
                <form action="" role="form" class="form-horizontal" id="login" method="post" action="">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-info text-white"><i class="fa fa-address-card"></i></span>
                        </div>
                        <input type="text" class="form-control input_field" placeholder="Username" name="username">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-info text-white"><i class="fa fa-warning"></i></span>
                        </div>
                        <input type="password" class="form-control input_field" placeholder="Password" name="password">
                    </div>
                    <div class="col-md-6 offset-md-3 text-center">
                        <button type="submit" class="btn text-info" name="signin">Sign In</button>
                    </div>
                                        
                    <div class="alert alert-danger alert-dismissable" style="margin-top:1em; display:none"  id="login_error">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>错误!</strong> 失败的操作。
                    </div>
                    <div class="alert alert-danger alert-dismissable" style="margin-top:1em; display:none"  id="validate_failed">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>错误!</strong> 用户名或密码有误。
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>
<!-- end login card-->
<script type="text/javascript">
    $(function(){
        function onLogin(){
            username = $("#login").find("input[name=username]").val();
            password = $("#login").find("input[name=password]").val();

            var form_data = $("input").serialize();
            if (username == "" || password == "" ) {
                $("#login_error").show();
                console.log("invalid input.");
                
            }else{
                // AJAX login function
                $.ajax({
                    type:"post",
                    url:"loginCheck.php",
                    dataType:"json",
                    data: form_data,
                    success:function (data) {
                        // console.log(data);
                        if (data.ok == 1) {
                            console.log(data.ok + " : means you passed");
                            window.location.href = "./index.php";
                            
                        }else{
                            console.log(data.ok + " : means you failed");
                            raiseLoginError();
                        }
                    },
                    error:function () {
                        console.log("response is wrong.");
                    }
                })
            }

            return false;
        }
        function raiseLoginError() {
            $("#validate_failed").show();
        }

        $("#login").submit(onLogin);
        $("input").focus(function () {
            $("#login_error").hide();
            $("#validate_failed").hide();
        })
    })
</script>
</body>