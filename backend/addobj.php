<?php
    session_start();
    require "../connect.php";

    $id = $_SESSION['id'];
    $obj = mysqli_escape_string($con, trim($_POST['obj']));
    
    $json = json_encode($obj);
    

    $sql = mysqli_query($con, "INSERT INTO objectives VALUES ( null, '$id', '$json')");

    if($sql) {
        $_SESSION['alert_message'] = "Objective added";
        header("Location: ../users/useredit.php?objective=added");
    }else{
        $_SESSION['alert_message'] = "Objective failed";
        header("Location: ../users/useredit.php?objective=failed");
    }









?>