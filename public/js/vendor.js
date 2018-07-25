
// tooltip 鼠标放置提示
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});

function loginAlert(isLogin) {
    if (isLogin) {
        console.log("show the login-success alert.");
        $("#is_login").show();
        setTimeout(() => {
            $("#is_login").hide();
        }, 3000);

    }else{
        $("#not_login").show();
        console.log("show the no-login alert.");
        // redirect to the login page in 3 secs
        countDown3s();
        // window.location.replace("./login.php");

        // setTimeout(() => {
        //     window.location.replace("./login.php");
        // }, 3000);
    }
}

function onAjaxLogout() {
    if (window.XMLHttpRequest)
    {
        // IE7+, Firefox, Chrome, Opera, Safari 浏览器执行的代码
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        //IE6, IE5 浏览器执行的代码
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","Ajax/onLogout.php",true);
    xmlhttp.send();
    window.location.replace("login.php")
}

var count = 3;
function countDown3s() {
    // redirect to the login page in 3 secs
    console.log("count down : " + count );
    // document.getElementById("count_down").innerHTML = count;
    $("#count_down").text(count);
    // console.log($("#count_down").text());
    count = count - 1;
    if (count >= 0) {
        setTimeout("countDown3s()", 1000);
    }else{
        window.location.replace("./login.php");
    }


}

function showCreateNewForm(){
  $("#new_comment_area").show();
}

function hideCreateNewForm(){
  $("#new_comment_area").hide();
}

function togglePreview(id){
  console.log(id);
  $("#row_" + id).toggle(
    function(){
      $("#preview_" + id).css("visibility:hidden");
    },
    function () {
      $("#preview_" + id).css("visibility:visible");
    }
  );

}

function onCreatePost() {
  console.log("creating a new message...");
  var form_data = $("#new_message_form").serialize();
  $.ajax({
    type:"post",
    url:"./model/createPost.php",
    dataType:"json",
    data: form_data,
    success:function (data) {
      if (data.ok == 1) {
        // 如果插入数据成功，则刷新页面
        location.reload();
      }
    },
    error:function () {
      console.log("onCreatePost ajax request have an Error");
    }
  })
}

function confirmPassword() {
  // make sure that the passwords of entered in twice is the same
  // or pop a Alert
  if ($("#pwd").val() != $("#repwd").val()) {
    // $("#error_detail").text("两次密码不匹配。");
    // $("#signup_error").show();
    $("#signup_btn").attr("disabled",true);
    $("#repwd_danger").addClass("bg-danger");
  }else {
    console.log("密码匹配。");
    $("#signup_btn").attr("disabled",false);
    $("#repwd_danger").removeClass("bg-danger");
  }
}

function confirmUsername() {
  // make sure the username is availuable currently
  // by using ajax request
  var new_username = $("#new_username").val()
  console.log(new_username);
  $.post("./Ajax/usernameCheck.php",
  {
    newUsername:new_username
  },
  function(data,status){
    console.log("status:" + status);
    if (status=="success") {
      if (data.ok==1) {
        console.log("username is availuable");
        $("#username_danger").removeClass("bg-danger");
      }else {
        console.log("username is unavailuable. data.ok:" + data.ok);
        $("#username_danger").addClass("bg-danger");
      }
    }else {
      console.log("request has error.");
    }
  }
  ,"json");
}

function onSignup() {

}
