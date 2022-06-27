<?php
    session_start();
    require "../connect.php";

    if (isset($_POST['voteSubmit'])) {


        if (isset($_POST['name']) and is_array($_POST['name'])) {

            foreach ($_POST['name'] as $name) {
                print '$name <br>';
            }
        } else {
            print 'no';
        }
    }
?>