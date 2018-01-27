<?php
  /*
  ini_set("display_errors", "On"); // 顯示錯誤是否打開( On=開, Off=關 )
  error_reporting(E_ALL & ~E_NOTICE);
  */
 ?>

<?php
  //這頁是註冊後POST近來
if(isset($_POST['name']) && isset($_POST['email'])&& isset($_POST['password'])&& isset($_POST['phone'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $phone = $_POST['phone'];


  //連接資料庫
  $db_host = "localhost"; // 資料庫位址
  $db_user = "root";  // 資料庫帳戶
  $db_pass = "112092"; // 資料庫帳戶密碼
  $db_select = "chby";
  $dsn = "mysql:host=".$db_host.";dbname=".$db_select;
  $pdo = new PDO($dsn, $db_user, $db_pass);

  // 先確認這一組帳號帳號有沒有被註冊過
  $sql = "SELECT count(*) FROM account WHERE email = ?";
  $stm = $pdo -> prepare($sql);
  $stm -> execute(array($email));
  $result = $stm -> fetch();
  if((int)$result[0] > 0){
    echo "<script>alert('這個帳號已經被使用過');</script>";
    echo "<script>document.location.href='signup.php';</script>";
    exit;
  }

  //產生隨機驗證碼
  function Pass($i=8) {
  	srand((double)microtime()*1000000);
  	return strtoupper(substr(md5(uniqid(rand())),rand(0,32-$i),$i));
  }
  $code = Pass(16);

  // 註冊
  $sql = "INSERT INTO account (`auto_id`,`name`,`email`,`password`,`phone`,`code`) VALUES (null,?,?,?,?,?)";
  $stm = $pdo -> prepare($sql);
  $stm -> execute(array($name,$email,$password,$phone,$code));



  //寄信
  include_once ("main_lib/PHPMailer-master/PHPMailerAutoload.php");
  $mail= new PHPMailer(); //建立新物件
  $mail->IsSMTP(); //設定使用SMTP方式寄信
  $mail->SMTPAuth = true; //設定SMTP需要驗證
  $mail->SMTPSecure = "ssl"; // Gmail的SMTP主機需要使用SSL連線
  $mail->Host = "smtp.gmail.com"; //Gamil的SMTP主機
  $mail->Port = 465;  //Gamil的SMTP主機的SMTP埠位為465埠。
  $mail->CharSet = "utf8"; //設定郵件編碼

  $mail->Username = "rfvvfr5566@gmail.com"; //設定驗證帳號
  $mail->Password = base64_decode("YmQ4NTExMTE"); //設定驗證密碼

  $mail->From = 'rfvvfr5566@gmail.com'; //設定寄件者信箱
  $mail->FromName = "CHBY Support"; //設定寄件者姓名

  $mail->Subject = "CHBY會員驗證信"; //設定郵件標題
  $mail->Body = "請點擊下列連結完成驗證：<br> https://chby.hopto.org/chby/mail_verification.php?code=".$code; //設定郵件內容
  $mail->IsHTML(true); //設定郵件內容為HTML
  $mail->AddAddress($email, "CHBY會員"); //設定收件者郵件及名稱   //收件人
  $mail->SMTPOptions = array(
      'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
      )
  );


  if(!$mail->Send()) {
    echo "<script>alert('郵件格式錯誤或是郵件伺服器錯誤,如以試多次請洽詢系統管理員');</script>";
    echo "<br>Message was not sent <br>";
    echo "Mailer Error:  " . $mail->ErrorInfo;
    //echo "<script>document.location.href=index.php;</script>";
  } else {
    echo "<script>alert('註冊完成，請至信箱收取驗證信');</script>";
    echo "<script>document.location.href='login.php';</script>";
  }


}
 ?>
