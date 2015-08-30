<?php
//PEAR::Mailのインクルード
require_once("Mail.php");

//日本語メールを送る際に必要
mb_language("Japanese");
mb_internal_encoding("UTF-8");

// SMTPサーバーの情報を連想配列にセット
$params = array(
  "host" => "smtp.mail.yahoo.co.jp",   // SMTPサーバー名
  "port" => 587,              // ポート番号
  "auth" => true,            // SMTP認証を使用する
  "username" => "enpit_sagasaga@yahoo.co.jp",  // SMTPのユーザー名
  "password" => "1234sagasaga"   // SMTPのパスワード
);

// PEAR::Mailのオブジェクトを作成
// ※バックエンドとしてSMTPを指定
$mailObject = Mail::factory("smtp", $params);

// 送信先のメールアドレス
$recipients = '';
if(isset($_POST['recipients'])){
 $recipients = $_POST['recipients'];
 $recipients = trim($recipients);
}

// $recipients = "daisuki.yl@gmail.com";


// メールヘッダ情報を連想配列としてセット
$headers = array(
  "To" => $recipients,         // →ここで指定したアドレスには送信されない
  "From" => "enpit_sagasaga@yahoo.co.jp",
  "Subject" => mb_encode_mimeheader("サガサガ　だよ～") // 日本語の件名を指定する場合、mb_encode_mimeheaderでエンコード
);

// メール本文
$body = "サガサガをご利用いただきありがとうございます。
		お客様の登録した不用品が予約されましたよ! 早速チェックしましょう！";

// 日本語なのでエンコード
$body = mb_convert_encoding($body, "ISO-2022-JP", "UTF-8");

// sendメソッドでメールを送信
$mailObject->send($recipients, $headers, $body);

// echo $recipients;
// exit;
?>
