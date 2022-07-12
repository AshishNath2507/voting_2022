<?php
    session_start();
    require '../connect.php';

    if(isset($_POST['checkCandi'])) {
        $email = mysqli_real_escape_string($con, trim( $_POST['email'] ));
        $roll = mysqli_real_escape_string($con, trim( $_POST['roll'] ));

        $query = mysqli_query($con, "SELECT * FROM users WHERE email= '$email' AND rollno = '$roll'");
        $row = mysqli_fetch_array($query);
        $count = mysqli_num_rows($query);

        if( $count > 0 ) {
            
            $enc_pass = $row['pass'];
            $dec_pass = password_verify($password, $enc_pass);
            mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND pass = '$dec_pas'");

            header("location: ../users/candidate/election-regulation.php");
        }else{
            $_SESSION['alert_message'] = "No records found.";
            header("Location: ../apply_cand.php");
        }

    }
?>