<?php

session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['alert_message'] = "Please fill up the form";
    header("Location: register.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="../library/css/bootstrap.min.css">

</head>

<body>
    <?php include "nav.php"; ?>
    

    <div class="container-fluid mt-5 ">
        <div class="container-lg bg-light">
            <p class="text-center fs-2">Candidate Registration >>> Account Verification</p>
            <p class="text-center fs-5">An OTP was send to your email <span class="text-primary">"<?php echo $_SESSION['email']; ?>"</span>. Please check your email and type it below.</p>
        </div>
        <div class="container-lg bg-light mb-3">
            <p class="text-center fs-5">Enter the OTP below</p>
            <div class="container text-center">
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="mt-3">
                        <input type="text" class="form-control w-25 mx-auto" name="otpverify" placeholder="Enter OTP" required autofocus>
                    </div>
                    <button class="btn btn-primary mb-4 mt-4" name="verify" type="submit">Verify</button>
                </form>
            </div>
        </div>
    </div>

    <!-- <div class="otp-top-container">
        <div class="otp-heading">
            Account Verification!!!
        </div>
        <div class="otp-form">
            <form action="#" method="post">
                <div class="otp-input">
                    <input type="text" name="otpverify" placeholder="Enter OTP" required autofocus>
                </div>
                <div class="otp-button">
                    <button class="btn" name="verify" type="submit">Verify</button>
                </div>
            </form>
        </div>
    </div> -->

    <script src="../library/js/bootstrap.bundle.min.js"></script>
    <script src="../library/sweetalert/node_modules/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>

<?php
require("../connect.php");

if (isset($_POST["verify"])) {
    $otp = $_SESSION['otp'];
    $email = $_SESSION['mail'];
    // $otp_code = $_POST['otp_code'];
    $otp_code = mysqli_real_escape_string($con, trim($_POST["otpverify"]));

    if ($otp != $otp_code) {
?>
        <script>
            alert("Invalid OTP code");
        </script>

    <?php
    } else {
        mysqli_query($con, "UPDATE users SET email_status = 'verified' WHERE email = '$email'");
    ?>
        <script>
            alert("Verfiy account done, you may sign in now");
            window.location.replace("./login.php");
        </script>
<?php
    }
}

?>