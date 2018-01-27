<?php
  session_start(); // 用到session都要先寫這一行
  // 防止已經登入的使用者在回到這一頁
  if(isset($_SESSION['account'])){
    // 跳轉
    header('Location: index.php');
  }
    //這頁是註冊畫面
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script> <!--載入JQ-->
  </head>
  <style media="screen">
  input[type=text],input[type=email],input[type=password] {
      width: 90%;
      padding: 6px 16px;
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
      <div class="row" style="margin:8% 0 0 0">
        <div class="col"></div>
        <div class="col" style="text-align:center;">
          <span style="font-size:80px;font-family:Microsoft JhengHei;">註冊</span><p>
          <span style="font-size:18px;">已經有帳號了嗎? </span><a href="login.php" style="font-size:18px;color:#1e90ff;text-decoration:none;font-family:Microsoft JhengHei;"> 登入</a>
          <hr>
          <form action="signup_proc.php" method="post">
              <span>Name</span><p>
              <input type="text" name="name" autocomplete="off" required="required"><p>
              <label>Email</label>
              <input type="email" name="email" autocomplete="off" required="required"><p>
              <label>Password</label>
              <input type="password" name="password" id="newpassword" onchange="Rpassword.pattern=(this.value);"><p>
              <label>Repeat Password</label>
              <input type="password" name="Rpassword" id="repassword" pattern="" title="Retype Password"><p>
              <label>Phone number</label>
              <input type="text" name="phone" autocomplete="off" onkeyup="value=value.replace(/[^\d]/g,'') " required="required">
              <br><br>
              <input type="checkbox" name="check" value="1" id="checkbox"> <label style="font-family:Microsoft JhengHei;">我同意帳戶條款 </label>

              <button type="submit" class="btn" id="submit" style="margin:15% 0px;font-family:Microsoft JhengHei;"><b>立即註冊</b></button>
          </form>

        </div>
        <div class="col"></div>
      </div>
    </div>

    <script>
      $('#submit').prop("disabled", true);
      $('input:checkbox').click(function() {
              if ($(this).is(':checked')) {
            $('#submit').prop("disabled", false);
              } else {
          if ($('.chk').filter(':checked').length < 1){
            $('#submit').attr('disabled',true);}
          }
      });
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
