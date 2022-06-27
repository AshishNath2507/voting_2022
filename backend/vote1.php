<?php

    session_start();

    require "../connect.php";

    if(isset($_POST['voteSubmit'])){

        $bcrs = $_POST['bcrs']; //input value as candidate id
        $pres = $_POST['pres']; //input value as candidate id

        $can = $_SESSION['cand_post']; //candidate post 
        $vid = $_SESSION['id']; //voter id
        $v = $_SESSION['voted']; //voter status of voting

        $query = mysqli_query($con, "SELECT * FROM users WHERE id = '$vid'");
        $row = mysqli_fetch_array($query);
        if ($row['voted'] == "not-voted") {

            if($row['status'] == "approved"){
                mysqli_query($con, "INSERT INTO cand_pc VALUES ( null, '$bcrs', '$can', '$vid' )" ) ;
                mysqli_query($con, "INSERT INTO cand_pc VALUES ( null, '$pres', '$can', '$vid' )" ) ;
              
                mysqli_query($con, "UPDATE users SET voted = 'voted' WHERE id = '$vid'");
                $_SESSION['alert_message'] = "Successfully Voted";
                header("Location: ../users/vote.php");

            }
            else{
                $_SESSION['alert_message'] = "Voting status not approved yet. Come back later.";
                header("Location: ../users/vote.php");
            }
            
        }
        else{
            $_SESSION['alert_message'] = "Already Voted";
            header("Location: ../users/vote.php");
            mysqli_error($con);
        }

        




    }