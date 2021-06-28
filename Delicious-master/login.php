<?php session_start() ?>

<!DOCTYPE html>

<html>
	<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<title>JSP Page</title>

			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<link rel="stylesheet" href="style.css">

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<script src="script.js"></script>
			<script src="login/script.js"></script>

			<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.3/p5.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.3/addons/p5.dom.min.js"></script>
			<script src="bg.js"></script>

			<?php if(!isset($_SESSION["session"])) echo "<script type='text/javascript' src='checkSession.js'></script>" ?>
	</head>
	<body>
			<div id="background"></div>
			<?php include "header.html" ?>

			<!-- Main part of the page -->
			<div class="container text-left main-place">

				<!-- As I am going to use ajax for login process, I can't use form -->

				<!-- Login input field -->
 				<div class="form-group">
	 				<label for="email">Login:</label>
	 				<input type="email" class="form-control" id="login" placeholder="Enter your login">
 				</div>

				<!-- Password input field -->
 				<div class="form-group">
	 				<label for="pwd">Password:</label>
	 				<input type="password" class="form-control" id="pwd" placeholder="Enter your password">
 				</div>

				<!-- Submit button -->
 				<button id="submit" type="button" class="btn btn-default">Submit</button>
			</div>

			<footer class="container"></footer>
	</body>
</html>
