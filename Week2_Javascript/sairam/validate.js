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
     

    function login()
    {
     if(document.getElementById("log").innerHTML=="Logout")
     {
       document.getElementById("log").innerHTML="Login"
     }
     else{
       document.getElementById("log").innerHTML="Logout"
   }
 }
 
   
 /*
     function validation (){
 
       var partyAccountno = document.getElementById('accountno').Value; 
       var  confirmaccountno = document.getElementById('Cfm accountno').Value; 
       var partyname = document.getElementById('pname').Value; 
       var bankIfsccode = document.getElementById('ifsccode').value;
       var bankname =  document.getElementById('bankname' ).value;
       var bankbranch = document.getElementById('bankbranch' ).value;
       var headofaccount = document.getElementById('head of account').value
       var balance = document.getElementById('balance').value
       var loc = document.getElementById('loc').value
       var expenditureType = document.getElementById('expenditureType').value
       var purpose = document.getElementById('purpose').value
       var partyAmount = document.getElementById('partyAmount').value
     
     } */
 
      function nextvalid() {
      errors = [];
      if (document.getElementById("pAccountno").value == "") {
        errors.push("Party Account Number is empty");
      }
      /*
      if (
        document.getElementById("accountno").value.length < 12 ||
        document.getElementById("accountno").value.length > 22
      ) {
        errors.push(
          "Please enter min 12 - Max 22 characters in Party account number"
        );
      }
    
      if (document.getElementById("Cfm accountno").value == "") {
        errors.push("confirm Party Account Number is empty");
      }
      if (
        document.getElementById("accountno").value !=
        document.getElementById("cfm accountno").value
      ) {
        errors.push(
          "Confirm Party Account Number & Party account numer is not matching"
        );
      }
     if (document.getElementById("pname").value == "") {
        errors.push("Party Name is empty");
      }
      if (document.getElementById("ifsccode").value == "") {
        errors.push("Plase enter IFSC Code");
      }
      if (document.getElementById("ifsccode").value.length != 11) {
        errors.push("Plase enter total 11 Digits ");
      }
    
      if (document.getElementById("purpose").value == "") {
        errors.push("Please enter Purpose   ");
      }
      if (document.getElementById("purpose").value.length < 500) {
        errors.push("Purpose should be  500 characters only");
      }
      if (document.getElementById("partyamount").value == "") {
        errors.push("Party Account is empty");
      } */
    
      var html = ''
      for (var i = 0; i < errors.length; i++) {
      html += "<li>" + errors[i] + "</li>";
      }
      document.getElementById("errorid").innerHTML = html;
    }

