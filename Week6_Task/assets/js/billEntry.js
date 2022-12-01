$("document").ready(async () => {
    window.currentBill = {
        empId: "",
        empName: "",
        empCode: "",
        earnings: new Array(),
        deductions: new Array(),
        month: "",
        year: "",
        earningsTotal: 0,
        deductionsTotal: 0,
    };

    window.cleanCurrentBill = () => {
        window.currentBill = {
            empId: "",
            empName: "",
            empCode: "",
            earnings: new Array(),
            deductions: new Array(),
            month: "",
            year: "",
            earningsTotal: 0,
            deductionsTotal: 0,
        };
    };

    window.SupplementaryBillClass = new (class SupplementaryBillClass {
        constructor() {
            this.sBills = [];
            this.totalEarnings = 0;
            this.totalDeductions = 0;
        }

        addBill(bill) {
            bill.total = bill.earningsTotal - bill.deductionsTotal;
            this.sBills.push(bill);
            this.renderSBills();
            this.totalEarnings += bill.earningsTotal;
            this.totalDeductions += bill.deductionsTotal;
            this.total = this.totalEarnings - this.totalDeductions;
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
                this.sBills[index].deductionsTotal,
                this.sBills[index].total
            ).view();
        }
    })();

    window.renderEarningModalClass = class RenderEarningModal {
        constructor(earnings, deductions, earningsTotal, deductionsTotal, total) {
            this.earnings = earnings;
            this.deductions = deductions;
            this.earningsTotal = parseInt(earningsTotal);
            this.deductionsTotal = parseInt(deductionsTotal);
            this.total = parseInt(total);
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
            $("#viewTotalAmount").text(this.total);
        }
    };

    window.formClass = new (class FormClass {
        constructor() {
            this.filterTypes = {
                billId: "billIDSelectDiv",
                empCode: "empCodeDiv",
                bankAcNo: "bankAcNoDiv",
            };
            this.currentFilter = "";
            this.billIdsFetchedFromDatabase = false;

            this.billIdDiv = $("#billIDSelectDiv");
            this.billId = $("#billId");

            this.empCodeDiv = $("#empCodeDiv");
            this.empCode = $("#empCodeInput");

            this.empAcNoDiv = $("#bankAcNoDiv");
            this.empAcNo = $("#empBankAcNo");

            this.employeeDiv = $("#employeeDiv");
            this.employee = $("#employee");
            this.employeeSelectIsEmpty = false;

            this.detailsDiv = $("#detailsDiv");

            this.monthAndYear = $("#monthAndYear");
            this.earnings = $("#earnings");
            this.deductions = $("#deductions");

            this.earningsData = $("#earningsData");
            this.deductionsData = $("#deductionsData");

            this.earningsAmount = $("#earningAmount");
            this.deductionsAmount = $("#deductionAmount");

            this.totalEarnings = $("#totalEarnings");
            this.totalDeductions = $("#totalDeductions");
            this.total = $("#total");
        }

        setFilter(type) {
            if (this.currentFilter == type) {
                return false;
            }
            this.currentFilter = type;

            // Making Filters Empty
            this.billId.val("");
            this.empCode.val("");
            this.empAcNo.val("");

            // Making all filters hide
            Object.values(this.filterTypes).forEach((filterDiv) => {
                $("#" + filterDiv).addClass("d-none");
            });
            $("#" + this.filterTypes[this.currentFilter]).removeClass("d-none");
            this.hideEmployeeDiv();
            this.hideDetailsDiv();
        }

        setBillId(billId) {
            window.apiCalls.loadEmployees("billId", billId);
        }

        setEmpCode(empCode) {
            window.apiCalls.loadEmployees("empCode", empCode);
        }

        setBankAcNo(bankAcNo) {
            window.apiCalls.loadEmployees("empBankAcNo", bankAcNo);
        }

        setEmployee(element) {
            let empId = $(element).val();
            let empName = element.options[element.selectedIndex].dataset.name;
            let empCode =
                element.options[element.selectedIndex].dataset.empcode;

            // Saving it in global class
            window.currentBill.empId = empId;
            window.currentBill.empName = empName;
            window.currentBill.empCode = empCode;

            // show Details Div
            this.showDetailsDiv();

            // Load Employee Earnings and Deductions
            window.apiCalls.loadAddings(empId);

            // Showing details div
            this.showDetailsDiv();
        }

        hideEmployeeDiv() {
            this.employeeDiv.addClass("d-none");
            this.employee.val("");
            window.cleanCurrentBill();
            this.hideDetailsDiv();
        }

        showEmployeeDiv() {
            this.employeeDiv.removeClass("d-none");
        }

        hideDetailsDiv() {
            this.detailsDiv.addClass("d-none");
            this.monthAndYear.val("");
            this.earnings.val("");
            this.deductions.val("");
            this.earningsData.html("");
            this.deductionsData.html("");
            this.totalEarnings.text("0");
            this.totalDeductions.text("0");
            this.total.text("0");
            this.monthAndYear.val("");
        }

        showDetailsDiv() {
            this.detailsDiv.removeClass("d-none");
        }

        setMontAndYear(monthAndYear) {
            if (monthAndYear == "") {
                window.currentBill.month = "";
                window.currentBill.year = "";
                showMainError("Please Check Month and Year");
                return;
            }
            monthAndYear = new Date(monthAndYear);
            window.currentBill.month = monthAndYear.getMonth() + 1;
            window.currentBill.year = monthAndYear.getFullYear();
        }

        addEarning() {
            let earningId = this.earnings.val();
            let earningName = $("#earnings option:selected").text();
            let earningAmount = parseInt(this.earningsAmount.val());

            if (earningId == "") {
                showMainError("Please Check Earning Type");
                return false;
            }
            if (!earningAmount) {
                showMainError("Please Check Earning Amount");
                return false;
            }

            // Making Input empty
            this.earningsAmount.val("");
            this.earnings.val("");

            // Setting Global Variable
            window.currentBill.earnings.push({
                id: earningId,
                text: earningName,
                amount: earningAmount,
            });
            window.currentBill.earningsTotal += earningAmount;

            // Rendering Earnings Table
            this.renderEarningsTable();
        }

        renderEarningsTable() {
            $("#earningsData").html("");
            window.currentBill.earnings.forEach((earning, index) => {
                this.earningsData.append(`
                    <tr>
                        <td>${earning.text}</td>
                        <td><input onchange='window.formClass.changeEarningAmount(${index}, this)'
                        class="form-control"
                        type="text"
                        onkeypress="return /[0-9]/i.test(event.key)"
                        value="${earning.amount}"
                        placeholder="Enter ${earning.text} Amount"/>
                        </td>
                    </tr>
                `);
            });
            this.calculateTotal();
        }

        addDeduction() {
            let deductionId = this.deductions.val();
            let deductionName = $("#deductions option:selected").text();
            let deductionAmount = parseInt(this.deductionsAmount.val());
            let deductionTotal = window.currentBill.deductionsTotal;
            let earningsTotal = window.currentBill.earningsTotal;
            let total = earningsTotal - deductionTotal - deductionAmount;
            if (deductionId == "") {
                showMainError("Please Check Deduction Type");
                return false;
            }
            if (!deductionAmount) {
                showMainError("Please Check Deduction Amount");
                return false;
            }
            if (total < 0) {
                showMainError("Total Should Not Be Negative");
                return false;
            }
            this.deductionsAmount.val("");
            this.deductions.val("");

            // Setting Global Variable
            window.currentBill.deductions.push({
                id: deductionId,
                text: deductionName,
                amount: deductionAmount,
            });
            window.currentBill.deductionsTotal += deductionAmount;

            // Rendering Deductions Table
            this.renderDeductionsTable();
        }

        renderDeductionsTable() {
            $("#deductionsData").html("");
            window.currentBill.deductions.forEach((deduction, index) => {
                this.deductionsData.append(`
                    <tr>
                        <td>${deduction.text}</td>
                        <td><input onchange='window.formClass.changeDeductionAmount(${index}, this)'
                        class="form-control"
                        type="text"
                        onkeypress="return /[0-9]/i.test(event.key)"
                        value="${deduction.amount}"
                        placeholder="Enter ${deduction.text} Amount"/>
                        </td>
                    </tr>
                `);
            });
            this.calculateTotal();
        }

        changeEarningAmount(index, element) {
            let amount = parseInt($(element).val());
            let earningsTotal = window.currentBill.earningsTotal;
            let deductionsTotal = window.currentBill.deductionsTotal;
            let indexAmount = parseInt(
                window.currentBill.earnings[index].amount
            );
            let total = earningsTotal - indexAmount + amount - deductionsTotal;
            if (!amount) {
                showMainError("Please Check Amount");
                element.value = indexAmount;
                return false;
            }
            if (total < 0) {
                showMainError("Total Should Not Be Negative");
                element.value = indexAmount;
                return false;
            }
            window.currentBill.earnings[index].amount = amount;
            window.currentBill.earningsTotal =
                earningsTotal - indexAmount + amount;
            this.renderEarningsTable();
        }

        changeDeductionAmount(index, element) {
            let amount = parseInt($(element).val());
            let earningsTotal = window.currentBill.earningsTotal;
            let deductionsTotal = window.currentBill.deductionsTotal;
            let indexAmount = parseInt(
                window.currentBill.deductions[index].amount
            );
            let total =
                earningsTotal - amount - (deductionsTotal - indexAmount);
            if (!amount) {
                showMainError("Please Check Amount");
                element.value = indexAmount;
                return false;
            }
            if (total < 0) {
                showMainError("Total Should Not Be Negative");
                element.value = indexAmount;
                return false;
            }
            window.currentBill.deductions[index].amount = amount;
            window.currentBill.deductionsTotal =
                deductionsTotal - indexAmount + amount;
            this.renderDeductionsTable();
        }

        calculateTotal() {
            this.totalDeductions.text(window.currentBill.deductionsTotal);
            this.totalEarnings.text(window.currentBill.earningsTotal);
            this.total.text(
                window.currentBill.earningsTotal -
                    window.currentBill.deductionsTotal
            );
        }

        clearForm() {
            this.hideEmployeeDiv();
            $('input[name="billIdFilter"]:checked').prop("checked", false);
            this.setFilter("");
        }
    })();

    window.apiCalls = new (class APICallsClass {
        async getBillIds() {
            await $.ajax({
                type: "POST",
                url: "/api/getUserBillids.php",
                dataType: "JSON",
                async: false,
                success: function (response) {
                    if (response.data.length == 0) {
                        showMainError("No Module ID's Found");
                    } else {
                        let bills = response.data;
                        window.formClass.billId.html(`
                            <option value="" hidden>Select</option>
                        `);
                        bills.forEach((billId) => {
                            window.formClass.billId.append(`
                                <option value="${billId.id}">${billId.name}</option>
                            `);
                        });
                    }
                    window.formClass.billIdsFetchedFromDatabase = true;
                    return false;
                },
            });
        }

        async loadEmployees(type, id) {
            let url = "";
            let data = {};
            switch (type) {
                case "billId":
                    url = "/api/getEmployeesByBillID.php";
                    data = { billId: id };
                    break;
                case "empCode":
                    url = "/api/getEmployeeByEmpCode.php";
                    data = { empCode: id };
                    break;
                case "empBankAcNo":
                    url = "/api/getEmployeeByBankAcNo.php";
                    data = { bankAcNo: id };
                    break;
            }

            if (url == "") {
                return;
            } else {
                showLoading();
                await ajaxCall(url, "POST", data).then(
                    ({ status, message, data }) => {
                        if (data.length == 0) {
                            showMainError("No Employees found!");
                            window.formClass.employee.html(``);
                            window.formClass.hideEmployeeDiv();
                        } else {
                            window.formClass.employee.html(`
                                <option value="" hidden>Select</option>
                            `);
                            data.forEach((employee) => {
                                window.formClass.employee.append(`
                                    <option 
                                        data-name="${employee.name}" 
                                        data-empcode="${employee.emp_code}"
                                        value="${employee.id}"
                                    >
                                        ${employee.name} - ${employee.emp_code}
                                    </option>
                                `);
                            });
                            window.formClass.showEmployeeDiv();
                        }
                    }
                );
                hideLoading();
            }
        }

        async loadAddings(empId) {
            showLoading();
            await ajaxCall("/api/getEmployeeEarnings.php", "POST", {
                empId,
            }).then(({ status, message, data }) => {
                if (data.length == 0) {
                    showMainError("No Earning Types found with this employee");
                } else {
                    window.formClass.earnings.html(`
                        <option value="" hidden>Select</option>
                    `);

                    data.forEach((earning) => {
                        window.formClass.earnings.append(`
                            <option value="${earning.id}">${earning.name}</option>
                            `);
                    });
                }
            });

            await ajaxCall("/api/getEmployeeDeductions.php", "POST", {
                empId,
            }).then(({ status, message, data }) => {
                if (data.length == 0) {
                    showMainError(
                        "No Deduction Types found with this employee"
                    );
                } else {
                    window.formClass.deductions.html(`
                    <option value="" hidden>Select</option>
                    `);

                    data.forEach((deduction) => {
                        window.formClass.deductions.append(`
                            <option value="${deduction.id}">${deduction.name}</option>
                            `);
                    });
                }
            });
            hideLoading();
        }
    })();
    window.apiCalls.getBillIds();
    $("#empCodeInput").on("keypress", function (e) {
        if (e.which == 13) {
            window.formClass.setEmpCode(e.target.value);
        }
    });

    $("#empBankAcNo").on("keypress", function (e) {
        if (e.which == 13) {
            window.formClass.setBankAcNo(e.target.value);
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

function submitForm() {
    let form = window.currentBill;
    if (form.empId == "" || form.empName == "" || form.empCode == "") {
        showMainError("Please Check Employee");
    } else if (form.month == "" || form.year == "") {
        showMainError("Please Check the Month and Year");
    } else {
        if (new Date(form.month + "/01/" + form.year) > new Date()) {
            showMainError("Date should not be future");
        } else {
            window.SupplementaryBillClass.addBill(form);
            window.formClass.clearForm();
            window.cleanCurrentBill();
        }
    }
}

async function submitBill() {
    let bills = window.SupplementaryBillClass.getBills();
    if(bills.length == 0){
        showMainError("Please Add Employee Bill to Submit Bill");
        return;
    }
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
