<?php
//這頁是修改密碼
if(isset($_GET['mail']) && isset($_GET['code'])){
  $email = $_GET['mail'];
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
  if((int)$result[0] == 0){     //如果沒找到
    echo "<script>alert('此帳號以驗證或查無此網頁');</script>";
    echo "<script>document.location.href='login.php';</script>";
    exit;
  }
}else
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <style media="screen">
  input[type=email],input[type=password] {
      width: 70%;
      padding: 8px 0px;
      margin: 2px 0px;
      box-sizing: border-box;
      border: none;
      border-bottom: 2px solid #696969;
      outline:none;
  }

  .btn {
    -webkit-border-radius: 60;
    -moz-border-radius: 60;
    border-radius: 60px;
    font-family: Arial;
    color: #ffffff;
    font-size: 20px;
    background: #3498db;
    padding: 6px 40px 6px 40px;
    text-decoration: none;
  }

  .btn:hover {
    background: #3cb0fd;
    text-decoration: none;
  }

  .ac:hover {color:#1e90ff;}

  .saturate{
    -webkit-filter:saturate(0.75);
  }
  </style>
  <body>
    <div class="container">
      <div class="row" style="margin:10% 0 0 0">
        <div class="col-2"></div>
        <div class="col-8" style="text-align:center;">
          <span style="font-size:80px;font-family:Microsoft JhengHei;">更改密碼</span><p>
          <hr>

          <form action="" method="post" onsubmit="return check()">
              <label>New password</label><p>
              <input type="password" name="password" id="newpassword" onchange="Rpassword.pattern=(this.value);"><p>
              <label>Repeat password</label><p>
             <input type="password" name="Rpassword" id="repassword" pattern="" title="Retype Password"><p>

              <button type="submit" class="btn" style="margin:15% 0px;font-family:Microsoft JhengHei;"><b>變更密碼</b></button>
          </form>

        </div>
        <div class="col-2"></div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

<?php
  if(isset($_POST['Rpassword'])){
      $newpassword = $_POST['Rpassword'];

      $sql = "UPDATE account SET `code` = ? WHERE `email` = ?"; //把GET近來的mail驗證碼改Pass
      $stm = $pdo -> prepare($sql);
      $stm->execute(array('Pass',$email));

      $sql = "UPDATE account SET `password` = ? WHERE `email` = ?"; //把GET近來的mail密碼改 新密碼
      $stm = $pdo -> prepare($sql);
      $stm->execute(array($newpassword,$email));

      echo "<script>alert('新密碼設定完成，請以新密碼重新登入');</script>";
      echo "<script>document.location.href='login.php';</script>";
      exit;
  }

 ?>
