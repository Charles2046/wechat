<?php

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<link href="../css/style.css"  rel="stylesheet" type="text/css" />
<link href="/components/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/components/font-awesome/css/font-awesome.min.css">
</head>

<body class="hold-transition login-page">
<div class="login-box">
	<div class="login-logo">
		<a href="#"><b>Manage</b> LC</a>
	</div>
	<div class="login-box-body">
		<p class="login-box-msg">Sign in to start your session</p>
		<form action="check.php" name="" method="post" role="form">
			<div class="form-group has-feedback">
				<input name="email" class="form-control" placeholder="Email" required="required" />
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" name="password" placeholder="password" required="required" />
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox icheck">
						<label><input type="checkbox"> Remember Me</label>
					</div>
				</div>
			</div>
			<input type="submit" value="登陆" class="btn btn-default" />
		</form>
		
		
	</div>


</div>

<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/components/bootstrap/js/bootstrap.min.js"></script>
<script src="/plugins/iCheck/icheck.min.js"></script>
<script>
	$(function(){
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%'
		});
	});
</script>
</body>
</html>
