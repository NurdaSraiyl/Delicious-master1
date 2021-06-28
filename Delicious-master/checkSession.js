$(document).ready(function(){
  // If local storage contains session key and PHP session storage does not, then this script is executed to put session key into PHP session storage
  if(window.localStorage.getItem("session") != null){
    $.ajax({
          type: "POST",
          url: "/Delicious/src/ajaxControllers/setSession.php",
          data: {
              session: window.localStorage.getItem("session") // Send the session key, as a session
          },
          success: function (result) {

            // Expected output is account type, if data is correct, otherwise - "false"
            if(result !== "false"){ // If session key is valid
              location.reload();  // Reload the page to apply all role based functions of the page
            }
            else window.localStorage.removeItem("session");
          }
    });
  }
});
