<?php
session_start();
include("../DB/DBRequestHandler.php"); // Import the class, which gives me database connection

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $_SESSION["session"] = $_POST["session"]; // try to use the given session key

    include("checkSession.php"); // Check, if the given session key is valid

    if($ans === "false") unset($_SESSION['session']); // if it's not, then clear the PHP session storage

    echo $ans;
}

?>
