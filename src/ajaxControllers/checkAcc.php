<?php
session_start();
include("../DB/DBRequestHandler.php"); // Import the class, which gives me database connection

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $ans = "";
    // Get all the data from HTTP request
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Connect to the database (for more ditailed information of what is going on inside, see the /Delicious/src/DB/DBRequestHandler.php)
    $db = new DBRequestHandler();
    $result = $db->execute("SELECT * FROM user WHERE login = '$login' AND password = '$password';");

    // Check if the user is in database
    if($row = $result->fetch_assoc()){
      do{
        $session = $db->generateSession(); // If user exists, generate the code, which will represent user, so the ersonal data will not be uploaded on website pages
        $result = $db->execute("SELECT * FROM user WHERE session = '$session';");
      }
      while($row = $result->fetch_assoc()); // session key will be regenerated until the free one found
      $_SESSION["session"] = $session; // Put it into the PHP session storage to get faster access to user data on server side

      $db->execute("UPDATE user SET session='$session' WHERE login='$login'"); // Associate the code with user
      $ans = $session;
    }

    $db->close();

    echo $ans; // Return the code
}

?>
