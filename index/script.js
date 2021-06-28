$(document).ready(function() {
  $("#goButton").click(function() {
    var d = $("#date").val(); // Get the requested date

    if(d != ""){
      // Parse date to 3 numbers
      d = d.split("-");

      var day   =   d[2],
          month =   d[1],
          year  =   d[0];

      location = "index.php?year=" + getInt(year) + "&month=" + getInt(month) + "&day=" + getInt(day); // Send HTTP request
    }
  })
});

// As numbers in date can have 0 before the actual number, this method is going to turn it into proper number
function getInt(val){
  var ans = "";
  var n;
  for(n = 0; n < val.length && val[n] == "0"; n++);
  for(var t = 0; n < val.length; n++){
    //console.log(val[n]);
    ans += val[n];
  }
  return ans
}
