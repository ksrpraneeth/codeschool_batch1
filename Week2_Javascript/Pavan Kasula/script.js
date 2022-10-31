/////////////////////////////   DATE AND TIME CHANGES ACCORDINGLY  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

window.onload=function () { var today = new Date();
  var day = today.getDay();
  var month= today.toLocaleString('default',{month:'short'});
  var date = today.getDate()+'-'+(month)+'-'+today.getFullYear();
  var hours = today.getHours();
  var minutes = today.getMinutes();
  var ampm = hours >= 12 ? 'pm' : 'am';
  hours = hours % 12;
  hours = hours ? hours : 12; 
  minutes = minutes < 10 ? '0'+minutes : minutes;
  var strTime = hours + ':' + minutes + ' ' + ampm;


 /////////////////////////////// LOGIN TO LOGOUT AND VICEVERSA \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

  document.getElementById("displayDateTime").innerHTML = date + '<br>' + strTime;
}


function login(){
    if(document.getElementById("log").innerHTML == "Logout"){
        document.getElementById("log").innerHTML = "Login"
        document.getElementById("log1").innerHTML = "Login"
    }else{
        document.getElementById("log").innerHTML = "Logout"
        document.getElementById("log1").innerHTML = "Logout"
    }
}

//////////// ALLOWING ONLY NUMBER IN ACCOUNT NUMBER AND CONFIRM ACCOUNT NUMBER \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function allowonlynumber(event) {

    var aCode = event.which ? event.which : event.keyCode;
    
    if (aCode > 31 && (aCode < 48 || aCode > 57)) return false;
    
    return true;
    
    }

///////////////////////////////// NOT ALLOWING SPECIAL CHARACTERS IN PARTY AMOUNT\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
  

function blockspecialcharactersinpartyname(e){
        var k;
        document.all ? k = e.keyCode : k = e.which;
        return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8 || k == 32 || (k >= 48 && k <= 57));
}

/////////////////////////////////////// TOTAL VALIDATIONS  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function nextvalid(){
    errors = []
    if(document.getElementById("partyacno").value =="" ){
        errors.push("Party Account Number is empty")
    }
    if(document.getElementById("partyacno").value.length < 12 || document.getElementById("partyacno").value.length > 22 )
    {
        errors.push("Please enter min 12 - Max 22 characters in Party account number")
    }
    
    
    if(document.getElementById("cpartyacno").value =="" ){
        errors.push("confirm Party Account Number is empty")
        
    }
    if(document.getElementById("partyacno").value != document.getElementById("cpartyacno").value ){
        errors.push("Confirm Party Account Number & Party account numer is not matching")
    }
    if(document.getElementById("pname").value =="" ){
        errors.push("Party Name is empty")
    }
    if(document.getElementById("ifsccode").value =="" ){
        errors.push("Plase enter IFSC Code")
    }
    if(document.getElementById("ifsccode").value.length !=11 ){
        errors.push("Plase enter total 11 Digits ")
    }    
       
    if(document.getElementById("purpose").value =="" ){
        errors.push("Please enter Purpose   ")
    } 
    if(document.getElementById("purpose").value.length <500 ){
        errors.push("Purpose should be  500 characters only")
    }
    if(document.getElementById("partyamount").value =="" )
    {
        errors.push("Party Account is empty")
        
    }
  
  
    ////////to get alerts in Order--\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    var html="";
    for (var i =0; i < errors.length; i++) {
      html += "<li>" + errors[i]+ "</li>";
  }
    document.getElementById("errorid").innerHTML=html;
    

}

 /////-------Expenditure type ------Purpose type----\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
{
    var a=document.getElementById("input").value;
    if(a==="Expenditure type")
    {
        var arr=[""];
    }
    else if(a==="Capital Expenditure")
    {
        var arr=["Select", "Maintain current levels of operation within the organization","Expenses to permit future expansion."];
    }
    else if(a==="Revenue Expenditure")
    {
        var arr=["Select","Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services" ," All expenses incurred by the firm to guarantee the smooth operation"];
    }
    else if(a==="Deferred Revenue Expenditure")
    {
        var arr=["Select","Exorbitant Advertising Expenditures","Unprecedented Losses","Development and Research Cost York"];
    }
    
    var string="";
 
    for(i=0;i<arr.length;i++)
    {
        string=string+"<option value="+arr[i]+">"+arr[i]+"</option>";
    }
    document.getElementById("output").innerHTML=string;
}

/////-------Head of the account to Balance and LOC---\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
function Headoftheaccount () {
    if (document.getElementById("hoa").value == "0853001020002000000NVN") {
      document.getElementById("balance").innerHTML = "1000000";
      document.getElementById("Loc").innerHTML = "5000";
    }
    else if (document.getElementById("hoa").value == "8342001170004001000NVN") {
      document.getElementById("balance").innerHTML = "1008340";
      document.getElementById("Loc").innerHTML = "4000";
    }
    else if (document.getElementById("hoa").value == "2071011170004320000NVN") {
        document.getElementById("balance").innerHTML = "14530000  ";
        document.getElementById("Loc").innerHTML = "78000";
    }
    else if (document.getElementById("hoa").value == "8342001170004002000NVN ") {
      document.getElementById("balance").innerHTML = "1056400 ";
      document.getElementById("Loc").innerHTML = "34000";
    }
    else if (document.getElementById("hoa").value == "2204000030006300303NVN ") {
        document.getElementById("balance").innerHTML = "123465400  ";
        document.getElementById("Loc").innerHTML = "5000";
      }
  }

//---------IFSC CODE - BANK NAME AND BRANCH----//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function ifsccodeinput(){
    var ifsccode123 = document.getElementById("ifsccode")
    ifsccode123.value =ifsccode123.value.toUpperCase()
    if(ifsccode123.value.length ==11 && ifsccode123.value.charAt(4) == '0' && /^[a-zA-Z()]+$/.test(ifsccode123.value.slice(0,4)))
     

    {
                document.getElementById("bankname").innerHTML="KKBK";
                document.getElementById("bankbrach").innerHTML="A.S.Rao Nagar";            
    }
}

//--------Multiple upload-//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function Multiplefiles()
{
    let files = document.getElementById('uploadfiles').files;

    for (let i = 0; i < files.length; i++) {

        document.getElementById("fileslist").innerHTML+=files[i].name
}
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////