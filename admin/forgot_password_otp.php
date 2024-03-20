<?php
include('phpmailer_smtp/smtp/PHPMailerAutoload.php');
include("config.php");
session_start();
$user_id = $_SESSION['forgot_username'];
$end_user_email = $_SESSION['forgot_email'];
$subject = "Forgot Password Notification";
$otp = $_SESSION['forgot_otp'];
$body = "Your OTP is <b>" . $otp . "</b>";
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
    $mail->Username = "info.valmikisangam4all@gmail.com";
    $mail->Password = "bjtzzviuagttfnpl";
    $mail->SetFrom("info.valmikisangam4all@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        )
    );
    if (!$mail->Send()) {
        echo "<div style='background:red; color:#fff; font-size:24px;'>Please cheack Your Internet Connection !!</div>";
    }
}


$sql_update_user = "UPDATE user SET otp = '{$otp}' WHERE username ='{$user_id}'";
if (mysqli_query($conn, $sql_update_user)) {
    echo "<script>window.location.href='$hostname/admin/update_password.php'</script>";
}
?>