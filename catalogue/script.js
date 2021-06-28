function addToMenu(id){
  var d = $("#" + id).val();

  if(d != ""){
    // Parse date to 3 numbers
    d = d.split("-");

    var day   =   d[2],
        month =   d[1],
        year  =   d[0];

    $.ajax({
      type: "POST",
      url: "/Delicious/src/ajaxControllers/addToTimeTable.php", // Script to add meal to timetable
      data: {
        id: id,         // Send the meal id, as a id
        year: year,     // Send the chosen year, as a year
        month: month,   // Send the chosen month, as a month
        day: day        // Send the chosen day, as a day
      },
      success: function (result) {


      }
    });
  }
}

$(document).ready(function(){
  $("#addMeal").click(function(){
    if($("#title").val() !== ""){ // Chek, if input field is not empty
      $.ajax({
        type: "POST",
        url: "/Delicious/src/ajaxControllers/addMeal.php",
        data: {
          title: $("#title").val() // Send the title of the new meal, as a title
        },
        success: function (result) {
          $("#title").val(""); // Renew the form
        },
        complete: function(){
        }
      });
    }
  })
});
