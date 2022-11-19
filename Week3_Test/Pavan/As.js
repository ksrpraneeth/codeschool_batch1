let firstname = document.getElementById("fName");
let lastname = document.getElementById("lName");
let username =document.getElementById("uName");
let password=document.getElementById("pswd");
let confirm=document.getElementById("confirm");
 
function validateform(){
    errorArray=[];
    validatefirstname(errorArray);
    validatelastname(errorArray);
    validateusername(errorArray);
    validatepassword(errorArray);
    validateconfirm(errorArray);
 
     errorArray.map(each => {
       error += each
     })
     document.getElementById("paragraph").innerHTML = errorArray;
     console.log(error);
     console.log(errorArray);
}
form.addEventListener('submit', function (e) {
  
    e.preventDefault();
    validateform()
  
    });
const validatefirstname=(errorArray) =>{
    if(firstname.value=="")
    {
        return errorArray.push("**Enter firstname");
    }
    elseif(firstname.value.length<=8 || firstname.value.length>12);
    {
        return errorArray.push("firstname should between 8 and 12");
    }

}
const validatelastname=(errorArray) =>{
    if(lastname.value=="")
    {
        return errorArray.push("**Enter lastname");
    }
    elseif(lastname.value.length<=8 || lastname.value.length>12);
    {
        return errorArray.push("lastname should between 8 and 12");
    }

}
const validateusername=(errorArray) =>{
    if(username.value=="")
    {
        return errorArray.push("**Enter username");
    }
    elseif(username.value==[A-Z0-9])
    {
        return errorArray.push("username should contain special character");
    }

}
const validatepassword=(errorArray) =>{
    if(password.value=="")
    {
        return errorArray.push("**Enter password");
    }
    elseif(password.value.length<8)
    {
        return errorArray.push("password should contain greater than 8 characters");
    }

}
const validateconfirm=(errorArray) =>{
    if(confirm.value=="")
    {
        return errorArray.push("**Enter confirm password");
    }
    if(confirm.value.length<8)
    {
        return errorArray.push("confirm password should contain greater than 8 characters");
    }
    else(password!=confirm)
    {
       return errorArray.push("password and confirm should be same");

    }

}



