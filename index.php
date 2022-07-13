<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <!-- Bootstrap links -->
    <link rel="stylesheet" href="./library/css/bootstrap.min.css">
    <link rel="stylesheet" href="./library/animate.min.css">
    <link href="./library/fontawesome-free-6.1.1-web/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="./library/fontawesome-free-6.1.1-web/js/all.min.js"></script>
    <!-- <link href="css/layout.css" rel="stylesheet" type="text/css" media="all"> -->

    <link rel="stylesheet" href="./css/custom.css">



    <style>
        @import url('https://fonts.googleapis.com/css2?family=Edu+TAS+Beginner&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Iceberg&display=swap');

        @font-face {
            font-family: anurati;
            src: url('./library/fonts/anurati/ANURATI/Anurati-Regular.otf');
        }

        .anurati {
            font-family: 'Iceberg', cursive;
        }

        * {
            box-sizing: border-box;
        }

        body {
            /* font-family: 'Edu TAS Beginner', cursive; */
            font-family: 'Jost', sans-serif;
            background-color: #337171;

        }
    </style>
</head>

<body>
    <?php include "nav.php"; ?>
    <div class="container-fluid space">
        <div class="row text-center">
            <p class="col-6 fs-5 text-center jecpara">
                Jorhat Engineering College is a premiere technical college of North-East India that has completed its 60 years of relentless service to the society. The college started functioning with its first batch of students in Civil Engineering on October 10th 1960. The college is affiliated to ASTU, currently offers AICTE recognized B. Tech courses in Civil and Electrical Engineering. The college is now offering a 2 years PG course leading to MCA since 2021 which was previously 3 years since 1987.
                The college vision is the development of quality human resources for sustainable industrial and societal growth through excellence in technical education and research.
            </p>
            <div class="col-6 coloosal">
                <?php include "cal.php"; ?>
            </div>
        </div>
    </div>
    <!-- ****************************************************************************************************************** -->
    <div class="section about">
        <div class="container-fluid text-center bg-light">
            <h1 class="text-dark mb-2 p-4">ABOUT OUT WEBSITE</h1>
        </div>
        <div class="row text-center">
            <div class="col-6 p-0 m-0">
                <img src="./images/vero-online.jpg" alt="" class="img-fluid vote-img">
            </div>
            <p class="col-6 fs-5 text-center text-light jecpara">
                An online poll is a survey in which participants communicate responses via the Internet, typically by completing a questionnaire in a web page. Online polls may allow anyone to participate, or they may be restricted to a sample drawn from a larger panel.</n>
                Electronic voting technology intends to speed the counting of ballots, reduce the cost of paying staff to count votes manually and can provide improved accessibility for disabled voters. Also in the long term, expenses are expected to decrease. Results can be reported and published faster.
            </p>
        </div>
    </div>
    <!-- *************************************************************************************************************************** -->

    <div class="section mt-2 mb-3">
        <div class="container-fluid bg-light text-center mb-3">
            <h1 class="text-dark p-4">SERVICES WE PROVIDE</h1>
        </div>
        <div class="container d-grid services">
            <div class="row text-center services-grid gap-5 mb-5">
                <div class="col shadow">
                    <div class="d-grid">
                        <div class="row py-4">
                            <div class="col-3">
                                <i class="fa-solid fa-wand-magic-sparkles card-icons"></i>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <p class="fs-4">Easy to use</p>
                                    <p class="fs-5">Keeping it simple</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col shadow">
                    <div class="d-grid">
                        <div class="row py-4">
                            <div class="col-3">
                                <i class="fa-solid fa-arrows-rotate card-icons"></i>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <p class="fs-4">ELECTION VOTING</p>
                                    <p class="fs-5">Conduct a seamless voting experience tailored for your organization</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col shadow">
                    <div class="d-grid">
                        <div class="row py-4">
                            <div class="col-3">
                                <i class="fa-regular fa-location-dot card-icons"></i>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <p class="fs-4">Contact Us</p>
                                    <p class="fs-5">Our team is here 24x7</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center services-grid gap-5">
                <div class="col shadow">
                    <div class="d-grid">
                        <div class="row py-4">
                            <div class="col-3">
                                <i class="fa-solid fa-shield card-icons"></i>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <p class="fs-4">Professional Design</p>
                                    <p class="fs-5">Designed to match your professional needs</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col shadow">
                    <div class="d-grid">
                        <div class="row py-4">
                            <div class="col-3">
                                <i class="fa-regular fa-laptop-mobile card-icons"></i>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <p class="fs-4">ENTERPRISE AGREEMENT VOTING</p>
                                    <p class="fs-5">Establish a fair and transparent voting experience</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col shadow">
                    <div class="d-grid">
                        <div class="row py-4">
                            <div class="col-3">
                                <i class="fa-solid fa-shield card-icons"></i>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <p class="fs-3">Security</p>
                                    <p class="fs-5">All credentials are secured in our database</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ****************************************************************************************************************** -->
    <?php
        include "./includes/footer.php";
    ?>





    <!-- <link href="./library/folder/css/styles.css" rel="stylesheet" defer/> -->
    <!-- Bootstrap links -->
    <script src="./library/js/bootstrap.bundle.min.js"></script>
</body>

</html>