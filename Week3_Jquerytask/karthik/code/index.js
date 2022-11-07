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


function togglePopup() {
    $(".popUp").toggle();
}

function scaleState(index){
  $.get("https://reqres.in/api/users?page=" + index, function(data, status){
    updateTable(data.data)
    togglePopup()
  })
}

function updateTable(tableData){

  tableData.forEach((data, index) => {
    $("#popUpData").append(`<tr>
    <td>${index+1}</td>
    <td>${data.id}<td>
    <td>${data.email}<td>
    <td>${data.first_name}<td>
    <td>${data.last_name}<td>
    </tr>`)
  })

}