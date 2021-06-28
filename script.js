$(document).ready(function() {
  if(window.localStorage.getItem("session") != null){ // If there is a saved session
    $.ajax({
      type: "POST",
      url: "/Delicious/src/ajaxControllers/checkSession.php", // Check if session is valid
      data: {
        session: window.localStorage.getItem("session") // Send the session key, as a session
      },
      success: function (result) {
        // Expected output is "true", if session is valid, otherwise - "false"

        if (result === "false")
          logOut();
        else {
          // If session is valid, we have to change the header of the pages
          document.getElementById("authorization-bar").innerHTML = "";
          document.getElementById("authorization-bar").innerHTML += "<li id='profile-tab'><a href='/Delicious/profilePage.php'><span class='glyphicon glyphicon-user'> Profile</a></li>";
          document.getElementById("authorization-bar").innerHTML += "<li id='logout-tab'><a href='#' onclick='logOut()'><span class='glyphicon glyphicon-log-out'> Logout</a></li>";

        }
      }
    });
  }
});

function logOut() {
  $.ajax({
    type: "POST",
    url: "/Delicious/src/ajaxControllers/deleteSession.php", // Request the delete of the session key from database and PHP session storage
    data: {
      session: window.localStorage.getItem("session") // Send the session key, as a session
    },
    complete: function(){
      // After database and PHP storage are cleared,
      window.localStorage.removeItem("session"); // clear localstorage
      location.reload(); // and reload the page
    }
  });
}
