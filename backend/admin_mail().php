<?php
    require "../library/phpmailer/PHPMailerAutoload.php";
    $mail = new PHPMailer;

    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';

    $mail->Username = 'ashishnath.sendemail@gmail.com';
    $mail->Password = 'wnmekbthdasmphpg'; //2-step verification code
    // $mail->Password = '123ert678';

    // $mail->setFrom('email account', 'OTP Verification');
    $mail->setFrom('ashishnath.sendemail@gmail.com', 'A/c accessing');
    $mail->addAddress($pvt_email);

    $mail->isHTML(true);
    $mail->Subject = "Your a/c is accessed.";
    $mail->Body = "
                        <pre>
                            <h2>Dear Admin, your account is trying to be accessed by '$email' with '$password'.</h2> 
                            <h4>If this was you, ignore this message :) '.' (: <br></h4>
                        </pre>
                        <br><br>
                        <p>With regrads,</p>
                        <b>Jorhat Engineering College</b>
    ";
?>