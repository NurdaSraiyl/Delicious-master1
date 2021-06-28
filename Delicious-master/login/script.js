$(document).ready(function(){
  $("#submit").click(function(){ // If submit button is clicked
    $.ajax({
          type: "POST", // Type of HTTP request
          url: "/Delicious/src/ajaxControllers/checkAcc.php",
          data: {
              login: $("#login").val(), // Send the data inputed into login input field, as a login
              password: $("#pwd").val() // Send the data inputed into password input field, as a password
          },
          success: function (result) {

            // Expected output is session key, if data is correct, otherwise - nothing
            if (result !== "") {
              window.localStorage.setItem("session", result); // Set session to the local storage to get access to it when we open site again
              location.replace("index.php"); // Send user to main page
            } else
              $("#err").html("Invalid data"); // Show error message
          }
    });
  });
});
