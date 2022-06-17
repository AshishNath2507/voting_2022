<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['alert_message'] = "You are Logged Out";
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Homepage</title>
    <link rel="stylesheet" href="../library/css/bootstrap.min.css">
    <style>
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
    <?php include "usernav.php"; ?>

    <div class="container-sm mt-2">
        <div class="row">
            <div class="col">
                <img class="img-fluid rounded " src="../photos/vote.jpg" alt="">
            </div>
            <div class="col">
                <p class="text-center fs-2 mt-5">WHY SHOULD YOU VOTE?</p>
                <p class="text-center fs-5">BECAUSE IF YOU DON'T VOTE, YOU WON'T HAVE A SAY IN HOW OUR COUNTRY IS RUN NO VOTE. NO VOICE</p>
                <p class="text-center fs-5">Increasing the number of people that vote in each election means better representation, more funding to our communities, and a better quality of life. Politicians listen to two things, money and votes. If we work together as a community and increase voter turnout, then our state and national legislators will listen to our needs. Education, healthcare, immigration, infrastructure, the economy, our veterans, etc. are all affected by our vote.</p>
            </div>
        </div>
    </div>
    <div class="container-sm mt-2 mb-3 bg-info rounded">
        <div class="row">
            <div class="col">
                <p class="text-center fs-2 text-light mt-5">Lets Create A Positive Change!</p>
                <p class="text-center fs-5 text-light">By working together to increase voter turnout, our community will benefit through job growth, better healthcare, better education, better infrastructure, a better economy, safer neighborhoods, and most importantly a better quality of life for our families. Its time to change the status quo and improve the lives of everyone we care about through voting, because our voice matters.</p>
            </div>
        </div>
    </div>
    <div class="container-sm mt-2">
        <div class="row">            
            <div class="col">
                <p class="text-center fs-2 mt-5">HOW TO VOTE IN OUR SYSTEM?</p>
                <p class="text-center fs-5">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione quidem molestias veritatis corporis cumque eveniet incidunt ipsa eum laudantium ab et, nisi cum, magni inventore deleniti quaerat modi quo. Natus velit vitae ex libero distinctio est, amet impedit quos nihil suscipit, excepturi aperiam! Repudiandae sequi nam fugiat. Odit ad, cum deserunt illo quia quam provident possimus voluptate praesentium cupiditate inventore quo assumenda porro fuga asperiores error quidem reiciendis libero et expedita voluptas cumque veniam. Nemo, hic consequuntur?</p>
            </div>
            <div class="col">
                <img class="img-fluid rounded " src="../photos/vote2.jpg" alt="">
            </div>
        </div>
    </div>



    <script src="../library/js/bootstrap.bundle.min.js"></script>
</body>

</html>