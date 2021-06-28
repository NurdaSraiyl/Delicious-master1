<?php session_start() ?>

<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="profile/style.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="script.js"></script>
        <script type="text/javascript" src="profile/script.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.3/p5.min.js"></script>
  	    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.3/addons/p5.dom.min.js"></script>
  			<script src="bg.js"></script>

        <?php if(!isset($_SESSION["session"])) echo "<script type='text/javascript' src='checkSession.js'></script>" ?>
    </head>
    <body>
        <div id="background"></div>
        <?php include("header.html") ?>

        <div class="container text-left main-place">
          <?php
            include("src/DB/DBRequestHandler.php");

            $db = new DBRequestHandler();

            $session = $_SESSION['session'];

            if($session != ""){
              $result = $db->execute("SELECT * FROM user WHERE session = '$session';"); // Find the user in database

              if($row = $result->fetch_assoc()){ // If user is found
          ?>
                <!-- Output the login of user -->
                <h3><?php echo $row['login'] ?></h3>
                <table>
                  <tr>
                    <!-- Output the name of user -->
                    <td>name:</td>
                    <td><?php echo $row['name'] ?></td>
                  </tr>
                  <tr>
                    <!-- Output the email of user -->
                    <td>email:</td>
                    <td><?php echo $row['email'] ?></td>
                  </tr>
                  <tr>
                    <!-- Output the type of user -->
                    <td>type:</td>
                    <td><?php echo $row['type'] ?></td>
                  </tr>
                </table>
          <?php
                if($row['type'] === "admin" || $row['type'] === "Admin"){ // User role is administrator
                  ?>
                  <!-- Attach the form, which is going to generate the registration form -->
                  <div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="type">Type:</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="type">
                          <option>student</option>
                          <option>chef</option>
                          <option>admin</option>
                        </select>
                      </div>
                    </div>
                    <button id="codeBtn" class="btn btn-default">Get code</button>
                    <span id="codePlace"></span>
                  </div>
                  <?php
                }
              }
              else{ // If user is not found
          ?>
                    <h1 class="text-center">Sorry, but we was not able to find your account</h1>
          <?php
              }

            }
            else{ // If session key is not available
          ?>
              <h1 class="text-center">Please log in before going on this page</h1>
          <?php
            }
          ?>
        </div>

        <footer class="container"></footer>

    </body>
</html>
