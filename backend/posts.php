<?php
session_start();
require "../connect.php";
if (isset($_POST['deletePostButton'])) {

    $userid = $_POST['delete_id'];
    $query = mysqli_query($con, "DELETE FROM posts WHERE p_id = '$userid'");

    if ($query) {
        $_SESSION['alert_message'] = "User Deleted Successfully";
        header("Location: ../admin/addposts.php?user=deleted");
    } else {

        $_SESSION['alert_message'] = "User not Deleted";
        header("Location: ../admin/addposts.php?user+not+deleted");
    }
}

if(isset($_POST['checking_edit_btn'])) {
    $pid = $_POST['post_id'];
    // $pname = $_POST['updatename'];

    $result_array = [];

    $sql = "SELECT * FROM posts WHERE p_id = '$pid'";
    $query = mysqli_query($con, $sql);

    if(mysqli_num_rows($query) > 0 ) {
        foreach($query as $row) {
            array_push($result_array, $row);
            header("Content-type: application/json");
            echo json_encode($result_array);   
        }

    }else{
        mysqli_error($con);
    }


    mysqli_query($con, "UPDATE posts SET p_name = '$pname' WHERE p_id = '$pid'");
    $_SESSION['alert_message'] = 'Post name updated';
    header("Location: ../admin/addposts.php?post=updated");
}
?>
