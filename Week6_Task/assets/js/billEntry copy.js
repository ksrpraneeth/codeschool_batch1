$("document").ready(documentReady());

function checkAmount(element) {
    element.value = element.value
        .replace(/[^0-9.]/g, "")
        .replace(/(\..*)\./g, "$1");
    window.formClass.setAmount(element.value);
}
function documentReady() {
    window.formClass = new (class Form {
        constructor() {
            this.filterTypes = {
                billID: "billIDSelectDiv",
                empCode: "empCodeDiv",
                bankAcNo: "bankAcNoDiv",
            };

            this.billTypeFilter = {
                earning: "typeEarnings",
                deductions: "typeDeductions",
            };

            this.currentFilter = "billID";
            this.currentEmployee = $("#employee").val();
            this.showDetails = false;
            this.currentMontAndYear = "";
            this.currentAmount = "";
            this.currentBillType = "earnings";
            this.currentAddType = null;

            // Elements
            this.employeeElement = $("#employee");
            this.billIdElement = $("#billId");
            this.billTypeSelect = $("#selectBillAddType");
            this.amountElement = $("#amount");
        }

        setFilter(filter) {
            // Conditions
            if (filter == this.currentFilter) {
                return;
            }

            // Value Upadtion
            this.currentFilter = filter;

            // Changes in HTML
            Object.values(this.filterTypes).forEach((filterDiv) => {
                $("#" + filterDiv).addClass("d-none");
            });
            $("#" + this.filterTypes[filter]).removeClass("d-none");
            this.billIdElement.val("");

            // Later Functions
            this.setEmployeeOptions([]);
        }

        async setBillId() {
            showLoading();
            let billID = this.billIdElement.val();

            this.setEmployeeOptions([]);

            await ajaxCall("/api/getEmployeesByBillID.php", "POST", {
                billID,
            }).then(({ status, message, data }) => {
                if (data.length == 0) {
                    this.showError("No Employees found with Bill ID " + billID);
                } else {
                    this.setEmployeeOptions(data);
                }
            });
            hideLoading();
        }

        async setEmpCode(element, event) {
            if (event.key === "Enter") {
                showLoading();
                let empCode = element.value;
                if (empCode == "") {
                    this.showError("Invalid Employee Code");
                    return;
                } else {
                    await ajaxCall("/api/getEmployeeByEmpCode.php", "POST", {
                        empCode,
                    }).then(({ status, message, data }) => {
                        if (data.length != 0) {
                            this.setEmployeeOptions([data]);
                        } else {
                            this.showError(
                                "No Employee's found with this employee code: " +
                                    empCode
                            );
                            this.setEmployeeOptions([]);
                        }
                    });
                }
                hideLoading();
            }
        }

        async setEmpBankAcNo(element, event) {
            if (event.key === "Enter") {
                showLoading();
                let empAcNo = element.value;
                if (empAcNo == "") {
                    this.showError("Invalid Employee Bank Account Number");
                    return;
                } else {
                    await ajaxCall("/api/getEmployeeByBankAcNo.php", "POST", {
                        bankAcNo: empAcNo,
                    }).then(({ status, message, data }) => {
                        if (data.length != 0) {
                            this.setEmployeeOptions([data]);
                        } else {
                            this.showError(
                                "No Employee's found with this Bank Account Number: " +
                                    empAcNo
                            );
                            this.setEmployeeOptions([]);
                        }
                    });
                }
                hideLoading();
            }
        }

        setEmployeeOptions(options) {
            this.employeeElement.html("");
            options.forEach((option) => {
                this.employeeElement.append(
                    `<option data-name="${option.name}" data-empCode="${option.emp_code}" value="${option.id}">${option.name} - ${option.emp_code}</option>`
                );
            });
            this.employeeChanged();
        }

        employeeChanged() {
            let employee = $("#employee").val();
            let employeeDetails = {
                name: $("#employee option:selected").attr("data-name")
                ,
                empCode: $("#employee option:selected").attr("data-empCode")
                ,
            };
            this.currentEmployeeDetails = employeeDetails;
            this.currentEmployee = employee;
            this.toggleDetails(employee);
        }

        toggleDetails(employee) {
            if (employee == null) {
                $("#billDetailsDiv").addClass("d-none");
            } else {
                $("#billDetailsDiv").removeClass("d-none");
                this.setType("earnings");
            }
            $("#typeEarnings").prop("checked", true);
        }

        async setType(type) {
            showLoading();
            $("#selectBillAddType").html("");
            this.addType = type;
            let empId = this.currentEmployee;
            if (empId == null) {
                return;
            }
            this.currentBillType = type;
            if (type == "earnings") {
                await ajaxCall("/api/getEmployeeEarnings.php", "POST", {
                    empId,
                }).then(({ status, message, data }) => {
                    if (data.length == 0) {
                        this.showError(
                            "No Earning Types found with this employee"
                        );
                        this.currentAddType = null;
                    } else {
                        this.currentAddType = data[0].id;
                        this.setEarningTypesOptions(data);
                    }
                });
            } else {
                await ajaxCall("/api/getEmployeeDeductions.php", "POST", {
                    empId,
                }).then(({ status, message, data }) => {
                    if (data.length == 0) {
                        this.showError(
                            "No Deduction Types found with this employee"
                        );
                        this.currentAddType = null;
                    } else {
                        this.currentAddType = data[0].id;
                        this.setDeductionTypesOptions(data);
                    }
                });
            }
            hideLoading();
        }

        setEarningTypesOptions(earnings) {
            this.billTypeSelect.html("");
            earnings.forEach((earning) => {
                this.billTypeSelect.append(`
                    <option value="${earning.id}">${earning.name}</option>
                `);
            });
        }

        setDeductionTypesOptions(deductions) {
            this.billTypeSelect.html("");
            deductions.forEach((deduction) => {
                this.billTypeSelect.append(`
                    <option value="${deduction.id}">${deduction.name}</option>
                `);
            });
        }

        setMontAndYear(monthAndYear) {
            this.currentMontAndYear = monthAndYear;
        }

        setAmount(amount) {
            this.currentAmount = amount;
        }

        async submitForm() {
            showLoading();

            let employee = this.currentEmployee;
            let monthAndYear = this.currentMontAndYear;
            let billType = this.currentBillType;
            let addType = this.currentAddType;
            let addTypeText = $("#selectBillAddType option:selected").text();
            let amount = this.currentAmount;

            if (employee == null) {
                this.showError("Please check the employee");
            } else {
                if (monthAndYear == "") {
                    this.showError("Please check the Month and Year");
                } else {
                    if (!billType) {
                        this.showError("Please select a bill type");
                    } else {
                        if (addType == null) {
                            this.showError("Please select a Add Type");
                        } else {
                            if (amount == "") {
                                this.showError("Please Enter Amount");
                            } else {
                                if (
                                    monthAndYear !=
                                        window.employeeBill.getMonthAndYear() &&
                                    window.employeeBill.getMonthAndYear() != ""
                                ) {
                                    if (
                                        confirm(
                                            "Do you want to delete present employee"
                                        ) === true
                                    ) {
                                        window.employeeBill.onLoad();
                                    } else {
                                        this.showError(
                                            "Please change the Month and Year to continue"
                                        );
                                    }
                                }
                                window.employeeBill.addBill({
                                    employee: this.currentEmployee,
                                    employeeDetails:
                                        this.currentEmployeeDetails,
                                    billType: billType,
                                    billTypeDetails: {
                                        type: addType,
                                        amount,
                                        monthAndYear,
                                        typeText: addTypeText,
                                    },
                                });
                                this.amountElement.val('');
                            }   
                        }
                    }
                }
            }

            hideLoading();
        }

        showError(message) {
            if (window.errorTimeOut) {
                clearTimeout(window.errorTimeOut);
            }
            $("#errorDiv").removeClass("d-none");
            $("#error").text(message);
            window.errorTimeOut = setTimeout(function () {
                $("#errorDiv").addClass("d-none");
                $("#error").text("");
            }, 3000);
        }
    })();

    window.employeeBill = new (class EmployeeBill {
        constructor() {
            this.onLoad();
        }

        addEarnings(earning) {
            this.earnings.push(earning);
            this.totalEarnings += parseInt(earning.amount);
        }

        addDeductions(deduction) {
            this.deductions.push(deduction);
            this.totalDeductions += parseInt(deduction.amount);
        }

        getMonthAndYear() {
            return this.monthAndYear;
        }

        addEmployeeDetails(employee, employeeDetails) {
            
        }

        addBill({employee, employeeDetails, billType, billTypeDetails}) {
            console.log(billType)
            if (billType == "earnings") {
                this.addEarnings({
                    type: billTypeDetails.type,
                    amount: billTypeDetails.amount,
                    typeText: billTypeDetails.typeText,
                });
            } else {
                this.addDeductions({
                    type: billTypeDetails.type,
                    amount: billTypeDetails.amount,
                    typeText: billTypeDetails.typeText,
                });
            }
            this.monthAndYear = billTypeDetails.monthAndYear;
            this.currentEmployee = employee;
            this.currentEmployeeDetails = employeeDetails;
            // render table
            this.renderEmpBillList();
        }

        renderEmpBillList() {
            let listElement = $("#earningAndDeductionList");
            listElement.html("")
            this.earnings.forEach((earning) => {
                listElement.append(`<tr>
                <td class="text-success fw-semibold">${earning.typeText}</td>
                <td class="text-success">+${earning.amount} Rs.</td>
                </tr>`);
            });

            this.deductions.forEach((deduction) => {
                listElement.append(`<tr>
                <td class="text-danger fw-semibold">${deduction.typeText}</td>
                <td class="text-danger">-${deduction.amount} Rs.</td>
                </tr>`);
            });

            $("#netEarnings").text(this.totalEarnings)
            $("#netDeductions").text(this.totalDeductions)
            $("#total").text(this.totalEarnings - this.totalDeductions)
            $("#empName").text(this.currentEmployeeDetails.name)
            $("#empBillList").removeClass("d-none")
        }

        onLoad() {
            this.currentEmployee = null;
            this.earnings = [];
            this.deductions = [];
            this.totalEarnings = 0;
            this.totalDeductions = 0;
            this.monthAndYear = "";
            this.currentEmployeeDetails = {};
        }
    })();
}
