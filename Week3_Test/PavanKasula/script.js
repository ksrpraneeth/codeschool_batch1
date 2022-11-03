
function PasswordValidation() {
  if (document.getElementById("fisrtName").value == "") {
    document.getElementById("firstnameprojector").innerHTML =
      "*Fisrt Name is Empty";
  }
  if (document.getElementById("lastName").value == "") {
    document.getElementById("lastnameprojector").innerHTML =
      "*Last Name is Empty";
  }
  if (document.getElementById("phoneNumber").value == "") {
    document.getElementById("phonenumberprojector").innerHTML = "*phoneNumber is Empty";
  }
  if (document.getElementById("email").value == "") {
    document.getElementById("emailprojector").innerHTML = "*Email is Empty";
  }
  if (document.getElementById("lawfirm").value == "") {
    document.getElementById("lawfirmprojector").innerHTML ="*Law Firm is Empty";
  }
  if (document.getElementById("add").value == "") {
    document.getElementById("addprojector").innerHTML = "*address is Empty";
  }
  if (document.getElementById("zip").value == "") {
    document.getElementById("zipprojector").innerHTML =
      "*Zip number is Empty";
  }

}
 

//////////////////////////////////////////////////////////////////////////////////////////////


function ValidatePassword() {
  var rules = [
    {
      Pattern: "[A-Z]",
      Target: "UpperCase",
    },
    {
      Pattern: "[a-z]",
      Target: "LowerCase",
    },
    {
      Pattern: "[0-9]",
      Target: "Numbers",
    },
    {
      Pattern: "[!@@#$%^&*]",
      Target: "Symbols",
    },
  ];

  var password = $(this).val();

  $("#Length").removeClass(
    password.length > 6 ? "glyphicon-remove" : "glyphicon-ok"
  );
  $("#Length").addClass(
    password.length > 6 ? "glyphicon-ok" : "glyphicon-remove"
  );

  for (var i = 0; i < rules.length; i++) {
    $("#" + rules[i].Target).removeClass(
      new RegExp(rules[i].Pattern).test(password)
        ? "glyphicon-remove"
        : "glyphicon-ok"
    );
    $("#" + rules[i].Target).addClass(
      new RegExp(rules[i].Pattern).test(password)
        ? "glyphicon-ok"
        : "glyphicon-remove"
    );
  }
}

$(document).ready(function () {
  $("#NewPassword").on("keyup", ValidatePassword);
});

////////////////////////////////////////////////////////////////////////////

function registrationValid() { 
  if (document.getElementById("registraionselect").value == "1") {
    document.getElementById("RegistrationNumber").innerHTML = "+91";
  } else if (document.getElementById("registraionselect").value == "2") {
    document.getElementById("RegistrationNumber").innerHTML = "+1";
  } else if (document.getElementById("registraionselect").value == "3") {
    document.getElementById("RegistrationNumber").innerHTML = "+44  ";
  } else if (document.getElementById("registraionselect").value == "4") {
    document.getElementById("RegistrationNumber").innerHTML = "+7";
  } else if (document.getElementById("registraionselect").value == "5") {
    document.getElementById("RegistrationNumber").innerHTML = "+49";
  } else if (document.getElementById("registraionselect").value == "0") {
    document.getElementById("RegistrationNumber").innerHTML = " ";
  }

}
    
 