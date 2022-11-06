/////////////////////////////   DATE AND TIME CHANGES ACCORDINGLY  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\


window.onload = function () {
  window.uplodedfiles = [];
  var today = new Date();
  var day = today.getDay();
  var month = today.toLocaleString("default", { month: "short" });
  var date = today.getDate() + "-" + month + "-" + today.getFullYear();
  var hours = today.getHours();
  var minutes = today.getMinutes();
  var ampm = hours >= 12 ? "pm" : "am";
  hours = hours % 12;
  hours = hours ? hours : 12;
  minutes = minutes < 10 ? "0" + minutes : minutes;
  var strTime = hours + ":" + minutes + " " + ampm;

  document.getElementById("displayDateTime").innerHTML =
    date + "<br>" + strTime;
};

window.onload = function () {
  window.uplodedfiles = [];
  var today = new Date();
  var day = today.getDay();
  var month = today.toLocaleString("default", { month: "short" });
  var date = today.getDate() + "-" + month + "-" + today.getFullYear();
  var hours = today.getHours();
  var minutes = today.getMinutes();
  var ampm = hours >= 12 ? "pm" : "am";
  hours = hours % 12;
  hours = hours ? hours : 12;
  minutes = minutes < 10 ? "0" + minutes : minutes;
  var strTime = hours + ":" + minutes + " " + ampm;

  document.getElementById("displayDate").innerHTML =
    date ;
    document.getElementById("displayTime").innerHTML =
     strTime; 

    APICALL()
};
 




////API Callig in JSON DONE/////

function togglePopup() {
  $(".content").fadeToggle("fast");
}

//////////////
function APICALL()
{
  $.ajax({
    url: "http://www.randomnumberapi.com/api/v1.0/random?min=1&max=100&count=22",
    dataType: "json",
    success: function (data) {
   
      $("#regsal").html(data[0]);
      $("#pensal").html(data[1]);
      $("#paoid").html(data[2]);
      $("#rosid").html(data[3]);
      $("#dtaid").html(data[4]);
      $("#pdid").html(data[5]);
      $("#dta").html(data[6]);

      $("#dtacash").html(data[7]);
      $("#dwaworks").html(data[8]);
      $("#dwaest").html(data[9]);
      $("#priority").html(data[10]);

      $("#TC1").html(data[11]);
      $("#TC2").html(data[12]);
      $("#TC3").html(data[13]);
      $("#TC4").html(data[14]);
      $("#TC5").html(data[15]);
      $("#TC6").html(data[16]);

      $("#POP1").html(data[17]);
      $("#POP2").html(data[18]);
      $("#POP3").html(data[19]);
      $("#POP4").html(data[20]);
      $("#POP5").html(data[21]);
   
      
    },
  });

  $.ajax({
    url: "https://randomuser.me/api/",
    dataType: "json",
    success: function (data) {
   
      $("#totcash").html(data.results[0].location.street.number);

    },
  });

  $.ajax({
    url: "https://randomuser.me/api/",
    dataType: "json",
    success: function (data) {
   
      $("#totadj").html(data.results[0].location.street.number);

    },
  });


}