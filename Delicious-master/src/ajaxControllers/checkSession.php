<?php
include("../DB/DBRequestHandler.php"); // Import the class, which gives me database connection

// As this script can be called from the script.js usin POST and from setSession.php using include,
// here I should decide, which request that was
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $session = $_POST['session'] == null ? "" : $_POST['session'];
}
else $session = $_SESSION['session'];

$ans = "false";
if($session != null){
  // Connect to the database (for more ditailed information of what is going on inside, see the /Delicious/src/DB/DBRequestHandler.php)
  $db = new DBRequestHandler();
  $result = $db->execute("SELECT id FROM user WHERE session = '$session';"); // Try to find the user associated with session

  if ($user = $result->fetch_assoc()) $ans = $user['type']; // Return the type of the account

  $db->close();
}

echo $ans;

?>
