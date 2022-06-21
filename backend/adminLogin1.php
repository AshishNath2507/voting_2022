<?php
session_start();
require "../connect.php";
if (isset($_POST['adminLogin'])) {
    $email = mysqli_real_escape_string($con, trim($_POST['email']));
    $password = mysqli_real_escape_string($con, trim($_POST['password']));
    $pvt_email = "ashishnath905@gmail.com";

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($query);

    $_SESSION['admin'] = $row['name'];

    if ($email == $row['email']) {
        if ($password == $row['pass']) {
            // include("admin_mail().php");
            // $mail -> send();
            header("Location: ../admin/index.php");
        } else {
            include("admin_mail().php");
            $mail->send();
            $_SESSION['alert_message'] = "Incorrect Password";
            header("Location: ../admin/adminLogin.php");
        }
    } else {
        include("admin_mail().php");
        $mail -> send();    
        $_SESSION['alert_message'] = "Invalid Admin Email";
        header("Location: ../admin/adminLogin.php");
    }
}
