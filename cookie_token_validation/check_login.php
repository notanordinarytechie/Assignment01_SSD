<?php
require_once('connection.php');

if(isset($_POST['username']) && isset($_POST['password']) && $_POST['username'] != "" && $_POST['password'] != ""){
	//connection to the database
	$conn = new mysqli($servername, $username, $password, $dbname);
	mysqli_set_charset($conn, "utf8");

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	// Get Data from post request
	$user_username = $_POST['username'];
	$user_password = $_POST['password'];

	// PHP Query to check if user with the given username and password exist or not
	$query = "SELECT username, name, id FROM users WHERE username = '$user_username' AND password = MD5('$user_password')";
	$result = $conn->query($query);
	$user_data = mysqli_fetch_array($result,MYSQLI_ASSOC);

	if(sizeof($user_data) > 0){

		// Generate 32 char token and set in browser cookie for other request authentication. not save in database. cookie only
		$token = bin2hex(openssl_random_pseudo_bytes(16));
		$cookie_name = 'my_csrf_session';
		$cookie_value = $token;
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day, 86400*30 = 30 days
		setcookie('my_csrf_session_id', $user_id, time() + (86400 * 30), "/"); // 86400 = 1 day, 86400*30 = 30 days
	    header('Location: form.php');
		
		$conn->close();
	}
	else{
		// Simply give them for invalid login details
		print_r('Invalid Username or password');
	}
}
else{
	die("Username and password required");
}
?>