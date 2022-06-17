<?php
    session_start();
    require "../connect.php";

    if(isset($_POST['canLogin'])){
    
        $email = mysqli_real_escape_string($con, trim($_POST['email']));
        $dob = $_POST['dob'];

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($query);
        $count = mysqli_num_rows($query);

        $_SESSION['candidate'] = $email;
        
        if($count > 0){
            if($row['cand_email_verify'] == "verified"){
                if($dob == $row['dob']){
                    header("Location: ../users/candidate/cand_home.php");
                }
                else{
                    mysqli_error($con);
                    $_SESSION['alert_message'] = "Incorrect login credentials";
                    header("Location: ../users/candidate/c_login.php");
                }
            }
            else{
                mysqli_error($con);
                $_SESSION['alert_message'] = "Email not verified";
                header("Location: ../users/candidate/c_login.php");
            }
        }else{
            mysqli_error($con);
            $_SESSION['alert_message'] = "Email doesn't exist";
            header("Location: ../users/candidate/c_login.php");
        }
    }
?>