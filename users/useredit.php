<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['alert_message'] = "You are Logged Out";
    header("Location: login.php");
}
require "../connect.php";
$id = $_SESSION['id'];
$sql = mysqli_query($con, "SELECT * FROM users as u inner join roles as r on (u.id = r.user_id) where r.user_id = '$id' and r.role = 'candidate'");
$rorw = mysqli_fetch_array($sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Details</title>

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
        Edit Details
    </p>
    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="./userhomepage.php">Home</a></li>
                        <!-- <li class="breadcrumb-item"><a href="#">User</a></li> -->
                        <li class="breadcrumb-item"><a href="./userview.php">User Profile</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <?php
    $row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users AS u INNER JOIN roles AS r ON ( u.id = r.user_id ) WHERE u.id = '$id'"));
    ?>


    <!-- nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn -->
    <div class="container rounded bg-white mt-2 mb-5">
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
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="<?php echo '../uploads/' . $row["photo"]; ?>">
                    <span class="font-weight-bold"><?php echo strtoupper($row['name']); ?></span>
                    <span class="text-black-50"><?php echo $row['email']; ?></span>
                    <span class="text-black-50"><?php echo $row['branch']; ?></span>
                    <span class="text-grey-50 text-info p-2">"Email, password, Id-proof and gender cannot be changed"</span>

                </div>
            </div>


            <div class="col-md-5 border-right">
                <form action="../backend/useredit1.php" method="post" enctype="multipart/form-data">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Name</label><input type="text" name="name" class="form-control" placeholder="first name" value="<?php echo $row['name']; ?>" required></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Roll no</label><input type="number" name="rollno" class="form-control" placeholder="enter phone number" value="<?php echo $row['rollno']; ?>" required>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Reg no</label><input type="number" name="regno" class="form-control" placeholder="enter phone number" value="<?php echo $row['regno']; ?>" required>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Mobile Number</label><input type="number" name="phone" class="form-control" placeholder="enter phone number" value="<?php echo $row['phone']; ?>" required>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Address</label><input type="text" name="addr" class="form-control" placeholder="enter address line 1" value="<?php echo $row['addr']; ?>" required>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">DoB</label><input type="date" name="dob" class="form-control" placeholder="education" value="<?php echo $row['dob']; ?>" required>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Branch</label>
                                <select class="form-select" name="branch" id="branch" required>
                                    <option selected><?php echo $row['branch']; ?></option>
                                    <option value="civil">Civil</option>
                                    <option value="mechanical">Mechanical</option>
                                    <option value="electrical">Electrical</option>
                                    <option value="cse">CSE</option>
                                    <option value="instrumental">Instrumental</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Semester</label>
                                <select class="form-select" name="sem" id="sem" required>
                                    <option selected><?php echo $row['sem']; ?></option>
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
                    </div>
                    <div class="mt-2 text-center mb-4">
                        <button class="btn btn-primary profile-button" type="submit" name="userEdit">Save Profile</button>
                    </div>
                </form>
            </div>



        </div>
        <?php
        if ($row['cand_approval'] == 'approved') {
        ?>
            <hr>
            <div class="container ">

                <form action="../backend/addobj.php" method="post">
                    <div class="d-flex justify-content-between align-items-center experience fs-3"><span>Add Objective</span></div><br>
                    <div class="col-md-6">
                        <label class="labels fs-5 mb-1">Objective for standing in election</label>
                        <textarea rows="4" cols="20" name="obj" class="form-control" placeholder="Write a few lines here..."></textarea>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary profile-button mt-2" type="submit">Submit</button>
                    </div>
                </form>
               
            </div>
        <?php
        }
        ?>
    </div>
    </div>

    <?php
    include "./footer.php";
    ?>
    <script src="../../library/jquery.min.js"></script>
</body>

</html>