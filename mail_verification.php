

<?php
/*這頁是從信箱GET連結近來，驗證帳號*/
  if(isset($_GET['code'])){
    $code = $_GET['code'];

    //連接資料庫
    $db_host = "localhost"; // 資料庫位址
    $db_user = "root";  // 資料庫帳戶
    $db_pass = "112092"; // 資料庫帳戶密碼
    $db_select = "chby";
    $dsn = "mysql:host=".$db_host.";dbname=".$db_select;
    $pdo = new PDO($dsn, $db_user, $db_pass);

    // 先確認有沒有這一組驗證碼
    $sql = "SELECT count(*) FROM account WHERE code = ?";
    $stm = $pdo -> prepare($sql);
    $stm -> execute(array($code));
    $result = $stm -> fetch();
    if((int)$result[0] > 0){     //如果有找到
      $sql = "UPDATE account SET `code` = 'Pass' WHERE `code` = ?";
      $stm = $pdo -> prepare($sql);
      $stm->execute(array($code));

      echo "<script>alert('驗證完成，請重新登入');</script>";
      echo "<script>document.location.href='login.php';</script>";
      exit;
    }else{
      echo "<script>alert('此帳號以驗證或查無此網頁');</script>";
      echo "<script>document.location.href='login.php';</script>";
    }

  }
 ?>
