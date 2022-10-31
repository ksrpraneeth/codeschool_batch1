window.onload= function(){

      var today = new Date();
      var month=today.toLocaleString('default', {month: "short"});
      var date = today.getDate()+"-"+(month)+"-"+today.getFullYear();
      var hours = today.getHours();
      var minutes = today.getMinutes();
      var prepand = hours >= 12 ? " PM ":" AM ";
      hours=hours%12;
      hours=hours? hours :12;
      minutes =minutes<10? '0'+minutes :minutes;
      var strTime =hours +":"+ minutes+" "+prepand;
    
      document.getElementById("year").innerHTML= date+'<br>'+strTime;
}