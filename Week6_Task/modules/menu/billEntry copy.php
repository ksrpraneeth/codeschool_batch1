<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/billid.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/encryption.php";
?>
<div class="billEntry bg-white h-100 w-100 overflow-auto p-3">
    <div class="title bg-success bg-opacity-10 p-2">
        <h6 class="m-0">FORM 47 - SUPPLEMENTARY BILLS</h6>
    </div>
    <div class="billEntryForm">
        <!-- 🎯 Filters -->
        <div class="filterType row mt-3 m-0 p-2 align-items-center col-12 col-md-10 col-lg-8 align-items-center">
            <div class="col-12 col-md-4">Emoloyee Search Filter Type:</div>
            <div class="col-12 col-md-8">
                <div class="filters d-flex gap-3 align-items-center">
                    <div class="form-check">
                        <input onclick="window.formClass.setFilter('billID')" value="billID" class="form-check-input" type="radio" name="billIdFilter" id="billIdFilterOption" checked />
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
            </div>
        </div>
        <!-- 🎯 Filters End -->

        <!-- 💸 Bill ID Select -->
        <div id="billIDSelectDiv" class="billIdSelectDiv border-top p-2 col-12 col-md-10 col-lg-8 row m-0 align-items-center">
            <div class="col-12 col-md-4">Select Bill ID:</div>
            <div class="col-12 col-md-8">
                <select onchange="window.formClass.setBillId()" name="" class="form-select" id="billId">
                    <option value="" hidden>Select</option>
                    <?php
                    $billIdResponse = (new Billid())->getUserBillids((new Encryption())->decrypt($_SESSION["userDetails"]));
                    if ($billIdResponse["status"] == true) {
                        foreach ($billIdResponse["data"] as $billId) {
                            echo '<option value="' . $billId["id"] . '">' . $billId["name"] . '</option>';
                        }
                    } else {
                        echo "<script>alert('Please contact admin! ERRCODE: BILLID-BE')</script>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <!-- 💸 Bill ID Select End -->

        <!-- 🧑‍🏭 Employee Code -->
        <div id="empCodeDiv" class="billIdSelectDiv d-none border-top p-2 col-12 col-md-10 col-lg-8 row m-0 align-items-center">
            <div class="col-12 col-md-4">Enter Employee Code</div>
            <div class="col-12 col-md-8">
                <input onkeydown="window.formClass.setEmpCode(this, event)" type="text" class="form-control" id="employeeCode" placeholder="Enter employee code..." />
            </div>
        </div>
        <!-- 🧑‍🏭 Employee Code End -->

        <!-- 🏦 Bank Account number -->
        <div id="bankAcNoDiv" class="border-top d-none p-2 col-12 col-md-10 col-lg-8 row m-0 align-items-center">
            <div class="col-12 col-md-4">Enter Bank Account Number</div>
            <div class="col-12 col-md-8">
                <input onkeydown="window.formClass.setEmpBankAcNo(this, event)" type="text" id="bankAcNo" name="" class="form-control" placeholder="Enter Bank Account Number" />
            </div>
        </div>
        <!-- 🏦 Bank Account number -->

        <!-- Select Employee -->
        <div class="border-top p-2 col-12 col-md-10 col-lg-8 row m-0 align-items-center">
            <div class="col-12 col-md-4">Select Employee:</div>
            <div class="col-12 col-md-8">
                <select onchange="window.formClass.employeeChanged()" name="" class="form-select" id="employee">
                    <!-- <option value="" hidden>Select</option> -->
                </select>
            </div>
        </div>
        <!-- Select Employee end -->

        <div id="billDetailsDiv" class="d-none">

            <!-- 📅 Month & Year Selection -->
            <div id="billMonthYearInputDiv" class="billIdSelectDiv border-top p-2 col-12 col-md-10 col-lg-8 row m-0 align-items-center">
                <div class="col-12 col-md-4">Select Month & Year</div>
                <div class="col-12 col-md-8">
                    <input oninput="window.formClass.setMontAndYear(this.value)" type="month" id="monthAndYear" name="" class="form-control" />
                </div>
            </div>
            <!-- 📅 Month & Year Selection end -->

            <!-- ➕ Add Type -->
            <div id="billAddTypeSelectDiv" class="border-top p-2 col-12 col-md-10 col-lg-8 row m-0 align-items-center">
                <div class="col-12 col-md-4">Add Type:</div>
                <div class="col-12 col-md-8">
                    <div class="filters d-flex gap-3 align-items-center">
                        <div class="form-check">
                            <input onchange="window.formClass.setType('earnings')" class="form-check-input" value="earnings" type="radio" name="addType" id="typeEarnings" checked />
                            <label class="form-check-label" for="typeEarnings">
                                Earnings
                            </label>
                        </div>
                        <div class="form-check">
                            <input onchange="window.formClass.setType('deductions')" class="form-check-input" value="deductions" type="radio" name="addType" id="typeDeductions" />
                            <label class="form-check-label" for="typeDeductions">
                                Deductions
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ➕ Add Type End -->

            <!-- 💲 Select Add Type  -->
            <div id="billAddTypeInputDiv" class="billIdSelectDiv border-top p-2 col-12 col-md-10 col-lg-8 row m-0 align-items-center">
                <div class="col-12 col-md-4">Select Type:</div>
                <div class="col-12 col-md-8">
                    <select onchange="window.formClass.currentAddType = this.value" name="" class="form-select" id="selectBillAddType">
                    </select>
                </div>
            </div>
            <!-- 💲 Select Add Type End  -->

            <!-- 🤑 Enter Amount -->
            <div id="billAmountInputDiv" class="billIdSelectDiv border-top p-2 col-12 col-md-10 col-lg-8 row m-0 align-items-center">
                <div class="col-12 col-md-4">Enter Amount</div>
                <div class="col-12 col-md-8 d-flex align-items-center">
                    <input oninput="checkAmount(this);" type="text" class="form-control" id="amount" placeholder="Due..." />
                    <button onclick="formClass.submitForm()" class="btn btn-success ms-3">ADD</button>
                </div>
            </div>
            <!-- 🤑 Enter Amount End -->
        </div>
    </div>

    <!-- Emp Bill List -->
    <div class="empBillList border-top mt-5 d-none" id="empBillList">
        <div class="title border-bottom p-2">
            <h6>Net Earnings & Deductions</h6>
        </div>
        <div class="empDetails d-flex align-items-center my-3 gap-5 flex-wrap">
            <div class="empNameDiv">
                <strong>Employee Name</strong>
                <span id="empName">Sampath B</span>
            </div>

            <div class="empDepartmentDiv">
                <strong>Employee Department</strong>
                <span id="empDepartment">POLICE</span>
            </div>

            <div class="empDesignationDiv">
                <strong>Employee Designation</strong>
                <span id="empDesignation">SI</span>
            </div>
        </div>
        <div class="row">
            <div class="left col-5">
                <table class="table table-bordered text-end">
                    <thead class="bg-primary bg-opacity-10">
                        <tr>
                            <th>Earnings</th>
                            <th>Net Amount(in Rs.)</th>
                        </tr>
                    </thead>
                    <tbody id="earningAndDeductionList">

                    </tbody>
                    <tr class="fw-bold">
                        <td>
                            Net Earnings
                        </td>
                        <td id=""><span id="netEarnings"></span> Rs.</td>
                    </tr>
                    <tr class="fw-bold">
                        <td>
                            Net Deductions
                        </td>
                        <td><span id="netDeductions"></span> Rs.</td>
                    </tr>
                    <tr class="fw-bold">
                        <td>Total</td>
                        <td><span id="total"></span> Rs.</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="addToMainBillButton">
            <button id="addToMainBillButton" class="btn btn-success">Add to Bill</button>
        </div>
    </div>

    <!-- Error -->
    <div id="errorDiv" class="error d-none position-absolute start-0 bottom-0 ms-3 alert alert-danger">
        <div id="error" class="overflow-auto w-100"></div>
    </div>
</div>
<script src="/assets/js/billEntry.js"></script>