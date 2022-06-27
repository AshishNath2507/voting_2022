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
        <?php

        $per_page = 1;
        $start = 0;
        $current_page = 1;
        if (isset($_GET['start'])) {
            $start = $_GET['start'];
            if ($start <= 0) {
                $start = 0;
                $current_page = 1;
            } else {
                $current_page = $start;
                $start--;
                $start = $start * $per_page;
            }
        }

        $record = mysqli_num_rows(mysqli_query($con, "SELECT * FROM posts"));
        $pagi = ceil($record / $per_page);

        // if($start > $pagi)

        $sql = "SELECT * FROM posts limit $start, $per_page";
        $post_query = mysqli_query($con, $sql);

        if (mysqli_num_rows($post_query) > 0) {
            while ($row =  mysqli_fetch_array($post_query)) {
                $pname = $row['p_name'];
        ?>
                <form action="" method="POST">
                    <div class="container d-grid">
                        <div class="row gap">
                            <p class="fs-5 text-dark border-bottom border-info">Vote for the post of <?php echo $row['p_name']; ?><br></p>
                            <?php
                            $cand_query = mysqli_query($con, "SELECT * FROM users AS u INNER JOIN roles AS r ON ( u.id = r.user_id ) WHERE r.role = 'candidate' AND u.cand_post = '$pname'");

                            while ($war = mysqli_fetch_array($cand_query)) {
                                if ($pname != $war['cand_post']) {
                                    echo "<p>No Records</p>";
                                } else {
                                ?>
                                    <div class="form-check border w-50">
                                        <input class="form-check-input" type="radio" name="vote" id="<?php echo $row['p_id']; ?>" value="<?php echo $war['user_id']; ?>" required>
                                        <label class="form-check-label" for="<?php echo $row['p_id']; ?>">
                                            <?php echo $war['name']; ?>
                                        </label>
                                        <img src="<?php echo  $war['photo']; ?>" alt="img" style="width: 10%;">
                                        <br>
                                        <br>
                                    </div>
                                <?php
                                }
                                ?>
                            <?php
                            };
                            ?>

                        </div>
                    </div>
                    <button class="btn btn-primary mx-5 mt-4" type="submit" name="voteSubmit">Confirm</button>
                </form>

            <?php
            };
        } else {
            ?>
            <p>No Records</p>
        <?php
        }
        ?>
    </div>
    <div class="container m-5">
        <nav class="" aria-label="...">
            <ul class="pagination">
                <?php
                for ($i = 1; $i <= $pagi; $i++) {
                    $class = '';
                    if ($current_page == $i) {
                        ?>
                        <li class="page-item active"><a class="page-link" href="javascript:void(0)"><?php echo $i ?></a></li>
                        <?php
                    }else{
                        ?>
                            <li class="page-item <?php echo $class; ?>"><a class="page-link" href="?start=<?php echo $i; ?>"><?php echo $i ?></a></li>
                        <?php
                    }
                ?>
                    
                <?php
                }
                ?>
            </ul>
        </nav>
    </div>
    <!-- Bootstrap script -->
    <script src="../library/js/bootstrap.bundle.min.js"></script>
</body>

</html>