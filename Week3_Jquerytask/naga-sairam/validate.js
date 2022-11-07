window.onload=function(){
    var today = new Date(); 
    var month = today.toLocaleString('default', { month: 'short' });
    var date = today.getDate()+'-'+(month)+'-'+today.getFullYear();
    var hours = today.getHours();
    var minutes = today.getMinutes();
    var ampm = hours >= 12 ? 'pm' : 'am';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    //var dateTime = date+' '+time;
     
    document.getElementById("displayDateTime").innerHTML = date +'<br>'+ strTime;
    }


    function togglepopUGC() {
        $(".showpopup").toggle();
    }

  //  $("document").ready(() =>{
  //       $.ajax({
  //         url: 'https://reqres.in/api/users?page=1 ',
  //         dataType: 'json',
  //         success: function idpopshow(data) {
      
  //         $("#UGCid1").html(data.results[0].id); 
     
  //       $("#email1").html(data.results[0].email)
  //       $("#firstname1").html(data.results[0].first_name)
  //       $("#lastname1").html(data.results[0].last_name)
  //       $("#gender1").html(data.results[0].gender)
  //       $("#UGCid2").html(data.results[1].id); 
  //       $("#email2").html(data.results[1].email)
  //       $("#firstname2").html(data.results[1].first_name)
  //       $("#lastname2").html(data.results[1].last_name)
  //       $("#gender2").html(data.results[1].gender)
  //       $("#UGCid3").html(data.results[2].id) 
  //       $("#email3").html(data.results[2].email)
  //       $("#firstname3").html(data.results[2].first_name)
  //       $("#lastname").html(data.results[2].last_name)
  //       $("#gender3").html(data.results[2].gender)
  //         }
  //       });
  //     });
      
      function employeeType(index){
        $.get("https://reqres.in/api/users?page=" + index, function(data, status){
          updateTable(data.data)
          togglePopup()
        })
      }
      
      
      function updateTable(tableData){
      
        tableData.forEach((data, index) => {
          $("#popshow").append(`<tr>
          <td>${index+1}</td>
          <td>${data.id}<td>
          <td>${data.email}<td>
          <td>${data.first_name}<td>
          <td>${data.last_name}<td>
          </tr>`)
        })
      }