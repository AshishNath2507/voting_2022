<?php
    session_start();
    require "../connect.php";

    //Candidate approve
    if (isset($_POST['apprCandButton'])) {
        
        $userid = $_POST['appr_id'];
        $query = mysqli_query($con, "SELECT * FROM users WHERE id = $userid");
        $row = mysqli_fetch_array($query);

        if ($row['cand_approval'] == "approved") {
            $_SESSION['alert_message'] = "User is already approved";
            header("Location: ../admin/candidate/candidate.php?user=already+approved");
        } else if ($row['cand_approval'] == "not-approved") {
            mysqli_query($con, "UPDATE `users` SET `cand_approval` = 'approved' WHERE `users`.`id` = $userid");
            $_SESSION['alert_message'] = "Candidate approved successfully";
            header("Location: ../admin/candidate/candidate.php?user=approved");
        } else {
            $_SESSION['alert_message'] = "User Approval Failed";
            header("Location: ../admin/candidate/candidate.php?user=not+approved");
        }    
    };

    
    // Candidate delete
    if(isset($_POST['deleteCandButton'])){

        $userid = $_POST['delete_id'];
        $query = mysqli_query($con, "SELECT * FROM users WHERE id = $userid");
        $row = mysqli_fetch_array($query);

        if($row['isdel'] == '0'){
            mysqli_query($con, "UPDATE `users` SET `isdel` = '1' WHERE `users`.`id` = $userid");
            $_SESSION['alert_message'] = "User Deleted Successfully";
            header("Location: ../admin/candidate/candidate.php?user=deleted");
        }else{
            
            $_SESSION['alert_message'] = "User not Deleted";
            header("Location: ../admin/candidate/candidate.php?user+not+deleted");
        }
    };

    // Student approve
    if (isset($_POST['stuApprButton'])) {
        
        $userid = $_POST['sappr_id'];
        $query = mysqli_query($con, "SELECT * FROM users WHERE id = $userid");
        $row = mysqli_fetch_array($query);

        if ($row['status'] == "approved") {
            $_SESSION['alert_message'] = "User is already approved";
            header("Location: ../admin/candidate/candidate.php?user=already+approved");
        } else if ($row['status'] == "pending") {
            $result = mysqli_query($con, "UPDATE `users` SET `status` = 'approved' WHERE `users`.`id` = $userid");
            $_SESSION['alert_message'] = "User verified successfully";
            header("Location: ../admin/candidate/candidate.php?user=approved");
        } else {
            $_SESSION['alert_message'] = "User Approval Failed";
            header("Location: ../admin/candidate/candidate.php?user=not+approved");
        }    
    };
