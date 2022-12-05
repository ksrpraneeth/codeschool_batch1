<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/billid.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/encryption.php";
?>
<div class="billEntry bg-white h-100 w-100 overflow-auto p-3">
    <!-- Employee List -->
    <div id="employeeListDiv">
        <!-- Header -->
        <div class="row m-0 border-bottom py-3">
            <h6 class="fw-semibold m-0">Employee Masters</h6>
        </div>

        <!-- Filters -->
        <div class="filters mt-3">
            <!-- Options -->
            <div class="formGroup d-flex gap-3">
                <div class="label">Search By:</div>
                <div class="input d-flex gap-2">
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="empFilterRadio"
                            id="billIdFilter"
                            onclick="window.filterClass.setFilter('billId')"
                        />
                        <label class="form-check-label" for="billIdFilter">
                            Bill ID
                        </label>
                    </div>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="empFilterRadio"
                            id="empCodeFilter"
                            onclick="window.filterClass.setFilter('empCode')"
                        />
                        <label class="form-check-label" for="empCodeFilter">
                            Employee Code
                        </label>
                    </div>
                </div>
            </div>

            <!-- Bill ID -->
            <div
                class="formGroup py-3 col-12 col-md-6 col-lg-4 d-none"
                id="billIdDiv"
            >
                <select
                    onchange="window.filterClass.getEmployees('billId', this.value)"
                    name=""
                    id="billId"
                    class="form-select"
                >
                    <option value="" hidden>Select...</option>
                    <?php
                    $userId = (new Encryption())->decrypt($_SESSION["userDetails"]);
                    $response = (new Billid())->getUserBillids($userId); if
                    (count($response["data"]) > 0) { foreach ($response["data"]
                    as $billId) { echo "
                    <option value='" . $billId["id"] . "'>
                        " . $billId["name"] . "
                    </option>
                    "; } } ?>
                </select>
            </div>

            <!-- Employee Code -->
            <div
                class="formGroup py-3 col-12 col-md-6 col-lg-4 d-none"
                id="empCodeDiv"
            >
                <input
                    name=""
                    id="empCode"
                    class="form-control"
                    type="text"
                    placeholder="Please Enter Employee Code..."
                />
            </div>
        </div>

        <!-- Employee Table -->
        <div class="employeeTable mt-3 d-none" id="employeeTable">
            <table class="table table-bordered">
                <thead>
                    <tr class="table-primary">
                        <th>S/O</th>
                        <th>Employee Name</th>
                        <th>Employee Code</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody id="employeeTableData"></tbody>
            </table>
        </div>
    </div>

    <!-- Employee Details -->
    <div id="employeeDetailsDiv" class="d-none">
        <button
            onclick="window.employeeClass.backToEmployeeList()"
            class="btn btn-secondary"
        >
            Back
        </button>

        <!-- Profile Details -->
        <div class="profileDetails p-2">
            <h5 id="emp_name" class="border-bottom p-2">#Name#</h5>
            <div class="detail d-flex gap-3 align-items-center">
                <div class="label fw-semibold">Department:</div>
                <div class="value fs-12" id="emp_department">#Null#</div>
            </div>
            <div class="detail d-flex gap-3 align-items-center">
                <div class="label fw-semibold">Designation:</div>
                <div class="value fs-12" id="emp_designation">#Null#</div>
            </div>
        </div>

        <!-- Earnings List -->
        <div class="addingsList row mt-5 m-0 justify-content-between">
            <!-- Earnings -->
            <div class="earnings col-12 col-md-6">
                <div
                    class="d-flex justify-content-between align-items-center p-2"
                >
                    <h6 class="m-0">Earnings</h6>
                    <button
                        class="btn btn-primary btn-sm"
                        onclick="window.employeeClass.addEarning()"
                    >
                        <i class="bi bi-plus"></i>
                        <span>Add Earnings</span>
                    </button>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-secondary">
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="emp_earnings"></tbody>
                </table>
            </div>

            <!-- Deductions -->
            <div class="deductions col-12 col-md-6">
                <div
                    class="d-flex justify-content-between align-items-center p-2"
                >
                    <h6 class="m-0">Deductions</h6>
                    <button
                        class="btn btn-danger btn-sm"
                        onClick="window.employeeClass.addDeduction()"
                    >
                        <i class="bi bi-plus"></i>
                        <span>Add Deductions</span>
                    </button>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-secondary">
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="emp_deductions"></tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Error Div -->
    <div
        class="alert alert-warning d-none position-fixed start-0 ms-3 bottom-0"
        id="errorDiv"
    >
        ⚠️<span id="errorText"></span>
    </div>

    <!-- Modals -->
    <!-- Earning Modal -->
    <div
        class="modal fade"
        id="newEarningModal"
        tabindex="-1"
        aria-labelledby="newEarningModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="newEarningModalLabel">
                        Add New Earning
                    </h1>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="p-3">
                        <div class="row m-0">
                            <div class="col-12 col-md-6">
                                Select Earning:
                                <span class="text-danger">*</span>
                            </div>
                            <div class="col-12 col-md-6">
                                <select
                                    class="form-select"
                                    id="earningModalEarnings"
                                ></select>
                            </div>
                        </div>

                        <div class="row mt-2 m-0">
                            <div class="col-12 col-md-6">
                                Enter Amount: <span class="text-danger">*</span>
                            </div>
                            <div class="col-12 col-md-6">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Enter amount..."
                                    id="earningModalAmount"
                                    onkeypress="return /[0-9]/i.test(event.key)"
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        onclick="window.employeeClass.addEmployeeEarning()"
                        class="btn btn-primary"
                    >
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Deduction Modal -->
    <div
        class="modal fade"
        id="newDeductionModal"
        tabindex="-1"
        aria-labelledby="newDeductionModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="newDeductionModalLabel">
                        Add New Deduction
                    </h1>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="p-3">
                        <div class="row m-0">
                            <div class="col-12 col-md-6">
                                Select Deduction:
                                <span class="text-danger">*</span>
                            </div>
                            <div class="col-12 col-md-6">
                                <select
                                    class="form-select"
                                    id="deductionModalDeductions"
                                ></select>
                            </div>
                        </div>

                        <div class="row mt-2 m-0">
                            <div class="col-12 col-md-6">
                                Enter Amount: <span class="text-danger">*</span>
                            </div>
                            <div class="col-12 col-md-6">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Enter amount..."
                                    id="deductionModalAmount"
                                    onkeypress="return /[0-9]/i.test(event.key)"
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button 
                        type="button" 
                        class="btn btn-primary"
                        onclick="window.employeeClass.addEmployeeDeduction()"
                        >
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/assets/js/masterEmployee.js"></script>
