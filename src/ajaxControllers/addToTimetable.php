<?php
include("../DB/DBRequestHandler.php"); // Import the class, which gives me database connection

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $ans = "";
    // Get data from HTTP request
    $id = $_POST['id'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];

    $db = new DBRequestHandler();
    $result = $db->execute("INSERT INTO timetable(meal_id, year, month, day) VALUES($id, $year, $month, $day);"); // Insert new meal into timetable

    $db->close();

    echo $ans;
}

?>
