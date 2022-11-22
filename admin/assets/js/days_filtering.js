  
function parseDate(input) {
  var parts = input.split('-');
  // new Date(year, month [, day [, hours[, minutes[, seconds[, ms]]]]])
  return new Date(parts[0], parts[1]-1, parts[2]); // Note: months are 0-based
}


// COUNT DIFF DAYS //     

 $(document).ready(function () {
   $('#start_date_Save').change(function () {
     if($('#end_date_Save').val()!='')
     {
      days();
    }
  })
  $('#end_date_Save').change(function () {
    if($('#start_date_Save').val()!='')
    {
      days();
    }
  })
});

  const days = () => {
    
  var date1 = $('#start_date_Save').val();
  var date2 = $('#end_date_Save').val();

// days //
function getCountOf( date1, date2, dayToSearch ) {

    var dateObj1 = new Date(date1);
    var dateObj2 = new Date(date2);

    var count = 0;

    var week = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

    var dayIndex = week.indexOf( dayToSearch );

    while ( dateObj1.getTime() <= dateObj2.getTime() )
    {
       if (dateObj1.getDay() == dayIndex )
       {
          count++
       }

       dateObj1.setDate(dateObj1.getDate() + 1);

       
    }
     
    return count;
}

var sunday = "Sun";
var monday = "Mon";
var tuesday = "Tue";
var wednesday = "Wed";
var thursday = "Thu";
var friday = "Fri";
var saturday = "Sat";




var sun = getCountOf( date1, date2, sunday ) ;$("#sun").val(sun);
var sun1 = getCountOf( date1, date2, sunday ) ;$("#sun1").val(sun1);
var sun2 = getCountOf( date1, date2, sunday ) ;$("#sun2").val(sun2);


$("#sunday_Save").on("input", function() {
  $("#sunday_date_Save").val("");
  if ($(this).val().length >= 0) {
    $("#sunday_date_Save").val("0");
  }
  if ($(this).val().length >= 1) {
    $("#sunday_date_Save").val(sun2);
  }
});







var mon = getCountOf( date1, date2, monday ); ;$("#mon").val(mon);
var mon1 = getCountOf( date1, date2, monday ); ;$("#mon1").val(mon1);
var mon2 = getCountOf( date1, date2, monday ); ;$("#mon2").val(mon2);


$("#monday_Save").on("input", function() {
  $("#monday_date_Save").val("");
  if ($(this).val().length >= 0) {
    $("#monday_date_Save").val("0");
  }
  if ($(this).val().length >= 1) {
    $("#monday_date_Save").val(mon2);
  }
});










var tue = getCountOf( date1, date2, tuesday ); ;$("#tue").val(tue);
var tue1 = getCountOf( date1, date2, tuesday ); ;$("#tue1").val(tue1);
var tue2 = getCountOf( date1, date2, tuesday ); ;$("#tue2").val(tue2);


$("#tuesday_Save").on("input", function() {
  $("#tuesday_date_Save").val("");
  if ($(this).val().length >= 0) {
    $("#tuesday_date_Save").val("0");
  }
  if ($(this).val().length >= 1) {
    $("#tuesday_date_Save").val(tue2);
  }
});









var wed = getCountOf( date1, date2, wednesday ); ;$("#wed").val(wed);
var wed1 = getCountOf( date1, date2, wednesday ); ;$("#wed1").val(wed1);
var wed2 = getCountOf( date1, date2, wednesday ); ;$("#wed2").val(wed2);


$("#wednesday_Save").on("input", function() {
  $("#wednesday_date_Save").val("");
  if ($(this).val().length >= 0) {
    $("#wednesday_date_Save").val("0");
  }
  if ($(this).val().length >= 1) {
    $("#wednesday_date_Save").val(wed2);
  }
});








var thu = getCountOf( date1, date2, thursday ); ;$("#thu").val(thu);
var thu1 = getCountOf( date1, date2, thursday ); ;$("#thu1").val(thu1);
var thu2 = getCountOf( date1, date2, thursday ); ;$("#thu2").val(thu2);


$("#thursday_Save").on("input", function() {
  $("#thursday_date_Save").val("");
  if ($(this).val().length >= 0) {
    $("#thursday_date_Save").val("0");
  }
  if ($(this).val().length >= 1) {
    $("#thursday_date_Save").val(thu2);
  }
});





var fri = getCountOf( date1, date2, friday ); ;$("#fri").val(fri);
var fri1 = getCountOf( date1, date2, friday ); ;$("#fri1").val(fri1);
var fri2 = getCountOf( date1, date2, friday ); ;$("#fri2").val(fri2);


$("#friday_Save").on("input", function() {
  $("#friday_date_Save").val("");
  if ($(this).val().length >= 0) {
    $("#friday_date_Save").val("0");
  }
  if ($(this).val().length >= 1) {
    $("#friday_date_Save").val(fri2);
  }
});










var sat = getCountOf( date1, date2, saturday ); ;$("#sat").val(sat);
var sat1 = getCountOf( date1, date2, saturday ); ;$("#sat1").val(sat1);
var sat2 = getCountOf( date1, date2, saturday ); ;$("#sat2").val(sat2);



$("#saturday_Save").on("input", function() {
  $("#saturday_date_Save").val("");
  if ($(this).val().length >= 0) {
    $("#saturday_date_Save").val("0");
  }
  if ($(this).val().length >= 1) {
    $("#saturday_date_Save").val(sat2);
  }
});


}

