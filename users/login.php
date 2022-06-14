<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Here!!!</title>
    <!-- Bootstrap links -->
    <link rel="stylesheet" href="../library/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/svg.css">
    <style>
        /* .container {
            border-radius: 50px;
            background: white;
            box-shadow: 20px 20px 60px #bebebe,
                -20px -20px 60px #ffffff;
        } */
    </style>
</head>

<body>
    <?php include "nav.php"; ?>

    <!-- <div class="container-fluid mt-3 w-25">
        <form action="../backend/login1.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control border-0 border-bottom" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label ">Password</label>
                <input type="password" class="form-control border-0 border-bottom" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div> -->

    
    <div class="container-fluid  p-0">
        <!--Hey! This is the original version of Simple CSS Waves-->

        <div class="header">

            <!--Content before waves-->
            <div class="inner-header flex">
                <!--Just the logo.. Don't mind this-->
                <svg version="1.1" class="logo" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" xml:space="preserve">
                    <path fill="#FFFFFF" stroke="#000000" stroke-width="10" stroke-miterlimit="10" d="M57,283" />
                    <g>
                        
                        <div class="container-fluid mt-3 w-25">
                            <form action="../backend/login1.php" method="POST">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label fs-5">Email address</label>
                                    <input type="email" name="email" class="form-control border-0 border-bottom" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label fs-5">Password</label>
                                    <input type="password" name="password" class="form-control border-0 border-bottom" id="exampleInputPassword1">
                                </div>
                                <button type="submit" name="loginSubmit" class="btn btn-secondary">Submit</button>
                            </form>
                        </div>
                    </g>
                </svg>

            </div>

            <!--Waves Container-->
            <div>
                <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                    <defs>
                        <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                    </defs>
                    <g class="parallax">
                        <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                        <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                        <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                        <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                    </g>
                </svg>
            </div>
            <!--Waves end-->

        </div>
        <!--Header ends-->
    </div>
    <script src="../library/js/bootstrap.bundle.min.js"></script>
</body>

</html>