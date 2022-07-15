<?php

session_start();
require "../connect.php";


if (isset($_POST['candRegister'])) {

    $age = $_POST['age'];
    $post = $_POST['post'];
    $photo = $_FILES['insignia'];
    $backlog = $_POST['backlog'];
    $attendance = $_POST['attendance'];

    $email = $_SESSION['email'];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $sem = $row['sem'];
    // $emailCount = mysqli_num_rows($result);


    // $query = mysqli_query($con, "SELECT * FROM users WHERE id = '" . $_SESSION['id'] . "' ");
    // $rowrrr = mysqli_fetch_array($query);
    // echo $rowrrr['sem'];

    if ($sem > 2) {

        if ($age >= '22' && $age <= '30') {

            if ($backlog == "no") {
                if ($attendance == "yes") {
                    if ($post == '') {
                        $_SESSION['alert_message'] = "Select a post before submitting.";
                        header("Location: ../users/candidate/candidate_reg.php");
                    } else if ($photo == '') {

                        $allowed = array('jpg', 'jpeg', 'png');
                        $filename = $photo['name'];
                        $filesize = $photo['size'];
                        $filetemp = $photo['tmp_name'];
                        $fileExt = explode('.', $filename);
                        $fileActualEXt = strtolower(end($fileExt));

                        if (!in_array($fileActualEXt, $allowed)) {
                            // $_SESSION['alert_message'] = "Invalid image extension. Use jpg/jpeg/png only.";
                            // header("Location: ../users/candidate/candidate_reg.php?image=invalid");
                            mysqli_error($con);
                        } else if ($filesize > 2000000) {
                            // $_SESSION['alert_message'] = "File size is too large. Use file size of less than 2MB";
                            // header("Location: ../users/candidate/candidate_reg.php?imagesize=wrong");
                            mysqli_error($con);
                        } else {
                            $filenamenew = uniqid('', true) . "." . $fileActualEXt;
                            $photo1 = '../uploads/' . $filenamenew;
                            move_uploaded_file($filetemp, $photo1); //(filename, destination)
                            // $can_id = $_SESSION['id'];

                            $sql = "SELECT * FROM users WHERE id = '$id'";
                            // $sql = "SELECT * FROM users AS u INNER JOIN roles AS r ON ( u.id = r.user_id ) WHERE u.id = '$can_id' AND r.role = 'candidate'";
                            $query = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($query);
                            // $id_count = mysqli_num_rows($query);
                            // $id =  $row['id'];

                            if ($row['cand_email_verify'] == 'pending') {

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
                                    mysqli_query($con, "UPDATE users SET insignia = '$photo1', cand_post = '$post' WHERE id = '$id'");
                                    header("Location: ../users/candidate/c_otpverify.php?verifyOTP");
                                    mysqli_error($con);
                                }
                            } else {
                                $_SESSION['alert_message'] = "Email already verified. You can login now.";
                                header("Location: ../users/candidate/candidate_reg.php");
                                // mysqli_error($con);

                            }
                        }
                    }
                } else {
                    $_SESSION['alert_message'] = "Low attendance. Maybe next time.";
                    header("Location: ../users/candidate/candidate_reg.php");
                    // mysqli_error($con);

                }
            } else {
                $_SESSION['alert_message'] = "Clear your backlog then come";
                header("Location: ../users/candidate/candidate_reg.php");
                // mysqli_error($con);

            }
        } else {
            $_SESSION['alert_message'] = "Age limit error";
            header("Location: ../users/candidate/candidate_reg.php");
            // mysqli_error($con);

        }
    } else {
        $_SESSION['alert_message'] = "Above 2nd semester required";
        header("Location: ../users/candidate/candidate_reg.php");
    }
};
