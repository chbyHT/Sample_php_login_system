<?php
  //這頁是登入後POST近來驗證
session_start(); // 用到session都要先寫這一行
if(isset($_POST['email']) && isset($_POST['password'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  //連接資料庫
  $db_host = "localhost"; // 資料庫位址
  $db_user = "root";  // 資料庫帳戶
  $db_pass = "112092"; // 資料庫帳戶密碼
  $db_select = "chby";
  $dsn = "mysql:host=".$db_host.";dbname=".$db_select;
  $pdo = new PDO($dsn, $db_user, $db_pass);


  // 先確認有沒有這一組帳號
  $sql = "SELECT count(*) FROM account WHERE email = ?";
  $stm = $pdo -> prepare($sql);
  $stm -> execute(array($email));
  $result = $stm -> fetch();
  if((int)$result[0] == 0){
    echo "<script>alert('這個帳號不存在');</script>";
    echo "<script>document.location.href='login.php';</script>";
    exit;
  }

  //有這帳號,判斷密碼
  $sql = "SELECT email, password FROM account WHERE password = ?";
  $stm = $pdo -> prepare($sql);
  $stm -> execute(array($password));
  $result = $stm -> fetch();
  if($password != $result['password']){
    echo "<script>alert('密碼錯誤');</script>";
    echo "<script>document.location.href='login.php';</script>";
    exit;
  }

  //有這帳號,判斷認證過了沒
  $sql = "SELECT email, code FROM account WHERE email = ?";
  $stm = $pdo -> prepare($sql);
  $stm -> execute(array($email));
  $result = $stm -> fetch();
  if($result['code'] != 'Pass'){
    echo "<script>alert('此帳號尚未驗證，請至信箱查看');</script>";
    echo "<script>document.location.href='login.php';</script>";
    exit;
  }




  //通過
  $_SESSION['account'] = $result['email']; //給權限
  echo "<script>alert('登入成功');</script>";
  echo "<script>document.location.href='index.php';</script>";
}


 ?>
