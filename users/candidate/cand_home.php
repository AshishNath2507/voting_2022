<?php
session_start();
require "../../connect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Homepage</title>
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

        body{
            box-sizing: content-box;
        }
    </style>
</head>

<body>
    <?php include "usernav.php"; ?>
    
    <div class="container-fluid bg-light mx-3">
        <?php
        require "../../connect.php";
        $sid = $_SESSION['id'];
        $sql = "SELECT * FROM users where id = '$sid'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        if ($row['cand_approval'] == 'approved') {
        ?>
            <p class="fs-5">YOUR A/C IS <span class="text-light bg-success rounded p-1 mx-3">Approved</span></p>
        <?php
        } else {
        ?>
            <p class="fs-5">YOUR A/C IS BEING PROCESSED.<span class="text-light bg-secondary rounded p-1">Not-approved</span></p>
        <?php
        }
        ?>
    </div>
    <p class="fs-1">Candidate Homepage</p>

    <div class="container-sm w-50 mt-3">
        <p class="text-center fs-3">Enter details below:</p>
        <?php
        if (isset($_SESSION['alert_message'])) {
        ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hey!!!</strong> <?php echo $_SESSION['alert_message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
            unset($_SESSION['alert_message']);
        }
        ?>
        <form action="../../backend/cand_ins.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="post" class="form-label mx-4">Post:</label>
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
            <div class="mb-3">
                <label for="insignia" class="form-label">Insignia:</label>
                <input class="form-control" name="insignia" type="file" id="insignia" accept="image/*" required>
            </div>
            <button class="btn btn-primary" type="submit" name="insSubmit"> Submit</button>
        </form>
    </div>

    <!-- Bootstrap script -->
    <script src="../../library/js/bootstrap.bundle.min.js"></script>
</body>

</html>