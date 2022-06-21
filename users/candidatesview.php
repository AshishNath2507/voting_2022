<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['alert_message'] = "You are Logged Out";
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Candidates</title>
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
    </style>
</head>

<body>
    <?php include "./usernav.php"; ?>

    <div class="container-fluid mt-2">
        <p class="text-center fs-3 ">Here are all the candidates who you can vote.</p>

        <?php
        require "../connect.php";
        $query = mysqli_query($con, "SELECT * FROM users AS u INNER JOIN roles AS r ON (u.id = r.user_id) WHERE r.role = 'candidate'");
        while ($row = mysqli_fetch_array($query)) {
        ?>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?php echo '' . $row['photo']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p>Branch : <?php echo $row['branch']; ?></p>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus atque asperiores, nemo quam, rem, exercitationem quibusdam cumque ipsam provident alias molestias debitis!</p>
                            <!-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> -->
                        </div>
                    </div>
                </div>
            </div>
        <?php
        };
        ?>
    </div>


    <!-- Bootstrap script -->
    <script src="../library/js/bootstrap.bundle.min.js"></script>
</body>

</html>