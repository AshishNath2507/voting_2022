<?php
	session_start();
    require "../connect.php";
	include '../users/slugify.php';

	if(isset($_POST['vote'])){
		if(count($_POST) == 1){
			$_SESSION['error'][] = 'Please vote atleast one candidate';
		}
		else{
			$_SESSION['post'] = $_POST;
            $voterId = $_SESSION['id'];
			$sql = "SELECT * FROM posts";
			$query = $con->query($sql);
			$error = false;
			$sql_array = array();
			while($row = $query->fetch_assoc()){
				$position = slugify($row['p_name']);
				$pos_id = $row['p_id'];
				if(isset($_POST[$position])){

					$votedquery = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users WHERE id = '$voterId'"));

                    
					$candidate = $_POST[$position];
					$sql_array[] = "INSERT INTO cand_pc VALUES ( null, '$pos_id', '$candidate', $voterId )";
					mysqli_query($con, "UPDATE users SET voted = 'voted' WHERE id = '$voterId'");
                    
					

				}
				
			}

			if(!$error){
				foreach($sql_array as $sql_row){
					$con->query($sql_row);
				}

				unset($_SESSION['post']);
				$_SESSION['alert_message'] = 'Ballot Submitted';

			}

		}

	}
	else{
		$_SESSION['alert_message'][] = 'Select candidates to vote first';
	}
    header('location: ../users/vote.php');
?>


