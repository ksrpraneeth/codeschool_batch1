$(document).ready(function(){
$.ajax({
  method: "GET",
  url: "https://reqres.in/api/users?page=1",
  success: function (response) {
    myArray = response.data;
    buildTable(myArray);
  },
});

var myArray = [];
buildTable(myArray);

function buildTable(data) {
  var table = document.getElementById("myTable");

  for (var i = 0; i < data.length; i++) {
    var row = `<tr>
                        <td>${data[i].id}</td>
                        <td>${data[i].first_name}</td>
                        <td>${data[i].last_name}</td>
                        <td>${data[i].email}</td>
                        <td><img src='${data[i].avatar}'></img></td>
                  </tr>`;
    table.innerHTML += row;
  }
  
}
$("#tosave").click(() => {
  function addingRow() {
    window.emptyData.forEach((data) => {
      $("#myTable").append(`<tr>
        <td>${data.id}</td>
        <td>${data.fname}</td>
        <td>${data.lname}</td>
        <td>${data.gmial}</td>
        <td>${data.avatar}</td>
        </tr>`);
    });
  }
});(window.jQuery, window, document)

$(document).ready(function () {
  $("#search").on("keyup", function () {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });
});

$(document).ready(function () {
  $("#tosave").click(() => {
    console.log("hello")
    var errorsText = $("#errorid")

    var errors = [];

    var FirstName = $("#fname").val();
    var LastName = $("#lname").val();
    var email = $("#email").val();
  
    if (FirstName.length < 1) {
      errors.push("Enter FirstName");
    }
    if (LastName.length < 1) {
      errors.push("Enter LastName");
    }

    if (email.length < 1) {
      errors.push("Enter emial id");
    }
    
  errorsText.innerHTML = "";

  errors.forEach((element) => {
    errorsText.innerHTML += "* " + element + "<br />";
  });

  errorsText.classList.remove("d-none");
  errorsText.scrollIntoView();
  });
});
});
