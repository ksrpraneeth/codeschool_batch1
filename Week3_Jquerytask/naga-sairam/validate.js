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

    $("document").ready(() =>{
        $.ajax({
          url: 'https://randomuser.me/api/',
          dataType: 'json',
          success: function(data) {
      
          $("#UGCid1").html(data.results[0].id); 
     
        $("#emailid1").html(data.results[0].emailid)
        $("#firstname1").html(data.results[0].firstname)
        $("#lastname1").html(data.results[0].lastname)
        $("#UGCid2").html(data.results[1].id); 
        $("#emailid2").html(data.results[1].emailid)
        $("#firstname2").html(data.results[1].firstname)
        $("#lastname2").html(data.results[1].lastname)
        $("#UGCid3").html(data.results[2].id); 
        $("#emailid3").html(data.results[2].emailid)
        $("#firstname3").html(data.results[2].firstname)
        $("#lastname").html(data.results[2].lastname)
      
          }
        });
      });
      