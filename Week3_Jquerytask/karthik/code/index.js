window.onload = function () {
    var today = new Date();
    var month = today.toLocaleString("default", { month: "short" });
    var date = today.getDate() + "-" + month + "-" + today.getFullYear();
    var hours = today.getHours();
    var minutes = today.getMinutes();
    var ampm = hours >= 12 ? "pm" : "am";
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? "0" + minutes : minutes;
    var strTime = hours + ":" + minutes + " " + ampm;
    //var dateTime = date+' '+time;
  
    document.getElementById("displayDateTime").innerHTML =
      date + "<br>" + strTime;
  };


function togglePopupUGC() {
    $(".popUp").toggle();
}

$("document").ready(()=>{
  $.ajax({
      url:'https://reqres.in/api/users?page=1 ',
      dataType:'json',
      success:function Ugc(data){
          $("#uGCid1").html(data.data[0].id)
          $("#uGCeMail1").html(data.data[0].email)
          $("#uGCfirstName1").html(data.data[0].first_name)
          $("#uGClastName1").html(data.data[0].last_name)
          $("#uGCid2").html(data.data[1].id)
          $("#uGCeMail2").html(data.data[1].email)
          $("#uGCfirstName2").html(data.data[1].first_name)
          $("#uGClastName2").html(data.data[1].last_name)
          $("#uGCid3").html(data.data[2].id)
          $("#uGCeMail3").html(data.data[2].email)
          $("#uGCfirstName3").html(data.data[2].first_name)
          $("#uGClastName3").html(data.data[2].last_name) 
      }
  });
});

function togglePopupStateScale() {
  $(".popUp").toggle();


$("document").ready(()=>{
  $.ajax({
      url:'https://reqres.in/api/users?page=2 ',
      dataType:'json',
      success:function scaleState(data){
          $("#stateScaleId1").html(data.data[0].id)
          $("#stateScaleEMail1").html(data.data[0].email)
          $("#stateScaleFirstName1").html(data.data[0].first_name)
          $("#stateScaleLastName1").html(data.data[0].last_name)
          $("#stateScaleId2").html(data.data[1].id)
          $("#stateScaleEMail2").html(data.data[1].email)
          $("#stateScaleFirstName2").html(data.data[1].first_name)
          $("#stateScaleLastName2").html(data.data[1].last_name)
          $("#stateScaleId3").html(data.data[2].id)
          $("#stateScaleEMail3").html(data.data[2].email)
          $("#stateScaleFirstName3").html(data.data[2].first_name)
          $("#stateScaleLastName3").html(data.data[2].last_name) 
      }
  });
});
}