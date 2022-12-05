$("document").ready(async () => {
    $("#empCode").on("keypress", function (e) {
        if (e.which == 13) {
            window.filterClass.getEmployees("empCode", e.target.value);
        }
    });

    window.filterClass = new (class FilterClass {
        constructor() {
            this.filterTypes = {
                billId: "billIdDiv",
                empCode: "empCodeDiv",
            };
            this.currentFilter = "";
        }

        setFilter(filter) {
            if (this.currentFilter == filter) {
                return;
            }
            this.currentFilter = filter;
            Object.keys(this.filterTypes).forEach((key) => {
                if (this.currentFilter == key) {
                    $("#" + this.filterTypes[key]).removeClass("d-none");
                } else {
                    $("#" + this.filterTypes[key]).addClass("d-none");
                }
            });
        }

        async getEmployees(type, dataid) {
            showLoading();
            let url = "";
            let data = {};
            if (type == "billId") {
                url = "/api/getEmployeesByBillID.php";
                data = { billId: dataid };
            } else if (type == "empCode") {
                url = "/api/getEmployeeByEmpCode.php";
                data = { empCode: dataid };
            }
            await ajaxCall(url, "POST", data).then(
                ({ status, message, data }) => {
                    if (data.length == 0) {
                        showMainError("No Employees Found");
                        $("#employeeTable").addClass("d-none");
                    } else {
                        this.showEmployees(data);
                    }
                }
            );
            hideLoading();
        }

        showEmployees(data) {
            let html = "";
            data.forEach((employee, index) => {
                html += `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${employee.name}</td>
                        <td>${employee.emp_code}</td>
                        <td>${employee.department}</td>
                        <td>${employee.designation}</td>
                        <td>
                            <button onclick="window.employeeClass.getEmployee(${
                                employee.id
                            })" class="btn btn-secondary">View / Edit</button>
                        </td>
                    </tr>
                `;
            });
            $("#employeeTableData").html(html);
            $("#employeeTable").removeClass("d-none");
        }
    })();

    window.employeeClass = new (class EmployeeClass {
        constructor() {
            this.employee = {};
            this.deductionsLoadedFromDB = false;
            this.earningsLoadedFromDB = false;
        }

        async getEmployee(empId) {
            showLoading();
            await ajaxCall("/api/getEmployeeById.php", "POST", { empId }).then(
                ({ status, message, data }) => {
                    let empInfo = data.empInfo;
                    let empDeductions = data.empDeductions;
                    let empEarnings = data.empEarnings;
                    if (empInfo.length == 0) {
                        showMainError("No Employee Found");
                    } else {
                        this.employee = empInfo[0];
                        this.showEmployeeDetails();

                        // Earnings Fetched
                        if (empEarnings.length == 0) {
                            showMainError("No Earnings Found");
                            $("#emp_earnings").html(
                                `
                                    <tr>
                                        <td colspan="3">No Earnings Found</td>
                                    </tr>
                                `
                            );
                        } else {
                            let html = "";
                            empEarnings.forEach((earning, index) => {
                                html += `
                                    <tr>
                                        <td>${earning.name}</td>
                                        <td>${earning.amount}</td>`;
                                if (earning.cannot_delete == false) {
                                    html += `<td>
                                    <button 
                                        class="btn text-danger"
                                        onclick="window.employeeClass.deleteAdding(${earning.emp_adding_id})"
                                    ><i class='bi bi-trash'></i></button>
                                </td>`;
                                }
                                html += `</tr>`;
                            });
                            $("#emp_earnings").html(html);
                        }

                        // Deductions
                        if (empDeductions.length == 0) {
                            showMainError("No Deductions Found");
                            $("#emp_deductions").html(
                                `
                                    <tr>
                                        <td colspan="3">No Deductions Found</td>
                                    </tr>
                                `
                            );
                        } else {
                            let html = "";
                            empDeductions.forEach((deduction, index) => {
                                html += `
                                    <tr>
                                        <td>${deduction.name}</td>
                                        <td>${deduction.amount}</td>
                                        <td>
                                            <button 
                                            class="btn text-danger"
                                            onclick="window.employeeClass.deleteAdding(${deduction.emp_adding_id})"
                                            >
                                                <i class='bi bi-trash'></i>
                                            </button>
                                        </td>
                                    </tr>`;
                            });
                            $("#emp_deductions").html(html);
                        }
                    }
                }
            );
            hideLoading();
        }

        showEmployeeDetails() {
            $("#emp_name").text(this.employee.name);
            $("#emp_department").text(
                this.employee.department || "Not Available"
            );
            $("#emp_designation").text(
                this.employee.designation || "Not Available"
            );
            $("#employeeDetailsDiv").removeClass("d-none");
            $("#employeeListDiv").addClass("d-none");
        }

        backToEmployeeList() {
            $("#employeeDetailsDiv").addClass("d-none");
            $("#employeeListDiv").removeClass("d-none");
        }

        async addDeduction() {
            showLoading();
            if (this.deductionsLoadedFromDB == false) {
                await ajaxCall("/api/getDeductions.php", "POST", {}).then(
                    ({ status, message, data }) => {
                        if (data.length == 0) {
                            showMainError("No Deductions Found");
                            hideLoading();
                            return;
                        } else {
                            let html = `<option hidden value="">Select</option>`;
                            data.forEach((deduction, index) => {
                                html += `<option value="${deduction.id}">${deduction.name}</option>`;
                            });
                            $("#deductionModalDeductions").html(html);
                            this.deductionsLoadedFromDB = true;
                        }
                    }
                );
            }
            $("#newDeductionModal").modal("toggle");
            hideLoading();
        }

        async addEarning() {
            showLoading();
            if (this.earningsLoadedFromDB == false) {
                await ajaxCall("/api/getEarnings.php", "POST", {}).then(
                    ({ status, message, data }) => {
                        if (data.length == 0) {
                            showMainError("No Earnings Found");
                            hideLoading();
                            return;
                        } else {
                            let html = `<option hidden value="">Select</option>`;
                            data.forEach((earning, index) => {
                                html += `<option value="${earning.id}">${earning.name}</option>`;
                            });
                            $("#earningModalEarnings").html(html);
                            this.earningsLoadedFromDB = true;
                        }
                    }
                );
            }
            $("#newEarningModal").modal("toggle");
            hideLoading();
        }

        async addEmployeeEarning() {
            showLoading();
            let earningId = $("#earningModalEarnings").val();
            let earningAmount = $("#earningModalAmount").val();

            if (earningId == "") {
                showMainError("Please Select Earning");
                hideLoading();
                return;
            }
            if (earningAmount == "") {
                showMainError("Please Enter Earning Amount");
                hideLoading();
                return;
            }

            await this.addEmployeeAddings(
                earningId,
                earningAmount,
                (status) => {
                    if (status == true) {
                        $("#newEarningModal").modal("toggle");
                    }
                }
            );
            $("#earningModalEarnings").val("");
            $("#earningModalAmount").val("");
            hideLoading();
        }

        async addEmployeeDeduction() {
            showLoading();
            let deductionId = $("#deductionModalDeductions").val();
            let deductionAmount = $("#deductionModalAmount").val();

            if (deductionId == "") {
                showMainError("Please Select Deduction");
                return;
            }
            if (deductionAmount == "") {
                showMainError("Please Enter Deduction Amount");
                return;
            }

            this.addEmployeeAddings(deductionId, deductionAmount, (status) => {
                if (status == true) {
                    $("#newDeductionModal").modal("toggle");
                }
                $("#deductionModalDeductions").val("");
                $("#deductionModalAmount").val("");
                hideLoading();
            });
        }

        async addEmployeeAddings(addingId, addingAmount, callback) {
            await ajaxCall("/api/insertEmployeeAdding.php", "POST", {
                addingId,
                addingAmount,
                empId: this.employee.id,
            }).then(({ status, message, data }) => {
                if (status == true) {
                    this.getEmployee(this.employee.id);
                    callback(true);
                } else {
                    showMainError(message);
                    callback(false);
                }
            });
        }

        async deleteAdding(id) {
            if (!confirm("Are you sure you want to delete this?")) {
                return;
            }
            showLoading();
            await ajaxCall("/api/deleteEmployeeAddings.php", "POST", {
                id,
            }).then(async ({ status, message, data }) => {
                if (data) {
                    await this.getEmployee(this.employee.id);
                } else {
                    showMainError(
                        "Something went wrong Server Error: " + message
                    );
                }
                hideLoading();
            });
        }
    })();
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
