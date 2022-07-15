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
    <title>Edit Details</title>

    <script src="../library/jquery.min.js"></script>

    <!-- Bootstrap links -->
    <link rel="stylesheet" href="../library/css/bootstrap.min.css">
    <!-- Bootstrap script -->
    <script src="../library/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="../library/animate.min.css">
    <link href="../library/fontawesome-free-6.1.1-web/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="../library/fontawesome-free-6.1.1-web/js/all.min.js"></script>
    <style>
        body {
            background-color: #eee8e8;
        }

        .details {
            font-size: 30px;
            background-color: #15156c;
            color: white;
            padding: 1rem;
        }

        .details input {
            border: none;
        }
    </style>
</head>

<body>
    <?php
    include "./usernav.php";
    ?>



    <p class="text-center details">
        Details & Informations
    </p>


    <!-- nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn -->
    <section style="background-color: #eee;">
        <?php
        $id = $_SESSION['id'];
        $row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users where id = '$id'"));

        ?>
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="./userhomepage.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                            <li class="breadcrumb-item"><a href="./useredit.php">Profile Edit</a></li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <?php
                            if (isset($_SESSION['alert_message'])) {
                            ?>
                                <div class="container">
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>Hey!!!</strong> <?php echo $_SESSION['alert_message']; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            <?php
                                unset($_SESSION['alert_message']);
                            }
                            ?>
                            <img src="<?php echo '../uploads/' . $row["photo"]; ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3"><?php echo strtoupper($row['name']); ?></h5>
                            <!-- <p class="text-muted mb-1">Full Stack Developer</p> -->
                            <p class="text-muted mb-4"><?php echo strtoupper($row['branch']); ?></p>

                            <?php
                            $withdraw_query = mysqli_query($con, "SELECT * FROM users AS u INNER JOIN roles AS r ON ( u.id = r.user_id ) WHERE u.id = '$id' AND r.role = 'candidate'");
                            $wrow = mysqli_fetch_array($withdraw_query);
                            $count_with = mysqli_num_rows($withdraw_query);

                            if ($count_with > 0) {
                            ?>
                                <button class="btn btn-danger bobtn" data-bs-toggle="modal" data-bs-target="#BackOut" value="<?php echo $row["id"]; ?>">Withdraw</button>
                            <?php
                            }
                            ?>


                            <p class="text-muted mb-4" title="A/c Creation Time"><?php echo $row['created']; ?></p>
                        </div>
                        <!--Back-out Modal -->
                        <div id="BackOut" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="../backend/backout.php" method="POST">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Rejection Process</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="bo_id" class="bo_user_id outline-0 text-danger" readonly>

                                            <p>Are you sure you want to approve this Record?</p>
                                            <p class="fs-5 text-danger">Once you back-out, you cannot apply for candidature.</p>
                                            <p class="text-warning"><small>This action cannot be undone.</small></p>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
                                            <input type="submit" name="candBoButton" class="btn btn-primary" value="Approve">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Semester</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo strtoupper($row['sem']); ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Dob</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo strtoupper($row['dob']); ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Roll Number</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo strtoupper($row['rollno']); ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Registration Number</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo strtoupper($row['regno']); ?></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Gender</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo strtoupper($row['gender']); ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo $row['email']; ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo strtoupper($row['phone']); ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Branch</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo strtoupper($row['branch']); ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Address</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php echo strtoupper($row['addr']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4"><span class="text-primary font-italic me-1">Details</span> Verification Status
                                    </p>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Candidate Email verify</p>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo strtoupper($row['cand_email_verify']); ?></p>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Candidate Post Name</p>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo strtoupper($row['cand_post']); ?></p>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Voting Status</p>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo strtoupper($row['voted']); ?></p>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Eligibility</p>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo strtoupper($row['status']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" style="width: 500px 500px;">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4"><span class="text-primary font-italic me-1">Images</span> User's Photo
                                    </p>
                                    <img title="ID PROOF IMAGE" src="<?php echo '../uploads/' . $row["id_proof"]; ?>" alt="avatar" class="img-fluid" style="width: 150px;">
                                   
                                    <?php
                                    if ($count_with > 0) {
                                    ?>
                                        <img title="CANDIDATE INSIGNIA" src="<?php echo '../uploads/' . $row["insignia"]; ?>" class="img-fluid" style="width: 150px;">
                                    <?php
                                    }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include "./footer.php";
    ?>

    <script>
        $(document).ready(function() {
            $('.bobtn').click(function(e) {
                e.preventDefault();
                var user_id = $(this).val();
                console.log(user_id)
                $('.bo_user_id').val(user_id);
                $('#BackOut').modal('show');
            });
        });
    </script>


</body>

</html>