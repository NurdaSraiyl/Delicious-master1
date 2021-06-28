$(document).ready(function(){
  $("#codeBtn").click(function(){
    $.ajax({
      type: "POST",
      url: "/Delicious/src/ajaxControllers/addCode.php", // Generate the code
      data: {
        type: $("#type").val() // Send the type name, as a type
      },
      success: function (code) {
        $("#codePlace").html(code); // Place the generated code on the page
      }
    });
  })
});
