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

    <div class="container-fluid d-grid mt-2">
        <p class="text-center fs-3 ">Here are all the candidates who you can vote.</p>
        <div class="row gap-1 fade-in">

            <?php
            require "../connect.php";
            $query = mysqli_query($con, "SELECT * FROM users AS u INNER JOIN roles AS r ON (u.id = r.user_id) WHERE r.role = 'candidate' AND u.cand_approval = 'approved' AND isdel = '0'");
            while ($row = mysqli_fetch_array($query)) {
            ?>

                <div class="card mx-3 shadow-lg bg-body rounded p-3" style="width: 30rem; height: 27rem;">
                    <div class="card-img d-flex gap-1" style="height: 10rem;width: 20rem auto;">
                        <img src="<?php echo '' . $row['photo']; ?>" class="card-img-top rounded-circle p-3 w-50" alt="candidate-image">
                        <img src="<?php echo '' . $row['insignia']; ?>" class="card-img-top rounded p-3 w-50" alt="candidate-logo">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <p class="mb-1">Branch : <?php echo $row['branch']; ?></p>
                        <p class="mb-1">Post of : <?php echo $row['cand_post']; ?></p>
                        <p class="card-text mb-4" style="height: 6rem; overflow-x: visible; overflow-y:auto">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus accusamus ipsa possimus voluptatibus nihil, consequatur nam excepturi explicabo repellat alia Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam deserunt eveniet Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos veritatis illum eius? dolorum!</p>
                        <p class="card-text"><small class="text-muted"><?php echo $row['created']; ?></small></p>
                    </div>
                </div>

                <!-- <div class="card " style="max-width: 300px;">


                    <img src="" class="img-fluid rounded-start" alt="...">

                    <div class="col-md-8">
                        <div class="card-body">

                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus atque asperiores, nemo quam, rem, exercitationem quibusdam cumque ipsam provident alias molestias debitis!</p>
                        </div>
                    </div>

                </div> -->
            <?php
            };
            ?>
        </div>

    </div>


    <!-- Bootstrap script -->
    <script src="../library/js/bootstrap.bundle.min.js"></script>
</body>

</html>