<!DOCTYPE html>
<html lang="en">

<head>
    <!-- LINKS AND SCRIPTS -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="styles.css" />
    <title>IFMIS</title>
    <script src="main.js"></script>

</head>

<body>
    <!-- HEADER-LOGO STARTS-->
    <div class="text-white position-absolute w-100 h-100 row m-0" id="tapToggle">
        <div class="Tab p-0 collapseTab col-lg-2 col-md-4 h-100" id="myLinks">
            <!-- HEADER-LOGO ENDS -->
            <img class="px-3 py-2 mt-2 w-100" src="logo.png" alt="IFIMISLOGO" />
            <!-- SIDE MENU BAR STARTS -->
            <div class="menu gap-2" id="menu">
                <ul class="list-unstyled">
                    <li type="button" class="active px-4 py-2 w-100 block">Home</li>
                    <div class="dropend">
                        <li class="px-4 py-2 dropend dropdown-toggle" data-bs-toggle="dropdown">Masters <span></span>
                        </li>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                            <li><a class="dropdown-item" href="#">First</a></li>
                            <li><a class="dropdown-item" href="#">Second</a></li>
                            <li><a class="dropdown-item" href="#">Third</a></li>
                        </ul>
                        <li class="px-4 py-2 dropend dropdown-toggle" data-bs-toggle="dropdown">Transactions
                            <span></span>
                        </li>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                            <li><a class="dropdown-item" href="#">First</a></li>
                            <li><a class="dropdown-item" href="#">Second</a></li>
                            <li><a class="dropdown-item" href="#">Third</a></li>
                        </ul>
                    </div>
                    <li class="px-4 py-2">Reports</li>
                    <li class="px-4 py-2">Return Cheque Generation</li>
                    <li class="px-4 py-2">Forest Transactions</li>
                    <li class="px-4 py-2">Forest Transactions Report</li>
                    <li class="px-4 py-2">E-Kuber Return Received List</li>
                    <li class="px-4 py-2">E-Kuber Return Challan Print</li>
                    <li class="px-4 py-2">UTR Search</li>
                    <li class="px-4 py-2">Failed transactions (ACK Reject)</li>
                    <li class="px-4 py-2">Cheque Status Report</li>
                    <li class="px-4 py-2">Rejected Cheques due to FinYear End</li>
                    <li class="px-4 py-2">Finyear New Cheques Report</li>
                    <li class="px-4 py-2">Pb Budget Check</li>
                    <li class="px-4 py-2">Update Receipts Used Amount</li>
                </ul>
            </div>
        </div>
        <!-- SIDEBAR MENU ENDS -->
        <!-- NAVBAR MENU STARTS -->
        <div class="body overflow-auto col-lg-10 col-md-8 h-100 col-sm-12 p-0" id="body">
            <div class="header w-100 text-white d-flex justify-content-between">
                <div class="left d-flex">
                    <img class="headerlogo d-sm-none my-2 mx-2" height="40px"
                        src="https://ifmis.telangana.gov.in/images/govt_logo.png" alt="" />
                    <div class="menu text-light m-2 rounded-1">
                        <!-- MENU BAR LOGO -->
                        <!-- <div class="menubar"></div>
                        <div class="menubar"></div>
                        <div class="menubar"></div> -->
                        <a href="javascript:void(0);" class="">
                            <i class="fa fa-bars fa-2x m-1 icon"></i>
                        </a>
                        <!-- MENU BAR LOGO -->
                    </div>
                    <button class="btn mod text-white btn-sm rounded-3 my-1 mx-2" style="height: 3rem;">
                        <i class="fas fa-boxes mx-1"></i>
                        <span>Modules</span>
                    </button>
                </div>
                <div class="right d-flex mx-0" style="font-size: 10px; text-align:center;">
                    <div class="time d-none d-md-inline collapseTab my-1 mx-0">
                        <p id="lastlogin" class="text-muted">Last Login:</p>
                        <p id="lldate" class=active"></p>
                        <script>
                            var date = new Date();
                            var current_date = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
                            document.getElementById("lldate").innerHTML = current_date;
                        </script>
                        <p id="lltime" class="active"></p>
                        <script>
                            var date = new Date();
                            var current_date = date.getHours() + "-" + (date.getMinutes() + 1) + "-" + date.getSeconds();
                            document.getElementById("lltime").innerHTML = current_date;
                        </script>
                    </div>
                    <div role="button" class="userinfo mx-0 mt-1 mx-md-4 rounded-3 d-flex align-items-center"
                        style="height: 3rem;">
                        <div class="left">
                            <i class="fa fa-user fa-fw ms-2 me-0" style="font-size: 1rem;"></i>
                        </div>
                        <div class="right mx-2 collapseTab">
                            <p class="welcome">Welcome USERNAME</p>
                            <p class="id">(XXXXXXXXXXXX)</p>
                        </div>
                        <div>
                            <li class="pe-3 py-2 dropend dropdown-toggle list-unstyled" data-bs-toggle="dropdown">
                            </li>
                            <ul class="dropdown-menu py-1 my-2" style="font-size: 14px;"
                                aria-labelledby="dropdownMenuOffset">
                                <li><a class="dropdown-item" href="#">
                                        <i class="fa fa-user me-1" style="color: green;"></i>
                                        Profile</a></li>
                                <li><a class="dropdown-item" href="#">
                                        <i class="fa fa-key me-1" style="color: green;"></i>
                                        Change Password</a></li>
                                <li><a class="dropdown-item" href="#">
                                        <i class="fas fa-sign-out-alt me-1" style="color: green;"></i>
                                        Logout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div role="button" class="userinfo mx-0 mt-1 mx-md-4 rounded-3 d-flex align-items-center"
                        style="height: 3rem;">
                        <div class="right mx-2 collapseTab">
                            <i class="fas fa-sign-out-alt mx-1" style="font-size: 1rem;"></i>
                            <p id="demo" onclick="change_text()">Logout</p>
                            <script>
                                function change_text() {
                                    document.getElementById("demo").innerHTML = "LogIn";
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <!-- NAVBAR MENU ENDS -->
            <!-- MAIN BODY CONTENT STARTS -->
            <div class="content text-dark m-3 bg-white rounded-4 card p-3 mb-3 shadow">
                <div class="title d-flex align-items-center p-2 rounded"
                    style="background-color: #e0ecfc; color: #0066c6">
                    <i class="fa fa-credit-card" style="font-size:24px"></i>
                    <p class="fw-bold m-0 mx-2 rounded">
                        Issue Cheque (E-Kuber Cheque From DD/MM/YYYY)
                    </p>
                </div>
                <!-- POINTS -->
                <div class="my-2 p-3 rounded-3 card p-3 mb-1 shadow" style="background-color: #fcf8e3">
                    <h3 class="fw-bold fs-6">Points to remember</h3>
                    <ul class="fw-normal" style="font-size: 13px">
                        <li>Please note that all cheques which are approved
                            from DDOChecCKer/Ohicer/Govt trom 01/03/2019
                            shall get paid through Ekuber which iIS a Core
                            Banking Solution ot RBl.</li>
                        <li>There is no need to present the cheques at the
                            Bank for these cheques which got approved after
                            01/03/2019.</li>
                        <li>Please give correct account details as it is
                            when the Account was opened.</li>
                        <li>Make sure there is no 'Your self' or 'Self" in
                            the account names while issuing cheques. Such
                            cheques get auto-rejected by the EKuber</li>
                        <li>Please check the exact length of the Bank
                            Account Number and NO special characters are to
                            be entered, which leads to auto rejection</li>
                        <li>Finally, in multiple party cheques please do not
                            enter the same party details in the same
                            cheque no which will be considered as a duplicacy transaction and gets auto-rejeted.
                        </li>
                        <li>This is just a one-time procedure to get your
                            Party details corrected and once when corrected
                            the same details can be re-used for smooth
                            transactions.</li>
                        <li>PD-to-PD cheques shall be adjusted in treasury
                            itself in the regular procedure.</li>
                    </ul>
                </div>
                <!-- POINTS -->
                <!-- FORMS START -->

                <div class="Form p-2 m-4">
                    <div class="errors alert alert-warning d-none unstyled my-3 shadow" style="font-size: 0.8rem;"
                        id="errors"></div>

                    <form action="#" name="partyForm">

                        <!-- Transaction Type start -->
                        <div class="transcation_type row inputGroup bg-light py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">
                                    Transcation Type<span class="text-danger">*</span>
                                </p>
                            </div>
                            <div class="col-lg-10 col-md-9 col-sm-12">
                                <ul class="list-unstyled d-flex gap-0 flex-wrap">
                                    <li>
                                        <div class="form-check  mx-1">
                                            <input class="form-check-input" type="radio" name="ttype" checked
                                                id="singleparty" />
                                            <label class="form-check-label" for="singleparty">
                                                Single Party
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check   mx-1">
                                            <input class="form-check-input" type="radio" name="ttype"
                                                id="multipleparty" />
                                            <label class="form-check-label" for="multipleparty">
                                                Multiple Parties
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check   mx-1">
                                            <input class="form-check-input  mx-1" type="radio" name="ttype"
                                                id="pdtopd" />
                                            <label class="form-check-label" for="pdtopd">
                                                PD Account to PD Account
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check  mx-1">
                                            <input class="form-check-input" type="radio" name="ttype" id="pdtoother" />
                                            <label class="form-check-label" for="pdtoother">
                                                PD Account to other
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Account Number strt -->
                        <div class="inputGroup align-items-center py-4 row">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p id="partyaccount">
                                    Party Account Number<span class="text-danger">*</span>
                                </p>
                            </div>

                            <div class="col-lg-5 col-md-8 col-sm-12">
                                <!-- <input class="form-control" type="password" inputmode="numeric"
                                    placeholder="Enter A/C no" id="partyAccNo" /> -->
                                    <input type="text" name="name" placeholder="Enter A/C no" id="partyAccNo"  value="<?php if (isset($name)) echo $name ?>"> 
	                                <span class="error"><?php if (isset($nameError)) echo $nameError ?></span><br>
                                <!-- <p class="errormessg" id="error">
                                    </p>
                                    <script>
                                        var partyaccnum = document.getElementById("partyaccnum").value;
                                        if (partyaccnum.lenght < 12 || partyaccnum.length > 22) {
                                            errors.push("Party account number must be between 12 and 22");
                                        }
                                    </script> -->
                            </div>
                            <div id="e_partyaccount" class="text-danger"></div>
                        </div>
                        <!-- Account Number End -->

                        <!-- Confirm Account No -->
                        <div class="row inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">
                                    Confirm Party Account Number<span class="text-danger">*</span>
                                </p>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12">
                                <input class="form-control" type="number" inputmode="numeric"
                                    placeholder="Confirm A/C no" id="cpartyaccount" />
                            </div>
                            <div id="e_cpartyaccount" class="text-danger"></div>
                        </div>
                        <!-- Confirm Account No ENd -->


                        <!-- Party Name START -->
                        <div class="row inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">
                                    Party Name<span class="text-danger">*</span>
                                </p>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12">
                                <input class="form-control" type="text" placeholder="Enter Party Name" id="partyname" />
                            </div>
                            <div id="e_partyname" class="text-danger"></div>
                        </div>
                        <!-- PARTY NAME CLOSE -->


                        <!-- Bank IFSC Code strt -->
                        <div class="row bg-light inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">
                                    Bank IFSC Code<span class="text-danger">*</span>
                                </p>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12 d-flex">
                                <input class="form-control" type="text" placeholder="Enter IFSC Code" id="bankcode"
                                    oninput="this.value = this.value.toUpperCase();" ifscCodeChanged(this.value); />
                                <button type="button" class="btn btn-primary ms-2" onclick="getifsc()">
                                    Search
                                </button>
                            </div>
                            <div id="e_bankcode" class="text-danger"></div>


                        </div>
                        <!-- Bank IFSC code end -->

                        <!-- BANK NAME START -->

                        <div class="row bg-light inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">Bank Name</p>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12" id="bankName">

                            </div>
                        </div>
                        <!-- BANK NAME END -->

                        <!-- Bank Branch -->
                        <div class="row bg-light inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">Bank Branch</p>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12" id="bankBranch">

                            </div>
                        </div>
                        <!-- Bank Branch end -->

                        <!-- Head of Account -->
                        <div class="row inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">
                                    Head of account<span class="text-danger">*</span>
                                </p>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12">
                                <select name="" class="form-select" placeholder="Select" id="headOfAccount"
                                    onchange="accountChange()">
                                    <option class=" d-none">
                                        Select
                                    </option>
                                    <option value="0853001020002000000NVN" data-balance="1000000" data-loc="5000">
                                        0853001020002000000NVN
                                    </option>
                                    <option value="8342001170004001000NVN" data-balance="1008340" data-loc="4000">
                                        8342001170004001000NVN
                                    </option>
                                    <option value="2071011170004320000NVN" data-balance="14530000" data-loc="78000">
                                        2071011170004320000NVN
                                </select>
                            </div>

                        </div>
                        <!-- Head of Account end-->

                        <!-- Balance -->
                        <div class="row inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">
                                    Balance <span>(in Rs.)</span>
                                </p>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12" id="balance">

                            </div>
                        </div>

                        <!-- LOC -->
                        <div class="row inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">LOC <span>(in Rs.)</span></p>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12" id="loc">

                            </div>
                        </div>

                        <!-- Expenditure Type -->
                        <div class="row inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">
                                    Expenditure Type<span class="text-danger">*</span>
                                </p>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12">
                                <select name="" class="form-select" placeholder="Select" id="expenditureType"
                                    onchange="expenditureSelect()">
                                    <option class="d-none" value="-1">
                                        Select
                                    </option>
                                    <option value="opt1">Capital Expenditure </option>
                                    <option value="opt2">Revenue Expenditure</option>
                                    <option value="opt3">Deferred Revenue Expenditure</option>
                                </select>
                            </div>

                        </div>

                        <!-- Purpose Type -->
                        <div class="row inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">
                                    Purpose Type<span class="text-danger">*</span>
                                </p>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12">
                                <select name="" class="form-select" placeholder="Select" id="purposeType">
                                    <option class="d-none" value="">
                                        Select
                                    </option>
                                </select>
                                <p id="e_purposeType"></p>

                            </div>

                        </div>

                        <!-- Purpose -->
                        <div class="row inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">
                                    Purpose<span class="text-danger">*</span>
                                </p>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12">
                                <textarea class="form-control" placeholder="Purpose" id="purpose"></textarea>
                            </div>
                            <div id="e_purpose" class="text-danger"></div>

                        </div>

                        <!-- Party Amount -->
                        <div class="row inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">
                                    Party Amount <span>(in Rs.)</span>
                                </p>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12 d-flex flex-column">
                                <input class="form-control" type="number" inputmode="numeric"
                                    placeholder="Enter Party Amount"
                                    id="partyamount" />
                                <p id="partyAmountInWords" class="m-0 fw-normal mt-1 mx-1"></p>
                            </div>
                            <div id="e_partyamount" class="text-danger"></div>

                        </div>

                        <!-- Upload -->
                        <div class="row inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">Upload Documents</p>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12 d-flex">
                                <input class="form-control" type="file" placeholder="Enter Party Amount" id="upload"
                                    multiple="multiple" />
                                <button class="btn btn-primary d-flex mx-3"
                                    style="font-size: 0.8rem;">
                                    <i class="fa fa-plus fa-fw mx-1 mt-1" style="height: 10px;"></i>
                                    Add
                                </button>
                            </div>
                        </div>

                        <!-- Upload doc -->
                        <div class="row inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12"></div>
                            <div class="col-lg-5 col-md-8 col-sm-12">
                                <p class="text text-secondary">Note: Documents of Cheque(Letter/G.O.
                                    etc) can be uploaded here.</p>
                                <ul id="filesList" class="filesList list-group"></ul>
                            </div>
                        </div>

                        <!-- Next Button -->
                        <div class="d-flex-end">
                            <button type="submit" id="submitBtn" value="submit"
                                class="btn btn-primary d-flex align-items-center">
                                <p>Next</p>
                                <i class="fa fa-arrow-right fa-fw m-1"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <!-- MAIN BODY CONTENT ENDS -->
            </div>
        </div>
    </div>
    <!-- NEED HELP START -->
    <div class="nh_bar rounded-4 position-absolute bottom-0 end-0 translate-middle-y mx-4 p-2">
        Need Help ?
    </div>
    <!-- NEED HELP ENDS -->
    <script>
        function getifsc() {
            bankcode = $('#bankcode').val();
            $.ajax({
                method: 'POST',
                data: { 'bankcode': bankcode },
                url: "bankValidation.php",
                success: function (msg) {
                    var response = JSON.parse(msg);
                    if (response.status == true) {
                        $('#bankName').html(response.data.CITY);
                        $('#bankBranch').html(response.data.BRANCH);
                    } else {
                        $('#e_bankcode').html(response.error);
                    }
                }
            });
        }
        function accountChange() {
            headOfAccount = $("#headOfAccount").val();
            $.ajax({
                method: "POST",
                data: { 'headOfAccount': headOfAccount },
                url: 'hoa.php',
                success: function (data) {
                    var response = JSON.parse(data);
                    if (response.status == true) {
                        $('#balance').html(response.data.balance);
                        $('#loc').html(response.data.loc);
                    } else {
                        $('#balance').html(response.error);
                    }
                }
            });
        }

        function expenditureSelect() {
            expenditureType = $("#expenditureType").val();
            $("#e_purposeType").html('');
            $('#purposeType').find('option').remove();
            $.ajax({
                method: "POST",
                data: { 'expenditureType': expenditureType },
                url: 'expendituretype.php',
                success: function (result) {
                    result = JSON.parse(result);
                    console.log('see', result);
                    if (result.status == false) {
                        $("#e_purposeType").html(result.error);
                    } else {
                        console.log(result.data);
                        $('#purposeType').append(`<option value="0">Select</option>`);
                        for (let i = 0; i < result.data.length; i++) {
                            let optionText = result.data[i];
                            let optionValue = result.data[i];
                            $('#purposeType').append(`<option value="${optionValue}">${optionText}</option>`);
                        }
                    }
                }
            });
        }
    </script>
</body>

</html>