var myArray =[]
buildTable(myArray)


    $.ajax({
      method:'GET',  
      url: 'https://reqres.in/api/users?page=1',
      success: function (response) {
          myArray = response.data
          buildTable(myArray)
      }
    });

  
function buildTable(data){
    var table = document.getElementById("myTable")
     
    for( var i=0;i<data.length; i++){
        var row = `<tr>
                        <td>${data[i].id}</td>
                        <td>${data[i].first_name}</td>
                        <td>${data[i].last_name}</td>
                        <td>${data[i].email}</td>
                        <td>${data[i].avatar}</td>
                  </tr>`
        table.innerHTML += row        
    }
}

$(function(){
    $("#fname_error").hide();
    $("#lname_error").hide();
    $("#email_error").hide();
    $("#image_error").hide();

    var error_fname = false;
    var error_lname = false;
    var error_email = false;
    var error_image = false;

});

