//sidebar collapse
$(document).ready(function () {
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
});

//Login and Logout toggle
function toggle(ele) {
  var cont = document.getElementById('cont');
  if (cont.style.display == 'block') {
      cont.style.display = 'none';

      document.getElementById(ele.id).value = 'LogIn';
  }
  else {
      cont.style.display = 'block';
      document.getElementById(ele.id).value = 'LogOut';
  }
}

//get Elements from html
const form = document.getElementById('form');
const partyaccount = document.getElementById('partyaccount');
const cpartyaccount = document.getElementById('cpartyaccount');
const partyname = document.getElementById('partyname');
const partyamount = document.getElementById('partyamount');
const purpose = document.getElementById('purpose');
const bankcode = document.getElementById('bankcode');
var headOfAccount = document.getElementById("headOfAccount").value;
var balance = document.getElementById("balance").innerHTML;
var loc = document.getElementById("loc").innerHTML;
var expenditureType = document.getElementById("expenditureType").value;



//IFSC Code Validation,Bank Name,Bank Branch Validations
//11 characters only, first four-UpperCase Alphabets,fifth-zero,last six-alphanumeric-IFSC Code
//Prefil name and branch
bankcode.onchange = function (){
    if(/^[A-Z]{4}0[A-Z0-9]{6}$/.test(bankcode.value)){
        document.getElementById('bankname').innerText = 'SBI Bank';
        document.getElementById('bankbranch').innerText = 'Hyderabad';
    }else{
         document.getElementById('bankname').innerText = 'XXXXXX';
        document.getElementById('bankbranch').innerText = 'XXXXXX';
    }
}

//Show input error message
function showError(input, message,id) {
const formControl = input.parentElement;
formControl.classList.toggle('input-control-error');
const small = formControl.querySelector('small');
const errordiv = document.getElementById(id);
errordiv.innerText = message;
}

//Show success message
function showSuccess(input, message,id) {
const formControl = input.parentElement;
formControl.classList.toggle('success');
const small = formControl.querySelector('small');
const errordiv = document.getElementById(id);
errordiv.innerText = message;
}

//validations
form.addEventListener('submit', function (e) {
e.preventDefault();
//partyaccount number
if (partyaccount.value.length<12 || partyaccount.value.length>22) 
{
showError(partyaccount, 'Min digits 12 and Max digits 22','e_partyaccount');
} 
else {
showSuccess(partyaccount,'','e_partyaccount');
}
//confirm partyaccount number
if(cpartyaccount.value != partyaccount.value)
{
    showError(cpartyaccount, 'Value does not match','e_cpartyaccount');
} 
else {
showSuccess(cpartyaccount,'','e_cpartyaccount');
}  
//partname-no special characters
 var regex = /^[A-Za-z0-9 ]+$/
 //Validate TextBox value against the Regex.
var isValid = regex.test(document.getElementById("partyname").value);
if (!isValid) {
    
    showError(partyname, 'No special characters','e_partyname');
} 
else {
showSuccess(partyname,'','e_partyname');
}  
//partyamount-no decimals
var regex1 = /^[0-9]*$/
var isValid1 = regex1.test(document.getElementById("partyamount").value);
if (!isValid1) 
{
showError(partyamount, 'Decimals not allowed','e_partyamount');
} 
else {
showSuccess(partyamount,'','e_partyamount');
}
var regex2 = /^[A-Z]{4}0[A-Z0-9]{6}$/
var isValid2 = regex2.test(document.getElementById("bankcode").value);
if (!isValid2) 
{
showError(bankcode, 'Invalid IFSC Code','e_bankcode');
} 
else {
showSuccess(bankcode,'','e_bankcode');
}
});
//HeadAccount
function headOfAccountChanged(event, element) {
    // Gettting details from
    var balance =
        event.target.options[event.target.selectedIndex].dataset.balance;
    var loc = event.target.options[event.target.selectedIndex].dataset.loc;

    // Setting balance and loc
    document.getElementById("balance").innerHTML = balance;
    document.getElementById("loc").innerHTML = loc;
}
//Expenditure and Purpose type
function expenditureTypeChanged(selected) {
    switch (selected) {
        case "opt1":
            document.getElementById("purposeType").innerHTML =
                "<option>Maintain current levels of operation within the organization</option>" +
                "<option>Expenses to permit future expansion</option>";
            break;
        case "opt2":
            document.getElementById("purposeType").innerHTML =
                "<option>Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services.</option>" +
                "<option>All expenses incurred by the firm to guarantee the smooth operation</option>";
            break;
        case "opt3":
            document.getElementById("purposeType").innerHTML =
                "<option>Exorbitant Advertising Expenditures</option>" +
                "<option>Unprecedented Losses</option>";
            "<option>Development and Research Cost</option>";
            break;
    }
}
