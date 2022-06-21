<?php
    session_start();
    require "../connect.php";

    //Student approve
    if (isset($_POST['apprStuButton'])) {
        
        $userid = $_POST['appr_id'];
        $query = mysqli_query($con, "SELECT * FROM users WHERE id = $userid");
        $row = mysqli_fetch_array($query);

        if ($row['status'] == "approved") {
            $_SESSION['alert_message'] = "User is already approved";
            header("Location: ../admin/students/student.php?user=already+approved");
        } else if ($row['status'] == "pending") {
            $result = mysqli_query($con, "UPDATE `users` SET `status` = 'approved' WHERE `users`.`id` = $userid");
            $_SESSION['alert_message'] = "User verified successfully";
            header("Location: ../admin/students/student.php?user=approved");
        } else {
            $_SESSION['alert_message'] = "User Approval Failed";
            header("Location: ../admin/students/student.php?user=not+approved");
        }    
    };

    
    // Student delete
    if(isset($_POST['deleteStuButton'])){

        $userid = $_POST['delete_id'];
        $query = mysqli_query($con, "SELECT * FROM users WHERE id = $userid");
        $row = mysqli_fetch_array($query);

        if($row['isdel'] == '0'){
            $result = mysqli_query($con, "UPDATE `users` SET `isdel` = '1' WHERE `users`.`id` = $userid");
            $_SESSION['alert_message'] = "User Deleted Successfully";
            header("Location: ../admin/students/student.php?user=deleted");
        }else{
            
            $_SESSION['alert_message'] = "User not Deleted";
            header("Location: ../admin/students/student.php?user+not+deleted");
        }

        // $query = "UPDATE users SET isdel = '1' WHERE id = $userid";
        // $query_run = mysqli_query($con, $query);
        // if($query_run){
        //     $_SESSION['alert_message'] = "User Deleted Successfully";
        //     header("Location:  ../admin/students/student.php?user+deleted");
        // }
        // else{
        //     mysqli_error($con);
        //     $_SESSION['alert_message'] = "User Deletion Failed";
        //     header("Location:  ../admin/students/student.php?user+not+deleted");
        // }

    };
?>