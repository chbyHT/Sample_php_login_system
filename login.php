<?php
  session_start(); // 用到session都要先寫這一行
  // 防止已經登入的使用者在回到這一頁
  if(isset($_SESSION['account'])){
    // 跳轉
    header('Location: index.php');
  }
  //這頁是登入畫面
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
      width: 90%;
      padding: 8px 16px;
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
        <div class="col"></div>
        <div class="col" style="text-align:center;">
          <span style="font-size:80px;font-family:Microsoft JhengHei;">登入</span><p>
          <span style="font-size:18px;">New to CHBY? </span><a href="signUp.php" style="font-size:18px;color:#1e90ff;text-decoration:none;font-family:Microsoft JhengHei;"> 註冊</a>
          <hr>
          <form action="login_proc.php" method="post" onsubmit="return check()">

              <label>Email</label><p>
              <input type="email" name="email" id="email" autocomplete="off" required="required"><p>
              <label>password</label><p>
              <input type="password" name="password" id="password" required="required"><p>
                <div class="row">
                  <div class="col"><input type="checkbox" name="check" value="check1" id="check"> <label style="font-family:Microsoft JhengHei;">記住我</label></div>
                  <div class="col"><a href="forge_password.php" class="ac" style="margin:0px 0px 0px 10%;text-decoration:none;font-family:Microsoft JhengHei;">忘記密碼?</a><p></div>
                </div>
              <button type="submit" class="btn" style="margin:15% 0px;font-family:Microsoft JhengHei;"><b>登入</b></button>

          </form>

        </div>
        <div class="col"></div>
      </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
