<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    <script src="../library/jquery.min.js"></script>
    <script src="../library/jquery.validate.min.js"></script>
    <script src="../backend/validate.js"></script>
    <!-- Bootstrap links -->
    <link rel="stylesheet" href="../library/css/bootstrap.min.css">

    <!-- Fontawesome -->
    <link href="../library/fontawesome-free-6.1.1-web/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="../library/fontawesome-free-6.1.1-web/js/all.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Iceberg&display=swap');

        @font-face {
            font-family: anurati;
            src: url('../library/fonts/anurati/ANURATI/Anurati-Regular.otf');
            
        }

        .anurati {
            font-family: 'Iceberg', cursive;
        }

        body{
            background-color: #337171;
            color: white;
        }
        .c-font {
            font-family: 'Jost', sans-serif;

        }
        .form input{
            background-color: #e5e9b8;
        }
    </style>
</head>

<body>
    <?php include "nav.php"; ?>

    <div class="container-lg c-font" >
        <p class="text-center mt-3 mb-5 fs-1">Register Here!!!</p>
        <div class="container-lg">

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

            <form class="row g-3 w-75 mb-4 mx-auto form" id="registerForm" action="../backend/register1.php" method="POST" enctype="multipart/form-data">

                <div class="col-md-12 mb-1 ">
                    <label for="name" class="form-label w-25">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" autofocus required>
                </div>

                <div class="col-md-4 mb-1">
                    <label for="rollno" class="form-label">Roll No.</label>
                    <input type="text" class="form-control" id="rollno" name="rollno" aria-describedby="rollHelp" required>
                </div>

                <div class="col-md-4 mb-1">
                    <label for="regno" class="form-label">Registration No.</label>
                    <input type="text" class="form-control" id="regno" name="regno" aria-describedby="regHelp" required>
                </div>

                <div class="col-md-4 mb-1">
                    <label for="sob" class="form-label w-25">DoB</label>
                    <input type="date" class="form-control w-50" id="dob" name="dob" aria-describedby="dobHelp" required>
                </div>

                <div class="mb-1 col-md-5">
                    <label for="phone" class="form-label w-25">Phone No.</label>
                    <input type="tel" class="form-control" id="phone" name="phone" aria-describedby="telHelp" required>
                </div>

                <div class="mb-1 col-md-7">
                    <label for="addr" class="form-label w-25">Address</label>
                    <input type="text" class="form-control" id="addr" name="addr" aria-describedby="addrHelp" required>
                </div>

                <div class="mb-1 col-md-4">
                    <label for="gender" class="form-label w-25">Gender</label>
                    <div class="input-group mb-1">
                        <label class="input-group-text" for="gender">Options</label>
                        <select class="form-select" name="gender" id="gender"required>
                            <option selected>Choose...</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                </div>

                <div class="mb-1 col-md-4">
                    <label for="branch" class="form-label w-25">Branch</label>
                    <div class="input-group mb-1">
                        <label class="input-group-text" for="branch">Options</label>
                        <select class="form-select" name="branch" id="branch"required>
                            <option selected>Choose...</option>
                            <option value="civil">Civil</option>
                            <option value="mechanical">Mechanical</option>
                            <option value="electrical">Electrical</option>
                            <option value="cse">CSE</option>
                            <option value="instrumental">Instrumental</option>
                        </select>
                    </div>
                </div>

                <div class="mb-1 col-md-4">
                    <label for="sem" class="form-label w-25">Semester</label>
                    <div class="input-group mb-1">
                        <label class="input-group-text" for="semester">Options</label>
                        <select class="form-select" name="sem" id="semester"required>
                            <option selected>Choose...</option>
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                            <option value="3">3rd</option>
                            <option value="4">4th</option>
                            <option value="5">5th</option>
                            <option value="6">6th</option>
                            <option value="7">7th</option>
                            <option value="8">8th</option>
                        </select>
                    </div>
                </div>

                <hr>

                <div class="mb-1 mt-4 col-md-6">
                    <div class="input-group">
                        <label class="input-group-text" for="photo">Upload Photo</label>
                        <input type="file" class="form-control" name="photo" id="photo" aria-describedby="photoHelpBlock" accept="image/*" required>
                    </div>
                    <div id="photoHelpBlock" class="form-text text-info">
                        Upload your photo in size >= 2MB file(jpg, jpeg, png)
                    </div>
                </div>

                <div class="mb-4 mt-4 col-md-6">
                    <div class="input-group">
                        <label class="input-group-text" for="idproof">Upload ID Proof</label>
                        <input type="file" class="form-control" name="idproof" id="idproof" aria-describedby="idproofHelpBlock" accept="image/*" required>
                    </div>
                    <div id="idproofHelpBlock" class="form-text text-info">
                        Upload college ID card (both sides in a single file)
                        with signature, size >= 2MB
                    </div>
                </div>

                <hr>

                <div class="mb-1 mt-4 flex-column">
                    <div class="input-group">
                        <label for="email" class="form-label w-25">Email address</label>
                        <!-- <div class="col"> -->
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                        <!-- </div> -->
                        <!-- <div class="col">
                            <a class="btn btn-primary" onclick="checkOTP()">send OTP</a>

                        </div> -->
                    </div>
                    <div id="emailHelp" class="form-text  text-info">
                        <p>
                            We'll never share your email with anyone else.
                            An OTP will be sent to your email address.
                        </p>
                    </div>
                </div>

                <!-- <div class="mb-1 mt-4 flex-column" id='otpDiv' style="display: none !important;">
                    <div class="input-group">
                        <label for="OTP" class="form-label w-25">Enter OTP</label>
                        <input type="number" name="OTP" class="form-control" id="OTP" aria-describedby="OTPhelp" >
                    </div>
                    <div id="OTPhelp" class="form-text">
                        <p>
                            Enter OTP
                        </p>
                    </div>
                </div> -->


                <div class="mb-1 flex-column">
                    <div class="input-group">
                        <label for="password" class="form-label w-25">Password</label>
                        <span class="input-group-text" id="inputGroupPrepend">***</span>
                        <input type="password" name="password" id="password" class="form-control" aria-describedby="passwordHelpBlock" required>
                    </div>
                    <div id="passwordHelpBlock" class="form-text text-info">
                        <p>
                            Your password must be 6-20 characters long,
                            contain letters and numbers, and must not
                            contain spaces, special characters, or emoji.
                        </p>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" >
                        <label class="form-check-label fs-5" for="invalidCheck">
                            Agree to terms and conditions
                        </label>
                        <div class="invalid-feedback text-info">
                            You must agree before submitting.
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" name="regSubmit" id="regSubmit" class="btn w-50 fs-3" style="background-color: #337171; color: white">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    include "../includes/footer.php";
    ?>


    <script src="../library/js/bootstrap.bundle.min.js"></script>
    <script src="../library/sweetalert/node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        // swal({
        //     title: "Good job!",
        //     text: "You clicked the button!",
        //     icon: "success",
        //     button: "Aww yiss!",
        // });
        // function checkOTP()
        // {
        //     document.getElementById('otpDiv').style.display='';
        // }
    </script>

</body>

</html>