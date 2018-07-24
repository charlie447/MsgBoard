<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
include_once("./model/retrieve.php");

?>

<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<link rel="stylesheet" href="./public/css/style.css">
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
<div class="jumbotron jumbotron-fluid text-center bg-info ">
    <div class="container">

            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h1>Message Board</h1>
                    <h3>Leave your comments </h3>
                    <h4>Hi, <?php echo $_SESSION["user"]["username"] ?></h4>
                </div>

                <div class="col-md-3 text-right">
                    <button type="button" class="btn btn-outline-muted" onClick="onAjaxLogout()">退出</button>
                </div>


            </div>

    </div>

</div>
<!-- end Title container-->

<!-- main content card -->
<div class="container" >
    <div class="row">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-12  col-md-12">
            <div class="card bg-info text-white">
                <div class="card-header">
                    <div class="row">
                        <h3 class="card-title col-10"> Message List</h3>
                        <!-- create new comment btn创建新留言的按钮 -->
                        <div class="col-2 text-right">
                            <span  class="fa fa-plus" style="font-size:36px;cursor:pointer"  data-toggle="tooltip" title="添加一条留言" onClick="showCreateNewForm()"></span>
                        </div>
                        <!-- end btn -->
                    </div>
                </div>
                <div class="card-body">
                    <!-- new comment area 新留言区域 -->
                    <div class="alert alert-info alert-dismissable " style="margin-top:1em; display:none" id="new_comment_area">
                        <button type="button" class="close"  onClick="hideCreateNewForm()">&times;</button>
                        <strong>新留言（New Comment）: </strong>
                        <form method="post" id="new_message_form">
                            <div class="form-group">
                            <div class="row">

                                <textarea class="form-control" rows="5" id="new_comment" style="margin-top:1em;" name="content" required></textarea>
                            </div>
                            <div class="row ">

                              <div class="input-group mb-3 col-md-6" style="margin-top:1em;">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text bg-info text-white"><i class="fa fa-address-card"></i></span>
                                  </div>
                                  <input type="text" class="form-control input_field" placeholder="留言用户（可选填）" name="post_user_name">
                              </div>
                                <div class="col-md-6 text-right ">
                                  <!-- using ajax post -->
                                    <button type="submit" class="btn btn-outline-info" style="margin-top:1em;" onclick="onCreatePost()">留言</button>
                                    <button type="reset" class="btn btn-outline-info" style="margin-top:1em;">重置</button>
                                </div>

                            </div>
                            </div>
                        </form>
                    </div>
                    <!-- end new comment area -->

                    <!-- List of query result -->
                    <?php while($row = $one_page_result->fetch_assoc()) { ?>

                    <div class="alert alert-info alert-dismissable pointer-cursor"
                    style="margin-top:1em;"  data-toggle="collapse"
                    data-target=" <?php echo "#msg".$row['message_id']; ?>">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <div class="row" id="<?php echo "row_".$row['message_id']; ?>">

                              <span class=" col-md-2"> <strong><?php echo $row['name_user_post'] ?> </span> </strong>
                              <span class=" col-md-7 content-preview text-muted" for="content-preview" id="<?php echo "preview_".$row['message_id']; ?>"> <?php echo $row["content"]; ?></span>

                              <span class=" col-md-2 "><?php echo date('Y-m-d',$row['time_post']); ?> </span>


                            </div>

                            <div id="<?php echo "msg".$row['message_id']; ?>" class="collapse ">
                              <!-- show the message content -->
                                <?php echo $row["content"]; ?>
                            </div>

                    </div>
                  <?php } ?>

                </d

                iv>
                <!-- card footer: show the page nums -->
                <div class="card-footer">
                  <div class="row">


                    <div class="fa fa-arrow-left col-2 ">
                      <span class="d-none d-sm-inline">上一页</span>
                    </div>
                    <div class="text-center col-8">

                    <?php
                      for ($i=1; $i <= $page_num; $i++) {
                        $show=($i!=$page)?"<a href='$self?page=".$i."' class='text-dark'> $i </a>":"<b>$i</b>";
                        echo $show;
                      }
                    ?>
                    </div>
                    <div class="fa fa-arrow-right col-2 text-right">
                      <span class="d-none d-sm-inline">下一页</span>
                    </div>
                  </div>
                </div>
                <!-- end card footer -->
            </div>
        </div>
    </div>
</div>
<!-- end login card-->


</body>
</html>
