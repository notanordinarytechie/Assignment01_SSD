<?php
require_once('connection.php');
// Make database connection to clear server side user session token
$conn = new mysqli($servername, $username, $password, $dbname);
	mysqli_set_charset($conn, "utf8");
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

if(isset($_COOKIE['my_csrf_session']) && isset($_COOKIE['my_csrf_session_id']))
{
    $user_id = $_COOKIE['my_csrf_session_id'];
    $sql = "UPDATE users SET token= 'NULL' WHERE id=$user_id";
	if ($conn->query($sql) === TRUE) {

		// Clear all cookie to logout user or accessing to other service
		setcookie("my_csrf_session","",1,'/');
		unset($_COOKIE["my_csrf_session"]);

		setcookie("my_csrf_session_id","",1,'/');
		unset($_COOKIE["my_csrf_session_id"]);

	} else {
	    die("Error updating record: " . $conn->error);
	}
	$conn->close();
}

// Clear all cookie to logout user or accessing to other service
setcookie("my_csrf_session","",1,'/');
unset($_COOKIE["my_csrf_session"]);

setcookie("my_csrf_session_id","",1,'/');
unset($_COOKIE["my_csrf_session_id"]);

header('Location: login.php');
?>