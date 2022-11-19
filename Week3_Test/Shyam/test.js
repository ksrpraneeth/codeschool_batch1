function validation(event){
    var errors = [];
    if (document.getElementById("firstname").value == "") {
        errors.push("FirstName is empty");
    }
    if (document.getElementById("lastname").value == "") {
        errors.push("LastName is empty");
    }
    if (document.getElementById("username").value == "") {
        errors.push("UserName is empty");
    }
    if (document.getElementById("password").value == "") {
        errors.push("UserName is empty");
    }
    if (document.getElementById("password").value != document.getElementById("password1").value) {
        errors.push("Password is Mismatching");
    }        

}