<?php
	require_once('connection.php');
	// Make database connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	mysqli_set_charset($conn, "utf8");
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	// Check both token from form body and saved on server with user session database
	if(isset($_POST['csrf_token']) && $_POST['csrf_token'] != ""){
		if(isset($_COOKIE['my_csrf_session_id'])){

			$csrf_token = $_POST['csrf_token'];
			$user_id = $_COOKIE['my_csrf_session_id'];

			$query = "SELECT * FROM users WHERE id = '$user_id'";
			$result = $conn->query($query);
			$user_data = mysqli_fetch_array($result,MYSQLI_ASSOC);
			if (sizeof($user_data) > 0) {
				if($user_data['token'] == $csrf_token){
					die("Success");
				}
				else{
					die("Failed");
				}
			    
			} else {
			    die("Sorry!, Invalid login details");
			}
		}
		else{
			die("Please Login and try again");
		}
	}
	else{
		die("Bad request");
	}
?>