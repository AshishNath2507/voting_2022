<?php

session_start();
require "../connect.php";

if (isset($_POST['insSubmit'])) {
    $post = $_POST['post'];
    $photo = $_FILES['insignia'];

    if ($post == '') {
        $_SESSION['alert_message'] = "Select a post before submitting.";
        header("Location: ../users/candidate/cand_home.php");
    } else if ($photo == '') {
        $_SESSION['alert_message'] = "Select a post before submitting.";
        header("Location: ../users/candidate/cand_home.php");
    } else {
        $allowed = array('jpg', 'jpeg', 'png');
        $filename = $photo['name'];
        $filesize = $photo['size'];
        $filetemp = $photo['tmp_name'];
        $fileExt = explode('.', $filename);
        $fileActualEXt = strtolower(end($fileExt));

        if (!in_array($fileActualEXt, $allowed)) {
            // echo "<script>alert('Invalid image extension. Use jpg/jpeg/png only.');</script>";
            $_SESSION['alert_message'] = "Invalid image extension. Use jpg/jpeg/png only.";
            header("Location: ../users/candidate/cand_home.php?image=invalid");
        } else if ($filesize > 2000000) {
            // echo "<script>alert('File size is too large. Use file size of less than 2MB');</script>";
            $_SESSION['alert_message'] = "File size is too large. Use file size of less than 2MB";
            header("Location: ../users/candidate/cand_home.php?imagesize=wrong");
        } else {
            $filenamenew = uniqid('', true) . "." . $fileActualEXt;
            $photo1 = '../uploads/' . $filenamenew;
            move_uploaded_file($filetemp, $photo1); //(filename, destination)

            $can_id = $_SESSION['id'];

            $sql = "SELECT * FROM users WHERE id = '$can_id'";
            $sql = "SELECT * FROM users AS u INNER JOIN roles AS r ON ( u.id = r.user_id ) WHERE u.id = '$can_id' AND r.role = 'candidate'";
            $query = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($query);
            $id_count = mysqli_num_rows($query);
            $id =  $row['id'];

            if ($id_count > 0) {

                if ($row['cand_approval' == 'approved']) {

                    if ($row['isdel'] == '0') {

                        mysqli_query($con, "UPDATE users SET insignia = '$photo1', cand_post = '$post' WHERE id = '$id'");
                        $_SESSION['alert_message'] = "Data updated.";
                        header("Location: ../users/candidate/cand_home.php?data=updated");
                    } else {
                        $_SESSION['alert_message'] = "A/c deleted";
                        header("Location: ../users/candidate/cand_home.php?data=updated");
                    }
                } else {
                    $_SESSION['alert_message'] = "A/c not approved";
                    header("Location: ../users/candidate/cand_home.php?data=updated");
                }
            } else {
                $_SESSION['alert_message'] = "A/c not found";
                header("Location: ../users/candidate/cand_home.php?data=updated");
            }
        }
    }
}
?>
<!-- mysqli_query($con, "UPDATE users SET insignia = '$photo1', cand_post = '$post' WHERE id = '$id'");

$_SESSION['alert_message'] = "Data updated.";
header("Location: ../users/candidate/cand_home.php?data=updated"); -->