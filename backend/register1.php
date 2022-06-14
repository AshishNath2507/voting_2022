

<?php
    session_start();
    require "../connect.php";

    if(isset($_POST['regSubmit'])){
        $name = mysqli_real_escape_string($con,trim($_POST['name']));
        $rollno = mysqli_real_escape_string($con,trim($_POST['rollno']));
        $regno = mysqli_real_escape_string($con,trim($_POST['regno']));
        $dob = mysqli_real_escape_string($con,trim($_POST['dob']));
        $phone = mysqli_real_escape_string($con,trim($_POST['phone']));
        $addr = mysqli_real_escape_string($con,trim($_POST['addr']));
        $gender = mysqli_real_escape_string($con,trim($_POST['gender']));
        $branch = mysqli_real_escape_string($con,trim($_POST['branch']));
        $sem = mysqli_real_escape_string($con,trim($_POST['sem']));
        $email = mysqli_real_escape_string($con,trim($_POST['email']));
        $password = mysqli_real_escape_string($con,trim($_POST['password']));
        $photo = $_FILES['photo'];
        $idproof = $_FILES['idproof'];

        $allowed = array('jpg', 'jpeg', 'png');

        if (($_FILES['photo']['error'] && $_FILES['idproof']['error']) === 4) {
            $photo1 = null;
            $photo2 = null;
            echo "<script>alert('Image doesnot exist');</script>";
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


            if (!in_array($fileActualEXt, $allowed) && !in_array($fileActualEXt1, $allowed)) {
                echo "<script>alert('Invalid image extension. Use jpg/jpeg/png only.');</script>";
            }
            else if(($filesize > 2000000) && ($filesize1 > 2000000)){
                echo "<script>alert('File size is too large. Use file size of less than 2MB');</script>";
            }
            else{
                $filenamenew = uniqid('', true) . "." . $fileActualEXt;
                $photo1 = '../uploads/' . $filenamenew;
                move_uploaded_file($filetemp, $photo1);
                
                $filenamenew1 = uniqid('', true) . "." . $fileActualEXt1;
                $photo2 = '../uploads/' . $filenamenew1;
                move_uploaded_file($filetemp1, $photo2);

                $result= "INSERT INTO users VALUES (null, '$name', '$rollno' , '$regno', '$dob', '$phone', '$addr', '$gender', '$email', '$password', '$photo1', '$photo2', '$branch', '$sem', null, DEFAULT, DEFAULT, CURRENT_TIMESTAMP)";

                if(mysqli_query($con, $result)){
                    $otp = rand(1000,9999);
                    $_SESSION['otp'] = $otp;
                    $_SESSION['mail'] = $email;
                    require "../library/phpmailer/PHPMailerAutoload.php";
                    $mail = new PHPMailer;
                        
                    $mail->isSMTP();
                    $mail->Host='smtp.gmail.com';
                    $mail->Port=587;
                    $mail->SMTPAuth=true;
                    $mail->SMTPSecure='tls';
    
                    $mail->Username='ashishnath.sendemail@gmail.com';
                    $mail->Password='123ert678';
    
                    $mail->setFrom('email account', 'OTP Verification');
                    $mail->addAddress($_POST["email"]);
    
                    $mail->isHTML(true);
                    $mail->Subject="Your verify code";
                    $mail->Body="<p>Dear user, </p> <h3>Your verify OTP code for registration is $otp <br></h3>
                    <br><br>
                    <p>With regrads,</p>
                    <b>Assam Agricultural University</b>";
    
                    if(!$mail->send()){
                        ?>
                            <script>
                                alert("<?php echo "Register Failed, Invalid Email "?>");
                            </script>
                        <?php
                    }else{
                        $userID = mysqli_insert_id($con);
                        $newSql = "INSERT INTO roles VALUES (null, $userID, DEFAULT)";
                        mysqli_query($con, $newSql);
                        ?>
                        <script>
                            alert("<?php echo "Register Successfully, OTP sent to " . $email ?>");
                            window.location.replace('otpverify.php');
                        </script>
                        <?php
                    }
                }

                // if(mysqli_query($con, $result))
                // {
                //     $userID = mysqli_insert_id($con);
                //     $newSql = "INSERT INTO roles VALUES (null, $userID, DEFAULT)";
                //     mysqli_query($con, $newSql);

                //     echo "<h3>Data stored in the database successfully Please browse phpMyAdmin</h3>";
                //     header("Location:../users/register.php?data=stored");
                // }
                // else
                // {
                //     echo "<h3>Data is not stored.</h3>";
                //     echo mysqli_error($con);
                // }
            }
        }

    }
    else
    {
        // $_SESSION['status']
    }

?>