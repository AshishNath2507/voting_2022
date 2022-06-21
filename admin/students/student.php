<?php session_start();
if (!isset($_SESSION['admin'])) {
    $_SESSION['alert_message'] = "You are Logged Out";
    header("Location: ../adminLogin.php");
} ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Students Table</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../../library/css/bootstrap.min.css">

    <link rel="stylesheet" href="../../library/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="../../library/fontawesome-free-6.1.1-web/css/brands.css">
    <link rel="stylesheet" href="../../library/fontawesome-free-6.1.1-web/css/solid.css">

    <link rel="stylesheet" href="../../library/fontawesome-free-6.1.1-web/css/v5-font-face.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        td {
            max-width: 150px;
            text-overflow: ellipsis;
            overflow: hidden;
        }

        /* tr:last-child(){
            width: 300px;
        } */

        tr {
            height: 10px;
        }

        tr:nth-child(even) {
            background-color: rgb(236, 234, 234);
        }

        .actions {
            display: flex;
            justify-content: space-evenly;
            gap: 1 rem;
        }

        .edit::before {
            display: inline-block;
            font: var(--fa-font-solid);
            content: "\f044";
            font-weight: 600;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            color: white;
            border: 0;
        }

        .delete::before {
            display: inline-block;
            font: var(--fa-font-solid);
            content: "\f2ed";
            font-weight: 600;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            color: white;
            border: 0;
        }

        .appr::before {
            display: inline-block;
            font: var(--fa-font-solid);
            content: "\e53e";
            font-weight: 600;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            color: white;
            border: 0;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">

                <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['admin']; ?><sup class="text-warning">Admin</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../index.php">
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
                        <a class="collapse-item" href="#">Students</a>
                        <a class="collapse-item" href="../candidate/candidate.php">Candidates</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->


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
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

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

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="../../photos/Yash-KGF-2-1.jpg">
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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Students Table</h1>
                    <p class="mb-4">The below shown table is sorted by role = STUDENT.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Role = STUDENT</h6>
                        </div>
                        <?php
                        if (isset($_SESSION['alert_message'])) {
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Alert!!!</strong> <?php echo $_SESSION['alert_message']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            unset($_SESSION['alert_message']);
                        }
                        ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered compact display" id="dataTable" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Role</th>
                                            <th>Name</th>
                                            <th>Rollno</th>
                                            <th>Regno</th>
                                            <th>DOB</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Id-proof</th>
                                            <th>Branch</th>
                                            <th>Semester</th>
                                            <th>Insignia</th>
                                            <th>Email-status</th>
                                            <th>Candidate-email-status</th>
                                            <th>Vote-status</th>
                                            <th>Status</th>
                                            <th>isDelete</th>
                                            <th>Created</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Role</th>
                                            <th>Name</th>
                                            <th>Rollno</th>
                                            <th>Regno</th>
                                            <th>DOB</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Id-proof</th>
                                            <th>Branch</th>
                                            <th>Semester</th>
                                            <th>Insignia</th>
                                            <th>Email-status</th>
                                            <th>Candidate-email-status</th>
                                            <th>Vote-status</th>
                                            <th>Status</th>
                                            <th>isDelete</th>
                                            <th>Created</th>
                                            <th>Actions</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        require "../../connect.php";
                                        $result = mysqli_query($con, "SELECT * FROM users AS u INNER JOIN roles AS r ON (u.id = r.user_id) WHERE r.role = 'student' AND u.isdel = '0'");
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><img class="img-profile rounded" src="<?php echo '../' . $row["photo"]; ?>" alt="image" style="width:50px;"></td>
                                                <td> <?php echo $row["role"]  ?> </td>
                                                <td> <?php echo $row["name"]  ?> </td>
                                                <td> <?php echo $row["rollno"] ?></td>
                                                <td> <?php echo $row["regno"] ?> </td>
                                                <td> <?php echo $row["dob"] ?> </td>
                                                <td title="<?php echo $row["phone"] ?>"> <?php echo $row["phone"] ?> </td>
                                                <td title="<?php echo $row["addr"] ?>"> <?php echo $row["addr"] ?> </td>
                                                <td> <?php echo $row["gender"] ?> </td>
                                                <td title="<?php echo $row["email"] ?>"> <?php echo $row["email"] ?> </td>
                                                <td> <?php echo $row["pass"] ?> </td>
                                                <td><img src="<?php echo '../' . $row["id_proof"]; ?>" alt="image" style="width:50px;"></td>
                                                <td> <?php echo $row["branch"] ?> </td>
                                                <td> <?php echo $row["sem"] ?> </td>
                                                <td> <?php echo $row["insignia"] ?> </td>
                                                <!--  -->
                                                <?php
                                                if ($row['email_status'] == "verified") {
                                                ?>
                                                    <td> <button class="btn btn-success fs-5 bg-transparent text-success disabled"><?php echo $row["email_status"] ?></button> </td>
                                                <?php
                                                } else {
                                                ?>
                                                    <td> <button class="btn btn-secondary bg-transparent text-secondary disabled"><?php echo $row["email_status"] ?></button> </td>
                                                <?php
                                                }
                                                ?>
                                                <!--  -->
                                                <?php
                                                if ($row['cand_email_verify'] == "verified") {
                                                ?>
                                                    <td> <button class="btn btn-success fs-5 bg-transparent text-success disabled"><?php echo $row["cand_email_verify"] ?></button> </td>
                                                <?php
                                                } else {
                                                ?>
                                                    <td> <button class="btn btn-secondary bg-transparent text-secondary disabled"><?php echo $row["cand_email_verify"] ?></button> </td>
                                                <?php
                                                }
                                                ?>
                                                <!--  -->
                                                <?php
                                                if ($row['voted'] == "voted") {
                                                ?>
                                                    <td> <button class="btn btn-success fs-5 bg-transparent text-success disabled"><?php echo $row["voted"] ?></button> </td>
                                                <?php
                                                } else {
                                                ?>
                                                    <td> <button class="btn btn-secondary bg-transparent text-secondary disabled"><?php echo $row["voted"] ?></button> </td>
                                                <?php
                                                }
                                                ?>
                                                <!--  -->
                                                <?php
                                                if ($row['status'] == "approved") {
                                                ?>
                                                    <td> <button class="btn btn-success"><?php echo $row["status"] ?></button> </td>
                                                <?php
                                                } else {
                                                ?>
                                                    <td><button class="btn btn-danger apprbtn" name="submit" value="<?php echo $row["id"]; ?>">
                                                        <span class=""><?php echo $row["status"] ?></span>
                                                    </button></td>
                                                <?php
                                                }
                                                ?>
                                                <!--  -->
                                                <?php
                                                if ($row['isdel'] == "1") {
                                                ?>
                                                    <td> <button class="btn btn-danger"><?php echo $row["isdel"] ?></button> </td>
                                                <?php
                                                } else {
                                                ?>
                                                    <td> <button class="btn btn-success"><?php echo $row["isdel"] ?></button> </td>
                                                <?php
                                                }
                                                ?>
                                                <!--  -->
                                                <td> <?php echo $row["created"] ?> </td>
                                                <td class="actions">
                                                    <button type="button" class="btn btn-danger rounded-circle delete deletebtn m-1" value="<?php echo $row["id"]; ?>"></button>                                                    
                                                </td>
                                            </tr>
                                        <?php
                                        };
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Approval Modal HTML -->
                        <div id="apprModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="../../backend/allstd.php" method="POST">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Approved Record</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="appr_id" class="appr_user_id border-0 outline-0 text-danger" readonly>

                                            <p>Are you sure you want to approve this Record?</p>
                                            <p class="text-warning"><small>This action cannot be undone.</small></p>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
                                            <input type="submit" name="apprStuButton" class="btn btn-primary" value="Approve">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Approval Modal HTML -->
                        <!-- Delete Modal HTML -->
                        <div id="DeleteModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="../../backend/allstd.php" method="POST">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete Record</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="delete_id" class="delete_user_id" readonly>

                                            <p>Are you sure you want to delete these Records?</p>
                                            <p class="text-warning"><small>This action cannot be undone.</small></p>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-bs-dismiss="modal" value="Cancel">
                                            <input type="submit" name="deleteStuButton" class="btn btn-danger" value="Delete">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Delete Modal HTML -->

                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
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
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        //Approval modal function
        $(document).ready(function() {
            $('.apprbtn').click(function(e) {
                e.preventDefault();
                // if the button has any value, it will be stored in "user_id"
                var user_id = $(this).val();
                $('.appr_user_id').val(user_id);
                $('#apprModal').modal('show');
            });
        });

        //Delete modal function
        $(document).ready(function() {
            $('.deletebtn').click(function(e) {
                e.preventDefault();
                var user_id = $(this).val();
                $('.delete_user_id').val(user_id);
                $('#DeleteModal').modal('show');
            });
        });

        //Edit modal function
        $(document).ready(function() {
            $('.editbtn').click(function(e) {
                e.preventDefault();
                var user_id = $(this).val();
                $('.edit_user_id').val(user_id);
                $('#editModal').modal('show');
            });
        });
    </script>

    <script src="../../library/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>