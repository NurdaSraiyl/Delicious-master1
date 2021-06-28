<?php
session_start();
include("../DB/DBRequestHandler.php"); // Import the class, which gives me database connection

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $db = new DBRequestHandler();

  $title = $_POST["title"]; // Get new meal title from HTTP request

  $db->execute("INSERT INTO meal(title) VALUES('$title')"); // Insert new meal title to the database

  $db->close();
}

?>
