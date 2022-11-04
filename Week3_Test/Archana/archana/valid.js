//style="background-image:url('https://png.pngtree.com/background/20210715/original/pngtree-topographic-line-line-background-on-white-picture-image_1298652.jpg')"

function validate(){
    if(document.getElementById("FirstName").value.length==0)
    {
        document.getElementById("p1").innerHTML="Enter first Name"
    }
    if(document.getElementById("LastName").value.length==0)
    {
        document.getElementById("p2").innerHTML="Enter Last Name"
    }
    if(document.getElementById("EMail").value.length==0)
    {
        document.getElementById("p3").innerHTML="Enter Email"
    } if(document.getElementById("PhoneNo").value.length==0)
    {
        document.getElementById("p4").innerHTML="Enter Phone Number"
    }
    if(document.getElementById("Registered Number").value.length==0)
    {
        document.getElementById("p5").innerHTML="Enter Registered Number"
    }
    if(document.getElementById("LawFirm").value.length==0)
    {
        document.getElementById("p").innerHTML="Enter Law Firm"
    }
    if(document.getElementById("Address").value.length==0)
    {
        document.getElementById("p6").innerHTML="Enter address"
    }
    if(document.getElementById("Zip").value.length==0)
    {
        document.getElementById("p7").innerHTML="Enter ZIPCODE"
    }
    if(document.getElementById("Password").value.length <6 )
    {
        document.getElementById("p8").innerHTML="Password should contain min 6 characters"
    }
    if(document.getElementById("ConfirmPassword").value.length<6)
    {
        document.getElementById("p9").innerHTML="Confirm Password should contain min 6 characters"
    }
    else if(document.getElementById("Password").value!=document.getElementById("ConfirmPassword").value)
    {
        document.getElementById("p10").innerHTML="Password and Confirm Password should be same"
    }
}

function onlyNumberKey(evt) {
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}
var myInput = document.getElementById("Password");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");


myInput.onfocus = function(){
  document.getElementById("message").style.display = "block";
}


myInput.onblur = function(){
  document.getElementById("message").style.display = "none";
}

  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 6) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }