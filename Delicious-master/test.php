<?php include "src/DB/DBRequestHandler.php" ?>

<?php

	echo (date("j")." ".date("n")." ".date("Y"));
	/*$db = new DBRequestHandler();

	for($n = 2; $n < 1000; $n++){
		echo $n;
		$db->execute("INSERT INTO meal(title) VALUES('Meal $n');");
	}

	$db->close();
	*/
?>
