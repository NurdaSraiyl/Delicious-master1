<?php
session_start();
include("../DB/DBRequestHandler.php"); // Import the class, which gives me database connection

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $ans = "";

  $db = new DBRequestHandler();

  $code = $db->generateSession(); // Generate code
  $type = $_POST["type"]; // Get new type name from HTTP request

  $db->execute("INSERT INTO reg_codes VALUES('$code', '$type')"); // Insert code into database
  $ans = $code; // Return code

  echo $ans;
}

?>
