<?php
session_start();
require "connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <script src="./library/jquery.min.js"></script>
    <!-- Bootstrap links -->
    <link rel="stylesheet" href="./library/css/bootstrap.min.css">

    <link href="./library/fontawesome-free-6.1.1-web/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="./library/fontawesome-free-6.1.1-web/js/all.min.js"></script>
    <!-- Anurati font -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Iceberg&display=swap');

        /* @font-face {
            font-family: anurati;
            src: url('./library/fonts/anurati/ANURATI/Anurati-Regular.otf');
        } */

        .anurati {
            font-family: 'Iceberg', cursive;
        }

        
        
        table th {
            width: 100px;
        }
    </style>
</head>

<body>

    <?php include "nav.php"; ?>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h3 class="m-0 ">Vote Result</h3>
                <hr class="bg-info">
                <div class="dropdown no-arrow text-center">
                    <?php
                    $post = mysqli_query($con, "SELECT * FROM posts ORDER BY p_id ASC");
                    while ($postRow = mysqli_fetch_array($post)) {
                    ?>
                        <p class="text-warning"><?php $postRow['p_name'] ?></p>
                        <?php
                        $voter_sql = mysqli_query($con, "SELECT * FROM users AS u INNER JOIN roles AS r ON ( u.id = r.user_id ) WHERE r.role = 'candidate' AND u.cand_post = '" . $postRow['p_name'] . "' ");
                        while ($voterRow = mysqli_fetch_array($voter_sql)) {
                            $cand_sql = mysqli_query($con, "SELECT COUNT(*) AS total FROM cand_pc WHERE candidate_id = '" . $voterRow['user_id'] . "' AND candidate_post = '" . $postRow['p_id'] . "' ");
                            $candRow =  mysqli_fetch_assoc($cand_sql);
                            $count = mysqli_num_rows($cand_sql);
                        ?>
                            <table class="table table-bordered compact display text-dark">

                                <thead class="bg-info text-light">
                                    <tr>
                                        <th>Candidate's Name</th>
                                        <th>Post Name</th>
                                        <th>Vote Counts</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $voterRow['name']; ?></td>
                                        <td> <?php echo $postRow['p_name']; ?></td>
                                        <td><?php echo $candRow['total']; ?></td>
                                    </tr>
                                </tbody>
                        <?php

                        };
                    };
                        ?>
                </div>
            </div>
        </div>
    </div>


    
    <!-- Bootstrap script -->
    <script src="./library/js/bootstrap.bundle.min.js"></script>
</body>

</html>