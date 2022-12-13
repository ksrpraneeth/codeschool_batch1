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
   
      $("#regularSalary").html(data[0]);
      $("#pensionSalary").html(data[1]);


      $("#PAO").html(data[2]);
      $("#pdRosCap").html(data[3]);
      $("#Pdl").html(data[4]);
      $("#DTAadj").html(data[5]);


      $("#dta").html(data[6]);

      $("#dtaCash").html(data[7]);
      $("#dwaWorks").html(data[8]);
      $("#dwaEst").html(data[9]);
      $("#Priority").html(data[10]);

      $("#covidDef").html(data[11]);
      $("#cssState").html(data[12]);
      $("#rythuBandhu").html(data[13]);
      $("#pallePattana").html(data[14]);
      $("#adminOfJustice").html(data[15]);
      $("#medicalAndHealth").html(data[16]);

      $("#approvedToday").html(data[17]);
      $("#readyForPayment").html(data[18]);
      $("#sentToBank").html(data[19]);
      $("#theBank").html(data[20]);
      $("#paidToday").html(data[21]);
   
      
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