 // Hide sidebar
 $("#sidebarToggler").click(() => {
    $("#sidebar").toggleClass("hide");
});

$(document).ready(function()
{
$.ajax({
    type: 'get',
    url:'https://jsonplaceholder.typicode.com/users/1',
    success:function(data) {
        $('#ppo_id').text(data.id);
        $('#pensionname').text(data.name);
        $('#ppo_number').text(data.website);
        $('#recruitment').text(data.phone);
        $('#fp').text(data.email);
        $('#prc').text(data.username);
        $('#state').text(data.address.city);
        $('#scaletype').text(data.address.street);
        $('#efp').text(data.address.suite);
        $('#pensiondate').text(data.address.geo.lat);
        $('#scaletype').text(data.address.street);
        $('#pensioncategory').text(data.address.geo.lng);
        $('#hoa').text(data.address.zipcode);
        $('#presentbasic').text(data.company.name);
        $('#cvp').text(data.company.bs);
        $('#type').text(data.company.catchPhrase);

     console.log(data);
    },
    error:function(error) {
        console.log(error);
    },
    
})
}) 

//get Elements from html
const form = document.getElementById('form');
const legalname = document.getElementById('legalname');
const realtion = document.getElementById('relation');
const phone = document.getElementById('phone');
const bankac= document.getElementById('bankac');
const confirmBankac = document.getElementById('confirmBankac');
const legalnamex = document.getElementById('legalnamex');

//IFSC Code Validation,Bank Name,Bank Branch Validations
//11 characters only, first four-UpperCase Alphabets,fifth-zero,last six-alphanumeric-IFSC Code
//Prefil name and branch
ifsc.onchange = function (clickbutton){
    if(/^[A-Z]{4}0[A-Z0-9]{6}$/.test(ifsc.value)){
        document.getElementById('bankName').innerText = 'SBI Bank';
        document.getElementById('bankBranch').innerText = 'Hyderabad';
    }else{
         document.getElementById('bankName').innerText = 'XXXXXX';
        document.getElementById('bankBranch').innerText = 'XXXXXX';
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
        //legal name
        let error = false;
        
        if (legalname.value.length == 0 || legalname.value.length > 20) {
            showError(legalname, 'Please enter name', 'nameerror');
            error = true;
        } else {
            showSuccess(legalname, '', 'nameerror');
        }
        //legal name relation
        if (relation.value.length == 0 || relation.value.length > 20) {
            showError(relation, 'Please enter relation', 'relationerror');
            error = true;
        
        } else {
            showSuccess(relation, '', 'relationerror');
        }
        //phone number
        if (phone.value.length != 10) {
            showError(phone, 'Please enter 10 digit number', 'phnoerror');
            error = true;
        } else {
            showSuccess(phone, '', 'phnoerror');
        }
        //Bank A/C no
        if (bankacno.value.length == 0) {
            showError(bankacno, 'Please enter valid Account Number', 'bankerror');
            error = true;
        } else {
            showSuccess(bankacno, '', 'bankerror');
        }
        //Confirm Bank A/C no
        if (confirmBankac.value != bankacno.value) {
            showError(confirmBankac, 'Value does not match', 'cbankerror');
            error = true;
        } else {
            showSuccess(confirmBankac, '', 'cbankerror');
        }

        //ifsc code
var regex = /^[A-Z]{4}0[A-Z0-9]{6}$/
var isIfscValid = regex.test(document.getElementById("ifsc").value);
if (!isIfscValid) 
{
showError(ifsc, 'Invalid IFSC Code','ifscerror');
error=true;
} 
else {
showSuccess(ifsc,'','ifscerror');
}
        
        if(error==false){
            //ajax post submit
            $(() => {
                // function will get executed
                // on click of submit button
                $("#submit").click(function (e) {
                    var form1 = $("#form");
                    var url = form1.attr('action');
                    $.ajax({
                        type: "POST",
                        url: 'https://reqres.in/api/users',
                        data: form1.serialize(),
                        success: function (data) {
                            console.log(data);
    
                            // Ajax call completed successfully
                            $("#message").text("Form submitted successfully!");
                        },
                        error: function (data) {
                            console.log(data);
                            // Some error in ajax call
                            $("#message").text("Error!");
                        }
                    });
                });
            });
        }
    });