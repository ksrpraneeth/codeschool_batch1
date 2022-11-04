(function ($, window, document) {
    $(async function () {
        console.log("DOM is Ready!");

        let date = new Date().toLocaleDateString("en-in", {
            day: "numeric",
            year: "numeric",
            month: "short",
        });
        let time = new Date().toLocaleString("en-US", {
            hour: "2-digit",
            minute: "2-digit",
        });
        // Updating last login date
        $("#lastLoginDate").text(date);

        // Updating last login time
        $("#lastLoginTime").text(time);

        // Updating current time and date
        setCurrentDate(date);
        setInterval(() => {
            setCurrentTime();
        }, 1000);

        getAndUpdateDetails();
    });
})(window.jQuery, window, document);
// Function: setCurrentDate
// Description: Sets the current date
// Parameters: date - string
function setCurrentDate(date) {
    $("#currentDate").text(date);
}

// Function: setCurrentTime
// Description: Sets the current time
// Parameters: time - string
function setCurrentTime() {
    let time = new Date().toLocaleString("en-US", {
        hour: "2-digit",
        minute: "2-digit",
        second: "2-digit",
    });
    $("#currentTime").text(time);
}

// Function: getAndUpdateDetails
// Description: Get and update the details of the values
// parameters: none
function getAndUpdateDetails() {
    showLoading();
    $.get("https://jquery-task.onrender.com", function (data, status) {
        $("#PAOCardValue").text(data.pao);
        $("#PDCardValue").text(data.pd);
        $("#PDLESSCardValue").text(data.pdless);
        $("#DTAADJCardValue").text(data.dataadj);
        $("#DTACASHCardValue").text(data.datacash);
        $("#DWAWORKSCardValue").text(data.dwa);
        $("#DWAESTCardValue").text(data.dwaest);
        $("#PRIORITYCardValue").text(data.priority);
        $("#SALARYCardValue").text(data.salary);
        $("#PENSIONSALARYCardValue").text(data.pensionsalary);
        hideLoading();
    });
}

// Hide loading screen
function hideLoading() {
    setInterval(() => {
        $("#loading").addClass("d-none");
    }, 1000);
}

// Show loading screen
function showLoading() {
    $("#loading").removeClass("d-none");
}
