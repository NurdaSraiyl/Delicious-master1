<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>JSP Page</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
    <script type="text/javascript" src="registrationPage/script.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.3/p5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.7.3/addons/p5.dom.min.js"></script>
    <script src="bg.js"></script>

    <?php if(!isset($_SESSION["session"])) echo "<script type='text/javascript' src='checkSession.js'></script>" ?>
  </head>
  <body>

    <div id="background"></div>
    <?php include "header.html" ?>

    <div class="container text-left main-place">
      <!-- Field for registration to be inputed -->
      <div class="form-horizontal" action="">

       <!-- Field for login to be inputed -->
       <div class="form-group">
         <label class="control-label col-sm-2" for="_login">Login*:</label>
         <div class="col-sm-10">
           <input type="login" class="form-control" id="_login" placeholder="Enter login">
         </div>
       </div>

       <!-- Field for password to be inputed -->
       <div class="form-group">
        <label class="control-label col-sm-2" for="_password">Password*:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="_password" placeholder="Enter Password">
        </div>
      </div>

      <!-- Field for name to be inputed -->
      <div class="form-group">
        <label class="control-label col-sm-2" for="name">Name:</label>
        <div class="col-sm-10">
          <input type="name" class="form-control" id="name" placeholder="Enter your name">
        </div>
      </div>

      <!-- Field for email to be inputed -->
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" placeholder="Enter email">
        </div>
      </div>

      <!-- Field for code to be inputed -->
      <div class="form-group">
        <label class="control-label col-sm-2" for="code">Code*:</label>
        <div class="col-sm-10">
          <input type="code" class="form-control" id="code" placeholder="Enter code">
        </div>
      </div>

      <!-- Submit button -->
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" id="submitButton" class="btn btn-default">Submit</button>
        </div>
      </div>

      <!-- Place, where error message will be placed -->
      <div id="errorPlace"></div>

      </div>
    </div>

  </body>
</html>
