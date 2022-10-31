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
function login(){
      if(document.getElementById("log").innerHTML == "Logout")
      {
          document.getElementById("log").innerHTML = "Login"
          document.getElementById("log1").innerHTML = "Login"
      }
      else{
          document.getElementById("log").innerHTML = "Logout"
          document.getElementById("log1").innerHTML = "Logout"
      }
      document.getElementById("log").innerHTML=history;
    }
    
    var partyName = document.getElementById("pname").value;
    
    
      function vlidation(){
    
        errors=[];
        if(document.getElementById("pacnum").value ==""){
          errors.push("party account number is empty");
        }
        if(document.getElementById("pacnum").value.length <12 && (document.getElementById("pacnum").value )>22){
          errors.push("Party Account Number mustbe morethan 12 and lessthan 22");
        }
        if(document.getElementById("cpac").value==""){
          errors.push("Confirm Party Account Number is empty");
        }
        if(document.getElementById("pacnum").value != document.getElementById("cpac").value){
          errors.push("Party Account Number and Confirm Party Account Number is not matching");
        }
        var format = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
        if(format.test(partyName)){
          errors.push("Party Name contains special characters");
        }
        if(document.getElementById("ifsc").value.length !=11){
          errors.push("IFSC Code Must be 11 character");
        }
        if(document.getElementById("ifsc").value==""){
          errors.push("In IFSC code The first four characters should be upper case alphabets");
        }
        if(document.getElementById("hoac").value=-1){
          errors.push("select head of account ");
        }
        if(document.getElementById("prp").value.length>500){
         errors.push("It should be within 500 characters");
        } 
        document.getElementById("errorid").innerHTML = html;
      }
      
    
    
    
    
      function fifsc() {
        var fifsc = document.getElementById("ifsc");
        fifsc.value = fifsc.value.toUpperCase();
        if (
          fifsc.value.length == 11 &&
          fifsc.value.charAt(4) == "0" &&
          /^[a-zA-Z()]+$/.test(fifsc.value.slice(0, 4))
        ) {
          document.getElementById("bankname").innerHTML = CNB;
          document.getElementById("bankbrach").innerHTML = JMD;
        }
      }
    
      function hoa(event, element) {
        var balance =
            event.target.options[event.target.selectedIndex].dataset.balance;
        var loc = event.target.options[event.target.selectedIndex].dataset.loc;
    
        document.getElementById("balance").innerHTML = balance;
        document.getElementById("loc").innerHTML = loc;
      }
      
      
      function expt() {
            var a = document.getElementById("expts").value;
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
      }