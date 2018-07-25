<head>
<title>用户入口</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
<!-- 新 Bootstrap4 核心 CSS 文件 -->
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.1.0/css/bootstrap.min.css">

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>

<!-- popper.min.js 用于弹窗、提示、下拉菜单 -->
<script src="https://cdn.bootcss.com/popper.js/1.12.5/umd/popper.min.js"></script>

<!-- 最新的 Bootstrap4 核心 JavaScript 文件 -->
<script src="https://cdn.bootcss.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script src="./public/js/vendor.js"></script>
<link rel="stylesheet" href="./public/css/style.css">
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
              <div class="">
                <ul class="nav nav-tabs " >
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#login-tab">Sign In</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="#signup-tab" data-toggle="tab" >Sign Up</a>
                </li>
                </ul>

              </div>
            </div>
            <div class="card-body ">
              <div class="tab-content">



                <div class="container tab-pane active" id="login-tab">
                <!-- form -->
                  <form action="" role="form" class="form-horizontal " id="login" method="post" action="">
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
                        <button type="submit" class="btn btn-outline-muted bg-warning" name="signin">Sign In</button>
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
                <div class="container tab-pane fade" id="signup-tab">
                <!-- signup form -->
                  <form action="" role="form" class="form-horizontal " id="signup">
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text bg-info text-white" id="username_danger"><i class="fa fa-address-card"></i></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Username" required id="new_username">
                      </div>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text bg-info text-white"><i class="fa fa-warning"></i></span>
                          </div>
                          <input type="password" class="form-control" placeholder="Password" required name="pwd" id="pwd">
                      </div>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text bg-info text-white" id="repwd_danger"><i class="fa fa-warning"></i></span>
                          </div>
                          <input type="password" class="form-control" placeholder="Password check" required name="repwd" id="repwd">
                      </div>
                      <div class="col-md-6 offset-md-3 text-center">
                          <button type="submit" class="btn text-info" id="signup_btn">Sign Up</button>
                      </div>
                      <div class="alert alert-danger alert-dismissable" style="margin-top:1em; display:none"  id="signup_error">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>错误!</strong> <span id="error_detail"></span>
                      </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<!-- end login card-->

<!-- modal container -->
<div class="container">

<!-- 模态框 -->
<div class="modal fade" id="message_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- 模态框头部 -->
      <div class="modal-header">
        <h4 class="modal-title">Message Board</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- 模态框主体 -->
      <div class="modal-body" id="message_body">
        
      </div>

      <!-- 模态框底部 -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
      </div>

    </div>
  </div>
</div>
</div>
<!-- end modal container -->
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
                    url:"./Ajax/loginCheck.php",
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
            $("#signup_error").hide();
        });
        $("#repwd").keyup(confirmPassword);
        $("#new_username").blur(confirmUsername);
        // $("#message_modal").modal('show');
    })
</script>
</body>
