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
        
    </div>

</div>
<!-- end Title container-->
<!-- login panel -->
<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 offset-md-3 col-sm-8 offset-md-2">  
        <div class="card bg-info text-white">
            <div class="card-header">
                <h3 class="card-title"> Please login</h3>
            </div>
            <div class="card-body">
                <!-- alert -->

                <!-- form -->
                <form action="" role="form" class="form-horizontal">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-info text-white"><i class="fa fa-address-card"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-info text-white"><i class="fa fa-warning"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="col-md-6 offset-md-3 text-center">
                        <button type="submit" class="btn text-info">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>