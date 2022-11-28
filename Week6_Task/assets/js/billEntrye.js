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

function onload() {
    window.CurrentEmployeeBillDetails = {};

    window.BillClass = class BillClass {
        constructor(
            empId,
            empName,
            empCode,
            earnings,
            deductions,
            month,
            year
        ) {
            this.empId = empId;
            this.empName = empName;
            this.empCode = empCode;
            this.earnings = earnings;
            this.deductions = deductions;
            this.month = month;
            this.year = year;

            // Getting sum of earnings
            this.earningsSum = 0;
            earnings.forEach((earning) => {
                this.earningsSum += parseInt(earning.amount);
            });

            // Getting sum of deductions
            this.deductionsSum = 0;
            deductions.forEach((deduction) => {
                this.deductionsSum += parseInt(deduction.amount);
            });

            this.total = this.earningsSum + this.deductionsSum;
        }
    };

    window.SupplementaryBillClass = new (class SupplementaryBillClass {
        constructor() {
            this.sBills = [];
        }

        addBill(bill) {
            this.sBills.push(bill);
            this.renderSBills();
        }

        getBill(index) {
            return this.sBills[index];
        }

        deleteBill(index) {
            if (confirm("Are you sure to delete the bill")) {
                this.sBills.splice(parseInt(index), 1);
                this.renderSBills();
            } else {
                return false;
            }
        }

        renderSBills() {
            // Empty Table first
            $("#sBillTableBody").html("");

            // appending the data
            this.sBills.forEach((sBill, index) => {
                $("#sBillTableBody").append(`
                    <tr>
                        <td>${sBill.empCode}</td>
                        <td>${sBill.empName}</td>
                        <td>${sBill.month}</td>
                        <td>${sBill.year}</td>
                        <td>${sBill.earningsSum}</td>
                        <td>${sBill.deductionsSum}</td>
                        <td>${sBill.total}</td>
                        <td><button onclick="window.SupplementaryBillClass.deleteBill(${index})" class="btn btn-danger"><i class="bi bi-trash"></i></button></td>
                    </tr>
                `);
            });
        }
    })();

    // window.empSearchFilterClass = new (class EmpSearchFilter {
    //     constructor() {
    //         this.filterTypes = {
    //             billId: "billIDSelectDiv",
    //             empCode: "empCodeDiv",
    //             bankAcNo: "bankAcNoDiv",
    //         };
    //         this.currentFilter = "";
    //         this.billIds = [];
    //         this.billIdsFetchedFromDatabase = false;
    //         this.currentBillId = null;
    //         this.currentEmployee = null;
    //         // Elements
    //         this.employeeDiv = $("#employeeInputDiv");
    //         this.employeeInput = $("#employee");

    //         this.billIdDiv = $("#billIDSelectDiv");
    //         this.billIdInput = $("#billId");

    //         this.empCodeInput = $("#empCode");
    //         this.bankAcNoInput = $("#empBankAcNo");

    //         this.monthAndYearDiv = $("#monthAndYearDiv");
    //         this.monthAndYearInput = $("#monthAndYearInput");
    //     }

    //     setFilter(type) {
    //         if (this.currentFilter == type) {
    //             return false;
    //         }
    //         Object.values(this.filterTypes).forEach((filterDiv) => {
    //             $("#" + filterDiv).addClass("d-none");
    //         });
    //         if (type == "billId") {
    //             this.loadBillIds();
    //         }
    //         $("#" + this.filterTypes[type]).removeClass("d-none");
    //         this.billIdInput.val("");
    //         this.filterChanged();
    //     }

    //     async loadBillIds() {
    //         if (this.billIdsFetchedFromDatabase) {
    //             return;
    //         } else {
    //             showLoading();
    //             await ajaxCall("/api/getUserBillids.php", "POST", {}).then(
    //                 ({ status, message, data }) => {
    //                     if (data.length == 0) {
    //                         this.showError("No Bill ID's found");
    //                     } else {
    //                         this.billIdInput.html(`
    //                             <option value="" hidden>Select</option>
    //                         `);
    //                         data.forEach((billId) => {
    //                             this.billIdInput.append(`
    //                                 <option value="${billId.id}">${billId.name}</option>
    //                             `);
    //                         });
    //                         this.billIds = data;
    //                         this.billIdsFetchedFromDatabase = true;
    //                     }
    //                 }
    //             );
    //             hideLoading();
    //         }
    //     }

    //     setBillId(billId) {
    //         if (billId == null) {
    //             return;
    //         }
    //         this.currentBillId = billId;
    //         if (billId != "") {
    //             this.loadEmployees("billId");
    //         }
    //     }

    //     setEmpCode(empCode) {
    //         if (empCode == "") {
    //             this.showError("Please enter a employee code");
    //         } else {
    //             this.empCode = empCode;
    //             this.loadEmployees("empCode");
    //         }
    //     }

    //     setBankAcNo(bankAcNo) {
    //         if (bankAcNo == "") {
    //             this.showError("Please enter a Employee Bank Account Number");
    //         } else {
    //             this.bankAcNo = bankAcNo;
    //             this.loadEmployees("bankAcNo");
    //         }
    //     }

    //     async loadEmployees(type) {
    //         let url = "";
    //         let data = {};
    //         switch (type) {
    //             case "billId":
    //                 url = "/api/getEmployeesByBillID.php";
    //                 data = { billId: this.currentBillId };
    //                 break;
    //             case "empCode":
    //                 url = "/api/getEmployeeByEmpCode.php";
    //                 data = { empCode: this.empCode };
    //                 break;
    //             case "bankAcNo":
    //                 url = "/api/getEmployeeByBankAcNo.php";
    //                 data = { bankAcNo: this.bankAcNo };
    //                 break;
    //         }

    //         if (url == "") {
    //             return;
    //         } else {
    //             showLoading();
    //             await ajaxCall(url, "POST", data).then(
    //                 ({ status, message, data }) => {
    //                     if (data.length == 0) {
    //                         this.showError("No Employees found!");
    //                         this.loadEmployeeOptions([]);
    //                         this.employeeDiv.addClass("d-none");
    //                     } else {
    //                         this.employeeDiv.removeClass("d-none");
    //                         this.loadEmployeeOptions(data);
    //                     }
    //                 }
    //             );
    //             hideLoading();
    //         }
    //     }

    //     loadEmployeeOptions(options) {
    //         this.employeeInput.html(`<option value="" hidden>Select</option>`);
    //         options.forEach((option) => {
    //             this.employeeInput.append(`
    //                 <option
    //                     data-name="${option.name}"
    //                     data-empCode="${option.emp_code}"
    //                     value="${option.id}"
    //                 >
    //                     ${option.name} - ${option.emp_code}</option>
    //             `);
    //         });
    //         this.currentEmployee = null;
    //         this.employeeChanged();
    //     }

    //     setEmployee() {
    //         let element = $("#employee").find(":selected");

    //         // Updating details of current employee
    //         let employeeDetails = {
    //             id: element.val(),
    //             name: element.data("name"),
    //             empCode: element.data("empcode"),
    //         };
    //         this.currentEmployee = employeeDetails;

    //         // Updating current employee global information
    //         window.CurrentEmployeeBillDetails["empId"] = employeeDetails.id;
    //         window.CurrentEmployeeBillDetails["empName"] = employeeDetails.name;
    //         window.CurrentEmployeeBillDetails["empCode"] =
    //         employeeDetails.empCode;
    //         this.employeeChanged();
    //     }

    //     showError(msg) {
    //         if (window.errorTimeOut) {
    //             clearTimeout(window.errorTimeOut);
    //         }
    //         $("#errors").text(msg);
    //         window.errorTimeOut = setTimeout(function () {
    //             $("#errors").text("");
    //         }, 1500);
    //     }

    //     filterChanged() {
    //         // Hiding employee select div
    //         this.employeeDiv.addClass("d-none");

    //         // call employee changed
    //         this.employeeChanged();
    //     }

    //     employeeChanged() {
    //         if(this.currentEmployee == null){
    //             return false;
    //         }
    //         $("#moreDetailsDiv").removeClass("d-none");
    //     }
    // })();

    window.formClass = new (class Form {
        constructor() {
            this.filterTypes = {
                billId: "billIDSelectDiv",
                empCode: "empCodeDiv",
                bankAcNo: "bankAcNoDiv",
            };

            // Values of form
            this.currentFilter = null;
            this.currentBillId = null;
            this.currentEmpCode = null;
            this.currentEmpBankAcNo = null;
            this.currentEmployee = null;
            this.month = null;
            this.year = null;
            this.earnings = null;
            this.deductions = null;
        }

        setFilter(type) {
            if (this.currentFilter == type) {
                return false;
            }
            Object.values(this.filterTypes).forEach((filterDiv) => {
                $("#" + filterDiv).addClass("d-none");
            });
            if (type == "billId") {
                window.fetchFromDatabase.loadBillIds();
            }
            $("#" + this.filterTypes[type]).removeClass("d-none");
            this.billIdInput.val("");
            this.filterChanged();
        }

        setBillId(id){
            this.currentBillId = id;
            this.showEmployees("billId", id);
        }

        showEmployees(type, id){
            
        }
    })();

    window.fetchFromDatabase = new (class FetchFromDatabaseClass {

        constructor() {
            this.billIdsFetchedFromDatabase = false;
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
                            $("#billId").html(`
                                            <option value="" hidden>Select</option>
                                        `);
                            data.forEach((billId) => {
                                $("#billId").append(`
                                                <option value="${billId.id}">${billId.name}</option>
                                            `);
                            });
                            this.billIdsFetchedFromDatabase = true;
                        }
                    }
                );
                hideLoading();
            }
        }
    })();
}
