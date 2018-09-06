<?php
// Read and send token as ajax response
$token = "";
if($_COOKIE['my_csrf_session']){
	$token = $_COOKIE['my_csrf_session'];	
}
?>
<input type="hidden" class="form-control" name="csrf_token" value="<?= $token; ?>">