<?php

    session_start();

    require "../connect.php";

    if(isset($_POST['postSubmit'])){
        $addp = mysqli_real_escape_string($con, trim($_POST['addpost']));

        if ( mysqli_query ($con, "INSERT INTO posts VALUES ( null, '$addp' )" ) ) {
            $_SESSION['alert_message'] = "New Post Added";
            header("Location: ../admin/addposts.php");
        }
        else{
            $_SESSION['alert_message'] = "Post cannot be Added";
            header("Location: ../admin/addposts.php");
        }
    }