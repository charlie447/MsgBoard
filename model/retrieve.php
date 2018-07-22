<?php
  include_once("conn.php");

  // set mysql query encoding
  $conn->query("SET NAMES utf8");
  
  $list = 10; // 10 rows for each page
  $sql = "SELECT * FROM T_USER_MESSAGE";
  $result = $conn->query($sql);
  if($result->num_rows < 1){
    echo '查询数据库错误!';
  }
  // 数据表中的总行数
  $num_rows = $result->num_rows;
  /* */
  //当前页位置，获取page的值，如不存在设为1
  $page = ($_GET['page']?intval($_GET['page']):1);
  // 页面数
  $page_num = ceil($num_rows/$list);
  //page越界就返回首第一页
  if(($_GET['page'])>$page_num){
      $page = 1;
  }
  //获取limit的第一个参数的值offset,分页的第一个参数的数字
  $offset = ($page - 1) * $list;
  $one_page_result = $conn->query("SELECT * FROM T_USER_MESSAGE ORDER BY message_id DESC LIMIT $offset,$list");
  if (!$one_page_result) {
    // error report
    echo '查询数据库one_page_result错误!';
  }

?>
