window.onload=function()
{

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
   
  document.getElementById("last-login").innerHTML = date +'<br>'+ strTime;
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
const hamberger = document.getElementById('click_hambergur');
hamberger.onclick = function(){
  console.log('pavan');
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

let accountNumber = document.getElementById("acNo");
const cAccountNumber = document.getElementById("CA/CNo");
const partyName = document.getElementById("PartyName");
const ifscCode= document.getElementById("IFSCcode");
const purpose = document.getElementById("PT");
const partyAmount = document.getElementById("partyamount");

let error = ""

const listOfBank = [
  {
    bankName:"abcd",
    ifsc: "ABCD0123456",
    brachName: "Banjara Hils"
  },
    
  {
    bankName: "efgh",
    ifsc: "EFGH0123456",
    brachName: "Jubli Hills"
  },
  {
    bankName: "hijk",
    ifsc: "HIJK0123456",
    brachName: "Miypur"
  },
  {
    bankName: "lmno",
    ifsc: "LMNO0123456",
    brachName: "Khiratabad"
  }
]


const onClickSearch = () => {
  // validateIfsc();
  let bankValue = ""
  let branchValue = ""
  listOfBank.map(each => {
    console.log(ifscCode.value)
    if (each.ifsc === ifscCode.value){
      console.log('pavn',each.bankName)
      console.log('pavn',each.brachName)
      // bankValue += each.bankName 
      // branchValue += each.brachName 
      document.getElementById("bankName").innerHTML = each.bankName;
      document.getElementById("branchName").innerHTML = each.brachName;
    }
   
  })

}

const validatePartyAmount = (errorArray) => {
  if ( partyAmount.value === '' ){
    return errorArray.push("Please enter  value")
  }

  else if( partyAmount.value === "^[0-9]" )
    {
      return errorArray.push("Please enter Digits only")
      
    }
    else {
       errorArray = []
    } 
}

const validatePurpose = (errorArray) =>{

  if( purpose.value==="")
  {
    return errorArray.push("Please enter Purpose")
  }
  else if (purpose.value.length > 500){
    return errorArray.push("Maximum Characters shuld be less then 500")
  }
  else {
    errorArray = []
  }
}

const validateIfsc = (errorArray)=> {

  // const inputStr = ifscCode.substring(0,3)
  // const toUpperCase = inputStr.toUpperCase()
  // const Numaric = ifscCode.substring(6,11)

  if( ifscCode.value === "^[A-Z]{4}0[A-Z0-9]{6}$"  || ifscCode.value === "")
  {
    return errorArray.push("Please Enter Following Format  **ABCD0123456 or **ABCD0abcdef")
  }

  else {
    errorArray = []
  }
  
  // else if(ifscCode.length!="11")
  // {
  //   return errorArray.push("IFSC Code should be 11 digits")
  // }
  // else if(inputStr !== toUpperCase){
  //   return errorArray.push("First 4 Shuld be UpperCase")
  // }

  // else if((Numaric !== !NaN || Numaric !== NaN) ){
  //   return errorArray.push("specil Charactors Are Not allowed")
  // }

}

const validatepartyName = (errorArray) => {
  if( partyName.value ==="" )
  {
    return errorArray.push("Enter party name")
  }
  else if (partyName.value === " /^[a-zA-Z ]{2,30}$/") {
    return errorArray.push("Party Name should not be Special Charaters")
  }
  else {
    errorArray = []
  }
}
const validateComformAcc = (errorArray) => {

  if(cAccountNumber.value === "")
  {
    return errorArray.push("**Enter Confirm Account No,")
  }
  else if (accountNumber.value !== cAccountNumber.value){
    return errorArray.push("** Account Numbet not Matched,")
  }
  else {
    errorArray = []
  }
 
}
function validateAccountNum(errorArray) {

  if (accountNumber.value === "") {
    return errorArray.push("**Enter Account No");
  }
   if (accountNumber.value === "[0-9]{11,22}") {
    return errorArray.push("**A/C no  be between 12 and 22 digits");
  }
  else {
    errorArray = []
  }
}

function validateform()
{
   errorArray = []
   validateAccountNum(errorArray)
   validateComformAcc(errorArray)
   validatepartyName(errorArray)
   validateIfsc(errorArray)
   validatePurpose(errorArray)
   validatePartyAmount(errorArray)

    errorArray.map(each => {
      error += each
    })
    document.getElementById("paragraph").innerHTML = errorArray;
    console.log(error)
    console.log(errorArray)
}


form.addEventListener('submit', function (e) {
  
  e.preventDefault();
  validateform()
  onClickSearch()

  });
  function fill(){
    if(document.getElementById("hoa").value == "0853001020002000000NVN"){
      document.getElementById("Balance").innerHTML=1000000;
      document.getElementById("Loc").innerHTML=5000;
    } else if(document.getElementById("hoa").value == "8342001170004001000NVN"){
      document.getElementById("Balance").innerHTML=1008340 ;
      document.getElementById("Loc").innerHTML=4000;
    }else if(document.getElementById("hoa").value == "2071011170004320000NVN"){
      document.getElementById("Balance").innerHTML=14530000 ;
      document.getElementById("Loc").innerHTML=78000;
    }else if(document.getElementById("hoa").value == "8342001170004002000NVN"){
      document.getElementById("Balance").innerHTML=1056400 ;
      document.getElementById("Loc").innerHTML=34000;
    }else if(document.getElementById("hoa").value == "2204000030006300303NVN"){
      document.getElementById("Balance").innerHTML=123465400 ;
      document.getElementById("Loc").innerHTML=5000;
    }

  }
  function Dropdown() {
    var mylist = document.getElementById("drop");
    document.getElementById("drop").value =
      mylist.options[mylist.selectedIndex].text;
  }
  function numberToWords(){
    const num = document.getElementById("partyamount").value;
    const partyAmountWords = (num) => {
       const single = ["Zero", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine"];
       const double = ["Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen"];
       const tens = ["", "Ten", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"];
       const formatTenth = (digit, prev) => {
          return 0 == digit ? "" : " " + (1 == digit ? double[prev] : tens[digit])
       };
       const formatOther = (digit, next, denom) => {
          return (0 != digit && 1 != next ? " " + single[digit] : "") + (0 != next || digit > 0 ? " " + denom : "")
       };
       let res = "";
       let index = 0;
       let digit = 0;
       let next = 0;
       let words = [];
       if (num += "", isNaN(parseInt(num))){
          res = "";
       }
       else if (parseInt(num) > 0 && num.length <= 10) {
          for (index = num.length - 1; index >= 0; index--) switch (digit = num[index] - 0, next = index > 0 ? num[index - 1] - 0 : 0, num.length - index - 1) {
             case 0:
                words.push(formatOther(digit, next, ""));
             break;
             case 1:
                words.push(formatTenth(digit, num[index + 1]));
                break;
             case 2:
                words.push(0 != digit ? " " + single[digit] + " Hundred" + (0 != num[index + 1] && 0 != num[index + 2] ? " and" : "") : "");
                break;
             case 3:
                words.push(formatOther(digit, next, "Thousand"));
                break;
             case 4:
                words.push(formatTenth(digit, num[index + 1]));
                break;
             case 5:
                words.push(formatOther(digit, next, "Lakh"));
                break;
             case 6:
                words.push(formatTenth(digit, num[index + 1]));
                break;
             case 7:
                words.push(formatOther(digit, next, "Crore"));
                break;
             case 8:
                words.push(formatTenth(digit, num[index + 1]));
                break;
             case 9:
                words.push(0 != digit ? " " + single[digit] + " Hundred" + (0 != num[index + 1] || 0 != num[index + 2] ? " and" : " Crore") : "")
          };
          res = words.reverse().join("")
       } else res = "";
       return res
    };
    document.getElementById("partyAmountWords1").innerHTML=(partyAmountWords(num))+"rupees";
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
