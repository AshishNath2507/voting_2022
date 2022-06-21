<?php
session_start();
require "../connect.php";


if (isset($_POST['candRegister'])) {

    $email = $_SESSION['email'];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $id = $row['id'];
    $emailCount = mysqli_num_rows($result);

    $cand_email_verify = $row['cand_email_verify'];

    if ($emailCount > 0) {
        if ($row['email_status'] == "verified") {
            if ($cand_email_verify == 'pending') {

                $otp = rand(1000, 9999);
                $_SESSION['otp'] = $otp;
                $_SESSION['mail'] = $email;
                require "../library/phpmailer/PHPMailerAutoload.php";
                $mail = new PHPMailer;

                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'tls';

                $mail->Username = 'ashishnath.sendemail@gmail.com';
                $mail->Password = 'wnmekbthdasmphpg'; //2-step verification code
                // $mail->Password = '123ert678';

                // $mail->setFrom('email account', 'OTP Verification');
                $mail->setFrom('ashishnath.sendemail@gmail.com', 'OTP Verification');
                $mail->addAddress($email);

                $name = $_SESSION['username'];

                $mail->isHTML(true);
                $mail->Subject = "Your verify code";
                $mail->Body = "
                                <pre>
                                    <p>Dear $name</p> 
                                    <h3>Your verify OTP for registration is $otp <br></h3>
                                </pre>
                                <br><br>
                                <p>With regrads,</p>
                                <b>Jorhat Engineering College</b>
                            ";
                $_SESSION['mainID'] = $id;

                if (!$mail->send()) {
                    echo "$mail->ErrorInfo";
                    echo !extension_loaded('openssl') ? "Not Available" : "Available";
                    // $_SESSION['alert_message'] = "OTP cannot be sent due to technical difficulties!!!";
                    // header("Location: ../users/register.php?emailNotSend");
                } else {
                    // $newSql = "INSERT INTO roles VALUES (null, $id, 'candidate')";
                    // mysqli_query($con, $newSql);
                    header("Location: ../users/candidate/c_otpverify.php?data=stored");
                }
            } else {
                $_SESSION['alert_message'] = "Email already verified. You can login now.";
                header("Location: ../users/candidate/candidate_reg.php");
            }
        } else {
            $_SESSION['alert_message'] = "Email not verified";
            header("Location: ../users/candidate/candidate_reg.php");
        }
    } else {
        $_SESSION['alert_message'] = "Email doesnot exist";
        header("Location: ../users/candidate/candidate_reg.php");
    }
}
