function myFunction() {
    var x = document.getElementById("myLinks");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

// let id = (id) => document.getElementById(id)
// let partyaccountnumber = id("partyaccountnumber"),
//     errorMsg = document.getElementById("error");
// errorMsg = ['error'];
// errorMsg[1].innerHTML = ""


// form.addEventListener('submit', function (e) {
//     // prevent the form from submitting
//     e.preventDefault();

// });
// function seterror(id, error){
//     element = getElementById(id);
//     element = getElementsByClassName('formerr')[0].innerHTML = error;
// }

// function validateForm(){
//     var returnval = true;
//     var partyaccountno = document.forms['myForm']["partyaccountnumber"].value;
//     return returnval;

//     if (partyaccountno.length<5) {
//         seterror("partyaccountno","length of name is short");
//         returnval = false;
//     }
// }

function toggleSidebar() {
    var menu = document.getElementById("menu");
    var body = document.getElementById("body");

    if (window.sidebarShowing == true) {
        sidebar.style.left = "-250px";
        body.style.left = "0px";
        body.style.width = "100%";
        window.sidebarShowing = false;
    } else {
        sidebar.style.left = "0px";
        body.style.left = "250px";
        body.style.width = "calc(100% - 250px)";
        window.sidebarShowing = true;
    }
}
function validateForm(event) {
    const errors = [];
    event.preventDefault();
    var errorsText = document.getElementById("errors");
    errorsText.classList.add("d-none");
    var partyAccNum = document.getElementById("partyAccNo").value;

    var conPartyAccNum = document.getElementById("conPartyAccNum").value;
    var partyName = document.getElementById("partyName").value;
    var IFSCCode = document.getElementById("IFSCCode").value;
    const bankName = document.getElementById("bankName").innerHTML;
    const bankBranch = document.getElementById("bankBranch").innerHTML;
    var headOfAccount = document.getElementById("headOfAccount").value;
    const balance = document.getElementById("balance").innerHTML;
    const loc = document.getElementById("loc").innerHTML;
    var expenditureType = document.getElementById("expenditureType").value;
    var purpose = document.getElementById("purpose").value;
    var partyAmount = document.getElementById("partyAmount").value;

    if (partyAccNum.length < 12 || partyAccNum.length > 22) {
        errors.push(
            "Party Account number must be between 12 and 22 characters long"
        );
    }
    // const usernameEl = document.querySelector('#partyAccNo');

// const form = document.querySelector(#signup)

// const partyAccountNumber = () => {
//     const min = 12;
//     const max = 24;

//     const accnumber = accnumberEI.value.trim();
//     if (!isRequired(accnumber)) {
//         showError(accnumber, 'Account Number cannot be empty')
//     } else if (!isBetween(accnumberEI, `Account number must be between ${min} and ${max} characters`)) {
//         else {
//         showSuccess(accnumberEI);
//         valid = true;
//     }
//     return valid;
// };
// }
    if (/^-?\d+$/.test(partyAccNum) == false) 
    {
        errors.push("Party Account number must be numbers");
    }

    if (partyAccNum != conPartyAccNum) 
    {
        errors.push("Party Account numbers should be same");
    }

    var format = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
    if (format.test(partyName)) 
    {
        errors.push("Party Name shouldn't have special characters");
    }
    if (partyName == "") 
    {
        errors.push("Party Name shouldn't be empty");
    }

    if (IFSCCode.length != 11) 
    {
        errors.push("IFSC Code should be 11 characters");
    }
    if (/^[a-zA-Z()]+$/.test(IFSCCode)) 
    {
        errors.push("IFSC Code first four letters should be alphabets");
    }
    if (IFSCCode.charAt(4) != "0") 
    {
        errors.push("IFSC Code should contain 0 at 5th character");
    }
    if (bankName == "XXXXX") 
    {
        errors.push("IFSC Code is Wrong");
    }

    if (headOfAccount == "-1") 
    {
        errors.push("Please select Head of Account!");
    }

    if (expenditureType == "-1") 
    {
        errors.push("Please select Expenditure Type!");
    }

    if (purpose.length > 500) 
    {
        errors.push("Purpose should be less than 500 characters");
    }
    if (purpose == "") 
    {
        errors.push("Purpose shouldn't be empty");
    }

    if (partyAmount == "") 
    {
        errors.push("Party Amount shouldn't be empty");
    }

    if (errors.length == 0) 
    {
        return;
    }
    errorsText.innerHTML = "";

    errors.forEach((element) => 
    {
        errorsText.innerHTML += "* " + element + "<br />";
    });

    errorsText.classList.remove("d-none");
    errorsText.scrollIntoView();
}

function partyAmountChanged(value) 
{
    if (value.length == "0") {
        document.getElementById("partyAmountInWords").innerHTML = "";
        return;
    }
    if (isFinite(value)) 
    {
        var text = numberToEnglish(value);
        if (text.slice(0, 3) == "and") {
            text = text.slice(3, text.length);
        }
        document.getElementById("partyAmountInWords").innerHTML = text + " Rs.";
    }
}

function headOfAccountChanged(event, element) {
    var balance =
        event.target.options[event.target.selectedIndex].dataset.balance;
    var loc = event.target.options[event.target.selectedIndex].dataset.loc;

    document.getElementById("balance").innerHTML = balance;
    document.getElementById("loc").innerHTML = loc;
}

function expenditureTypeChanged(selected) {
    switch (selected) {
        case "option1":
            document.getElementById("purposeType").innerHTML =
                "<option>Maintain current levels of operation within the organization</option>" +
                "<option>Expenses to permit future expansion</option>";
            break;
        case "option2":
            document.getElementById("purposeType").innerHTML =
                "<option>Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services.</option>" +
                "<option>All expenses incurred by the firm to guarantee the smooth operation</option>";
            break;
        case "option3":
            document.getElementById("purposeType").innerHTML =
                "<option>Exorbitant Advertising Expenditures</option>" +
                "<option>Unprecedented Losses</option>";
            "<option>Development and Research Cost</option>";
            break;
    }
}

function ifscCodeChanged(IFSCCode) {
    // Variables
    var bankName = document.getElementById("bankName");
    var bankBranch = document.getElementById("bankBranch");

    if (
        IFSCCode.length == 11 &&
        /^[a-zA-Z()]+$/.test(IFSCCode.slice(0, 4)) &&
        IFSCCode.charAt(4) == "0"
    ) {
        bankName.innerHTML = "State Bank Of India";
        bankBranch.innerHTML = "Hyderabad";
    } else {
        bankName.innerHTML = "XXXXX";
        bankBranch.innerHTML = "XXXXX";
    }
}

