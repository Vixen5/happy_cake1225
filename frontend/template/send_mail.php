<?php

$to      = "kemieteach@gmail.com";

$header  = 'Content-type: text/html; charset=iso-8859-1'."\r\n";
$header .= "From: service@gmail.com";

$subject = "[Happy Cake] 聯絡表單";
$body    = "您有一封來自 ".$_POST['name']." 送出聯絡表單,<br><br>";
$body   .= "內容如下<br>";
$body   .= "<table border='1'>
          <tr><td>姓名:</td><td>".$_POST['name']."</td></tr>
          <tr><td>聯絡電話:</td><td>".$_POST['mobile']."</td></tr>
          <tr><td>E-mail:</td><td>".$_POST['email']."</td></tr>
          <tr><td>詢問內容:</td><td>".$_POST['message']."</td></tr>
          </table><br>";
$body   .= "請您盡快與客戶聯繫";

$result= mail($to, $subject, $body, $header);
// 寄給使用者的信
$to2      = $_POST['email'];

$header2  = 'Content-type: text/html; charset=iso-8859-1'."\r\n";
$header2 .= "From: service@cakehouse.com";

$subject2 = "您剛剛在[Happy Cake]送出了聯絡表單";

$body2   = "內容如下<br>";
$body2   .= "<table border='1'>
          <tr><td>姓名:</td><td>".$_POST['name']."</td></tr>
          <tr><td>聯絡電話:</td><td>".$_POST['mobile']."</td></tr>
          <tr><td>E-mail:</td><td>".$_POST['email']."</td></tr>
          <tr><td>詢問內容:</td><td>".$_POST['message']."</td></tr>
          </table><br>";
$body2   .= "請靜待管理員回覆";

mail($to2, $subject2, $body2, $header2);

if($result){
    header('Location: ../contact.php?Send=true');
}
?>