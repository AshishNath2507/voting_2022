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
    <title>Vote page</title>

    <!-- Bootstrap links -->
    <link rel="stylesheet" href="../library/css/bootstrap.min.css">

    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../plugins/iCheck/all.css">

    <link rel="stylesheet" href="../library/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="../library/fontawesome-free-6.1.1-web/css/brands.css">
    <link rel="stylesheet" href="../library/fontawesome-free-6.1.1-web/css/solid.css">

    <link rel="stylesheet" href="../library/fontawesome-free-6.1.1-web/css/v5-font-face.css">

    <!-- Anurati font -->
    <style>
        @font-face {
            font-family: anurati;
            src: url('../library/fonts/anurati/ANURATI/Anurati-Regular.otf');
        }

        .anurati {
            font-family: anurati;
        }

        input[type=radio] {
            border: 2px solid red;
            width: 1rem;
            height: 1rem;
            box-sizing: border-box;
            margin-right: 3rem;
        }

        #candidate_list ul {
            list-style-type: none;
        }

        /*    
        .mt20 {
            margin-top: 20px;
        }

        .title {
            font-size: 50px;
        }

        #candidate_list {
            margin-top: 20px;
        }


        #candidate_list ul li {
            margin: 0 30px 30px 0;
            vertical-align: top
        }

        .clist {
            margin-left: 20px;
        }

        .cname {
            font-size: 25px;
        }

        .votelist {
            font-size: 17px;
        } */
    </style>
</head>

<body>

    <?php include "usernav.php"; ?>

    <div class="container-fluid">
        <div class="container">

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <?php
                        if (isset($_SESSION['alert_message'])) {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Hey!!!</strong> <?php echo $_SESSION['alert_message']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            unset($_SESSION['alert_message']);
                        }
                        ?>


                        <!-- Voting Ballot -->
                        <form method="POST" id="ballotForm" action="../backend/submit_ballot.php">
                            <?php
                            include './slugify.php';
                            
                            $candidate = '';
                            $sql = "SELECT * FROM posts ORDER BY p_id ASC";
                            $query = $con->query($sql);
                            while ($row = $query->fetch_assoc()) {
                                $pname = $row['p_name'];
                                // $sql = "SELECT * FROM candidates WHERE position_id='" . $row['id'] . "'";
                                $sqli = "SELECT * FROM users AS u INNER JOIN roles AS r ON ( u.id = r.user_id ) WHERE r.role = 'candidate' AND u.cand_post = '$pname'";
                                $cquery = $con->query($sqli);
                                while ($crow = $cquery->fetch_assoc()) {
                                    $slug = slugify($row['p_name']);
                                    $checked = '';
                                    if (isset($_SESSION['post'][$slug])) {
                                        $value = $_SESSION['post'][$slug];


                                        if (is_array($value)) {
                                            foreach ($value as $val) {
                                                if ($val == $crow['id']) {
                                                    $checked = 'checked';
                                                }
                                            }
                                        } else {
                                            if ($value == $crow['id']) {
                                                $checked = 'checked';
                                            }
                                        }
                                    }
                                    $input = '<input type="radio" class="flat-red ' . $slug . '"name="' . slugify($row['p_name']) . '" value="' . $crow['user_id'] . '" ' . $checked . '>';
                                    $image = (!empty($crow['photo'])) ? '../uploads/' . $crow['photo'] : '../photos/profile.jpg';
                                    $insignia = (!empty($crow['insignia'])) ? '../uploads/' . $crow['insignia'] : '../photos/profile.jpg';
                                    $candidate .= '
                                            
                                            ' . $input . '<span class="cname clist">' . $crow['name'] . '</span><img src="' . $image . '" height="100px" width="100px" class="clist"> <img src="' . $insignia . '" height="100px" width="100px" class="clist">
                                            
										';
                                }
                                $instruct = '<p class="fs-5">Select any one candidate</p>';
                            ?>

                                <div class="card border mb-3" style="width: auto;">
                                    <div class="card-header bg-transparent border ">
                                        <?php echo $row['p_name']; ?>
                                        <p><?php echo $instruct; ?>
                                            <span class="pull-right">
                                                <button type="reset" class="btn btn-info btn-sm btn-flat reset" data-desc="<?php slugify($row['p_name']); ?>"><i class="fa fa-refresh"></i> Reset</button>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="card-body text-success">
                                        <div id="candidate_list">
                                            <ul>
                                                <li><?php echo $candidate; ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            <?php

                                $candidate = '';
                            }

                            ?>
                            <div class="text-center">
                                <button type="button" class="btn btn-success btn-flat" id="preview"><i class="fa fa-file-text"></i> Preview</button>
                                <button type="submit" class="btn btn-primary btn-flat" name="vote"><i class="fa fa-check"></i> Submit</button>
                            </div>
                        </form>
                        <!-- End Voting Ballot -->


                    </div>
                </div>
            </section>

        </div>
    </div>

    <?php
    //  include 'includes/footer.php';
    ?>
    <?php
    // include 'includes/ballot_modal.php'; 
    ?>
    <!-- Bootstrap script -->
    <script src="../library/js/bootstrap.bundle.min.js"></script>

    <?php
    // include 'includes/scripts.php'; 
    ?>
    <script src="../library/jquery.min.js"></script>
    <script>
        $(function() {
            // $('.content').iCheck({
            //     checkboxClass: 'icheckbox_flat-green',
            //     radioClass: 'iradio_flat-green'
            // });

            // $(document).on('click', '.reset', function(e) {
            //     e.preventDefault();
            //     var desc = $(this).data('desc');
            //     $('.' + desc).iCheck('uncheck');
            // });

            // $(document).on('click', '.platform', function(e) {
            //     e.preventDefault();
            //     $('#platform').modal('show');
            //     var platform = $(this).data('platform');
            //     var fullname = $(this).data('fullname');
            //     $('.candidate').html(fullname);
            //     $('#plat_view').html(platform);
            // });

            // $('#preview').click(function(e) {
            //     e.preventDefault();
            //     var form = $('#ballotForm').serialize();
            //     if (form == '') {
            //         $('.message').html('You must vote atleast one candidate');
            //         $('#alert').show();
            //     } else {
            //         $.ajax({
            //             type: 'POST',
            //             url: 'preview.php',
            //             data: form,
            //             dataType: 'json',
            //             success: function(response) {
            //                 if (response.error) {
            //                     var errmsg = '';
            //                     var messages = response.message;
            //                     for (i in messages) {
            //                         errmsg += messages[i];
            //                     }
            //                     $('.message').html(errmsg);
            //                     $('#alert').show();
            //                 } else {
            //                     $('#preview_modal').modal('show');
            //                     $('#preview_body').html(response.list);
            //                 }
            //             }
            //         });
            //     }

            //});

        });
    </script>
</body>

</html>