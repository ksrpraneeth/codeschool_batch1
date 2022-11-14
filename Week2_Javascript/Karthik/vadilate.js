window.onload = function () {
  var today = new Date();
  var month = today.toLocaleString("default", { month: "short" });
  var date = today.getDate() + "-" + month + "-" + today.getFullYear();
  var hours = today.getHours();
  var minutes = today.getMinutes();
  var ampm = hours >= 12 ? "pm" : "am";
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? "0" + minutes : minutes;
  var strTime = hours + ":" + minutes + " " + ampm;
  //var dateTime = date+' '+time;

  document.getElementById("displayDateTime").innerHTML =
    date + "<br>" + strTime;
};

function Dropdown() {
  var mylist = document.getElementById("drop");
  document.getElementById("drop").value =
    mylist.options[mylist.selectedIndex].text;
}

function login() {
  if (document.getElementById("log").innerHTML == "Logout") {
    document.getElementById("log").innerHTML = "Login";
    document.getElementById("log1").innerHTML = "Login";
  } else {
    document.getElementById("log").innerHTML = "Logout";
    document.getElementById("log1").innerHTML = "Logout";
  }
}

function nextvalid() {
  errors = [];
  if (
    document.getElementById("partyacno").value.length < 12 ||
    document.getElementById("partyacno").value.length > 22
  ) {
    errors.push("min 12 & Max 22 characters in party account number");
  }
  if (document.getElementById("partyacno").value == "") {
    errors.push("Party Account Number is empty");
  }

  if (document.getElementById("cpartyacno").value == "") {
    errors.push("confirm Party Account Number is empty");
  }
  if (
    document.getElementById("partyacno").value !=
    document.getElementById("cpartyacno").value
  ) {
    errors.push(
      "Confirm Party Account Number & Party account numer is not matching"
    );
  }
  if (document.getElementById("pname").value == "") {
    errors.push("Party Name is empty");
  }
  if (document.getElementById("ifsccode").value == "") {
    errors.push("Plase enter IFSC Code");
  }
  if (document.getElementById("ifsccode").value.length != 11) {
    errors.push("Plase enter total 11 Digits ");
  }
  if (document.getElementById("purpose").value == "") {
    errors.push("Please enter Purpose   ");
  }
  if (document.getElementById("partyamount").value == "") {
    errors.push("Party Account is empty");
  }
  var html = "";
  for (var i = 0; i < errors.length; i++) {
    html += "<li>" + errors[i] + "</li>";
  }
  document.getElementById("errorid").innerHTML = html;
}

function fill() {
  if (document.getElementById("hoa").value == "0853001020002000000NVN") {
    document.getElementById("balance").innerHTML = "1000000";
    document.getElementById("Loc").innerHTML = "5000";
  } else if (document.getElementById("hoa").value == "8342001170004001000NVN") {
    document.getElementById("balance").innerHTML = "1008340";
    document.getElementById("Loc").innerHTML = "4000";
  } else if (document.getElementById("hoa").value == "2071011170004320000NVN") {
    document.getElementById("balance").innerHTML = "14530000";
    document.getElementById("Loc").innerHTML = "78000";
  } else if (document.getElementById("hoa").value == "8342001170004002000NVN") {
    document.getElementById("balance").innerHTML = "1056400";
    document.getElementById("Loc").innerHTML = "34000";
  } else if (document.getElementById("hoa").value == "2204000030006300303NVN") {
    document.getElementById("balance").innerHTML = "123465400";
    document.getElementById("Loc").innerHTML = "5000";
  }
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

function side(addEventListener) {
  var hamburger = document.querySelector(".hamburger");
  hamburger.addEventListener("click", function () {
    document.querySelector("body").classList.toggle("active");
  });
}



function ifsccodeinput(){
  var ifsccode123 = document.getElementById("ifsccode")
  ifsccode123.value =ifsccode123.value.toUpperCase()
  if(ifsccode123.value.length ==11 && ifsccode123.value.charAt(4) == '0' && /^[a-zA-Z()]+$/.test(ifsccode123.value.slice(0,4)))
  {
              document.getElementById("bank_name").innerHTML="ICICI";
              document.getElementById("bank_branch").innerHTML="Shadnagar";            
  }
}

function blockSpecialChar(e) {
  var k;
  document.all ? (k = e.keyCode) : (k = e.which);
  return (
    (k > 64 && k < 91) ||
    (k > 96 && k < 123) ||
    k == 8 ||
    k == 32 ||
    (k >= 48 && k <= 57)
  );
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