window.onload = () => {
    sidebarShowing = true;
    mobileSidebarShowing = false;
    // Updating Date and time
    updateDate();
    updateTime();

    // Updating time for every second
    setInterval(updateTime, 1000);

    // Hiding Loading Image
    setTimeout(hideLoading, 0);
};

// Function: updateDate()
// Description: It updates Date in frontend last login section
// Parameters: None
function updateDate() {
    // Getting date from Date object
    var today = new Date();

    // Getting Date month and year
    var day = ("0" + today.getDate()).slice(-2);
    var month = today.toLocaleString("default", { month: "long" }).slice(0, 3);
    var year = today.getFullYear();

    // Adding Date Variables
    var displayDate = day + "-" + month + "-" + year;

    // Setting Date in html
    document.getElementById("currentDate").innerHTML = displayDate;
}

// Function: updateTime()
// Description: It updates Time in frontend last login section
// Parameters: None
function updateTime() {
    // Getting date from Date object
    var today = new Date();

    // Getting Hours, minutes and ampm
    var hours = ("0" + today.getHours()).slice(-2);
    var minutes = ("0" + today.getMinutes()).slice(-2);
    var ampm = hours >= 12 ? " PM" : " AM";

    hours = hours % 12;
    hours = hours ? hours : 12;

    // Adding Date Variables
    var displayTime = hours + ":" + minutes + " " + ampm;

    // Setting Date in html
    document.getElementById("currentTime").innerHTML = displayTime;
}

// Function: hideLoading()
// Description: Hide loading
// Parameters: None
function hideLoading() {
    document.getElementById("loading").classList.add("d-none");
}

// Function: showLoading()
// Description: Show loading
// Parameters: None
function showLoading() {
    document.getElementById("loading").classList.remove("d-none");
}

// Function: toggleSidebar()
// Description: Toggle sidebar /hide, show
// Parameters: None
function toggleSidebar() 
{
    // Getting sidebar and body
    var sidebar = document.getElementById("sidebar");
    var body = document.getElementById("body");

    // Checking if sidebar is not hiding
    if (window.sidebarShowing == true) {

        // hiding it
        sidebar.style.left = "-250px";
        body.style.left = "0px";
        body.style.width = "100%";
        window.sidebarShowing = false;

    } else {
        // show it
        sidebar.style.left = "0px";
        body.style.left = "250px";
        body.style.width = "calc(100% - 250px)";
        window.sidebarShowing = true;
    }
}

// Function: toggleMobileSidebar()
// Description: mobile Toggle sidebar /hide, show
// Parameters: None
function toggleMobileSidebar() {

    // Getting sidebar and bg element refernce
    var sidebarElement = document.getElementById("sidebar");
    var bg = document.getElementById("mobileSidebarBg");
    var body = document.getElementById("body");

    // Checking if sidebar is shown
    if (window.mobileSidebarShowing == true) {
        // Hiding
        sidebarElement.style.setProperty("left", "-250px", "important");
        bg.classList.add("d-none");
        body.style.setProperty("width", "100%", "important");
        body.style.setProperty("left", "0px", "important");
        window.mobileSidebarShowing = false;
        window.sidebarShowing = false;
    } else {
        // Showing
        sidebarElement.style.setProperty("left", "0px", "important");
        console.log(sidebar.style.left);
        bg.classList.remove("d-none");
        window.mobileSidebarShowing = true;
        window.sidebarShowing = true;
    }
}

// Function: logout()
// Description: Logging out and in
// Parameters: None
function logout() {
    // Getting wanted elements
    var text = document.getElementById("logoutButtonText");
    var text2 = document.getElementById("logoutButtonText2");

    // Checking if button text is logout
    if (text.innerHTML == "Logout") {
        showLoading();
        setTimeout(hideLoading, 2000);

        // chaning it to login!
        text.innerHTML = "Login";
        text2.innerHTML = "Login";
    } else {
        showLoading();
        setTimeout(hideLoading, 2000);

        // chaning it to login!
        text.innerHTML = "Logout";
        text2.innerHTML = "Logout";
    }
}

// Function: partyAmountChanged
// Description: Party Amount input changed, make it to words
// Parameters: { value: number }
function partyAmountChanged(value) {

    // checking if value lengt is 0
    if (value.length == "0") {
        
        // making party amount in words empty
        document.getElementById("partyAmountInWords").innerHTML = "";
        return;
    }
    if (isFinite(value)) {

        // updating party amount in words
        var text = numberToEnglish(value);
        if (text.slice(0, 3) == "and") {
            text = text.slice(3, text.length);
        }
        document.getElementById("partyAmountInWords").innerHTML = text + " Rs.";
    }
}

