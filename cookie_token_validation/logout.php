<?php
// Clear all cookie to logout user or accessing to other service
setcookie("my_csrf_session","",1,'/');
unset($_COOKIE["my_csrf_session"]);
header('Location: login.php');
?>