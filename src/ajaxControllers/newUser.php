<?php
include("../DB/DBRequestHandler.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
  // Get all data from HTTP request
  $login = $_POST["login"];
  $password = $_POST["password"];
  $email = $_POST["email"];
  $name = $_POST["name"];
  $code = $_POST["code"];

  $db = new DBRequestHandler();
  $ans = "error1";

  // Check, if code is valid, else return "error1"
  $type = $db->execute("SELECT * FROM reg_codes WHERE code='$code'");
  if($type = $type->fetch_assoc()){

    $type = $type["acc_type"]; // Get type of new account

    // Check, if login is not occupied, else return "error2"
    $result = $db->execute("SELECT * FROM user WHERE login='$login'");

    if(!$result->fetch_assoc()){
      // Insert new data to database and delete the code from it
      $db->execute("INSERT INTO user(login, password, type".($email === "" ? "" : ", email" ).($name === "" ? "" : ", name").") VALUES('$login', '$password', '$type'".($email === "" ? "" : ", '$email'" ).($name === "" ? "" : ", '$name'").")");
      $db->execute("DELETE FROM reg_codes WHERE code='$code'");

      $ans = "succes";
      
    else $ans = "error2";
  }



  $db->close();

  echo $ans;
}

?>
