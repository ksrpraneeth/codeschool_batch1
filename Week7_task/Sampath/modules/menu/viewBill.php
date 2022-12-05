<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/controller/billid.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/classes/encryption.php";
?>
<div class="billEntry bg-white h-100 w-100 p-3">
    <!-- Bill Token Input Div -->
    <div id="inputDiv">
        <div class="label">Enter Bill token:</div>
        <div class="input col-12 col-md-6 col-lg-4 d-flex align-items-center gap-3">
            <input type="text" class="form-control" id="billId" placeholder="Enter Bill Token No..." />
            <button class="btn btn-success text-nowrap" onclick="window.billClass.getBill($('#billId').val())">View Bill</button>
        </div>
    </div>

    <!-- Bill View Div -->
    <div class="billView d-none" id="billView">
        <button class="btn btn-secondary" onclick="window.billClass.back()">Back</button>
        <!-- Header -->
        <div style="border-bottom: dashed 1px lightgray" class="header pb-3 d-flex flex-column align-items-center">
            <div class="brand d-flex align-items-center gap-3">
                <img src="/assets/images/logo.png" width="50px" alt="" />
                <h5 class="fw-bold m-0">Government of Telangana</h5>
            </div>

            <!-- Title -->
            <div class="title text-center mt-3">
                <h3 class="m-0 fw-normal">TSTC FORM 47<br />SALARY BILL</h3>
            </div>
        </div>

        <!-- User Info Section -->
        <div class="userInfoSection row m-0 mt-3 border-bottom pb-3">
            <div class="d-flex flex-column gap-2">
                <!-- Bill Type -->
                <div class="info row m-0">
                    <div class="label col-12 col-md-4">Bill Type</div>
                    <div class="infoDetail fw-bold col-12 col-md-8">
                        Supplementary Bill
                    </div>
                </div>

                <!-- DDO Code / User ID -->
                <div class="info row m-0">
                    <div class="label col-12 col-md-4">D.D.O Code</div>
                    <div class="infoDetail fw-bold col-12 col-md-8" id="ui_ddo_code">1</div>
                </div>

                <!-- Date -->
                <div class="info row m-0">
                    <div class="label col-12 col-md-4">Date</div>
                    <div class="infoDetail fw-bold col-12 col-md-8" id="ui_bdate">
                        03/12/2022
                    </div>
                </div>

                <!-- Token No -->
                <div class="info row m-0">
                    <div class="label col-12 col-md-4">TokenNo</div>
                    <div class="infoDetail fw-bold col-12 col-md-8" id="ui_bill_id">400000</div>
                </div>
            </div>
        </div>

        <!-- All Earnings and Deductions -->
        <div class="earningsAndDeductionsSection row m-0 p-3">
            <div class="col-12 col-md-6 pe-md-5">
                <strong>All Earnings</strong>
                <!-- Table -->
                <table style="border-top: dashed 1px #00050073; width: 100%" class="" id="ui_earnings">

                </table>
            </div>
            <div class="col-12 col-md-6 border-start">
                <strong>All Deductions</strong>
                <!-- Table -->
                <table style="border-top: dashed 1px #00050073" class="col-12" id="ui_deductions">
                </table>
            </div>
            <!-- Totals -->
            <div class="totals mt-5 col-12 col-md-6">
                <!-- Total Earnings -->
                <div id="totalEarnings" style="
                        border-top: dashed 1px black;
                        border-bottom: dashed 1px black;
                    " class="d-flex justify-content-between align-items-center">
                    <span>Total Earnings</span>
                    <span id="ui_total_earnings">41,024.00</span>
                </div>

                <!-- Total Deductions -->
                <div id="totalDeductions" style="
                        border-top: dashed 1px black;
                        border-bottom: dashed 1px black;
                    " class="d-flex justify-content-between align-items-center">
                    <span>Total Deductions</span>
                    <span id="ui_total_deductions">41,024.00</span>
                </div>

                <!-- Net -->
                <div id="totalNet" style="
                        border-top: dashed 1px black;
                        border-bottom: dashed 1px black;
                    " class="d-flex justify-content-between align-items-center">
                    <span>Total Net</span>
                    <span id="ui_total_net">0.00</span>
                </div>
            </div>
        </div>

        <!-- Employee Details and Net amount section -->
        <div class="empDetailsSection row m-0 p-3 overflow-auto">
            <div class="title fw-semibold">
                Bank Details of all Parties in this Bill
            </div>

            <!-- Employee Bank Details -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Account No</th>
                        <th class="text-end">Amount</th>
                    </tr>
                </thead>
                <tbody id="employeeBankDetails"></tbody>
                <tr>
                    <td colspan="3" class="text-end">Total</td>
                    <td id="bill_total_net" class="text-end"></td>
                </tr>
            </table>
        </div>

        <!-- Separate Deduction Files -->
        <div id="separateDeductions" class="mt-5 overflow-auto">
        </div>

        <!-- Detailed Particulars of Each Employee -->
        <div class="detailedParticulars d-flex flex-column mt-5 overflow-auto">
            <h5 class="title m-0 p-3">Detailed particulars of each employee in the bill</h5>
            <div class="header d-flex justify-content-between border-top border-bottom p-3">
                <div class="left d-flex">
                    <h6>Head of Account:</h6>
                    <h6>2055001090003010011NVN</h6>
                </div>
                <div class="right d-flex">
                    <h6>Bill ID:</h6>
                    <h6 id="dpBillId"></h6>
                </div>
            </div>

            <!-- All Employees -->
            <div id="employeesList"></div>
        </div>
    </div>
    <!-- Error Div -->
    <div class="alert alert-warning d-none position-fixed start-0 ms-3 bottom-0" id="errorDiv">
        ⚠️<span id="errorText"></span>
    </div>
</div>
<script src="/assets/js/viewBill.js"></script>