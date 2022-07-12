<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['alert_message'] = "You are Logged Out";
    header("Location: ../login.php");
}
require "../../connect.php";
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


    <!-- Bootstrap script -->
    <script src="../../library/js/bootstrap.bundle.js"></script>
</head>

<body>
    <?php require './nav2.php'; ?>
    <div class="container ">
        <form action="" method="post">
            <p class="text-center fs-2">Register if you want to be register as a candidate!</p>
            <div class="row p-3">
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
                    <input type="text" class="form-control" value="<?php echo $_SESSION['age']; ?>" readonly>
                </div>
            </div>
            <div class="row p-3 ">
                <div class="mb-3 col-md-8 ">
                    <label for="post" class="form-label">Post: <sup class="text-danger">*</sup></label>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="post">Options</label>
                        <select class="form-select" name="post" id="post" required>
                            <option selected>Choose...</option>
                            <?php
                            $sql = "SELECT * FROM posts";
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
                <div class="mb-3 col-md-8">
                    <label for="insignia" class="form-label">Insignia (Optional):</label>
                    <input class="form-control" name="insignia" type="file" id="insignia" accept="image/*">
                </div>
            </div>
            <div class="row p-3 mx-4 ">
                <p class="">Active Backlog</p>
                <div class="form-check col">
                    <input class="form-check-input" type="radio" name="backlog" id="yes" value="yes">
                    <label class="form-check-label" for="yes">YES</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="backlog" id="no" value="no">
                    <label class="form-check-label" for="no">NO</label>
                </div>
            </div>
            <div class="row p-3 mx-4 ">
                <p class="">Attendance(>=75%):</p>
                <div class="form-check col">
                    <input class="form-check-input" type="radio" name="attendance" id="yes" value="yes">
                    <label class="form-check-label" for="yes">YES</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="attendance" id="no" value="no">
                    <label class="form-check-label" for="no">NO</label>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" name="candRegister" id="btn" class="btn btn-primary mb-4">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>