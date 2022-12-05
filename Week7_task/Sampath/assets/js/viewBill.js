$("document").ready(function () {
    window.billClass = new (class BillClass {
        constructor() {
            this.sbillId = null;
            this.billDetails = [];
            this.deductions = [];
            this.employees = [];
            this.addings = [];
            this.earnings = {};
        }

        async getBill(sbillId) {
            showLoading();
            try{

                if (sbillId == "") {
                    showMainError("Please Enter valid Tokeb");
                }
                this.sbillId = sbillId;
                if(await this.getBillDetails() != false){
                    await this.getBillEarnings();
                    await this.getBillDeductions();
                    await this.getEmployeeBankDetails();
                    await this.singleDeductions();
                    await this.singleEmployee();
                    $("#billView").removeClass("d-none");
                    $("#inputDiv").addClass("d-none");
                }
                hideLoading();
            } catch(e){
                console.log(e);
                hideLoading();
            }
        }

        async back(){
            $("#billView").addClass("d-none");
            $("#inputDiv").removeClass("d-none");
        }

        async getBillDetails() {
            let billId = this.sbillId;
            await ajaxCall("/api/supplementary_bill/getSBillDetailsById.php", "POST", {
                billId,
            }).then(({ status, message, data }) => {
                if (status == true) {
                    let billInfoResponse = data.billInfo.data;
                    let employeesInfo = data.employeesInfo;
                    let addingsInfo = data.addingsInfo;
                    $("#ui_ddo_code").text(billInfoResponse.ddoCode);
                    $("#ui_bdate").text(billInfoResponse.bill_date);
                    $("#ui_bill_id").text(billId);
                    $("#ui_total_earnings").text(billInfoResponse.total_earnings);
                    $("#ui_total_deductions").text(billInfoResponse.total_deductions);
                    $("#ui_total_net").text(
                        parseInt(billInfoResponse.total_earnings) -
                            parseInt(billInfoResponse.total_deductions)
                    );
                    $("#bill_total_net").text(
                        (
                            parseInt(billInfoResponse.total_earnings) -
                            parseInt(billInfoResponse.total_deductions)
                        ).toFixed(2)
                    );
                    this.employees = employeesInfo.data;
                    this.addings = addingsInfo.data;
                    $("#dpBillId").text(billId);
                    this.billDetails = billInfoResponse;
                } else {
                    showMainError("No Bill Found with this token!");
                    return false;
                }
            });
        }

        async getBillEarnings() {
            let earnings = {};
            this.addings.forEach((adding) => {
                if (adding.type == "EARNING") {
                    if (earnings[adding.name]) {
                        earnings[adding.name].amount += parseInt(adding.amount);
                    } else {
                        earnings[adding.name] = {
                            name: adding.name,
                            amount: parseInt(adding.amount),
                            id: adding.id,
                        };
                    }
                }
            });
            this.earnings = earnings;
            let html = "";
            Object.keys(earnings).forEach((earning) => {
                html += `<tr>
                            <td>${earnings[earning].name}</td>
                            <td>${earnings[earning].amount}</td>
                        </tr>`;
            });
            $("#ui_earnings").html(html);
        }

        async getBillDeductions() {
            let deductions = {};
            this.addings.forEach((adding) => {
                if (adding.type == "DEDUCTION") {
                    if (deductions[adding.name]) {
                        deductions[adding.name].amount += parseInt(
                            adding.amount
                        );
                        deductions[adding.name].emp.push(adding.emp_id);
                    } else {
                        deductions[adding.name] = {
                            name: adding.name,
                            amount: parseInt(adding.amount),
                            id: adding.adding_type_id,
                            emp: [adding.emp_id],
                        };
                    }
                }
            });
            this.deductions = deductions;
            let html = "";
            Object.keys(deductions).forEach((index) => {
                html += `<tr>
                            <td>${deductions[index].name}</td>
                            <td>${deductions[index].amount}</td>
                        </tr>`;
            });
            $("#ui_deductions").html(html);
        }

        async getEmployeeBankDetails() {
            let html = "";
            this.employees.forEach((employee, index) => {
                html += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${employee.name}</td>
                            <td>${employee.bank_ac_no}</td>
                            <td class="text-end">${(
                                parseInt(employee.total_earnings) -
                                parseInt(employee.total_deductions)
                            ).toFixed(2)}</td>
                        </tr>
                    `;
            });
            $("#employeeBankDetails").html(html);
        }

        async singleDeductions() {
            let html = "";
            Object.values(this.deductions).forEach(async (deduction) => {
                let billId = this.sbillId;
                let addingId = deduction.id;
                html += `<div class="deduction">
                <!-- Title -->
                <div
                    class="title fw-semibold text-center pb-3"
                    style="border-bottom: dashed 1px gray"
                >
                    Schedule for ${deduction.name} - Subscription
                </div>
                <!-- DDO Details -->
                <div class="d-flex flex-column align-items-center">
                    <div class="col-12 col-md-9">
                        <div class="row m-0">
                            <strong class="col-12 col-md-3">DdoCode:</strong>
                            <p class="col-12 col-md">25001002016</p>
                            <strong class="col-12 col-md-3">HOA:</strong>
                            <p class="col-12 col-md">2055001090003010011NVN</p>
                        </div>
                        <div class="row m-0">
                            <strong class="col-12 col-md-3">Bill ID:</strong>
                            <p class="col-12 col-md">Bill ID ${this.sbillId}</p>
                            <strong class="col-12 col-md-3">Dedn HOA:</strong>
                            <p class="col-12 col-md">8009011010001000000NVN</p>
                        </div>
                        <div class="row m-0">
                            <strong class="col-12 col-md-3"
                                >DDO Designation:</strong
                            >
                            <p class="col-12 col-md">
                                ADMINISTRATIVE OFFICER, SAR CPL, AMBERPET, HYD
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Table -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Employee Name</th>
                            <th>Employee Code</th>
                            <th>Amt(Rs.)</th>
                        </tr>
                    </thead>
                    <tbody>`;
                let sum = 0;
                deduction.emp.forEach((empId, index) => {
                    let employee = this.employees.find(
                        (element) => element["id"] === empId
                    );
                    let empAmount = this.addings.find(
                        (element) =>
                            element.emp_id == empId &&
                            element.adding_type_id == deduction.id
                    );
                    html += `
                                <tr>
                                <td>${index + 1}</td>
                                <td>${employee.name}</td>
                                <td>${employee.emp_code}</td>
                                <td>${empAmount.amount}</td>
                                </tr>`;
                    sum += parseInt(empAmount.amount);
                });

                html += `</tbody>
                        <tr>
                            <td class="text-end" colspan="3">Total:</td>
                            <td>${sum}</td>
                        </tr>
                            </table>
                        </div>`;
            });
            $("#separateDeductions").html(html);
        }

        async singleEmployee() {
            let html = "";
            this.employees.forEach(async (employee) => {
                html += `<div class="employee">
                <table class="table">
                    <tr>
                        <th class="text-end">Name:</th>
                        <td>${employee.name}</td>
                        <th class="text-end">Employee Code:</th>
                        <td>${employee.emp_code}</td>
                        <th class="text-end">Designation:</th>
                        <td>${employee.designation}</td>
                    </tr>
                    <tr>
                    
                        <td class="allAddings" colspan="6">`;
                billClass.addings
                    .filter((element) => element.emp_id == employee.id)
                    .forEach((earning) => {
                        html += `
                        <span class="px-3">${earning.name}: ${earning.amount}</span>
                            `;
                    });
                Object.values(billClass.deductions)
                    .filter((element) => element.emp_id == "1")
                    .forEach((deduction) => {
                        html += `
                        <span class="px-3">${deduction.name}: ${deduction.amount}</span>
                            `;
                    });
                html += `</td>
                    </tr>
                    <tr class="">
                        <th class="text-end">Total Earnings</th>
                        <td>${employee.total_earnings}</td>
                        <th class="text-end">Total Deductions</th>
                        <td>${employee.total_deductions}</td>
                        <th class="text-end">Net</th>
                        <td>${
                            parseInt(employee.total_earnings) -
                            parseInt(employee.total_deductions)
                        }</td>
                    </tr>
                </table>
            </div>`;
            });
            $("#employeesList").html(html);
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