<nav class="navbar bg-light">
    <!-- above class had fixed-top -->
    <div class="container-fluid">
        <a class="navbar-brand mx-auto anurati" href="../userhomepage.php">VOTE</a>
        <button class="navbar-toggler mx-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Hello! <?php echo strtoupper($_SESSION['username']); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../userhomepage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../candidatesview.php">Candidates</a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu bg-info" aria-labelledby="offcanvasNavbarDropdown">
                            <li><a class="dropdown-item" href="../userview.php">View</a></li>
                            <li><a class="dropdown-item" href="../useredit.php">Edit</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Candidate
                        </a>
                        <ul class="dropdown-menu bg-info" aria-labelledby="offcanvasNavbarDropdown">
                            <li><a class="dropdown-item" href="./election-regulation.php">Apply for Candidature</a></li>
                            <!-- <li><a class="dropdown-item" href="./c_login.php">Login as candidate</a></li> -->
                        </ul>
                    </li>

                    <?php
                    require "../../connect.php";
                    $sid = $_SESSION['id'];
                    $query = mysqli_query($con, "SELECT * FROM users where id = '$sid'");
                    $row = mysqli_fetch_array($query);
                    if ($row['voted'] == 'voted') {
                        $_SESSION['alert_message'] = "You have already voted."
                    ?>
                        <li class="bg-warning text-secondary">
                             
                                <?php echo $_SESSION['alert_message']; ?>
                            
                        </li>
                    <?php
                    } else {
                    ?>
                        <div class="nav-item">
                            <li><a class="nav-link" href="../vote.php">Vote</a></li>
                        </div>
                    <?php
                    }
                    ?>

                    

                    <li>
                        <hr class="divider">
                    </li>
                    <li><a class="dropdown-item" href="./logout.php" id="logoutModal">Logout</a></li>
                    <hr>
                    <!-- <li><a class="dropdown-item" href="./candidate/cand-reg2.php">reg</a></li> -->
                </ul>
                <!-- <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> -->
            </div>
        </div>
    </div>
</nav>

<!-- Logout Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Accoout Setting</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Do you really wanna logout?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>