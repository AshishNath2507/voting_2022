<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['alert_message'] = "You are Logged Out";
    header("Location: ../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap links -->
    <link rel="stylesheet" href="../../library/css/bootstrap.min.css">
    <style>
        @font-face {
            font-family: anurati;
            src: url('../../library/fonts/anurati/ANURATI/Anurati-Regular.otf');
        }

        .anurati {
            font-family: anurati;
        }
    </style>
</head>

<body>
    <?php include "./usernav.php"; ?>

    <div class="container-lg bg-light mt-5 ">
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
        <p class="text-center fs-2">Register if you want to be a candidate!</p>
        <form action="../../backend/candidate_reg1.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label mx-3">Name</label>
                <input class="form-control" name="name" id="disabledInput" type="text" value="<?php echo $_SESSION['username']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="rollno" class="form-label mx-3">Roll no.</label>
                <input class="form-control" name="rollno" id="disabledInput" type="text" value="<?php echo $_SESSION['rollno']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="regno" class="form-label mx-3">Email</label>
                <input class="form-control" name="email" id="disabledInput" type="text" value="<?php echo $_SESSION['email']; ?>" readonly>
            </div>
            <button type="submit" name="candRegister" class="btn btn-primary mb-4">Submit</button>
        </form>
    </div>

    <!-- Bootstrap script -->
    <script src="../../library/js/bootstrap.bundle.min.js"></script>
</body>

</html>