
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
            setTimeout(() => {
                window.location.replace("./login.php");
            }, 3000);
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