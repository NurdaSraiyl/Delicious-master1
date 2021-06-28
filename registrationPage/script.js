$(document).ready(function(){
	$("#submitButton").click(function(){
		var forward = true;

		$("#errorPlace").html(""); // Clear the error message place;

		// If login field is empty
    if ($("#_login").val() === "") {
      forward = false; // Can't register this data
			$("#errorPlace").append("<div class='alert alert-danger'>Please enter the login</div>"); // Output the error message
    }

		// If code field is empty
		if ($("#code").val() === "") {
      forward = false; // Can't register this data
			$("#errorPlace").append("<div class='alert alert-danger'>Please enter the code</div>"); // Output the error message
    }

		// If password field is empty
    if ($("#_password").val() === "") {
      forward = false; // Can't register this data
			$("#errorPlace").append("<div class='alert alert-danger'>Please enter the password</div>"); // Output the error message
    }

		// If entered email is not proper
		if($("#email").val() !== "" && !$("#email").val().includes("@")){
			forward = false; // Can't register this data
			$("#errorPlace").append("<div class='alert alert-danger'>Please enter the proper email</div>"); // Output the error message
		}
		if (forward) {
        $.ajax({
            type: "POST",
            url: "/Delicious/src/ajaxControllers/newUser.php", // Register new user
            data: {
                login: 		$("#_login").val(), 		// Send the data inputed into login input field, as a login
                password: $("#_password").val(), 	// Send the data inputed into password input field, as a password
                name: 		$("#name").val(), 			// Send the data inputed into name input field, as a name
                email: 		$("#email").val(), 			// Send the data inputed into email input field, as a email
								code: 		$("#code").val() 				// Send the data inputed into code input field, as a code
            },
            success: function (result) {
							// Expected output is "success", if data is correct, otherwise - error code
              if (result === "succes") {
								// Login in system and move to main page
                $.ajax({
                	type: "POST",
                  url: "/Delicious/src/ajaxControllers/checkAcc.php",
                  data: {
                    login: $("#_login").val(),
                    password: $("#_password").val()
                  },
                  success: function (result) {

                  	if (result !== "") {
                    	window.localStorage.setItem("session", result);
											location = "index.php";
                  	}
                  }
								});
              }
							else if(result === "error1"){
								$("#errorPlace").append("<div class='alert alert-danger'>Code is not valid</div>");
              }
							else if(result === "error2"){
								$("#errorPlace").append("<div class='alert alert-danger'>Login is already occupied</div>");
							}
            }
        });
    }
	})
});
