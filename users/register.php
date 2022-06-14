<?php

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

    <style>
        /* body{color: #000;overflow-x: hidden;height: 100%;background-image: url("https://i.imgur.com/GMmCQHC.png");background-repeat: no-repeat;background-size: 100% 100%}.card{padding: 30px 40px;margin-top: 60px;margin-bottom: 60px;border: none !important;box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2)}.blue-text{color: #00BCD4}.form-control-label{margin-bottom: 0}input, textarea, button{padding: 8px 15px;border-radius: 5px !important;margin: 5px 0px;box-sizing: border-box;border: 1px solid #ccc;font-size: 18px !important;font-weight: 300}input:focus, textarea:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;border: 1px solid #00BCD4;outline-width: 0;font-weight: 400}.btn-block{text-transform: uppercase;font-size: 15px !important;font-weight: 400;height: 43px;cursor: pointer}.btn-block:hover{color: #fff !important}button:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;outline-width: 0} */

        input:active {
            outline: none;
        }
    </style>
</head>

<body>
    <?php include "./nav.php"; ?>

    <div class="container-fluid">
        <p class="text-center mt-3 mb-5 fs-1">Register Here!!!</p>
        <div class="container-lg">

            <form class="w-50 mx-auto" action="../backend/register1.php" method="POST" enctype="multipart/form-data">

                <div class="mb-3 d-flex">
                    <label for="name" class="form-label w-25">Name</label>
                    <input type="text" class="form-control border-0 border-bottom outline-0" id="name" name="name" aria-describedby="nameHelp">
                </div>

                <div class="mb-3 d-flex">
                    <label for="rollno" class="form-label w-25">Roll No.</label>
                    <input type="text" class="form-control" id="rollno" name="rollno" aria-describedby="rollHelp">
                </div>

                <div class="mb-3 d-flex">
                    <label for="regno" class="form-label w-25">Registration No.</label>
                    <input type="text" class="form-control" id="regno" name="regno" aria-describedby="regHelp">
                </div>

                <div class="mb-3 d-flex">
                    <label for="sob" class="form-label w-25">DoB</label>
                    <input type="date" class="form-control w-50" id="sob" name="dob" aria-describedby="dobHelp">
                </div>

                <div class="mb-3 d-flex">
                    <label for="phone" class="form-label w-25">Phone No.</label>
                    <input type="tel" class="form-control" id="phone" name="phone" aria-describedby="telHelp">
                </div>


                <div class="mb-3 d-flex">
                    <label for="addr" class="form-label w-25">Address</label>
                    <input type="text" class="form-control" id="addr" name="addr" aria-describedby="addrHelp">
                </div>

                <div class="mb-3 d-flex">
                    <label for="gender" class="form-label w-25">Gender</label>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="gender">Options</label>
                        <select class="form-select" name="gender" id="gender">
                            <option selected>Choose...</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 d-flex">
                    <label for="branch" class="form-label w-25">Branch</label>
                    <div class="input-group mb-3">
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

                <div class="mb-3 d-flex">
                    <label for="sem" class="form-label w-25">Semester</label>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="semester">Options</label>
                        <select class="form-select" name="sem" id="semester">
                            <option selected>Choose...</option>
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option>
                            <option value="3rd">3rd</option>
                            <option value="4th">4th</option>
                            <option value="5th">5th</option>
                            <option value="6th">6th</option>
                            <option value="7th">7th</option>
                            <option value="8th">8th</option>
                        </select>
                    </div>
                </div>

                <hr>

                <div class="mb-3 mt-4 d-flex flex-column">
                    <div class="input-group">
                        <label class="input-group-text" for="inputGroupFile01">Upload Photo</label>
                        <input type="file" class="form-control" name="photo" id="inputGroupFile01" aria-describedby="photoHelpBlock">
                    </div>
                    <div id="photoHelpBlock" class="form-text">
                        Upload your photo in size >= 2MB file(jpg, jpeg, png)
                    </div>
                </div>

                <div class="mb-4 mt-4 d-flex flex-column">
                    <div class="input-group">
                        <label class="input-group-text" for="idproof">Upload ID Proof</label>
                        <input type="file" class="form-control" name="idproof" id="idproof" aria-describedby="idproofHelpBlock">
                    </div>
                    <div id="idproofHelpBlock" class="form-text">
                        Upload aadhar card and college ID card (both sides in a single file)
                        with signature, size >= 2MB
                    </div>
                </div>

                <hr>

                <div class="mb-3 mt-4 d-flex flex-column">
                    <div class="input-group">
                        <label for="email" class="form-label w-25">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <div id="emailHelp" class="form-text">
                        <p>
                            We'll never share your email with anyone else.
                            An OTP will be sent to your email address.
                        </p>
                    </div>
                </div>


                <div class="mb-3 d-flex flex-column">
                    <div class="input-group">
                        <label for="inputPassword5" class="form-label w-25">Password</label>
                        <input type="password" name="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
                    </div>
                    <div id="passwordHelpBlock" class="form-text">
                        <p>
                            Your password must be 6-20 characters long,
                            contain letters and numbers, and must not
                            contain spaces, special characters, or emoji.
                        </p>
                    </div>
                </div>

                <!-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->

                <button type="submit" name="regSubmit" class="btn btn-primary align-center" style="background-color: #337171; color: white">Submit</button>
            </form>
        </div>
    </div>


    <script src="../library/js/bootstrap.bundle.min.js"></script>
    <script src="../library/sweetalert/node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        // swal({
        //     title: "Good job!",
        //     text: "You clicked the button!",
        //     icon: "success",
        //     button: "Aww yiss!",
        // });
    </script>

</body>

</html>