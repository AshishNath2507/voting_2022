<?php
session_start();
require "../connect.php";

if (isset($_POST['regSubmit'])) {
    $name = mysqli_real_escape_string($con, trim($_POST['name']));
    $rollno = mysqli_real_escape_string($con, trim($_POST['rollno']));
    $regno = mysqli_real_escape_string($con, trim($_POST['regno']));
    $dob = mysqli_real_escape_string($con, trim($_POST['dob']));
    $phone = mysqli_real_escape_string($con, trim($_POST['phone']));
    $addr = mysqli_real_escape_string($con, trim($_POST['addr']));
    $gender = mysqli_real_escape_string($con, trim($_POST['gender']));
    $branch = mysqli_real_escape_string($con, trim($_POST['branch']));
    $sem = mysqli_real_escape_string($con, trim($_POST['sem']));
    $email = mysqli_real_escape_string($con, trim($_POST['email']));
    $password = mysqli_real_escape_string($con, trim($_POST['password']));
    $photo = $_FILES['photo'];
    $idproof = $_FILES['idproof'];

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $allowed = array('jpg', 'jpeg', 'png');

    if (($_FILES['photo']['error'] && $_FILES['idproof']['error']) === 4) {
        $photo1 = null;
        $photo2 = null;
        $_SESSION['alert_message'] = "Please insert IMAGE and ID PROOF!!!";
        header("Location: ../users/register.php?image=0");
    } else {
        // Image
        $filename = $photo['name'];
        $filesize = $photo['size'];
        $filetemp = $photo['tmp_name'];
        $fileExt = explode('.', $filename);
        $fileActualEXt = strtolower(end($fileExt));

        // ID proof
        $filename1 = $idproof['name'];
        $filesize1 = $idproof['size'];
        $filetemp1 = $idproof['tmp_name'];
        $fileExt1 = explode('.', $filename1);
        $fileActualEXt1 = strtolower(end($fileExt1));

        $check_query = mysqli_query($con, "SELECT * FROM users where email ='$email' AND rollno = '$rollno' AND regno = '$regno'");
        $roll_query1 = mysqli_query($con, "SELECT * FROM users where rollno = '$rollno' AND regno = '$regno'");
        $reg_query1 = mysqli_query($con, "SELECT * FROM users where regno = '$regno'");
        $rowCount = mysqli_num_rows($check_query);
        $rollCount = mysqli_num_rows($roll_query1);
        $regCount = mysqli_num_rows($reg_query1);

        if (!empty($email) && !empty($password)) {

            
            if ($rowCount > 0) {
                $_SESSION['alert_message'] = "Email/Roll number/Registration Number already exist!!!";
                header("Location: ../users/register.php?email_repeated");
            }else{ 
                if(($rollCount > 0) || ($regCount > 0)){
                    $_SESSION['alert_message'] = "Roll number OR Registration Number already exist!!!";
                    header("Location: ../users/register.php?rollno/regno_repeated");
                }
                else {
                    if (!in_array($fileActualEXt, $allowed) && !in_array($fileActualEXt1, $allowed)) {
                        // echo "<script>alert('Invalid image extension. Use jpg/jpeg/png only.');</script>";
                        $_SESSION['alert_message'] = "Invalid image extension. Use jpg/jpeg/png only.";
                        header("Location: ../users/register.php?image=invalid");
                    } 
                    else if (($filesize > 2000000) && ($filesize1 > 2000000)) {
                        // echo "<script>alert('File size is too large. Use file size of less than 2MB');</script>";
                        $_SESSION['alert_message'] = "File size is too large. Use file size of less than 2MB";
                        header("Location: ../users/register.php?imagesize=wrong");
                    } 
                    else {
                        $filenamenew = uniqid('', true) . "." . $fileActualEXt;
                        $photo1 = '../uploads/' . $filenamenew;
                        move_uploaded_file($filetemp, $photo1);//(filename, destination)

                        $filenamenew1 = uniqid('', true) . "." . $fileActualEXt1;
                        $photo2 = '../uploads/' . $filenamenew1;
                        move_uploaded_file($filetemp1, $photo2);

                        $result = "INSERT INTO users VALUES (null, '$name', '$rollno' , '$regno', '$dob', '$phone', '$addr', '$gender', '$email', '$password_hash', '$photo1', '$photo2', '$branch', '$sem', null, DEFAULT, DEFAULT, DEFAULT, null, DEFAULT, DEFAULT, DEFAULT, CURRENT_TIMESTAMP)";

                        // if (mysqli_query($con, $result)) {
                            
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
                            // $mail->Password = 'wnmekbthdasmphpg'; //2-step verification code
                            $mail->Password = 'ilzsleuadsyvevmp'; //2-step verification code
                            // $mail->Password = '123ert678';

                            // $mail->setFrom('email account', 'OTP Verification');
                            $mail->setFrom('ashishnath.sendemail@gmail.com', 'OTP Verification');
                            $mail->addAddress($_POST["email"]);

                            $mail->isHTML(true);
                            $mail->Subject = "Your verify code";
                            $mail->Body = "
                                <pre>
                                    <p>Dear $name, your registered password is '$password'</p> 
                                    <h3>Your verify OTP for registration is $otp <br></h3>
                                </pre>
                                <br><br>
                                <p>With regrads,</p>
                                <b>Jorhat Engineering College</b>
                            ";
                            $_SESSION['username'] = $name;
                            $_SESSION['email'] = $email;
                            
                            if (!$mail->send()) {
                                echo "$mail->ErrorInfo";
                                // echo !extension_loaded('openssl')?"Not Available":"Available";
                                // $_SESSION['alert_message'] = "OTP cannot be sent due to technical difficulties!!!";
                                // header("Location: ../users/register.php?emailNotSend");
                                echo mysqli_error($con);
                            } 
                            else {
                                mysqli_query($con, $result);        
                                $userID = mysqli_insert_id($con);
                                $newSql = "INSERT INTO roles VALUES (null, $userID, DEFAULT)";
                                mysqli_query($con, $newSql);
                                header("Location: ../users/otpverify.php?data=updated");
                            }
                        // }
                    }
                }
            }
        }
    }
}
