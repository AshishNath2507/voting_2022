<?php
    session_start();
    require "../connect.php";

    if(isset($_POST['userEdit'])) {
        $name = mysqli_real_escape_string($con, trim($_POST['name']));
        $rollno = mysqli_real_escape_string($con, trim($_POST['rollno']));
        $regno = mysqli_real_escape_string($con, trim($_POST['regno']));
        $phone = mysqli_real_escape_string($con, trim($_POST['phone']));
        $addr = mysqli_real_escape_string($con, trim($_POST['addr']));
        $dob = mysqli_real_escape_string($con, trim($_POST['dob']));
        $branch = mysqli_real_escape_string($con, trim($_POST['branch']));
        $sem = mysqli_real_escape_string($con, trim($_POST['sem']));
        
        $id = $_SESSION['id'];
        $query = mysqli_query($con, "UPDATE users SET name = '$name', rollno = '$rollno', regno = '$regno', phone = '$phone', addr = '$addr', dob = '$dob', branch = '$branch', sem = '$sem' WHERE id = '$id'");
        
        
        if($query) {
            $_SESSION['alert_message'] = "Details Updated";
            header("Location: ../users/useredit.php?details=updated");
        }
        else{
            mysqli_error($con);
        }









    }

?>