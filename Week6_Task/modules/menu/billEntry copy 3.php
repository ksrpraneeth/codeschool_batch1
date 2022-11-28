<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/billid.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/encryption.php";
?>
<div class="billEntry bg-white h-100 w-100 overflow-auto p-3">
    <div class="d-flex align-items-center gap-3">
        <div class="title">Supplementary Bill</div>
        <div class="addNewEmpBillBtnDiv">
            <button
                id="addNewEmp"
                class="btn btn-success"
                data-bs-toggle="modal"
                data-bs-target="#newEmpBillModal"
            >
                Add New Employee Bill
            </button>
        </div>
    </div>

    <!-- Supplementary Bill -->
    <table class="table table-bordered mt-4">
        <thead>
            <tr class="fw-bold">
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

    <!-- New Emp Bill Modal -->
    <div
        class="modal modal-lg fade"
        id="newEmpBillModal"
        tabindex="-1"
        aria-labelledby="newEmpBillModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="newEmpBillModalLabel">
                        New Employee Bill Modal
                    </h1>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <!-- Filters -->
                    <div class="filtersInputDiv">
                        <div class="label">Search Filter Type</div>
                        <div class="filters d-flex gap-3 my-3">
                            <div class="form-check">
                                <input
                                    onclick="window.formClass.setFilter('billId')"
                                    value="billId"
                                    class="form-check-input"
                                    type="radio"
                                    name="billIdFilter"
                                    id="billIdFilterOption"
                                />
                                <label
                                    class="form-check-label"
                                    for="billIdFilterOption"
                                >
                                    Bill ID
                                </label>
                            </div>
                            <div class="form-check">
                                <input
                                    onclick="window.formClass.setFilter('empCode')"
                                    value="empCode"
                                    class="form-check-input"
                                    type="radio"
                                    name="billIdFilter"
                                    id="empCodeFilterOption"
                                />
                                <label
                                    class="form-check-label"
                                    for="empCodeFilterOption"
                                >
                                    EmpCode
                                </label>
                            </div>
                            <div class="form-check">
                                <input
                                    onclick="window.formClass.setFilter('bankAcNo')"
                                    value="bankAcNo"
                                    class="form-check-input"
                                    type="radio"
                                    name="billIdFilter"
                                    id="bankAcNoFilterOption"
                                />
                                <label
                                    class="form-check-label"
                                    for="bankAcNoFilterOption"
                                >
                                    Bank Ac No
                                </label>
                            </div>
                        </div>
                        <div class="inputs">
                            <div
                                class="filterInput d-none"
                                id="billIDSelectDiv"
                            >
                                <div class="label">Select Bill ID</div>
                                <div class="input">
                                    <select
                                        name=""
                                        id="billId"
                                        class="form-select"
                                        onchange="window.formClass.setBillId(this.value)"
                                    ></select>
                                </div>
                            </div>

                            <div class="filterInput d-none" id="empCodeDiv">
                                <div class="label">Enter Employee Code</div>
                                <div class="input">
                                    <input
                                        type="text"
                                        name=""
                                        id="empCodeInput"
                                        class="form-control"
                                        placeholder="Enter Employee Code"
                                    />
                                </div>
                            </div>

                            <div class="filterInput d-none" id="bankAcNoDiv">
                                <div class="label">
                                    Enter Employee Bank Account Number
                                </div>
                                <div class="input">
                                    <input
                                        type="text"
                                        name=""
                                        id="empBankAcNo"
                                        class="form-control"
                                        placeholder="Enter Employee Bank Account Number"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Employee -->
                    <div id="employeeInputDiv" class="employeeInputDiv d-none">
                        <div class="label">Select Employee</div>
                        <div class="input">
                            <select
                                onchange="window.empSearchFilterClass.setEmployee()"
                                class="form-select"
                                name=""
                                id="employee"
                            ></select>
                        </div>
                    </div>

                    <!-- More Details Div -->
                    <div id="moreDetailsDiv" class="d-none">
                        <!-- Month and Year -->
                        <div class="monthAndYearDiv">
                            <div class="label">Select Month and Year</div>
                            <div class="input">
                                <input
                                    type="month"
                                    class="form-control"
                                    name=""
                                    id="monthAndYearInput"
                                />
                            </div>
                        </div>

                        <!-- Earnings -->
                        <div class="earningsDiv">
                            <div class="label">
                                <span>Earnings</span>
                            </div>
                            <div class="inputDiv">
                                <div class="earningsInput">
                                    <select
                                        name=""
                                        id="earnings"
                                        class="form-select"
                                    ></select>
                                    <input
                                        type="text"
                                        placeholder="Earnings Amount"
                                        id="earningsAmount"
                                        class="form-control"
                                    />
                                </div>
                                <div class="earningsTable">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody id="earningsTableData"></tbody>
                                        <tr>
                                            <th>Total</th>
                                            <th>
                                                <span id="earningsTotal"
                                                    >0</span
                                                >
                                                Rs.
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Deductions -->
                        <div class="deductionsDiv">
                            <div class="label">
                                <span>Deductions</span>
                            </div>
                            <div class="inputDiv">
                                <div class="deductionInput">
                                    <select
                                        name=""
                                        id="deductions"
                                        class="form-select"
                                    ></select>
                                    <input
                                        type="text"
                                        placeholder="Deduction Amount"
                                        id="deductionsAmount"
                                        class="form-control"
                                    />
                                </div>
                                <div class="deductionsTable">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody id="deductionsTableData"></tbody>
                                        <tr>
                                            <th>Total</th>
                                            <th>
                                                <span id="deductionsTotal"
                                                    >0</span
                                                >
                                                Rs.
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Errors -->
                    <div id="errors" class="text-danger p-3"></div>
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/assets/js/billEntry.js"></script>
