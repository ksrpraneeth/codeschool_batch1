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
    if (legalname.value.length == 0 || legalname.value.length > 20)
    {
    showError(legalname, 'Please enter name','nameerror');
    } 
    else {
    showSuccess(legalname,'','nameerror');
    }
     //legal name relation
     if (relation.value.length == 0  || relation.value.length>20) 
     {
     showError(relation, 'Please enter relation','relationerror');
     } 
     else {
     showSuccess(relation,'','relationerror');
     }
      //phone number
      if (phone.value.length != 10)
    {
    showError(phone, 'Please enter 10 digit number','phnoerror');
    } 
    else {
    showSuccess(phone,'','phnoerror');
    }
     //Bank A/C no
     if (bankacno.value.length==0)
     {
     showError(bankacno, 'Please enter valid Account Number','bankerror');
     } 
     else {
     showSuccess(bankacno,'','bankerror');
     }
     //Confirm Bank A/C no
     if(confirmBankac.value != bankacno.value)
{
    showError(confirmBankac, 'Value does not match','cbankerror');
} 
else {
showSuccess(confirmBankac,'','cbankerror');
}  
 });

 //ajax post submit

 $(() => {
    // function will get executed 
    // on click of submit button
    $("#submit").click(function(e) {
        var form1 = $("#form");
        var url = form1.attr('action');
        $.ajax({
            type: "POST",
            url: '',
            data: form1.serialize(),
            success: function(data) {
                console.log(data);
                  
                // Ajax call completed successfully
                alert("Form Submited Successfully");
            },
            error: function(data) {
                  
                // Some error in ajax call
                alert("some Error");
            }
        });
    });
});