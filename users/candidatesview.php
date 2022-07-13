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
    <title>View Candidates</title>

    <script src="../library/jquery.min.js"></script>
    <script src="../library/popper.min.js"></script>

    <!-- Bootstrap links -->
    <link rel="stylesheet" href="../library/css/bootstrap.min.css">
    <!-- Fontawesome -->
    <link href="../library/fontawesome-free-6.1.1-web/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="../library/fontawesome-free-6.1.1-web/js/all.min.js"></script>
    <!-- Animate.css -->
    <link rel="stylesheet" href="../library/animate.min.css">


    <!-- Anurati font -->
    <style>
        @font-face {
            font-family: anurati;
            src: url('../library/fonts/anurati/ANURATI/Anurati-Regular.otf');
        }

        .anurati {
            font-family: anurati;
        }

        body {
            background-color: #bfe3e3;
        }

        .btn-cust {
            color: #fff;
            background-color: #b23cfd;
            text-transform: uppercase;
            /* vertical-align: bottom; */
            border: 0;
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 20%), 0 2px 10px 0 rgb(0 0 0 / 10%);
            font-weight: 500;
            padding: 0.625rem 1.5rem 0.5rem;
            font-size: .75rem;
            line-height: 1.5;
            display: inline-block;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }


        .p-cust {

            background-color: #002f75;
            color: white;
        }
    </style>
    <script>
        $(document).ready(function() {

            $('.objectives').popover({
                html: true,
                placement: "right"
                // content: "fjao;sdnfpoandsfoahdsfaibsdfibapifdbapisdbfiwefibak;sndfv9ph24rtnksdnaf;",
            });
        });

        $(function() {});
    </script>
</head>

<body>
    <?php include "./usernav.php"; ?>

    <?php
    $pq = mysqli_query($con, "SELECT * FROM posts");
    while ($row1 = mysqli_fetch_array($pq)) {
    ?>
        <div class="container-lg mx-auto my-2 mb-4">
            <p class="fs-3 p-cust p-2 rounded">
                <?php echo strtoupper($row1['p_name']); ?>
            </p>

            <div class="d-grid p-2">
                <div class="row">
                    <?php
                    $uq = mysqli_query($con, "SELECT * FROM users AS u INNER JOIN roles AS r ON (u.id = r.user_id) WHERE r.role = 'candidate' AND u.cand_approval = 'approved' AND isdel = '0' AND u.cand_post = '" . $row1['p_name'] . "'");
                    while ($row = mysqli_fetch_array($uq)) {
                       
                        $ob = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM objectives WHERE cand_id = '".$row['id']."'"));
                        // echo json_decode($ob['objs']);


                    ?>
                        <div class="col-4" style="max-height: 300px;">
                            <div class="card" style="width: 18rem; height: 20rem;">
                                <div class="bg-image hover-overlay ripple text-center" data-mdb-ripple-color="light">
                                    <img src="<?php echo '../uploads/' . $row['photo']; ?>" class="img-fluid m-2" style="width: 40%;" alt="DP" />
                                    <img src="<?php echo '../uploads/' . $row['insignia']; ?>" class="img-fluid m-2" style="width: 40%; height: 80%;" alt="insignia" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                    <p class="mb-1">Branch : <?php echo $row['branch']; ?></p>
                                    <button class="btn btn-secondary btn-cust objectives" data-bs-trigger="focus" title="<?php echo strtoupper($row['name'] . ' objectives'); ?>" data-bs-content="
                                    <?php 
                                    if($ob['objs'] == null) {
                                        echo "NO OBJECTIVES ADDED";
                                    }else{
                                        echo json_decode($ob['objs']); 
                                    }
                                    ?>
                                    ">
                                        View Objectives
                                    </button>
                                    <p class="card-text"><small class="text-muted"><?php echo $row['created']; ?></small></p>
                                </div>
                            </div>
                        </div>
                    <?php
                    };
                    ?>
                </div>
            </div>
        </div>
    <?php
    };
    ?>



    <?php
    include "./footer.php";
    ?>

    <!-- Bootstrap script -->
    <script src="../library/js/bootstrap.bundle.min.js"></script>

</body>

</html>