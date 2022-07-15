<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['alert_message'] = "You are Logged Out";
    header("Location: ../login.php");
}
require "../../connect.php";

$id = $_SESSION['id'];
$query = mysqli_query($con, "SELECT * FROM users WHERE id = '$id'");
$row = mysqli_fetch_array($query);
// echo $row['dob'].'<br>';

$today = date("Y-m-d");
$diff = date_diff(date_create($row['dob']), date_create($today));
$age = $diff->format('%y');
// echo $age;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Registration</title>

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
    <?php include "./nav2.php"; ?>

    <div class="container-lg bg-light mt-2 shadow rounded">
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

        <?php
        if ($row['voted'] == 'voted') {
            $alert_message = 'You have already voted. You cannot register for candidature';
        ?>
            <div class="container-sm">
                <p>
                    <?php
                        $alert_message;
                    ?>
                </p>
            </div>
        <?php

        } else {
        ?>


            <form action="./code.php" method="POST" enctype="multipart/form-data">
                <p class="text-center fs-2">Register if you want to be register as a candidate!</p>
                <div class="row p-4">
                    <div class="mb-3 col-sm">
                        <label for="name" class="form-label mx-3">Name</label>
                        <input class="form-control" name="name" id="disabledInput" type="text" value="<?php echo $_SESSION['username']; ?>" readonly>
                    </div>
                    <div class="mb-3 col-sm">
                        <label for="rollno" class="form-label mx-3">Roll no.</label>
                        <input class="form-control" name="rollno" id="disabledInput" type="text" value="<?php echo $_SESSION['rollno']; ?>" readonly>
                    </div>
                    <div class="mb-3 col-sm">
                        <label for="regno" class="form-label mx-3">Email</label>
                        <input class="form-control" name="email" id="disabledInput" type="text" value="<?php echo $_SESSION['email']; ?>" readonly>
                    </div>
                    <div class="mb-3 col-sm">
                        <label for="dob" class="form-label mx-3">DoB</label>
                        <input class="form-control" name="dob" id="dob" type="dob" value="<?php echo $_SESSION['dob']; ?>" readonly>
                    </div>
                    <div class="col-sm">
                        <label for="age" class="form-label mx-3">Age</label>
                        <?php
                        if ($age >= '22' && $age <= '30') {
                        ?>
                            <input type="text" name="age" class="form-control border border-success" value="<?php echo $age; ?>" readonly>
                        <?php
                        } else {
                        ?>
                            <input type="text" name="age" class="form-control border border-danger" value="<?php echo $age; ?>" readonly>

                        <?php
                        }
                        ?>

                    </div>
                </div>
                <div class="row p-3 ">
                    <div class="mb-3 col-md-8 px-5">
                        <label for="post" class="form-label">Post: <sup class="text-danger">*</sup></label>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="post">Options</label>
                            <select class="form-select" name="post" id="post" required>
                                <option selected>Choose...</option>
                                <?php
                                $sql = "SELECT p_name FROM posts";
                                $result = mysqli_query($con, $sql);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <option value="<?php echo $row['p_name'] ?>"><?php echo $row['p_name'] ?></option>
                                <?php
                                };
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 col-md-8 px-5">
                        <label for="insignia" class="form-label">Insignia (Optional):</label>
                        <input class="form-control" name="insignia" type="file" id="insignia" accept="image/*">
                    </div>
                </div>
                <div class="row p-3 mx-4  px-5">
                    <p class="">Active Backlog:</p>
                    <div class="form-check col">
                        <input class="form-check-input" type="radio" name="backlog" id="bl-y" value="yes" required>
                        <label class="form-check-label" for="bl-y">YES</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="backlog" id="bl-n" value="no" required>
                        <label class="form-check-label" for="bl-n">NO</label>
                    </div>
                </div>
                <div class="row p-3 mx-4 px-5 ">
                    <p class="">Attendance(>=75%):</p>
                    <div class="form-check col">
                        <input class="form-check-input" type="radio" name="attendance" id="a-y" value="yes" required>
                        <label class="form-check-label" for="a-y">YES</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="attendance" id="a-n" value="no" required>
                        <label class="form-check-label" for="a-n">NO</label>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" name="candRegister" id="btn" class="btn btn-primary mb-4">Submit</button>
                </div>
            </form>
        <?php
        }
        ?>
    </div>

    <!-- Bootstrap script -->
    <script src="../../library/js/bootstrap.bundle.js"></script>


</body>

</html>