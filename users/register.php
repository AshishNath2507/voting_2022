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
    <!-- Bootstrap links -->
    <link rel="stylesheet" href="../library/css/bootstrap.min.css">

    <!-- Fontawesome -->
    <link href="../library/fontawesome-free-6.1.1-web/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="../library/fontawesome-free-6.1.1-web/js/all.min.js"></script>

    <style>
        /* body{color: #000;overflow-x: hidden;height: 100%;background-image: url("https://i.imgur.com/GMmCQHC.png");background-repeat: no-repeat;background-size: 100% 100%}.card{padding: 30px 40px;margin-top: 60px;margin-bottom: 60px;border: none !important;box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2)}.blue-text{color: #00BCD4}.form-control-label{margin-bottom: 0}input, textarea, button{padding: 8px 15px;border-radius: 5px !important;margin: 5px 0px;box-sizing: border-box;border: 1px solid #ccc;font-size: 18px !important;font-weight: 300}input:focus, textarea:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;border: 1px solid #00BCD4;outline-width: 0;font-weight: 400}.btn-block{text-transform: uppercase;font-size: 15px !important;font-weight: 400;height: 43px;cursor: pointer}.btn-block:hover{color: #fff !important}button:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;outline-width: 0} */

        input:active {
            outline: none;
        }

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
    <?php include "nav.php"; ?>

    <div class="container-lg border">
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

            <form class="row g-3 w-75 mb-4 mx-auto needs-validation" action="../backend/register1.php" method="POST" enctype="multipart/form-data" novalidate>

                <div class="col-md-12 mb-1 ">
                    <label for="name" class="form-label w-25">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" autofocus required>
                </div>

                <div class="col-md-6 mb-1">
                    <label for="rollno" class="form-label">Roll No.</label>
                    <input type="text" class="form-control" id="rollno" name="rollno" aria-describedby="rollHelp" required>
                </div>

                <div class="col-md-6 mb-1">
                    <label for="regno" class="form-label">Registration No.</label>
                    <input type="text" class="form-control" id="regno" name="regno" aria-describedby="regHelp" required>
                </div>

                <div class="mb-1">
                    <label for="sob" class="form-label w-25">DoB</label>
                    <input type="date" class="form-control w-50" id="sob" name="dob" aria-describedby="dobHelp" required>
                </div>

                <div class="mb-1 col-md-6">
                    <label for="phone" class="form-label w-25">Phone No.</label>
                    <input type="tel" class="form-control" id="phone" name="phone" aria-describedby="telHelp" required>
                </div>

                <div class="mb-1 col-md-6">
                    <label for="addr" class="form-label w-25">Address</label>
                    <input type="text" class="form-control" id="addr" name="addr" aria-describedby="addrHelp" required>
                </div>

                <div class="mb-1 col-md-4">
                    <label for="gender" class="form-label w-25">Gender</label>
                    <div class="input-group mb-1">
                        <label class="input-group-text" for="gender">Options</label>
                        <select class="form-select" name="gender" id="gender">
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
                        <select class="form-select" name="branch" id="branch">
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
                        <select class="form-select" name="sem" id="semester">
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
                        <label class="input-group-text" for="inputGroupFile01">Upload Photo</label>
                        <input type="file" class="form-control" name="photo" id="inputGroupFile01" aria-describedby="photoHelpBlock" accept="image/*" required>
                    </div>
                    <div id="photoHelpBlock" class="form-text">
                        Upload your photo in size >= 2MB file(jpg, jpeg, png)
                    </div>
                </div>

                <div class="mb-4 mt-4 col-md-6">
                    <div class="input-group">
                        <label class="input-group-text" for="idproof">Upload ID Proof</label>
                        <input type="file" class="form-control" name="idproof" id="idproof" aria-describedby="idproofHelpBlock" accept="image/*" required>
                    </div>
                    <div id="idproofHelpBlock" class="form-text">
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
                    <div id="emailHelp" class="form-text">
                        <p>
                            We'll never share your email with anyone else.
                            An OTP will be sent to your email address.
                        </p>
                    </div>
                </div>

                <!-- <div class="mb-1 mt-4 flex-column" id='otpDiv' style="display: none !important;">
                    <div class="input-group">
                        <label for="OTP" class="form-label w-25">Enter OTP</label>
                        <input type="number" name="OTP" class="form-control" id="OTP" aria-describedby="OTPhelp" required>
                    </div>
                    <div id="OTPhelp" class="form-text">
                        <p>
                            Enter OTP
                        </p>
                    </div>
                </div> -->


                <div class="mb-1 flex-column">
                    <div class="input-group">
                        <label for="inputPassword5" class="form-label w-25">Password</label>
                        <span class="input-group-text" id="inputGroupPrepend">***</span>
                        <input type="password" name="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" required>
                    </div>
                    <div id="passwordHelpBlock" class="form-text">
                        <p>
                            Your password must be 6-20 characters long,
                            contain letters and numbers, and must not
                            contain spaces, special characters, or emoji.
                        </p>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label fs-4" for="invalidCheck">
                            Agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" name="regSubmit" class="btn w-50 fs-3" style="background-color: #337171; color: white">Submit</button>
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