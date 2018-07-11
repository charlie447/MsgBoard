<?php
session_start();
?>

<html>
<head>
<meta charset="utf-8">
<title>Message Board</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"></head>
<body>

<?php
// 检索 session 数据
echo "浏览量：". $_SESSION['views'];
?>

</body>
</html>