<?php
  //這頁是登出  清除登入權限


  session_start(); // 用到session都要先寫這一行
  // 防止沒有登入的使用者到這一頁
  if(isset($_SESSION['account'])){
    // 跳轉
    header('Location: login.php');
  }
  // 將session清掉 清除登入權限
  session_destroy();
  // 跳轉
  header('Location: login.php');
 ?>
