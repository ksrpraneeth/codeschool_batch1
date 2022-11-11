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

    // Initializing the files
    window.filesUploaded = [];
    window.validateData = new FormData();

	// Getting hoa's
	getHoaFromApi()
	getExpenditureTypes()

	// Error Types and respective containers and input id's
	window.errorTypes = {
		"partyAccNum": {"container": "partyAccNumErrors", "inputId": "partyAccNum"},
		"conPartyAccNum": {"container": "conPartyAccNumErrors", "inputId": "conPartyAccNum"},
		"partyName": {"container":"partyNameErrors", "inputId": "partyName"},
		"ifscErrorDiv": {"container":"ifscErrorDiv", "inputId": "IFSCCode"},
		"headOfAccount": {"container": "headOfAccountErrors", "inputId": "headOfAccount"},
		"expenditureType": {"container": "expenditureTypeErrors", "inputId": "expenditureType"},
		"purposeType": {"container": "purposeTypeErrors", "inputId": "purposeType"},
		"purpose": {"container":"purposeErrors", "inputId": "purpose"},
		"partyAmount": {"container":"partyAmountErrors", "inputId": "partyAmount"},
		"mainErrors": {"container": "errors"},
		"notFoundErrors": {"container":"errors"}
	}
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
function toggleSidebar() {
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

// Function numberToEnglish()
// Description: Changes number to English letters
// Parameters: {p}
function numberToEnglish(price) {
    var sglDigit = [
            "Zero",
            "One",
            "Two",
            "Three",
            "Four",
            "Five",
            "Six",
            "Seven",
            "Eight",
            "Nine",
        ],
        dblDigit = [
            "Ten",
            "Eleven",
            "Twelve",
            "Thirteen",
            "Fourteen",
            "Fifteen",
            "Sixteen",
            "Seventeen",
            "Eighteen",
            "Nineteen",
        ],
        tensPlace = [
            "",
            "Ten",
            "Twenty",
            "Thirty",
            "Forty",
            "Fifty",
            "Sixty",
            "Seventy",
            "Eighty",
            "Ninety",
        ],
        handle_tens = function (dgt, prevDgt) {
            return 0 == dgt
                ? ""
                : " " + (1 == dgt ? dblDigit[prevDgt] : tensPlace[dgt]);
        },
        handle_utlc = function (dgt, nxtDgt, denom) {
            return (
                (0 != dgt && 1 != nxtDgt ? " " + sglDigit[dgt] : "") +
                (0 != nxtDgt || dgt > 0 ? " " + denom : "")
            );
        };

    var str = "",
        digitIdx = 0,
        digit = 0,
        nxtDigit = 0,
        words = [];
    if (((price += ""), isNaN(parseInt(price)))) str = "";
    else if (parseInt(price) > 0 && price.length <= 10) {
        for (digitIdx = price.length - 1; digitIdx >= 0; digitIdx--)
            switch (
                ((digit = price[digitIdx] - 0),
                (nxtDigit = digitIdx > 0 ? price[digitIdx - 1] - 0 : 0),
                price.length - digitIdx - 1)
            ) {
                case 0:
                    words.push(handle_utlc(digit, nxtDigit, ""));
                    break;
                case 1:
                    words.push(handle_tens(digit, price[digitIdx + 1]));
                    break;
                case 2:
                    words.push(
                        0 != digit
                            ? " " +
                                  sglDigit[digit] +
                                  " Hundred" +
                                  (0 != price[digitIdx + 1] &&
                                  0 != price[digitIdx + 2]
                                      ? " and"
                                      : "")
                            : ""
                    );
                    break;
                case 3:
                    words.push(handle_utlc(digit, nxtDigit, "Thousand"));
                    break;
                case 4:
                    words.push(handle_tens(digit, price[digitIdx + 1]));
                    break;
                case 5:
                    words.push(handle_utlc(digit, nxtDigit, "Lakh"));
                    break;
                case 6:
                    words.push(handle_tens(digit, price[digitIdx + 1]));
                    break;
                case 7:
                    words.push(handle_utlc(digit, nxtDigit, "Crore"));
                    break;
                case 8:
                    words.push(handle_tens(digit, price[digitIdx + 1]));
                    break;
                case 9:
                    words.push(
                        0 != digit
                            ? " " +
                                  sglDigit[digit] +
                                  " Hundred" +
                                  (0 != price[digitIdx + 1] ||
                                  0 != price[digitIdx + 2]
                                      ? " and"
                                      : " Crore")
                            : ""
                    );
            }
        str = words.reverse().join("");
    } else str = "";
    return str;
}

// Function: validateForm
// Description: Validating form
// Parameters: { event: form event }
function validateForm(event) {
    // Preventing form submission
    event.preventDefault();

    // Hiding errors at start
    $("#ifscErrorDiv").text("")
	hideAllErrors()

    // Getting form data
    var partyAccNum = document.getElementById("partyAccNum").value;
    var conPartyAccNum = document.getElementById("conPartyAccNum").value;
    var partyName = document.getElementById("partyName").value;
    var IFSCCode = document.getElementById("IFSCCode").value;
    var bankName = document.getElementById("bankName").innerHTML;
    var bankBranch = document.getElementById("bankBranch").innerHTML;
    var headOfAccount = document.getElementById("headOfAccount").value;
    var balance = document.getElementById("balance").innerHTML;
    var loc = document.getElementById("loc").innerHTML;
    var expenditureType = document.getElementById("expenditureType").value;
    var purposeType = document.getElementById("purposeType").value;
    var purpose = document.getElementById("purpose").value;
    var partyAmount = document.getElementById("partyAmount").value;

    var formData = {
        partyAccNum,
        conPartyAccNum,
        partyName,
        IFSCCode,
        headOfAccount,
        expenditureType,
		purposeType,
        purpose,
        partyAmount,
    };
    for (data in formData) {
        window.validateData.append(data, formData[data]);
    }
    $.ajax({
        url: "./api/validate.php",
        type: "POST",
        data: window.validateData,
        processData: false,
        contentType: false,
        enctype: "multipart/form-data",
        success: function (res) {
            res = JSON.parse(res);
            if (res.status == true) {
                alert(res.message);
            } else {
                let errors = res.data;

				showErrors(errors)
            }
        },
    });
}

// Function: showErrors()
// Description: This function is called when to show errors
// Parameters: {errors: array of errors}
function showErrors(errors){
	var errorTypes = window.errorTypes;
	// Making every error containers empty
	$(".errorsDiv").each(function(){
		$(this).html("")
	})

	// Making input normal
	$(".is-invalid").each(function(){
		$(this).removeClass("is-invalid")
	})

	// Going through array of errors
	for(var errorsTypeFromErrors in errors){

		// Getting errors of error type
		errors[errorsTypeFromErrors].forEach((error) => {

			// Append errors in containers
			$("#" + errorTypes[errorsTypeFromErrors].container).append(`<span class="alert alert-danger m-0">-> ${error}</span>`);

			// Checking if inputid exists
			if(errorTypes[errorsTypeFromErrors].inputId){

				// Showing error layout to input's
				$("#" + errorTypes[errorsTypeFromErrors].inputId).addClass("is-invalid")
			}
		})
	}

	// Scrolling to main error container
	$('html, body').animate({
        scrollTop: $("#errors").offset().top
    }, 0);

}

// Function: hideAllErrors()
// Description: This function is called when to hide errors
// Parameters: {none}
function hideAllErrors(){
	// Removing all errors from all containers
	$(".errorsDiv").each(function(){
		$(this).html("")
	})

	// Making input normal
	$(".is-invalid").each(function(){
		$(this).removeClass("is-invalid")
	})
}

// Function: hideError()
// Description: Hiding error and if has input
// Parameters: {inputid: elementID, container: container ID}
function hideError(inputId, container){
    $("#" + container).html("")
    $("#" + inputId).removeClass("is-invalid");
}

// Function: headOfAccountChanged
// Description: Get's data from selected head of account
// Parameters: { event: event, element: select element }
function headOfAccountChanged(event, element) {
    $.ajax({
		url: "./api/getHoaDetails.php",
		method: "POST",
		data: {id: element.value},
		success: (data) => {
			data = JSON.parse(data);
			if(data.status == true){
				$("#balance").text(data.data.balance)
				$("#loc").text(data.data.loc)
			}
		}
	})
}

// Function: expenditureTypeChanged
// Description: Expenditure type changed
// Parameters: { selected: string }
function expenditureTypeChanged(selected) {
    $.ajax({
		url: "./api/getPurposeTypes.php",
		method: "POST",
		data: {"id": selected},
		success: function(data){
			// JSON parse Data
			data = JSON.parse(data);

			// Making select empty options
			$("#purposeType").html("<option value='' class='d-none'>Select</option>")

			// Looping through purpose types
			data.data.forEach((purposeType, index) => {
				$("#purposeType").append(`<option value="${index}">${purposeType}</option>`)
			})
		}
	})
}

// Function: ifscCodeChanged()
// Description: IFSC Code Changed
// Parameters: { ifsc: string }
function ifscCodeChanged() {
    // Variables
    var IFSCCode = $("#IFSCCode").val();
    var bankName = document.getElementById("bankName");
    var bankBranch = document.getElementById("bankBranch");
    bankName.innerHTML = "";
    bankBranch.innerHTML = "";

    // IFSC Code checking and updating bank name and branch
    $.post(
        "./api/getIfscCode.php",
        { ifscCode: IFSCCode },
        (data, status) => {
            // Hiding error
            $("#ifscErrorDiv").text("")

            data = JSON.parse(data);
            if (data.status == true) {
                bankName.innerHTML = data.bankDetails.name;
                bankBranch.innerHTML = data.bankDetails.branch;
            } else {
                if(data.error){
                    $("#ifscErrorDiv").text(data.error);
                }
            }
        }
    );
}

// Function: addFiles()
// Description: Adds files to the list of files
// Parameters: None
function addFiles() {
    // Element initilization
    var upload = document.getElementById("upload");

    // Get file
    var files = upload.files;
    for (var i = 0; i < files.length; i++) {
        const found = window.filesUploaded.some(
            (el) => el.name == files[i].name
        );
        if (found) {
            alert("Files already added!");
            return;
        }
    }
    for (var i = 0; i < files.length; i++) {
        window.validateData.append("file[]", files[i]);
        window.filesUploaded[window.filesUploaded.length] = files[i];
        // Rendering files
    }
    upload.value = "";
    renderFiles();
}

// Function: renderFiles()
// Description: Rendering the file list from uploaded documents
// Parameters: None
function renderFiles() {
    // Element initilization
    var filesList = document.getElementById("filesList");

    // Making empty list
    filesList.innerHTML = ``;

    // Looping throug files list
    var files = window.filesUploaded;
    if (files.length == 0) {
        return;
    }
    for (var i = 0; i < files.length; i++) {
        filesList.innerHTML += `<li class="list-group-item d-flex justify-content-between w-100"><p title='${files[i].name}'>${files[i].name}</p> <span onclick='removeFile("${i}")' class='text-danger'>x</span></li>`;
    }
}

// Function: removeFile()
// Description: Removing the file list from uploaded documents
// Parameters: { index: number }
function removeFile(index) {
    window.filesUploaded.splice(index, 1);

    // Rendering the file list
    renderFiles();
}

// Function: getHoaFromApi()
// Description: Gettig hoa list from api
// Parameters: None
function getHoaFromApi(){

	// Ajax call
	$.ajax({
		url: "./api/getHoa.php",
		method: "GET",
		success: (data) => {
			data = JSON.parse(data);
			data.data.forEach((hoa) => {

				// appending options to select
				$("#headOfAccount").append(`<option value='${hoa.id}'>${hoa.hoa}</option>`)
			})
		},
		error: (xhr, status, err) => {
			console.log(err)
		}
	})
}


// Function: getExpenditureTypes()
// Description: Gettig Expenditure types list from api
// Parameters: None
function getExpenditureTypes(){
	// Ajax call
	$.ajax({
		url: "./api/getExpenditureType.php",
		method: "GET",
		success: (data) => {
			data = JSON.parse(data);
			if(data.status == true){
				data.data.forEach((expenditure) => {
					// appending options to select
					$("#expenditureType").append(`<option value='${expenditure.id}'>${expenditure.expenditure}</option>`)
				})
			} else {
				alert("Something went Wrong, Please try again!")
			}
		}
	})
}
