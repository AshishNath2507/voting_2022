<?php
session_start();
if (!isset($_SESSION['admin'])) {
    $_SESSION['alert_message'] = "You are Logged Out";
    header("Location: adminLogin.php");
}

require "../connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Dashboard</title>

    <script src="../library/jquery.min.js"></script>

    <!-- Bootstrap links -->
    <link rel="stylesheet" href="../library/css/bootstrap.min.css">
    <!-- Bootstrap script -->
    <script src="../library/js/bootstrap.bundle.min.js"></script>

    <!-- DataTable -->
    <!-- <script src="../library/DataTables/datatables.min.js"></script>
    <script src="../library/DataTables/Buttons-2.2.3/js/buttons.bootstrap5.min.js"></script>
    <script src="../library/DataTables/Select-1.4.0/js/select.bootstrap5.min.js"></script>
    <script src="../library/DataTables/SearchBuilder-1.3.4/js/searchBuilder.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="../library/DataTables/datatables.min.css">
    <link rel="stylesheet" href="../library/DataTables/Buttons-2.2.3/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="../library/DataTables/Select-1.4.0/css/select.bootstrap5.min.css">
    <link rel="stylesheet" href="../library/DataTables/SearchBuilder-1.3.4/css/searchBuilder.bootstrap5.min.css"> -->


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .details input {
            border: none;
            /* max-width: 200px; */
            /* text-overflow: ellipsis;
            overflow: hidden; */
        }        

        .detail-img {
            width: 300px;
            height: 184px;
        }
        .bg-seco{
            background-color: #ececec;
            color: #333 !important;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                </div>
                <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['admin']; ?> <sup class="text-warning">Admin</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Manage</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Management:</h6>
                        <a class="collapse-item" href="./students/student.php">Students</a>
                        <a class="collapse-item" href="./candidate/candidate.php">Candidates</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Add Posts -->
            <li class="nav-item">
                <a class="nav-link" href="./addposts.php">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Add Posts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['admin']; ?> </span>
                                <img class="img-profile rounded-circle" src="../photos/Yash-KGF-2-1.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid details">

                    <!-- Content Row -->
                    <?php
                    $id = $_GET['id'];
                    $row = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users where id = '$id'"));

                    ?>
                    <!-- 11111111111111111111111111111111111111111111111111111111111111111111111111111111 -->
                    <div class="row">
                        <div class="col-md-4 d-flex flex-column form-group border p-2">
                            <img src="<?php echo '../uploads/' . $row["photo"]; ?>" class="img-fluid detail-img" alt="">
                            <label for="photo" class="form-label">Profile Photo</label>
                        </div>
                        <div class="col-md-4 d-flex flex-column form-group border">
                            <img src="<?php echo '../uploads/' . $row["id_proof"]; ?>" data-toggle="modal" data-target="#idProof" class="img-fluid detail-img" alt="not added">
                            <label for="photo" class="form-label">Id-Proof</label>
                        </div>
                        <div class="col-md-4 d-flex flex-column form-group border">
                            <img src="<?php echo '../uploads/' . $row["insignia"]; ?>" class="img-fluid detail-img" alt="not added">
                            <label for="photo" class="form-label">Insignia</label>
                        </div>

                    </div>
                    <!-- 222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222 -->
                    <p class="bg-info text-light fs-3 p-3" style="border-radius: 40px;">User personal details</p>
                    <div class="row border text-center align-middle mb-3 p-3" style="border-radius: 40px;">
                        <div class="col-md-3 form-group text-center">
                            <label for="photo" class="form-label">Name</label>
                            <input type="text" class="form-input" value="<?php echo strtoupper($row['name']); ?>" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="photo" class="form-label">Gender</label>
                            <input type="text" class="form-input" value="<?php echo strtoupper($row['gender']); ?>" readonly>
                        </div>
                        <div class="col-md-3 text-center">
                            <label for="photo" class="form-label ">Address</label>
                            <input type="text" class="form-input" value="<?php echo strtoupper($row['addr']); ?>" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="photo" class="form-label">Phone</label>
                            <input type="text" class="form-input" value="<?php echo strtoupper($row['phone']); ?>" readonly>
                        </div>
                    </div>
                    <!-- 33333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333 -->

                    <div class="row border text-center align-middle mb-3 p-3 bg-seco text-light" style="border-radius: 40px;">
                        <div class="col-md-3">
                            <label for="photo" class="form-label">Roll no.</label>
                            <input type="text" class="form-input" value="<?php echo strtoupper($row['rollno']); ?>" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="photo" class="form-label">Reg No.</label>
                            <input type="text" class="form-input" value="<?php echo strtoupper($row['regno']); ?>" readonly>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="photo" class="form-label">Name</label>
                            <input type="text" class="form-input" value="<?php echo strtoupper($row['phone']); ?>" readonly>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="photo" class="form-label">Semester</label>
                            <input type="text" class="form-input" value="<?php echo strtoupper($row['sem']); ?>" readonly>
                        </div>
                    </div>
                    <!-- 444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444 -->
                    <div class="row border text-center align-middle mb-3 p-3" style="border-radius: 40px;">
                        <div class="col-md-3 form-group text-center">
                            <label for="photo" class="form-label">Email</label>
                            <input type="text" class="form-input" value="<?php echo strtoupper($row['email']); ?>" readonly>
                        </div>

                        <div class="col-md-3 text-center">
                            <label for="photo" class="form-label ">Dob</label>
                            <input type="text" class="form-input" value="<?php echo strtoupper($row['dob']); ?>" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="photo" class="form-label">Password</label>
                            <input type="text" class="form-input" value="<?php echo $row['pass']; ?>" readonly>
                        </div>
                    </div>
                    <!-- 555555555555555555555555555555555555555555555555555555555555555555555555555555555555555 -->
                    <div class="row border text-center align-middle mb-3 p-3 bg-seco text-light" style="border-radius: 70px;">
                        <div class="col-md-3 form-group text-center">
                            <label for="photo" class="form-label">Email verify status</label>
                            <input type="text" class="form-input" value="<?php echo strtoupper($row['email_status']); ?>" readonly>
                        </div>
                        <div class="col-md-3 text-center">
                            <label for="photo" class="form-label ">Candidate email verify status</label>
                            <input type="text" class="form-input" value="<?php echo strtoupper($row['cand_email_verify']); ?>" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="photo" class="form-label">Candidate approval</label>
                            <input type="text" class="form-input" value="<?php echo strtoupper($row['cand_approval']); ?>" readonly>
                        </div>
                        <div class="col-md-3 form-group text-center">
                            <label for="photo" class="form-label">Candidate's post name</label>
                            <input type="text" class="form-input" value="<?php echo strtoupper($row['cand_post']); ?>" readonly>
                        </div>
                    </div>
                    <!-- 6666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666666 -->
                    <div class="row border text-center align-middle mb-3 p-3" style="border-radius: 40px;">
                        <div class="col-md-3 text-center">
                            <label for="photo" class="form-label ">Voted</label>
                            <input type="text" class="form-input" value="<?php echo strtoupper($row['voted']); ?>" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="photo" class="form-label">Eligibility</label>
                            <input type="text" class="form-input" value="<?php echo strtoupper($row['status']); ?>" readonly>
                        </div>
                        <div class="col-md-3 text-center">
                            <label for="photo" class="form-label ">Deleted</label>
                            <input type="text" class="form-input" value="<?php echo strtoupper($row['isdel']); ?>" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="photo" class="form-label">Creation Time</label>
                            <input type="text" class="form-input" value="<?php echo $row['created']; ?>" readonly>
                        </div>
                    </div>
                    <!-- /.container-fluid -->
                    <!-- Modal -->
                    <div id="idProof" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">                                
                                <div class="modal-header">
                                    <h4 class="modal-title">ID Proof of '<?php echo $row["name"] ?>'</h4>
                                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <img src="<?php echo '../uploads/' . $row["id_proof"]; ?>" alt="image" width="100%">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- End of Main Content -->

                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Your Website 2021</span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <script src="../library/jquery.min.js"></script>

            <!-- Bootstrap core JavaScript-->

            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="js/demo/chart-area-demo.js"></script>
            <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>