<?php
    session_start();
    require "../connect.php";
    if(isset($_POST['loginSubmit'])){
        $email = mysqli_real_escape_string($con, trim($_POST['email']));
        $password = mysqli_real_escape_string($con, trim($_POST['password']));

        
    }


?>