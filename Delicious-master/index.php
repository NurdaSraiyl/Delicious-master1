<?php session_start() ?>
<?php include "src/DB/DBRequestHandler.php" ?> <!-- Import the class, which gives me database connection -->

<!DOCTYPE html>

<html>
	<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
			<title>JSP Page</title>

			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<link rel="stylesheet" href="style.css">
			<link rel="stylesheet" href="index/style.css">

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<script src="script.js"></script>
			<script src="index/script.js"></script>

			<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.3/p5.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.3/addons/p5.dom.min.js"></script>
			<script src="bg.js"></script>

			<?php if(!isset($_SESSION["session"])) echo "<script type='text/javascript' src='checkSession.js'></script>" ?>
	</head>
	<body>
			<div id="background"></div>
			<?php include "header.html" ?>

			<div class="container text-left main-place">
				<?php
					$db = new DBRequestHandler();

					// Get requested date from HTTP request. If request is not exists, then set it to the today's date
					$day = $_GET['day'] == null ? date(j) : $_GET['day'];
					$month = $_GET['month'] == null ? date(n) : $_GET['month'];
					$year = $_GET['year'] == null ? date(Y) : $_GET['year'];


				?>
					<!-- Display the chosen date -->
					<div class="text-center"><h3><?php echo $day."-".$month."-".$year ?></h3></div>
				<?php

					// Get the list of meals, associated with given date
					$result = $db->execute("SELECT * FROM timetable WHERE day=$day AND month=$month AND year=$year");

				?>
				<!-- form, to chose the date -->
				<div class="text-center">
					<input id="date" type="date">
					<button id="goButton">Go</button>
				</div>
				<?php
					// Go through the list of meals
					for($n = 0; ($row = $result->fetch_assoc()); $n++){
						$meal = $db->execute("SELECT * FROM meal WHERE id = ".$row['meal_id']);
						$meal = $meal->fetch_assoc()
		     ?>
				 	<!-- Display the meal title -->
				 	<div>
						<h3><?php echo $meal['title'] ?></h3>
					</div>
				 <?php
					}
				?>
			</div>

			<footer class="container"></footer>
	</body>
</html>
