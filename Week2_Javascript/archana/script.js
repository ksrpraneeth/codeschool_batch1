
$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
    $('#sidebar').toggleClass('active');
 });
 });


    var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
    var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];
    
    function inWords(num) {
        if ((num = num.toString()).length > 9) return 'overflow';
        n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
        if (!n) return; var str = '';
        str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
        str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
        str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
        str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
        str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
        return str;
    }

function toWords(this)
{
    var input4 = document.getElementById('PartyAmount');
    var input5 = document.getElementById('AmntTOwords');
    input5.value = inWords(this);
}


 function inputChange(x)
 {    
    var input1 = document.getElementById('Balance');
    var inptu2 = document.getElementById('Loc');
    let y=x.value;
    if(y=="1"){
       input1.value = "1000000"; 
       inptu2.value ="5000";
    }
    else if(y=="2"){
        input1.value ="1008340";
        inptu2.value ="4000";
    }
    else if(y=="3"){
        input1.value = "14530000"; 
        inptu2.value = "78000"; 
    }
    else if(y=="4"){
        input1.value =  "1056400";  
        inptu2.value = "34000";
    }
    else if(y=="5"){
        input1.value = "123465400";
        inptu2.value = "5000"; 
    }
 }

 function hello(){
    alert("Account number must be in between 12-22");
    return false;  

 }

function isUpperCase(str) {
    return str === str.toUpperCase();
}

function containsSpecialChars(str) {
  const specialChars = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
  return specialChars.test(str);
}

function validateSample(){  

var AcntNo=document.signup.AcNum.value;  
var CnfmAcntNo=document.signup.CnfrmAcNum.value;
var PartyName=document.signup.PName.value; 
var IfscCode=document.signup.IfscCode.value; 
  if(IfscCode.length==11)
  {
    check1=IfscCode.slice(0,4);
    let res1= isUpperCase(check1);
    let res2 = IfscCode.slice(6,10);
  }
  if(AcntNo.length<12 || AcntNo.length>22){  
  alert("Account number must be in between 12-22");  
  return false;  
  }
  else if(AcntNo!=CnfmAcntNo)  
  { 
    alert("Confirm Account number must be same as Account number");  
  return false;
  }
  else if(containsSpecialChars(PartyName)) {
    alert("PartyName Should not contain Special Characters");  
  return false;
  }
  else if(IfscCode.length!=11) {
    alert("IfscCode must be 11 Characters Long");  
  return false;
  } 
  else if(!res1) {
    alert("IfscCode's firsr 5 characters must be UpperCase");  
  return false;
  } 
  else if( IfscCode.charAt(5)!='0') {
    alert("IfscCode must contain 0 at 6th position");  
  return false;
  } 
  else if(containsSpecialChars(res2)) {
    alert("IfscCode should not have Specail characters");  
  return false;
  }
  else if(containChars(Bankname&Bankhead)) {
    alert("PartyName Should contain  only Characters");  
  return false;
  }

else if(PartyAmount) {
    alert("Party Amount should not be fractions");  
  return false;
}
}