// Function: numberToEnglish
// Description: Changes Number to Words
// Parameters: { n: number }
// Reference: https://stackoverflow.com/questions/14766951/transform-numbers-to-words-in-lakh-crore-system#:~:text=%2F%2F%20numToWords%20%3A%3A%20(Number%20a,'thirty'%2C%20'forty'
function numberToEnglish(n) {
    var string = n.toString(),
        units,
        tens,
        scales,
        start,
        end,
        chunks,
        chunksLen,
        chunk,
        ints,
        i,
        word,
        words,
        and = "and";

    /* Remove spaces and commas */
    string = string.replace(/[, ]/g, "");

    /* Is number zero? */
    if (parseInt(string) === 0) {
        return "zero";
    }

    /* Array of units as words */
    units = [
        "",
        "one",
        "two",
        "three",
        "four",
        "five",
        "six",
        "seven",
        "eight",
        "nine",
        "ten",
        "eleven",
        "twelve",
        "thirteen",
        "fourteen",
        "fifteen",
        "sixteen",
        "seventeen",
        "eighteen",
        "nineteen",
    ];

    /* Array of tens as words */
    tens = [
        "",
        "",
        "twenty",
        "thirty",
        "forty",
        "fifty",
        "sixty",
        "seventy",
        "eighty",
        "ninety",
    ];

    /* Array of scales as words */
    scales = [
        "",
        "thousand",
        "million",
        "billion",
        "trillion",
        "quadrillion",
        "quintillion",
        "sextillion",
        "septillion",
        "octillion",
        "nonillion",
        "decillion",
        "undecillion",
        "duodecillion",
        "tredecillion",
        "quatttuor-decillion",
        "quindecillion",
        "sexdecillion",
        "septen-decillion",
        "octodecillion",
        "novemdecillion",
        "vigintillion",
        "centillion",
    ];

    /* Split user argument into 3 digit chunks from right to left */
    start = string.length;
    chunks = [];
    while (start > 0) {
        end = start;
        chunks.push(string.slice((start = Math.max(0, start - 3)), end));
    }

    /* Check if function has enough scale words to be able to stringify the user argument */
    chunksLen = chunks.length;
    if (chunksLen > scales.length) {
        return "";
    }

    /* Stringify each integer in each chunk */
    words = [];
    for (i = 0; i < chunksLen; i++) {
        chunk = parseInt(chunks[i]);

        if (chunk) {
            /* Split chunk into array of individual integers */
            ints = chunks[i].split("").reverse().map(parseFloat);

            /* If tens integer is 1, i.e. 10, then add 10 to units integer */
            if (ints[1] === 1) {
                ints[0] += 10;
            }

            /* Add scale word if chunk is not zero and array item exists */
            if ((word = scales[i])) {
                words.push(word);
            }

            /* Add unit word if array item exists */
            if ((word = units[ints[0]])) {
                words.push(word);
            }

            /* Add tens word if array item exists */
            if ((word = tens[ints[1]])) {
                words.push(word);
            }

            /* Add 'and' string after units or tens integer if: */
            if (ints[0] || ints[1]) {
                /* Chunk has a hundreds integer or chunk is the first of multiple chunks */
                if (ints[2] || (!i && chunksLen)) {
                    words.push(and);
                }
            }

            /* Add hundreds word if array item exists */
            if ((word = units[ints[2]])) {
                words.push(word + " hundred");
            }
        }
    }

    return words.reverse().join(" ");
}

