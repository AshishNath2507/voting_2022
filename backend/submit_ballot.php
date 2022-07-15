<?php
session_start();
require "../connect.php";
include '../users/slugify.php';

if (isset($_POST['vote'])) {
	$id = $_SESSION['id'];
	$sqlll = mysqli_query($con, "SELECT * FROM users WHERE id = '$id'");
	$rowwwwww = mysqli_fetch_array($sqlll);
	if ($rowwwwww['status'] != 'approved') {
		$_SESSION['alert_message'] = 'You have to be approved by the authority';
		header('location: ../users/userhomepage.php');
	} else {
		if (count($_POST) == 1) {
			$_SESSION['error'][] = 'Please vote atleast one candidate';
		} else {
			$_SESSION['post'] = $_POST;
			$voterId = $_SESSION['id'];
			$sql = "SELECT * FROM posts";
			$query = $con->query($sql);
			$error = false;
			$sql_array = array();
			while ($row = $query->fetch_assoc()) {
				$position = slugify($row['p_name']);
				$pos_id = $row['p_id'];
				if (isset($_POST[$position])) {

					$votedquery = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id = '$voterId' AND cand_approval = 'approved'"));


					$candidate = $_POST[$position];
					$sql_array[] = "INSERT INTO cand_pc VALUES ( null, '$candidate', '$pos_id', $voterId )";
					mysqli_query($con, "UPDATE users SET voted = 'voted' WHERE id = '$voterId'");

					session_destroy();
					$_SESSION['alert_message'] = 'Successfully voted';
					header('location: ../users/login.php');
				}
			}

			if (!$error) {
				foreach ($sql_array as $sql_row) {
					$con->query($sql_row);
				}

				unset($_SESSION['post']);
				$_SESSION['alert_message'] = 'Ballot Submitted';
				header('location: ../users/userhomepage.php');
			}
		}
	}
} else {
	$_SESSION['alert_message'][] = 'Select candidates to vote first';
	header('location: ../users/vote.php');
}
// $_SESSION['alert_message'] = 'Ballot Submitted';
header('location: ../users/vote.php');
