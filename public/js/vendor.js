
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
