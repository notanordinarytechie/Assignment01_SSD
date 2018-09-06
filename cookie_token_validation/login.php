<?php
// Check for the current login session. if exist redirect user to home page or any other
if(isset($_COOKIE['my_csrf_session']))
{
    $token = $_COOKIE['my_csrf_session'];
	if($token != ""){
		header('Location: form.php');
	}
}

?>
<html>
  <head>
  	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
  </head>
<body>
	<br/><br/><br/>
	<div class="container">
		<div class="login-form">
			<div class="main-div">
			    <div class="panel">
				   <h2>Login</h2>
				   <p>Please enter your email and password</p>
			   </div>
			    <form action="check_login.php" method="post">
			        <div class="form-group">
			           <input type="email" class="form-control" id="inputEmail" placeholder="Email Address" required="required" name="username">
			        </div>
			        <div class="form-group">
			            <input type="password" class="form-control" id="inputPassword" placeholder="Password" required="required" name="password">
			        </div>
			        <button type="submit" class="btn btn-primary">Login</button>
			    </form>
    		</div>
		</div>
	</div>
</body>
</html>
