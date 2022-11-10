<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IFMIS</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <!-- Boostrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Index CSS -->
    <link rel="stylesheet" href="./css/index.css" />
    <!-- Index JS -->
    <script src="./js/index.js"></script>
</head>

<body style="background-color: lightgray">
    <!-- Main Body -->
    <div class="w-100 h-100 position-absolute main text-white m-0 d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-0 overflow-auto h-100 position-fixed" id="sidebar">
            <!-- logo -->
            <img class="logo px-4 mt-2 w-100" src="https://d20exy1ygbh3sg.cloudfront.net/fms/images/newUi/ifmis-logo.png" alt="" />
            <hr class="my-3" />

            <!-- Menu -->
            <div class="menu">
                <!-- Menu List -->
                <ul class="list-unstyled">
                    <li class="active px-4 py-2">Home</li>
                    <li class="px-4 py-2">Masters</li>
                    <li class="px-4 py-2">Transcations</li>
                    <li class="px-4 py-2">Reports</li>
                    <li class="px-4 py-2">Return Cheque Generation</li>
                    <li class="px-4 py-2">Forest Transcations</li>
                    <li class="px-4 py-2">Forest Transcations Report</li>
                    <li class="px-4 py-2">E-Kuber Return Recieved List</li>
                    <li class="px-4 py-2">E-Kuber Return Challan Print</li>
                    <li class="px-4 py-2">UTR Search</li>
                    <li class="px-4 py-2">
                        Failed transactions (ACK Reject)
                    </li>
                    <li class="px-4 py-2">Cheque Status Report</li>
                    <li class="px-4 py-2">
                        Rejected Cheques due to FinYear End
                    </li>
                    <li class="px-4 py-2">Finyear New Cheques Report</li>
                    <li class="px-4 py-2">Pb Budget Check</li>
                    <li class="px-4 py-2">Update Receipts Used Amount</li>
                </ul>
            </div>
        </div>
        <!-- Sidebar End -->

        <!-- Body Start -->
        <div class="body position-relative p-0" id="body">
            <!-- Header -->
            <div class="header w-100 text-white p-2 d-flex justify-content-between">
                <!-- Left -->
                <div class="left d-flex">
                    <!-- Header Logo -->
                    <img class="headerlogo d-block d-sm-none" src="https://ifmis.telangana.gov.in/images/govt_logo.png" alt="" />

                    <!-- Menu Btn -->
                    <div class="menuBtn d-none d-md-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16" style="cursor: pointer" onclick="toggleSidebar();">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </div>

                    <!-- Mobile Menu Btn -->
                    <div class="menuBtn d-flex d-md-none align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16" style="cursor: pointer" onclick="toggleMobileSidebar();">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </div>

                    <!-- Modules Btn -->
                    <button class="btn modules mx-2 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-boxes" viewBox="0 0 16 16">
                            <path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z" />
                        </svg>
                        <span>Modules</span>
                    </button>
                </div>

                <!-- Right -->
                <div class="right d-flex">
                    <!-- Last Login Time -->
                    <div class="time d-none d-md-block">
                        <p class="p1">Last Login</p>
                        <p class="p2" id="currentDate"></p>
                        <p class="p3" id="currentTime">04:53 PM</p>
                    </div>

                    <!-- Account Details -->
                    <div role="button" data-bs-toggle="dropdown" aria-expanded="false" class="profile p-1 mx-0 mx-md-4 d-flex align-items-center dropdown-toggle">
                        <!-- User logo -->
                        <div class="left">
                            <img src="https://cdn-icons-png.flaticon.com/512/219/219983.png" alt="" />
                        </div>

                        <!-- User name and id -->
                        <div class="right mx-2 d-none d-md-block">
                            <p class="welcome">Welcome M.USHASHREE</p>
                            <p class="id">(23031013097)</p>
                        </div>
                    </div>
                    <ul class="dropdown-menu">
                        <li class="d-flex align-items-center flex-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                            </svg>
                            <p>Profile</p>
                        </li>
                        <li class="d-flex align-items-center flex-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                            </svg>
                            <p>Change Password</p>
                        </li>
                        <li onclick="logout()" class="d-flex align-items-center flex-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg>
                            <p id="logoutButtonText2">Logout</p>
                        </li>
                    </ul>
                    <!-- Logout Button -->
                    <button onclick="logout()" class="logout d-none d-md-flex p-2 text-white border-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                        </svg>
                        <p id="logoutButtonText" class="mx-2">Logout</p>
                    </button>
                </div>
            </div>
            <!-- Header End -->

            <!-- Content -->
            <div class="content text-dark m-sm-3 bg-white">
                <!-- Title -->
                <div class="title align-items-center p-2 d-none d-sm-flex" style="background-color: #e0ecfc; color: #0066c6">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAABvklEQVRIie2UMW/TQBSAv3etiFh7LQgBWwe6U8RAYpDYGNjK1gWJoeqJHQbSla0xSGSoGGCiFSNIXYhdGJD6D2CsCMI1FUwIYj8GZOQmMSSVrS75pjvfO33v3XsyTJhQEZItZl14Q1XbCGcrcu2lqncOHl19DWCyr4o+qVAKcM6ItLONyR9UKM04ny2m+09EWKvCqMqD/H5AvN/ymlWIrQsOiU1RYNWULrYu6FoXfP5f3MBTH5W5lTfziTEbwGmAGReEU8LtqOV9GEs868IdRa8UnQvydt9v1LN9YsyGCAuqektEEoH1NOUZcHnY/SM/dYrqoUSEC8Ce/vy1HfveSzFT14F7RfcLK85XMxLCFsqKqZ3oWhe+I023VWrtovDShituNVZVdQlkC9UFRR/Cj5CmDnWM3OP+nuaZd69qB3TqPTW73/zGJk01Ng6fCrI896VzKoKBKR95qvt7muejPZnY2DyfFr7PrHbuy9egB3IJ+BRFUTTsTjk9bl7rcXfnJmn6WERe8CfFXYwus7mUjCUel3i9/h64aF3QBST2vcV/xZcm/puA750ZJe7Y/tUDFVsXFA5RmRxbxRMmVMZvHe6YzRssK5MAAAAASUVORK5CYII=" />
                    <p class="fw-bold m-0 mx-2">
                        Issue Cheque (E-Kuber Cheque From 01/03/2019)
                    </p>
                </div>

                <!-- Points -->
                <div class="points m-sm-4 p-3 rounded-2" style="background-color: #fcf8e3">
                    <h3 class="fs-6 fw-bolder">Points to remember</h3>
                    <ul style="font-size: 12px" class="fw-normal">
                        <li>
                            Please note that all cheques which are approved
                            from DDOChecCKer/Ohicer/Govt trom 01/03/2019
                            shall get paid through Ekuber which iIS a Core
                            Banking Solution ot RBl.
                        </li>
                        <li>
                            There is no need to present the cheques at the
                            Bank for these cheques which got approved after
                            01/03/2019.
                        </li>
                        <li>
                            Please give correct account details as it is
                            when the Account was opened.
                        </li>
                        <li>
                            Make sure there is no 'Your self' or 'Self" in
                            the account names while issuing cheques. Such
                            cheques get auto-rejected by the EKuber
                        </li>
                        <li>
                            Please check the exact length of the Bank
                            Account Number and NO special characters are to
                            be entered, which leads to auto rejection
                        </li>
                        <li>
                            Finally, in multiple party cheques please do not
                            enter the same party details in the same
                            chequeno which will be considered as a duplicacy
                            transaction and gets auto-rejeted.
                        </li>
                        <li>
                            This is just a one-time procedure to get your
                            Party details corrected and once when corrected
                            the same details can be re-used for smooth
                            transactions.
                        </li>
                        <li>
                            PD-to-PD cheques shall be adjusted in treasury
                            itself in the regular procedure.
                        </li>
                    </ul>
                </div>
                <!-- Points End -->

                <!-- Form -->
                <div class="formDiv p-2 m-4">
                    <!-- Errors -->
                    <div class="errors alert alert-danger d-none" style="font-size: 12px" id="errors"></div>
                    <!-- Form -->
                    <form onsubmit="validateForm(event)" action="#" name="partyForm">
                        <!-- Transaction Type -->
                        <div class="transcation_type row inputGroup bg-light py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">
                                    Transcation Type<span class="text-danger">*</span>
                                </p>
                            </div>
                            <div class="col-lg-10 col-md-9 col-sm-12">
                                <ul class="list-unstyled d-flex gap-0 gap-sm-2 flex-wrap">
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ttype" checked id="singleparty" />
                                            <label class="form-check-label" for="singleparty">
                                                Single Party
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ttype" id="multipleparty" />
                                            <label class="form-check-label" for="multipleparty">
                                                Multiple Parties
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ttype" id="pdtopd" />
                                            <label class="form-check-label" for="pdtopd">
                                                PD Account to PD Account
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ttype" id="pdtoother" />
                                            <label class="form-check-label" for="pdtoother">
                                                PD Account to other
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Account No -->
                        <div class="row inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">
                                    Party Account no<span class="text-danger">*</span>
                                </p>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12">
                                <input class="form-control" type="password" inputmode="numeric" placeholder="Enter A/C no" id="partyAccNo" />
                            </div>
                        </div>

                        <!-- Confirm Account No -->
                        <div class="row inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">
                                    Confirm Party Account no<span class="text-danger">*</span>
                                </p>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12">
                                <input class="form-control" type="number" inputmode="numeric" placeholder="Confirm A/C no" id="conPartyAccNum" />
                            </div>
                        </div>

                        <!-- Party Name -->
                        <div class="row inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">
                                    Party Name<span class="text-danger">*</span>
                                </p>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12">
                                <input class="form-control" type="text" placeholder="Enter Party Name" id="partyName" />
                            </div>
                        </div>

                        <!-- Bank IFSC Code -->
                        <div class="row bg-light inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">
                                    Bank IFSC Code<span class="text-danger">*</span>
                                </p>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12 d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <input class="form-control" type="text" placeholder="Enter IFSC Code" id="IFSCCode" oninput="this.value = this.value.toUpperCase();" />
                                    <button type="button" onclick="ifscCodeChanged()" class="btn btn-primary ms-2">
                                        Search
                                    </button>
                                </div>
                                <div id="ifscErrorDiv" class="text-danger ms-1 mt-2 d-none"></div>
                            </div>
                        </div>

                        <!-- Bank Name -->
                        <div class="row bg-light inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">Bank Name</p>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12" id="bankName">
                            </div>
                        </div>

                        <!-- Bank Branch -->
                        <div class="row bg-light inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">Bank Branch</p>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12" id="bankBranch">
                            </div>
                        </div>

                        <!-- Head of Account -->
                        <div class="row inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">
                                    Head of account<span class="text-danger">*</span>
                                </p>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12">
                                <select name="" class="form-select" placeholder="Select" id="headOfAccount" onchange="headOfAccountChanged(event, this)">
                                    <option class="d-none" value="-1">
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
                                    </option>
                                    <option value="8342001170004002000NVN" data-balance="1056400" data-loc="34000">
                                        8342001170004002000NVN
                                    </option>
                                    <option value="2204000030006300303NVN" data-balance="123465400" data-loc="5000">
                                        2204000030006300303NVN
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!-- Balance -->
                        <div class="row inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">
                                    Balance <span>(in Rs.)</span>
                                </p>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12" id="balance">
                                XXXXX
                            </div>
                        </div>

                        <!-- LOC -->
                        <div class="row inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">LOC <span>(in Rs.)</span></p>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12" id="loc">
                                XXXXX
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
                                <select name="" class="form-select" placeholder="Select" id="expenditureType" onchange="expenditureTypeChanged(this.value)">
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
                        </div>

                        <!-- Party Amount -->
                        <div class="row inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">
                                    Party Amount <span>(in Rs.)</span>
                                </p>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12 d-flex flex-column">
                                <input class="form-control" type="number" inputmode="numeric" placeholder="Enter Party Amount" oninput="partyAmountChanged(this.value)" id="partyAmount" />
                                <p id="partyAmountInWords" class="m-0 fw-normal mt-1 mx-1"></p>
                            </div>
                        </div>

                        <!-- Upload -->
                        <div class="row inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <p class="">Upload Documents</p>
                            </div>
                            <div class="col-lg-5 col-md-8 col-sm-12 d-flex">
                                <input class="form-control" type="file" placeholder="Enter Party Amount" id="upload" multiple="multiple" />
                                <button type="button" class="btn btn-primary ms-2 d-flex" onclick="addFiles()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                    </svg>
                                    Add
                                </button>
                            </div>
                        </div>

                        <!-- Upload Note -->
                        <div class="row inputGroup align-items-center py-2">
                            <div class="col-lg-2 col-md-3 col-sm-12"></div>
                            <div class="col-lg-5 col-md-8 col-sm-12">
                                <i>Note: Documents of Cheque(Letter/G.O.
                                    etc) can be uploaded here.</i>
                                <ul id="filesList" class="filesList list-group"></ul>
                            </div>
                        </div>

                        <!-- Next Button -->
                        <hr />
                        <div class="d-flex justify-content-center mb-3">
                            <button class="btn btn-primary d-flex align-items-center" style="font-size: 14px">
                                <p>Next</p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
                                    <path d="M6 12.796V3.204L11.481 8 6 12.796zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- content -->
        </div>
        <!-- Body End -->
    </div>

    <!-- Need Help -->
    <div class="needHelp">Need Help ?</div>

    <!-- Loading -->
    <div class="loading position-fixed w-100 h-100 d-flex justify-content-center align-items-center bg-white" id="loading">
        <img src="./images/loading.gif" alt="" style="width: 250px" />
    </div>

    <!-- Mobile Sidebar Background -->
    <div id="mobileSidebarBg" onclick="toggleMobileSidebar()" class="mobileSidebarBg d-none d-md-none position-fixed w-100 h-100"></div>
</body>

</html>