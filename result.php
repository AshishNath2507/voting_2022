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
    <!-- Anurati font -->
    <style>
        @font-face {
            font-family: anurati;
            src: url('./library/fonts/anurati/ANURATI/Anurati-Regular.otf');
        }

        .anurati {
            font-family: anurati;
        }
    </style>
</head>

<body>

    <?php include "nav.php"; ?>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">candidate name</th>
                    <th scope="col">counter</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    $sql = "SELECT * FROM users AS u INNER JOIN roles AS r ON ( u.id = r.user_id) INNER JOIN cand_pc AS cp ON (r.user_id = cp.candidate_id AND u.id = cp.voter_id)";

                    $slq = "SELECT * FROM users AS u INNER JOIN roles AS r ON (u.id = r.user_id) WHERE role = 'candidate'";
                    $result = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <td><?php echo $row['name']; ?></td>
                    <?php
                    };
                    ?>

                    
                </tr>

            </tbody>
        </table>
    </div>
    <?php
        $s = "select * from cand_pc where candidate_post = 'Boys Common Room Secretary'";
        $q = mysqli_query($con, $s);
        $count = mysqli_num_rows($q);
        echo $count;
                    $n = "SELECT user_id FROM roles WHERE role = 'candidate'";
                    $t = mysqli_query($con, $n);
                    $r = mysqli_fetch_array($t);
                    if(in_array('31', $r)){
                        echo 'match';
                    }else{
                        echo 'n';
                    }

?>


    <!-- Bootstrap script -->
    <script src="./library/js/bootstrap.bundle.min.js"></script>
</body>

</html>