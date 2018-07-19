<?php
session_start();
unset($_SESSION["user"]);
session_destroy();
echo "注销成功，正在跳转...";

?>