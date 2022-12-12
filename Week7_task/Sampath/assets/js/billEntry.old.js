$("document").ready(() => {
    onload();
    $("#empCodeInput").on("keypress", function (e) {
        if (e.which == 13) {
            window.empSearchFilterClass.setEmpCode(e.target.value);
        }
    });

    $("#empBankAcNo").on("keypress", function (e) {
        if (e.which == 13) {
            window.empSearchFilterClass.setBankAcNo(e.target.value);
        }
    });
});

function ajaxCall(url, type, data) {
    return new Promise((resolve, reject) => {
        $.ajax({
            url,
            type,
            data,
            success: (response) => {
                response = JSON.parse(response);
                resolve(response);
            },
            error: () => reject(""),
        });
    });
}

async function submitBill() {
    let bills = window.SupplementaryBillClass.getBills();
    showLoading();
    await ajaxCall("/api/submitBill.php", "POST", {
        bills: JSON.stringify(bills),
        totalEarnings: window.SupplementaryBillClass.totalEarnings,
        totalDeductions: window.SupplementaryBillClass.totalDeductions,
    }).then((response) => {
        if (response.status == true) {
            alert("Inserted Successfully");
            window.location.reload();
        } else {
            alert("Please check....");
        }
    });
    hideLoading();
}

function onload() {
    window.CurrentEmployeeBillDetails = {
        empId: "",
        empName: "",
        empCode: "",
        earnings: [],
        deductions: [],
        month: "",
        year: "",
        earningsTotal: 0,
        deductionsTotal: 0,
    };

    window.BillClass = class BillClass {
        constructor({
            empId,
            empName,
            empCode,
            earnings,
            deductions,
            month,
            year,
            earningsTotal,
            deductionsTotal,
        }) {
            this.empId = empId;
            this.empName = empName;
            this.empCode = empCode;
            this.earnings = earnings;
            this.deductions = deductions;
            this.month = month;
            this.year = year;
            this.earningsTotal = earningsTotal;
            this.deductionsTotal = deductionsTotal;
            this.total = parseInt(earningsTotal) - parseInt(deductionsTotal);
        }
    };

    window.SupplementaryBillClass = new (class SupplementaryBillClass {
        constructor() {
            this.sBills = [];
            this.totalEarnings = 0;
            this.totalDeductions = 0;
        }

        addBill(bill) {
            this.sBills.push(bill);
            this.renderSBills();
            this.totalEarnings += bill.earningsTotal;
            this.totalDeductions += bill.deductionsTotal;
        }

        getBill(index) {
            return this.sBills[index];
        }

        getBills() {
            return this.sBills;
        }

        deleteBill(index) {
            if (confirm("Are you sure to delete the bill")) {
                this.totalEarnings -= this.sBills[index].earningsTotal;
                this.totalDeductions -= this.sBills[index].deductionsTotal;
                this.sBills.splice(parseInt(index), 1);
                this.renderSBills();
            } else {
                return false;
            }
        }

        renderSBills() {
            // Empty Table first
            $("#sBillTableBody").html("");
            if (this.sBills.length == 0) {
                $("#sBillTable").addClass("d-none");
                return;
            }
            $("#sBillTable").removeClass("d-none");
            // appending the data
            this.sBills.forEach((sBill, index) => {
                $("#sBillTableBody").append(`
                    <tr>
                        <td>${sBill.empCode}</td>
                        <td>${sBill.empName}</td>
                        <td>${sBill.month}</td>
                        <td>${sBill.year}</td>
                        <td>${sBill.earningsTotal}</td>
                        <td>${sBill.deductionsTotal}</td>
                        <td>${sBill.total}</td>
                        <td class="d-flex gap-2">
                            <button onclick="window.SupplementaryBillClass.deleteBill(${index})" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                            <button onclick="window.SupplementaryBillClass.viewBill(${index})" class="btn btn-primary"><i class="bi bi-eye"></i></button>
                        </td>
                    </tr>
                `);
            });
        }

        viewBill(index) {
            new window.renderEarningModalClass(
                this.sBills[index].earnings,
                this.sBills[index].deductions,
                this.sBills[index].earningsTotal,
                this.sBills[index].deductionsTotal
            ).view();
        }
    })();

    window.renderEarningModalClass = class RenderEarningModal {
        constructor(earnings, deductions, earningsTotal, deductionsTotal) {
            this.earnings = earnings;
            this.deductions = deductions;
            this.earningsTotal = parseInt(earningsTotal);
            this.deductionsTotal = parseInt(deductionsTotal);
        }
        view() {
            $("#viewEmployeeBillModal").modal("toggle");
            $("#viewEarningsData").html("");
            this.earnings.forEach((earning) => {
                $("#viewEarningsData").append(`
                    <tr>
                        <td>${earning.text}</td>
                        <td>${earning.amount} Rs./</td>
                    </tr>
                `);
            });

            $("#viewDeductionsData").html("");
            this.deductions.forEach((deduction) => {
                $("#viewDeductionsData").append(`
                    <tr>
                        <td>${deduction.text}</td>
                        <td>${deduction.amount} Rs./</td>
                    </tr>
                `);
            });

            $("#totalViewDeductions").text(this.deductionsTotal);
            $("#totalViewEarnings").text(this.earningsTotal);
        }
    };

    window.empSearchFilterClass = new (class EmpSearchFilter {
        constructor() {
            this.filterTypes = {
                billId: "billIDSelectDiv",
                empCode: "empCodeDiv",
                bankAcNo: "bankAcNoDiv",
            };
            this.currentFilter = "";
            this.billIds = [];
            this.billIdsFetchedFromDatabase = false;
            this.currentBillId = null;

            // Elements
            this.employeeDiv = $("#employeeDiv");
            this.employeeInput = $("#employee");

            this.billIdDiv = $("#billIDSelectDiv");
            this.billIdInput = $("#billId");

            this.empCodeInput = $("#empCode");
        }

        setFilter(type) {
            if (this.currentFilter === type) {
                return false;
            }
            Object.values(this.filterTypes).forEach((filterDiv) => {
                $("#" + filterDiv).addClass("d-none");
            });
            if (type == "billId") {
                this.loadBillIds();
            }
            $("#" + this.filterTypes[type]).removeClass("d-none");
            this.billIdInput.val("");
            this.currentFilter = type;
        }

        async loadBillIds() {
            if (this.billIdsFetchedFromDatabase) {
                return;
            } else {
                showLoading();
                await ajaxCall("/api/getUserBillids.php", "POST", {}).then(
                    ({ status, message, data }) => {
                        if (data.length == 0) {
                            this.showError("No Bill ID's found");
                        } else {
                            this.billIdInput.html(`
                                <option value="" hidden>Select</option>
                            `);
                            data.forEach((billId) => {
                                this.billIdInput.append(`
                                    <option value="${billId.id}">${billId.name}</option>
                                `);
                            });
                            this.billIds = data;
                            this.billIdsFetchedFromDatabase = true;
                        }
                    }
                );
                hideLoading();
            }
        }

        setBillId(billId) {
            if (billId == null) {
                return;
            }
            this.currentBillId = billId;
            if (billId != "") {
                this.loadEmployees("billId");
            }
        }

        setEmpCode(empCode) {
            if (empCode == "") {
                this.showError("Please enter a employee code");
            } else {
                this.empCode = empCode;
                this.loadEmployees("empCode");
            }
        }

        setBankAcNo(empBankAcNo) {
            if (empBankAcNo == "") {
                this.showError("Please enter a Employee Bank Account Number");
            } else {
                this.empBankAcNo = empBankAcNo;
                this.loadEmployees("empBankAcNo");
            }
        }

        async loadEmployees(type) {
            let url = "";
            let data = {};
            switch (type) {
                case "billId":
                    url = "/api/getEmployeesByBillID.php";
                    data = { billId: this.currentBillId };
                    break;
                case "empCode":
                    url = "/api/getEmployeeByEmpCode.php";
                    data = { empCode: this.empCode };
                    break;
                case "empBankAcNo":
                    url = "/api/getEmployeeByBankAcNo.php";
                    data = { bankAcNo: this.empBankAcNo };
                    break;
            }

            if (url == "") {
                return;
            } else {
                showLoading();
                await ajaxCall(url, "POST", data).then(
                    ({ status, message, data }) => {
                        if (data.length == 0) {
                            this.showError("No Employees found!");
                            this.loadEmployeeOptions([]);
                            this.employeeDiv.addClass("d-none");
                            this.hideDetailsDiv();
                        } else {
                            this.loadEmployeeOptions(data);
                            this.employeeDiv.removeClass("d-none");
                            this.hideDetailsDiv();
                        }
                    }
                );
                hideLoading();
            }
            this.setEmployee();
        }

        loadEmployeeOptions(options) {
            this.employeeInput.html(`<option value="" hidden>Select</option>`);
            options.forEach((option) => {
                this.employeeInput.append(`
                    <option 
                        data-name="${option.name}" 
                        data-empCode="${option.emp_code}" 
                        value="${option.id}"
                    >
                        ${option.name} - ${option.emp_code}</option>
                `);
            });
        }

        setEmployee() {
            let element = $("#employee").find(":selected");
            if (element.val() == "") {
                $("#btnNext").prop("disabled", true);
                return;
            }
            let employeeDetails = {
                id: element.val(),
                name: element.data("name"),
                empCode: element.data("empcode"),
            };
            this.currentEmployee = employeeDetails;
            window.CurrentEmployeeBillDetails["empId"] = employeeDetails.id;
            window.CurrentEmployeeBillDetails["empName"] = employeeDetails.name;
            window.CurrentEmployeeBillDetails["empCode"] =
                employeeDetails.empCode;

            window.earningsClass.loadEarnings(employeeDetails.id);
            window.earningsClass.loadDeductions(employeeDetails.id);
            $("#btnNext").prop("disabled", false);
            this.hideDetailsDiv();
            this.showDetailsDiv();
        }

        showDetailsDiv() {
            $("#detailsDiv").removeClass("d-none");
        }

        hideDetailsDiv() {
            $("#detailsDiv").addClass("d-none");
            $("#monthAndYear").val("");
            $("#earnings").html("");
            $("#deductions").html("");
            $("#earningsData").html("");
            $("#dedctionsData").html("");
            window.earningsClass.makeEarningClassEmpty();
        }

        emptyForm() {
            $('input[name="billIdFilter"]:checked').prop("checked", false);
            $("#billId").val("");
            $("#empCodeInput").val("");
            $("#empBankAcNo").val("");
            this.hideDetailsDiv();
            $("#employee").val("");
            $("#employeeDiv").addClass("d-none");
            $("#" + this.filterTypes[this.currentFilter]).addClass("d-none");
            this.currentFilter = "";
            window.CurrentEmployeeBillDetails = {
                empId: "",
                empName: "",
                empCode: "",
                earnings: [],
                deductions: [],
                month: "",
                year: "",
                earningsTotal: 0,
                deductionsTotal: 0,
            };
        }

        showError(msg) {
            showMainError(msg);
        }
    })();

    window.MonthAndYearClass = new (class MonthAndYearClass {
        constructor() {
            this.currentMonth = "";
            this.currentYear = "";

            this.monthAndYearElement = $("#monthAndYear");
        }

        setMonthAndYear() {
            let monthAndYear = this.monthAndYearElement.val();
            if (monthAndYear == "") {
                window.CurrentEmployeeBillDetails["month"] = "";
                window.CurrentEmployeeBillDetails["year"] = "";
                return;
            } else {
                let date = new Date(monthAndYear);
                this.currentMonth = date.getMonth() + 1;
                this.currentYear = date.getFullYear();

                window.CurrentEmployeeBillDetails["month"] = this.currentMonth;
                window.CurrentEmployeeBillDetails["year"] = this.currentYear;

                $("#btnNext").prop("disabled", false);
            }
        }
    })();

    window.earningsClass = new (class EarningsClass {
        constructor() {
            this.earnings = new Array();
            this.deductions = new Array();
            this.earningsInput = $("#earnings");
            this.earningAmountInput = $("#earningAmount");

            this.deductionsInput = $("#deductions");
            this.deductionAmountInput = $("#deductionAmount");

            this.earningsTotal = 0;
            this.deductionsTotal = 0;
        }

        async loadEarnings(empId) {
            showLoading();
            await ajaxCall("/api/getEmployeeEarnings.php", "POST", {
                empId,
            }).then(({ status, message, data }) => {
                if (data.length == 0) {
                    this.setEarningTypesOptions([]);
                    this.showError("No Earning Types found with this employee");
                } else {
                    this.setEarningTypesOptions(data);
                }
            });
            hideLoading();
        }

        async loadDeductions(empId) {
            showLoading();
            await ajaxCall("/api/getEmployeeDeductions.php", "POST", {
                empId,
            }).then(({ status, message, data }) => {
                if (data.length == 0) {
                    this.setDeductionTypesOptions([]);
                    this.showError(
                        "No Deduction Types found with this employee"
                    );
                } else {
                    this.setDeductionTypesOptions(data);
                }
            });
            hideLoading();
        }

        setEarningTypesOptions(options) {
            $("#earnings").html(`
                <option value="">Select</option>
            `);

            options.forEach((option) => {
                $("#earnings").append(`
                    <option value="${option.id}">${option.name}</option>
                `);
            });
        }

        setDeductionTypesOptions(options) {
            $("#deductions").html(`
                <option value="">Select</option>
            `);

            options.forEach((option) => {
                $("#deductions").append(`
                    <option value="${option.id}">${option.name}</option>
                `);
            });
        }

        addEarning() {
            let earningId = this.earningsInput.val();
            let earningText = $("#earnings option:selected").text();
            let earningAmount = this.earningAmountInput.val();

            this.earningAmountInput.val("");
            this.earningsInput.val("");
            if (earningId == "") {
                this.showError("Please Select Valid Earning Type");
                return;
            }
            if (earningAmount == "") {
                this.showError("Please Enter Earning Amount");
                return;
            }
            if (window.CurrentEmployeeBillDetails.earnings) {
                window.CurrentEmployeeBillDetails.earnings.push({
                    id: earningId,
                    text: earningText,
                    amount: earningAmount,
                });
            } else {
                window.CurrentEmployeeBillDetails.earnings = [
                    {
                        id: earningId,
                        text: earningText,
                        amount: earningAmount,
                    },
                ];
            }
            this.renderEarningsTable();
            this.totalAll();
        }

        async addDeduction() {
            let deductionId = this.deductionsInput.val();
            let deductionText = $("#deductions option:selected").text();
            let deductionAmount = parseInt(this.deductionAmountInput.val());

            if (
                window.CurrentEmployeeBillDetails.earningsTotal -
                    (deductionAmount +
                        window.CurrentEmployeeBillDetails.deductionsTotal) <
                0
            ) {
                this.showError("Total Should not be negative!");
                return;
            }

            this.deductionsInput.val("");
            this.deductionAmountInput.val("");
            if (deductionId == "") {
                this.showError("Please Select Valid Deduction Type");
                return;
            }
            if (deductionAmount == "") {
                this.showError("Please Enter Deduction Amount");
                return;
            }
            if (window.CurrentEmployeeBillDetails.deductions) {
                window.CurrentEmployeeBillDetails.deductions.push({
                    id: deductionId,
                    text: deductionText,
                    amount: deductionAmount,
                });
            } else {
                window.CurrentEmployeeBillDetails.deductions = [
                    {
                        id: deductionId,
                        text: deductionText,
                        amount: deductionAmount,
                    },
                ];
            }
            this.renderDeductionsTable();
            this.totalAll();
        }

        totalAll() {
            $("#totalDeductions").text(
                window.CurrentEmployeeBillDetails.deductionsTotal
            );
            $("#totalEarnings").text(
                window.CurrentEmployeeBillDetails.earningsTotal
            );
            $("#total").text(
                window.CurrentEmployeeBillDetails.earningsTotal -
                    window.CurrentEmployeeBillDetails.deductionsTotal
            );
        }

        renderEarningsTable() {
            $("#earningsData").html("");
            window.CurrentEmployeeBillDetails.earningsTotal = 0;
            window.CurrentEmployeeBillDetails.earnings.forEach(
                (earning, index) => {
                    window.CurrentEmployeeBillDetails.earningsTotal += parseInt(
                        earning.amount
                    );
                    $("#earningsData").append(`
                    <tr>
                        <td>${earning.text}</td>
                        <td><input onchange='window.earningsClass.changeEarningAmount(${index}, this)'
                        class="form-control"
                        type="text"
                        onkeypress="return /[0-9]/i.test(event.key)"
                        value="${earning.amount}"
                        placeholder="Enter ${earning.text} Amount"/>
                        </td>
                    </tr>
                `);
                }
            );
        }

        renderDeductionsTable() {
            $("#deductionsData").html("");
            window.CurrentEmployeeBillDetails.deductionsTotal = 0;
            window.CurrentEmployeeBillDetails.deductions.forEach(
                (deduction, index) => {
                    window.CurrentEmployeeBillDetails.deductionsTotal +=
                        parseInt(deduction.amount);
                    $("#deductionsData").append(`
                    <tr>
                        <td>${deduction.text}</td>
                        <td><input onchange='window.earningsClass.changeDeductionAmount(${index}, this)'
                        class="form-control"
                        type="text"
                        onkeypress="return /[0-9]/i.test(event.key)"
                        value="${deduction.amount}"
                        placeholder="Enter ${deduction.text} Amount"/>
                        </td>
                    </tr>
                `);
                }
            );
        }

        showError(message) {
            showMainError(message);
        }

        makeEarningClassEmpty() {
            window.CurrentEmployeeBillDetails.earnings = [];
            window.CurrentEmployeeBillDetails.deductions = [];
            window.CurrentEmployeeBillDetails.earningsTotal = 0;
            window.CurrentEmployeeBillDetails.deductionsTotal = 0;
            this.renderEarningsTable();
            this.renderDeductionsTable();
            this.totalAll();
        }

        renderAll() {
            showLoading();
            this.renderEarningsTable();
            this.renderDeductionsTable();
            this.totalAll();
            hideLoading();
        }

        changeEarningAmount(index, element) {
            if (element.value == "") {
                element.value =
                    window.CurrentEmployeeBillDetails.earnings[index].amount;
                this.showError("Please enter valid Amount");
                return;
            }
            if (
                parseInt(element.value) +
                    parseInt(window.CurrentEmployeeBillDetails.earningsTotal) -
                    parseInt(
                        window.CurrentEmployeeBillDetails.earnings[index].amount
                    ) -
                    parseInt(
                        window.CurrentEmployeeBillDetails.deductionsTotal
                    ) <
                0
            ) {
                element.value =
                    window.CurrentEmployeeBillDetails.earnings[index].amount;
                this.showError("Total Should not be negative!");
                return;
            }
            window.CurrentEmployeeBillDetails.earnings[index].amount =
                element.value;
            this.renderAll();
        }

        changeDeductionAmount(index, element) {
            if (element.value == "") {
                element.value =
                    window.CurrentEmployeeBillDetails.deductions[index].amount;
                this.showError("Please enter valid Amount");
                return;
            }
            let parsedEarning = parseInt(
                window.CurrentEmployeeBillDetails.earningsTotal
            );
            let parsedDeduction = parseInt(
                window.CurrentEmployeeBillDetails.deductionsTotal
            );
            let parsedCurrent = parseInt(
                window.CurrentEmployeeBillDetails.earnings[index].amount
            );
            if (
                parsedEarning -
                    (parseInt(element.value) -
                        (parsedDeduction - parsedCurrent)) <
                0
            ) {
                element.value =
                    window.CurrentEmployeeBillDetails.deductions[index].amount;
                this.showError("Total Should not be negative!");
                return;
            }
            window.CurrentEmployeeBillDetails.deductions[index].amount =
                element.value;
            this.renderAll();
        }
    })();
}

function submitForm() {
    let form = window.CurrentEmployeeBillDetails;
    if (form.empId == "" || form.empName == "" || form.empCode == "") {
        showMainError("Please Check Employee");
    } else if (form.month == "" || form.year == "") {
        showMainError("Please Check the Month and Year");
    } else {
        if (new Date(form.month + "/01/" + form.year) > new Date()) {
            showMainError("Date should not be future");
        } else {
            window.SupplementaryBillClass.addBill(
                new window.BillClass(CurrentEmployeeBillDetails)
            );
            $("#newEmpBillModal").modal("toggle");
            window.empSearchFilterClass.emptyForm();
        }
    }
}

function showMainError(message) {
    if (window.errorTimeOut) {
        clearTimeout(window.errorTimeOut);
    }
    $("#errorText").text(message);
    $("#errorDiv").removeClass("d-none");
    window.errorTimeOut = setTimeout(function () {
        $("#errorText").text("");
        $("#errorDiv").addClass("d-none");
    }, 3000);
}
