<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Games - <?php if($_SERVER['REQUEST_URI'] == '/games/login.php'){?> Login <?php } else { ?> Register <?php } ?> </title>
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="css/header.css">
	<link href="css/footer.css" rel="stylesheet">
	<script src="js/jquery-1.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
	<style>
	body {
		background-image: url('images/bg.png');
		background-repeat: no-repeat;
	}
	.panel-default > .panel-heading {
	  color: #f8fcff;
	  background-color: #648ab1;
	  border:medium none;
	}
	.game_logo{
		width: 69%;
		position: absolute;
		left: 2px;
		top: -58px;
	}
	.game_logo1{
		width: 50%;
		position: absolute;
		left: 39px;
		top: -55px;
	}
	label {
    margin-bottom: 0px;
	}
	.panel{
		border:medium none;
	}
	</style>
</head>
<body>
<header class="header-login-signup">
	<div class="header-limiter">
		<h1><a href="/games">Android<span>Games</span></a></h1>
		<nav class="pull-right">
			<a href="login.php">Login</a>
			<a href="register.php">Register</a>
		</nav>
	</div>
</header>
