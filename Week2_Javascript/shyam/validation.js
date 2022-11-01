function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

window.onload = function () {
  var today = new Date();
  var month = today.toLocaleString("default", { month: "short" });
  var date = today.getDate() + "-" + month + "-" + today.getFullYear();
  var hours = today.getHours();
  var minutes = today.getMinutes();
  var prepand = hours >= 12 ? " PM " : " AM ";
  hours = hours % 12;
  hours = hours ? hours : 12;
  minutes = minutes < 10 ? "0" + minutes : minutes;
  var strTime = hours + ":" + minutes + " " + prepand;

  document.getElementById("day").innerHTML = date + "<br>" + strTime;
};
function login() {
  if (document.getElementById("log").innerHTML == "Logout") {
    document.getElementById("log").innerHTML = "Login";
    document.getElementById("log1").innerHTML = "Login";
  } else {
    document.getElementById("log").innerHTML = "Logout";
    document.getElementById("log1").innerHTML = "Logout";
  }
  document.getElementById("log").innerHTML = history;
}

function validation(event) {
  var partyName = document.getElementById("pname").value;
  var IfscCode = document.getElementById("ifsc").value;
  var errorsText = document.getElementById("errorid");
  var errors = [];
  if (document.getElementById("pacnum").value == "") {
    errors.push("party account number is empty");
  }
  if (
    document.getElementById("pacnum").value.length < 12 &&
    document.getElementById("pacnum").value > 22
  ) {
    errors.push("Party Account Number mustbe morethan 12 and lessthan 22");
  }
  if (document.getElementById("cpac").value == "") {
    errors.push("Confirm Party Account Number is empty");
  }
  if (
    document.getElementById("pacnum").value !=
    document.getElementById("cpac").value
  ) {
    errors.push(
      "Party Account Number and Confirm Party Account Number is not matching"
    );
  }
  var format = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
  if (format.test(partyName)) {
    errors.push("Party Name doesn't contains special characters");
  }
  if (IfscCode.length != 11) {
    errors.push("IFSC Code Must be 11 character");
  }
  if (document.getElementById("ifsc").value == "") {
    errors.push(
      "In IFSC code The first four characters should be upper case alphabets"
    );
  }
  if ((document.getElementById("hoac").value = -1)) {
    errors.push("select head of account ");
  }
  if (document.getElementById("prp").value.length > 500) {
    errors.push("It should be within 500 characters");
  }

  errorsText.innerHTML = "";

  errors.forEach((element) => {
    errorsText.innerHTML += "* " + element + "<br />";
  });

  errorsText.classList.remove("d-none");
  errorsText.scrollIntoView();
}

function ifsccode(IfscCode) {
  var IfscCode = document.getElementById("ifsc");
  IfscCode.value = IfscCode.value.toUpperCase();
  if (
    IfscCode.value.length == 11 &&
    IfscCode.value.charAt(4) == "0" &&
    /^[a-zA-Z()]+$/.test(IfscCode.value.slice(0, 4))
  ) {
    document.getElementById("bankname").innerHTML = "CanaraBank";
    document.getElementById("bankbranch").innerHTML = "JMD";
  }
}

function hoa(event, element) {
  var balance =
    event.target.options[event.target.selectedIndex].dataset.balance;
  var loc = event.target.options[event.target.selectedIndex].dataset.loc;

  document.getElementById("balance").innerHTML = balance;
  document.getElementById("loc").innerHTML = loc;
}

function expenditureType(select) {
  switch (select) {
    case "1":
      document.getElementById("purpose").innerHTML =
        "<option>Maintain current levels of operation within the organization</option>" +
        "<option>Expenses to permit future expansion</option>";
      break;
    case "2":
      document.getElementById("purpose").innerHTML =
        "<option>Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services.</option>" +
        "<option>All expenses incurred by the firm to guarantee the smooth operation</option>";
      break;
    case "3":
      document.getElementById("purpose").innerHTML =
        "<option>Exorbitant Advertising Expenditures</option>" +
        "<option>Unprecedented Losses</option>";
      "<option>Development and Research Cost</option>";
      break;
  }
}

function addfiles() {
  let files = document.getElementById("uploadfiles").files;
  for (let i = 0; i < files.length; i++) {
    document.getElementById("fileslist").innerHTML += files[i].name;
  }
}

function sidebar1(){
  document.querySelector("body").classList.toggle("active");
}

