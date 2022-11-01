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
     document.getElementById("log2").innerHTML="Login"

   }
   else{
     document.getElementById("log").innerHTML="Logout"
     document.getElementById("log2").innerHTML="Logout"

 }
}


const hamberger = document.getElementById('click_hambergur');
hamberger.onclick = function(){

var x=document.getElementById('side_Nav');
if (x.classList.contains('open_sidebar'))
{
  x.classList.remove('open_sidebar');
  x.classList.add('close_sidebar');
} else 
{
  x.classList.add('open_sidebar');
  x.classList.remove('close_sidebar');
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
     
    if (
      document.getElementById("pAccountno").value.length < 12 ||
      document.getElementById("pAccountno").value.length > 22
    ) {
      errors.push(
        "Please enter min 12 - Max 22 characters in Party account number"
      );
    }
  
    if (document.getElementById("cfmaccountno").value == "") {
      errors.push("confirm Party Account Number is empty");
    }
    if (
      document.getElementById("pAccountno").value !=
      document.getElementById("cfmaccountno").value
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
    
    
    if (document.getElementById("pAmount").value == "") {
      errors.push("Party Account is empty");
    } 
  
    var html = ''
    for (var i = 0; i < errors.length; i++) {
    html += "<li>" + errors[i] + "</li>";
    }
    document.getElementById("errorid").innerHTML = html;
    }

    function ifsccodeinput() {
      var ifsccode123 = document.getElementById("ifsccode");
      ifsccode123.value = ifsccode123.value.toUpperCase();
      if (
        ifsccode123.value.length == 11 &&
        ifsccode123.value.charAt(4) == "0" &&
        /^[a-zA-Z()]+$/.test(ifsccode123.value.slice(0, 4))
      ) {
        document.getElementById("bankname").innerHTML = "ICICI";
        document.getElementById("bankbranch").innerHTML = "hyderabad";
      }
    }


    function fill() {
      if (document.getElementById("hoa").value == "0853001020002000000NVN") {
        document.getElementById("balance").innerHTML = "1000000";
        document.getElementById("Loc").innerHTML = "5000";
      } else if (document.getElementById("hoa").value == "8342001170004001000NVN") {
        document.getElementById("balance").innerHTML = "1008340";
        document.getElementById("Loc").innerHTML = "4000";
      } else if (document.getElementById("hoa").value == "2071011170004320000NVN") {
        document.getElementById("balance").innerHTML = "14530000";
        document.getElementById("Loc").innerHTML = "78000";
      } else if (document.getElementById("hoa").value == "8342001170004002000NVN") {
        document.getElementById("balance").innerHTML = "1056400";
        document.getElementById("Loc").innerHTML = "34000";
      } else if (document.getElementById("hoa").value == "2204000030006300303NVN") {
        document.getElementById("balance").innerHTML = "123465400";
        document.getElementById("Loc").innerHTML = "5000";
      }
    }


    function random_function() {
      var a = document.getElementById("input").value;
      if (a === "Expenditure type") {
        var arr = [""];
      } else if (a === "Capital Expenditure") {
        var arr = [
          "Select",
          "Maintain current levels of operation within the organization",
          "Expenses to permit future expansion.",
        ];
      } else if (a === "Revenue Expenditure") {
        var arr = [
          "Select",
          "Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services",
          " All expenses incurred by the firm to guarantee the smooth operation",
        ];
      } else if (a === "Deferred Revenue Expenditure") {
        var arr = [
          "Select",
          "Exorbitant Advertising Expenditures",
          "Unprecedented Losses",
          "Development and Research Cost York",
        ];
      }
      var string = "";
    
      for (i = 0; i < arr.length; i++) {
        string = string + "<option value=" + arr[i] + ">" + arr[i] + "</option>";
      }
      document.getElementById("output").innerHTML = string;
    }