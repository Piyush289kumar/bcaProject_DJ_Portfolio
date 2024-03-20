<?php
include('phpmailer_smtp/smtp/PHPMailerAutoload.php');
include('config.php');
$end_user_email = "officepiyushraikwar289@gmail.com";
$subject = "Account Login Notification";

$body = "Your <b>" . $website_display_default_name . " ADMIN</b> Account was just used to <b>SIGN IN</b> by following information : <br>================================<br>" .
    "Date :- " . date("d M, Y h:i:sa") . "<br> IP Address :- " . getenv("REMOTE_ADDR");

echo smtp_mailer($end_user_email, $subject, $body);
function smtp_mailer($to, $subject, $msg)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    //$mail->SMTPDebug = 2; 
    $mail->Username = "emailbot4all@gmail.com";
    $mail->Password = "siomkbvpakcldsoa";
    $mail->SetFrom("emailbot4all@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->AddBCC("officepiyushraikwar289@gmail.com");
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        )
    );
    if (!$mail->Send()) {
        echo "<div style='background:red; color:#fff; font-size:24px;'>Please cheack Your Internet Connection !!</div>";
    } else {
        return "<script>window.location.href='notification-read.php'</script>";
    }
}
