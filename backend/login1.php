<?php
    session_start();
    require "../connect.php";
    if(isset($_POST['loginSubmit'])){
        $email = mysqli_real_escape_string($con, trim($_POST['email']));
        $password = mysqli_real_escape_string($con, trim($_POST['password']));

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $query = mysqli_query($con, $sql);

        $email_count = mysqli_num_rows($query);

        if($email_count){
            $row = mysqli_fetch_assoc($query);
            $enc_pass = $row['pass'];
            $dec_pass = password_verify($password, $enc_pass);

            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['name'];
            $_SESSION['rollno'] = $row['rollno'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['photo'] = $row['photo'];
            $_SESSION['email_status'] = $row['email_status'];

            
            if ($dec_pass) {
                if($row['email_status'] == "verified"){
                    header("Location: ../users/userhomepage.php");
                }else{
                    $_SESSION['alert_message'] = "Email is not verified";
                    header("Location: ../users/login.php");
                }
                
            }else{
                $_SESSION['alert_message'] = "Incorrect Credentials Login";
                header("Location: ../users/login.php");
            }
        }else{
            $_SESSION['alert_message'] = "Email doesn't exist";
            header("Location: ../users/login.php");
        }
        
    }


?>