<?php

session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['alert_message'] = "Please fill up the form";
    header("Location: c_login.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="../../library/css/bootstrap.min.css">
    <style>
    @font-face { font-family: anurati; src: url('../../library/fonts/anurati/ANURATI/Anurati-Regular.otf'); } 
    .anurati {
        font-family: anurati;
    }
</style>

</head>

<body>
    <?php include "usernav.php"; ?>

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

    <script src="../../library/js/bootstrap.bundle.min.js"></script>
    <script src="../../library/sweetalert/node_modules/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>

<?php
require("../../connect.php");

if (isset($_POST["verify"])) {
    $otp = $_SESSION['otp'];
    $email = $_SESSION['mail'];
    $mainID =  $_SESSION['mainID'];
    $otp_code = mysqli_real_escape_string($con, trim($_POST["otpverify"]));

    if ($otp != $otp_code) {
?>
        <script>
            alert("Invalid OTP code");
        </script>

    <?php
    } else {
        mysqli_query($con, "UPDATE users SET cand_email_verify = 'verified' WHERE email = '$email'");
        mysqli_query($con, "INSERT INTO roles VALUES (null, $mainID, 'candidate')");
    ?>
        <script>
            alert("Account verified. You have successfully registerd as a candidate");
            window.location.replace("../userhomepage.php");
        </script>
<?php
    }
}

?>