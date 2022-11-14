//get Elements from html
const form = document.getElementById('form');
const fname = document.getElementById('fname');
const lname = document.getElementById('lname');
const email = document.getElementById('email');
const password = document.getElementById('password');
const cpassword = document.getElementById('cpassword');

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
//first name
if (fname.value.length<1 || fname.value.length>10) 
{
showError(fname, 'First name required','errorfname');
} 
else {
showSuccess(lname,'','errorfname');
}
//last name
if (lname.value.length<1 || lname.value.length>10) 
{
showError(lname, 'Last name required','errorlname');
} 
else {
showSuccess(lname,'','errorlname');
}
//password
if (password.value.length<8 || password.value.length>22) 
{
showError(password, 'Minimun 8 characters and Maximum 22 characters','errorpw');
} 
else {
showSuccess(password,'','errorpw');
}
//confirm password
if(cpassword.value != password.value)
{
    showError(cpassword, 'Value does not match','errorcpwd');
} 
else {
showSuccess(cpassword,'','errorcpwd');
}  
//username
if (email.value.length<1 || email.value.length>10) 
{
showError(email, 'Username required','erroremail');
} 
else {
showSuccess(email,'','erroremail');
}

});
document.getElementById('showPassword').onclick = function() {
    if ( this.checked ) {
       document.getElementById('password').type = "text";
    } else {
       document.getElementById('password').type = "password";
    }
};