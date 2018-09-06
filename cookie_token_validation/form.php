<?php
if(!isset($_COOKIE['my_csrf_session']))
{
	header('Location: login.php');
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
				   <h2>Profile Update (<a href="logout.php">Logout</a>)</h2>
			   </div>
			    <form action="save_from.php" method="post">
			        <div class="form-group">
			           <div class="csrf_field"></div>
			           <input type="text" class="form-control" placeholder="name" required="required" name="name">
			        </div>
			        <div class="form-group">
			            <input type="text" class="form-control" placeholder="surname" required="required" name="surname">
			        </div>
			        <button type="submit" class="btn btn-primary">Submit</button>
			    </form>
    		</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			// send get request to get_csrf_token.php for CSRF token set as hidden field in html form to send with request
			$.ajax({
	            type: 'GET',
	            url: 'get_csrf_token.php'
	        })
	        .done(function(data){
	             
	            // set the response as hidden field with the value of cookie token
	            $('.csrf_field').html(data);
	             
	        })
	        .fail(function() {
	            // just in case geting failed
	            console.log("get request failed");
	        });
		});
	</script>
</body>
</html>
