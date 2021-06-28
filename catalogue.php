<?php session_start() ?>
<?php include "src/DB/DBRequestHandler.php" ?>

<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="script.js"></script>
		<script src="catalogue/script.js"></script>

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
				// Get current account data
				$db = new DBRequestHandler();
				$user = $db->execute("SELECT * FROM user WHERE session = '".$_SESSION['session']."'");
				$user = $user->fetch_assoc();

				$page = $_GET['page'] == null ? 1 : $_GET['page']; // Get the number of page from HTTP request

				$result = $db->execute("SELECT * FROM meal");
				$maxpage = intval($result->num_rows / 20 + ($result->num_rows % 20 > 0 ? 1 : 0)); // Calculate the maximum amount of pages

				if($user['type'] == "chef" || $user['type'] == "Chef"){ // If the user has the chef role
					?>
					<!-- Form, which add new meal to the catalogue -->
					<div class="text-center">
						<div id="c" class="panel-collapse collapse">
							<label>Meal name:</label>
			        <input id="title" type="text">
							<button id="addMeal">add</button>
						</div>
						<a data-toggle="collapse" href="#c">+add new meal</a>
					</div>




					<?php
				}


				if($result->data_seek(($page * 20) - 20)){ // Jump to the meal, which suppose to be the first on the page
					for($n = 0; (($row = $result->fetch_assoc()) && $n < 20); $n++){ // Print the titles of next 20 of them
	     ?>
			 	<div>
					<h3><?php echo $row['title'] ?></h3>
					<?php
						if($user['type'] == "chef" || $user['type'] == "Chef"){ // If the user has the chef role
					?>

					<!-- Form, which add new meal to the timetable -->
					<div id="collapse<?php echo $n ?>" class="panel-collapse collapse">
						<input id="<?php echo $row['id'] ?>" type="date">
      			<button onclick="addToMenu(<?php echo $row['id'] ?>)">add</button>
    			</div>
					<a data-toggle="collapse" href="#collapse<?php echo $n ?>">add</a>
					<?php
	 		 				}
					?>
				</div>
			 <?php
	        }
				}
			?>
			<!-- Section with page choice -->
			<div class="text-center">
				<ul class="pagination">
					<?php
						if($page > 1){
							?>
							<li>
								<a href="catalogue.php?page=1"><<</a>
							</li>
							<li>
								<a href="catalogue.php?page=<?php echo $page - 1 ?>"><</a>
							</li>
							<?php
						}
						for($n = $page - 5 > 0 ? $page - 5 : 1; $n < ($page + 6 > $maxpage ? $maxpage + 1 : $page + 6); $n++){
					?>
 					<li<?php echo $n == $page ? " class='active'" : "" ?>>
						<a href="catalogue.php?page=<?php echo $n ?>">
							<?php echo $n ?>
						</a>
					</li>
					<?php
						}
						if($page < $maxpage){
					?>
					<li>
						<a href="catalogue.php?page=<?php echo $page + 1 ?>">></a>
					</li>
					<li>
						<a href="catalogue.php?page=<?php echo $maxpage ?>">>></a>
					</li>
					<?php
						}
					?>
				</ul>
			</div>
		</div>

		<footer class="container"></footer>
	</body>
</html>
