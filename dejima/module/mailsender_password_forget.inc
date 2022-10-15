<?php
// PHPMailerの使用宣言
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class mailsender
{

    function mailsend($mailaddress, $password)
    {


        // 自身の環境に合わせてPHPMailer読み込みパスを修正
        require_once ("PHPMailer/src/Exception.php");
        require_once ("PHPMailer/src/PHPMailer.php");
        require_once ("PHPMailer/src/SMTP.php");

        // PHPの設定
        date_default_timezone_set('Asia/Tokyo');
        mb_language("ja");
        mb_internal_encoding("UTF-8");

        // PHPMailerの使用
        $mailer = new PHPMailer(true); // Passing `true` enables exceptions

 try {
            // Server settings
            $mailer->CharSet = 'UTF-8';
            $mailer->SMTPDebug = 0; // Enable verbose debug output
            $mailer->isSMTP(); // Set mailer to use SMTP
 			$mailer->SMTPAuth = true; // Enable SMTP authentication
            $mailer->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mailer->Username = 'websol@comco.co.jp'; // SMTP username
            $mailer->Password = 'websol4871'; // SMTP password
            $mailer->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted
            $mailer->Port = 587; // TCP port to connect to (ssl:465)


            // Recipients
            $mailer->setFrom('websol@comco.co.jp', mb_encode_mimeheader('送信者名'));
            $mailer->addAddress($mailaddress, mb_encode_mimeheader('宛先者'));
            // $mailer->addAddress('ellen@example.com'); // Name is optional
            // $mailer->addReplyTo('info@example.com', 'Information');
            // $mailer->addCC('cc@example.com');
            $mailer->addBCC('websol@comco.co.jp');

            // Attachments
            // $mailer->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
            // $mailer->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name

            // Content
            $mailer->isHTML(false); // Set email format to HTML
            $mailer->Subject = mb_encode_mimeheader('パスワード再登録', "ISO-2022-JP-MS", "UTF-8");
            $mailer->Body = 'パスワードが変更されました。
仮パスワードは'.$password.'です。
ログイン画面にて、ログインしてください。

ログイン画面
http://comco.sakura.tv/demo06/login'

                ;
            // $mailer->AltBody = 'non-HTML mail cliants用本文';

            $mailer->send();
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mailer->ErrorInfo;
            throw $e;
        }
    }
}
?>