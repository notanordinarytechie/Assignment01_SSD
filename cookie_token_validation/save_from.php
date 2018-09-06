<?php
// Read token from the request header cookie to validate with one send in form body
$headerCookies = explode('; ', getallheaders()['Cookie']);
$cookies = array();
foreach($headerCookies as $itm) {
    list($key, $val) = explode('=', $itm,2);
    $cookies[$key] = $val;
}
$token_cookie = $cookies['my_csrf_session'];

// Check both the token to validate request
if(isset($_POST['csrf_token']) && $_POST['csrf_token'] != ""){
	$csrf_token = $_POST['csrf_token'];
	
	if ($token_cookie == $csrf_token) {
	    die("Success with token : ". $csrf_token);
	} else {
	    die("Failed with token : ".$csrf_token);
	}
}
else{
	die("Bad request");
}
?>