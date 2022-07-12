<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Candidature</title>

    <!-- Jquery link -->
    <script src="./library/jquery.min.js"></script>
    <!-- Bootstrap links -->
    <link rel="stylesheet" href="./library/css/bootstrap.min.css">
    <!-- Bootstrap script -->
    <script src="./library/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="./library/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="./library/fontawesome-free-6.1.1-web/css/brands.css">
    <link rel="stylesheet" href="./library/fontawesome-free-6.1.1-web/css/solid.css">

    <link rel="stylesheet" href="./library/fontawesome-free-6.1.1-web/css/v5-font-face.css">

    <style>
        .bg-c {
            background-color: #337171;
        }

        label {
            /* margin-right: 40px; */
        }

        .form-container {
            max-width: 500px;
            max-height: 700px;
        }
    </style>
</head>

<body>
    <?php include "./nav.php"; ?>
    <div class="container-fluid bg-c">
        <div class="container-xl mb-5 bg-light shadow">
            <p class="text-center fs-4 p-3 underline">Apply as a Candidate!</p>
            <div class="card border-0 p-2">
                <marquee behavior="scroll" direction="left"><span class="text-warning fs-5">Note: Your have to verify your email first. If you haven't registered then register and come.</span></marquee>
            </div>
            <div class="container mt-4 form-container border p-4 mb-4">
                <form action="backend/check-cand.php" method="post">
                    <div class="text-center">
                        <p class="fs-3 mb-1">
                            Check Registration
                        </p>
                        <p class="mb-4">
                            Check using your registered email and college roll number.
                        </p>
                    </div>
                    <?php
                    if (isset($_SESSION['alert_message'])) {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Alert!!!</strong> <?php echo $_SESSION['alert_message']; ?>
                            <a href="./users/register.php" >Please Register here</a>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        unset($_SESSION['alert_message']);
                    }
                    ?>

                    <div class="mb-2">
                        <label for="email" class="form-label fs-5">Email</label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="abc@gmail.com"/>
                    </div>
                    <div class="mb-2">
                        <label for="roll" class="form-label fs-5">Roll No.</label>
                        <input class="form-control" type="text" name="roll" id="roll" placeholder="981256"/>
                    </div>
                    <div class="text-center m-3">
                        <a href="./users/register.php" class="mx-3">Register here</a>
                        <button class="btn btn-primary " type="submit" name="checkCandi"><i class="fa-solid fa-check"></i>Check</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>