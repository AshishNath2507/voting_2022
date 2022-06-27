<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['alert_message'] = "You are Logged Out";
    header("Location: login.php");
}
require "../connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote page</title>

    <!-- Bootstrap links -->
    <link rel="stylesheet" href="../library/css/bootstrap.min.css">

    <!-- Anurati font -->
    <style>
        @font-face {
            font-family: anurati;
            src: url('../library/fonts/anurati/ANURATI/Anurati-Regular.otf');
        }

        .anurati {
            font-family: anurati;
        }

        input[type=radio] {
            border: 2px solid red;
            width: 2rem;
            height: 2em;
            box-sizing: border-box;
            margin-right: 3rem;
        }
    </style>
</head>

<body>
    <?php include "usernav.php"; ?>

    <?php
    if (isset($_SESSION['alert_message'])) {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Alert!!!</strong> <?php echo $_SESSION['alert_message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        unset($_SESSION['alert_message']);
    }
    ?>
    <div class="container-fluid">
        <form action="../backend/vote2.php" method="POST">
            <div class="container d-grid">
                <div class="row gap">
                    <?php
                    $post_query = mysqli_query($con, "SELECT * FROM posts");

                    while ($row =  mysqli_fetch_array($post_query)) {
                        $pname = $row['p_name'];
                    ?>
                        <p class="fs-5 bg-secondary text-dark">Vote for the post of <?php echo $row['p_name']; ?><br></p>
                        <?php
                        $cand_query = mysqli_query($con, "SELECT * FROM users AS u INNER JOIN roles AS r ON ( u.id = r.user_id ) WHERE r.role = 'candidate' AND u.cand_post = '$pname'");

                        while ($war = mysqli_fetch_array($cand_query)) {
                        ?>
                            <div class="form-check border border-info w-50">
                                <input class="form-check-input" type="radio" name="name[<?php echo $row['p_id']; ?>]" id="<?php echo $row['p_id']; ?>" value="<?php echo $war['user_id']; ?>" required>
                                <label class="form-check-label" for="<?php echo $row['p_id']; ?>">
                                    <?php echo $war['name']; ?>
                                </label>
                                <img src="<?php echo  $war['photo']; ?>" alt="img" style="width: 10%;">
                                <br>
                                <br>
                            </div>
                        <?php

                        };
                        ?>

                    <?php
                    };
                    ?>
                </div>
            </div>
            <button class="btn btn-primary mx-5 mt-4" type="submit" name="voteSubmit">Confirm</button>
        </form>
    </div>

    <!-- Bootstrap script -->
    <script src="../library/js/bootstrap.bundle.min.js"></script>
</body>

</html>