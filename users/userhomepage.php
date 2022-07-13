<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['alert_message'] = "You are Logged Out";
    header("Location: login.php");
}
require "../connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Homepage</title>
    <link rel="stylesheet" href="../library/css/bootstrap.min.css">
    <link rel="stylesheet" href="../library/animate.min.css">
    <link href="../library/fontawesome-free-6.1.1-web/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="../library/fontawesome-free-6.1.1-web/js/all.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Iceberg&display=swap');

        /* @font-face {
            font-family: anurati;
            src: url('../library/fonts/anurati/ANURATI/Anurati-Regular.otf');
        } */

        .anurati {
            font-family: 'Iceberg', cursive;
        }

        body {
            font-family: 'Jost', sans-serif;
        }

        .first-img,
        .second-img {
            max-width: 600px;
        }

        .lists > li {
            list-style: none;
            padding: 18px;
            font-size: 1rem;
            border-radius: 40px;
        }
        .lists li:nth-child(even) {
            background-color: #e9e5e5;
        }
        .lists li:nth-child(odd) {
            background-color: #bee9be;
        }
    </style>
</head>

<body>
    <?php include "usernav.php"; ?>

    <?php
    $id = $_SESSION['id'];
    $sql = mysqli_query($con, "SELECT * FROM users WHERE id = '$id'");
    $row = mysqli_fetch_array($sql);
    if ($row['cand_email_verify'] == 'verified') {
    ?>
        <nav class="navbar bg-dark navbar-expand-lg bg-light">
            <div class="container-fluid">
                <?php
                $uid = $_SESSION['id'];
                $sql = mysqli_query($con, "SELECT * FROM users AS u INNER JOIN roles AS r ON ( u.id = r.user_id ) WHERE r.role = 'candidate' AND r.user_id = '$uid'");
                $urow = mysqli_fetch_array($sql);
                $status = ($urow['cand_approval'] == 'approved') ? '<marquee class= "text-light"> Your status is <span class = "text-warning bold">Approved</span></marquee>' : '<marquee class="text-light">Your A/C is in <span class = "text-warning bold">Scrutiny</span></marquee>';

                echo $status;
                ?>
            </div>
        </nav>
    <?php
    }
    ?>
    <!-- ################################################################################################################### -->
    <div class="section">
        <div class="container-fluid bg-light d-grid ">
            <div class="row">
                <div class="col animate__animated animate__fadeInLeft">
                    <img class="img-fluid rounded first-img" src="../photos/vote.jpg" alt="">
                </div>
                <div class="col text-center animate__animated animate__fadeInRight">
                    <p class="fs-2">WHY YOU SHOULD VOTE?</p>
                    <p class="fs-5">BECAUSE IF YOU DON'T VOTE, YOU WON'T HAVE A SAY IN HOW OUR COUNTRY IS RUN NO VOTE. NO VOICE</p>
                    <p class="fs-5 px-4">Increasing the number of people that vote in each election means better representation, more funding to our communities, and a better quality of life. Politicians listen to two things, money and votes. If we work together as a community and increase voter turnout, then our state and national legislators will listen to our needs. Education, healthcare, immigration, infrastructure, the economy, our veterans, etc. are all affected by our vote.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="section" style="background-color: #348b7b;">
        <div class="container-fluid mt-3 p-3 rounded">
            <div class="text-center" style="max-width: auto 1100px;">
                <p class="fs-2 text-light ">Lets Create A Positive Change!</p>
                <p class="fs-5 text-light">By working together to increase voter turnout, our community will benefit through job growth, better healthcare, better education, better infrastructure, a better economy, safer neighborhoods, and most importantly a better quality of life for our families. Its time to change the status quo and improve the lives of everyone we care about through voting, because our voice matters.</p>
            </div>
        </div>
    </div>

    <div class="secion">
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col">
                    <div class="text-center">
                        <p class="fs-2">HOW OUR SYSTEM WORKS</p>
                    </div>
                    <div class="container">
                        <ul class="lists">
                            <li>Register yourself as a student</li>
                            <li>If you want to apply for candidature, simply click the button in the "Apply for Candidature" tab.</li>
                            <li>Admin will the check the credibility of your details and approve you.</li>
                            <li>You can back-off anytime.</li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <img class="img-fluid rounded second-img" src="../photos/vote2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="section p-3 mt-2" style="background-color: #42c2d0;">
        <div class="container-fluid mt-2">
            <p class="text-center fs-2">
            How the Ballot Results are Calculated
            </p>
            <p class="text-center fs-5">
            A simple vote counting algorithm is used to count the votes cast on the ballots during approval voting and determine the results of the election. The winner is the candidate (or candidates, in the event of a tie) who receives the most votes (i.e., is most approved by the voters).
            </p>
        </div>
    </div>

    <?php
        include "./footer.php";
    ?>

    <script src="../library/js/bootstrap.bundle.min.js"></script>
</body>

</html>