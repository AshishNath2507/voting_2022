<?php
    session_start();
    require "../connect.php";
    if (isset($_POST['candBoButton'])) {
        
        $userid = $_POST['bo_id'];
        $query = mysqli_query($con, "SELECT * FROM users AS u INNER JOIN roles AS r ON (u.id = r.user_id) WHERE u.id = $userid");        
        $row = mysqli_fetch_array($query);

        if ($row['cand_email_verify'] == "verified") {
            mysqli_query($con, "UPDATE users SET cand_approval = 'backed-out', cand_post = '' WHERE id = '$userid'");
            mysqli_query($con, "DELETE FROM roles WHERE user_id= '$userid' AND role ='candidate'");
            $_SESSION['alert_message'] = "Your candidature is lost for this election.";
            header("Location: ../users/userview.php?user=backout");
        } 
        else 
        {
            $_SESSION['alert_message'] = "User Failed";
            header("Location: ../users/userview.php?user=backout+failed");
        }    
    };

?>