<?php session_start() ?>
<?php
include("../DB/DBRequestHandler.php"); // Import the class, which gives me database connection

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $session = $_POST['session'] == null ? "" : $_POST['session'];

    unset($_SESSION['session']); // Delete the session key from PHP session storage

    if($session != null){
      $db = new DBRequestHandler();
      $db->execute("UPDATE user SET session=null where session='$session';"); // Delte the session key from database
      $db->close();
    }
}
?>
