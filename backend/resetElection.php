<?php
    session_start();
    require "../connect.php";
    // $year = date('Y');
    // $sql = mysqli_query($con, "SELECT * FROM posts WHERE p_current_year = '$year'");
    // $row = mysqli_fetch_array($sql);
    
    mysqli_query($con, "TRUNCATE TABLE cand_pc");
    header("Location: ../admin/result.php?reset=done");
?>