// Function: validateForm
// Description: Validating form
// Parameters: { event: form event }
function validateForm(event) {
    // Initialize the errors
    var errors = []

    // Preventing form submission
    event.preventDefault();
    
    // Getting errors alert refernece
    var errorsText = document.getElementById("errors");

    // Hiding errors at start
    errorsText.classList.add("d-none")


    // Getting form data
    var partyAccNum = document.getElementById("partyAccNo").value;
    var conPartyAccNum = document.getElementById("conPartyAccNum").value;
    var partyName = document.getElementById("partyName").value;
    var IFSCCode = document.getElementById("IFSCCode").value;
    var bankName = document.getElementById("bankName").innerHTML;
    var bankBranch = document.getElementById("bankBranch").innerHTML;
    var headOfAccount = document.getElementById("headOfAccount").value;
    var balance = document.getElementById("balance").innerHTML;
    var loc = document.getElementById("loc").innerHTML;
    var expenditureType = document.getElementById("expenditureType").value;
    var purpose = document.getElementById("purpose").value;
    var partyAmount = document.getElementById("partyAmount").value;

    // Party Account Number Validation
    if(partyAccNum.length < 12 || partyAccNum.length > 22){
        errors.push("Party Account number must be between 12 and 22")
    }

    // Confirm Party Account Number Validation
    if(partyAccNum != conPartyAccNum){
        errors.push("Party Account numbers should be same")
    }

    // Party Name Validation
    var format = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
    if(format.test(partyName)){
        errors.push("Party Name shouldn't have special characters")
    }
    if(partyName == ""){
        errors.push("Party Name shouldn't be empty")
    }

    // IFSC Code Validation
    if(IFSCCode.length != 11){
        errors.push("IFSC Code should be 11 characters")
    }
    if(/^[a-zA-Z()]+$/.test(IFSCCode) ){
        errors.push("IFSC Code first four letters should be alphabets")
    }
    if(IFSCCode.charAt(4) != '0'){
        errors.push("IFSC Code should contain 0 at 5th character")
    }
    if(bankName == "XXXXX"){
        errors.push("IFSC Code is Wrong")
    }

    // Head of account
    if(headOfAccount == "-1"){
        errors.push("Please select Head of Account!")
    }

    // Expenditure Type
    if(expenditureType == "-1"){
        errors.push("Please select Expenditure Type!")
    }

    // Purpose Validation
    if(purpose.length > 500){
        errors.push("Purpose should be less than 500 characters")
    }
    if(purpose == ""){
        errors.push("Purpose shouldn't be empty")
    }

    // Party Amount
    if(partyAmount == ""){
        errors.push("Party Amount shouldn't be empty")
    }

    if(errors.length == 0){
        return;
    }
    errorsText.innerHTML = ""

    errors.forEach(element => {
        errorsText.innerHTML += "* " + element + "<br />"
    });

    errorsText.classList.remove("d-none")
    errorsText.scrollIntoView();
}

// Function: headOfAccountChanged
// Description: Get's data from selected head of account
// Parameters: { event: event, element: select element }
function headOfAccountChanged(event, element) {
    // Gettting details from
    var balance =
        event.target.options[event.target.selectedIndex].dataset.balance;
    var loc = event.target.options[event.target.selectedIndex].dataset.loc;

    // Setting balance and loc
    document.getElementById("balance").innerHTML = balance;
    document.getElementById("loc").innerHTML = loc;
}

// Function: expenditureTypeChanged
// Description: Expenditure type changed
// Parameters: { selected: string }
function expenditureTypeChanged(selected) {
    switch (selected) {
        case "opt1":
            document.getElementById("purposeType").innerHTML =
                "<option>Maintain current levels of operation within the organization</option>" +
                "<option>Expenses to permit future expansion</option>";
            break;
        case "opt2":
            document.getElementById("purposeType").innerHTML =
                "<option>Sales costs or All expenses incurred by the firm that are directly tied to the manufacture and selling of its goods or services.</option>" +
                "<option>All expenses incurred by the firm to guarantee the smooth operation</option>";
            break;
        case "opt3":
            document.getElementById("purposeType").innerHTML =
                "<option>Exorbitant Advertising Expenditures</option>" +
                "<option>Unprecedented Losses</option>";
            "<option>Development and Research Cost</option>";
            break;
    }
}

// Function: ifscCodeChanged()
// Description: IFSC Code Changed
// Parameters: { ifsc: string }
function ifscCodeChanged(ifsc) {
    // Variables
    var bankName = document.getElementById("bankName");
    var bankBranch = document.getElementById("bankBranch");

    // IFSC Code checking and updating bank name and branch
    switch (ifsc.slice(0, 3)) {
        case "SBI":
            bankName.innerHTML = "State Bank of India";
            bankBranch.innerHTML = "Hyderabad";
            break;
        case "IOB":
            bankName.innerHTML = "Indian Overseas Bank";
            bankBranch.innerHTML = "Hyderabad";
            break;
        case "PNB":
            bankName.innerHTML = "Indian Overseas Bank";
            bankBranch.innerHTML = "Hyderabad";
            break;
        case "ICI":
            bankName.innerHTML = "ICICI";
            bankBranch.innerHTML = "Hyderabad";
            break;
        default:
            bankName.innerHTML = "XXXXX";
            bankBranch.innerHTML = "XXXXX";

    }
}
