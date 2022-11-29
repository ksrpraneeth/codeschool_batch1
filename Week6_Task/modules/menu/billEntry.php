<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/billid.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/encryption.php";
?>
<div class="billEntry bg-white h-100 w-100 overflow-auto p-3">
    <div class="d-flex align-items-center gap-3 mb-5">
        <div class="title">Supplementary Bill</div>
    </div>

    <!-- Supplementary Bill -->
    <div id="sBillTable" class="d-none">
        <table class="table table-bordered mt-4" id="">
            <thead>
                <tr class="fw-bold bg-secondary text-white">
                    <td>Employee Code</td>
                    <td>Employee Name</td>
                    <td>Month</td>
                    <td>Year</td>
                    <td>Earnings Total</td>
                    <td>Deductions Total</td>
                    <td>Total</td>
                    <td>Actions</td>
                </tr>
            </thead>
            <tbody id="sBillTableBody"></tbody>
        </table>
        <div class="submitButtonDiv d-flex justify-content-end">
            <button class="btn btn-primary" id="submitToDatabase" onclick="submitBill()">
                Submit Bill
            </button>
        </div>
    </div>

    <!-- New Bill Div -->
    <div class="newEmpDiv col-12 col-md-8 col-lg-6">
        <div class="sectionEmpSearch" id="sectionEmpSearch">
            <div class="filterDiv">
                <div class="label">Search Filter Type</div>
                <div class="filters d-flex gap-3 my-3">
                    <div class="form-check">
                        <input onclick="window.formClass.setFilter('billId')" value="billId" class="form-check-input" type="radio" name="billIdFilter" id="billIdFilterOption" />
                        <label class="form-check-label" for="billIdFilterOption">
                            Bill ID
                        </label>
                    </div>
                    <div class="form-check">
                        <input onclick="window.formClass.setFilter('empCode')" value="empCode" class="form-check-input" type="radio" name="billIdFilter" id="empCodeFilterOption" />
                        <label class="form-check-label" for="empCodeFilterOption">
                            EmpCode
                        </label>
                    </div>
                    <div class="form-check">
                        <input onclick="window.formClass.setFilter('bankAcNo')" value="bankAcNo" class="form-check-input" type="radio" name="billIdFilter" id="bankAcNoFilterOption" />
                        <label class="form-check-label" for="bankAcNoFilterOption">
                            Bank Ac No
                        </label>
                    </div>
                </div>
                <div class="filterInputDivs">
                    <div class="filterInputDiv"></div>
                </div>
            </div>
            <div class="filterInputsDiv">
                <div class="filterInput d-none" id="billIDSelectDiv">
                    <div class="label">Select Bill ID</div>
                    <div class="input">
                        <select name="" id="billId" class="form-select" onchange="window.formClass.setBillId(this.value)"></select>
                    </div>
                </div>

                <div class="filterInput d-none" id="empCodeDiv">
                    <div class="label">Enter Employee Code</div>
                    <div class="input">
                        <input type="text" name="" id="empCodeInput" class="form-control" placeholder="Enter Employee Code" />
                    </div>
                </div>

                <div class="filterInput d-none" id="bankAcNoDiv">
                    <div class="label">
                        Enter Employee Bank Account Number
                    </div>
                    <div class="input">
                        <input type="text" name="" id="empBankAcNo" class="form-control" placeholder="Enter Employee Bank Account Number" />
                    </div>
                </div>
            </div>

            <!-- Employee -->
            <div class="employeeDiv mt-3 d-none" id="employeeDiv">
                <div class="label">Select Employee</div>
                <select onchange="window.formClass.setEmployee(this)" class="form-select" name="" id="employee"></select>
            </div>
            <div class="text-danger" id="sectionEmpSearchError"></div>
        </div>

        <!-- Details Div -->
        <div id="detailsDiv" class="d-none mt-3">
            <div id="billMonthYearDiv" class="">
                <div class="billMonthYear">
                    <div class="label">
                        <span>Select Month and Year</span>
                    </div>
                    <input type="month" name="" id="monthAndYear" class="form-control" onchange="window.formClass.setMontAndYear(this.value)" />
                </div>
            </div>

            <div id="earningsDiv" class="mt-3">
                <div class="earningsInputDiv">
                    <div class="label">Earnings</div>
                    <div class="input">
                        <select name="" id="earnings" class="form-select"></select>
                    </div>
                    <div class="earningAmountDiv mt-2 row m-0 col-12 gap-1">
                        <div class="col-9 p-0">
                            <input type="text" id="earningAmount" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" placeholder="Earnings Amount" />
                        </div>
                        <button class="btn btn-success col-2" onclick="window.formClass.addEarning()">
                            Add
                        </button>
                    </div>
                    <div id="earningsTable" class="col-12 mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-primary bg-opacity-10">
                                    <th>Name</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody id="earningsData"></tbody>
                            <tr>
                                <th>Total Earnings</th>
                                <td>
                                    <span id="totalEarnings">0</span>
                                    .Rs
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div id="deductionsDiv" class="mt-3">
                <div class="deductionsInputDiv">
                    <div class="label">Deductions</div>
                    <div class="input">
                        <select name="" id="deductions" class="form-select"></select>
                    </div>
                    <div class="deductionAmountDiv row mt-2 m-0 col-12 gap-1">
                        <div class="col-9 p-0">
                            <input type="text" id="deductionAmount" onkeypress="return /[0-9]/i.test(event.key)" class="form-control" placeholder="Deductions Amount" />
                        </div>
                        <button class="btn btn-success col-2" onclick="window.formClass.addDeduction()">
                            Add
                        </button>
                    </div>
                    <div id="deductionsTable" class="col-12 mt-3">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="bg-danger bg-opacity-10">
                                    <th>Name</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody id="deductionsData"></tbody>
                            <tr>
                                <th>Total Deductions</th>
                                <td>
                                    <span id="totalDeductions">0</span>
                                    .Rs
                                </td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td>
                                    <span id="total">0</span> .Rs
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <button id="submitForm" onclick="submitForm()" class="btn btn-success mt-3">
            Submit
        </button>
    </div>

    <!-- View Employee Bill Modal -->
    <div class="modal modal-lg fade" id="viewEmployeeBillModal" aria-labelledby="viewEmpBillLabel" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-11 col-md-6">
                            <h6 class="title">Earnings</h6>
                            <div class="earningsTable">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="bg-primary bg-opacity-10">
                                            <th>Name</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody id="viewEarningsData"></tbody>
                                    <tr>
                                        <th>Total Earnings</th>
                                        <th id="">
                                            <span id="totalViewEarnings">0</span>
                                            .Rs/
                                        </th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-11 col-md-6">
                            <h6 class="title">Deductions</h6>
                            <div class="earningsTable">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="bg-danger bg-opacity-10">
                                            <th>Name</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody id="viewDeductionsData"></tbody>
                                    <tr>
                                        <th>Total Deductions</th>
                                        <th id="">
                                            <span id="totalViewDeductions">0</span>
                                            .Rs/
                                        </th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Error Div -->
    <div class="alert alert-warning d-none position-fixed start-0 ms-3 bottom-0" id="errorDiv">
        ⚠️<span id="errorText"></span>
    </div>
</div>
<script src="/assets/js/billEntry.js"></script>