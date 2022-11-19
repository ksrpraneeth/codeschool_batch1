<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./index.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
    <script src="./index.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
</head>
<body>
    <div class="container-fluid  d-flex position-absolute p-0 m-0" >
        <div class="sidebar  h-100 align-item-start" >
              <img class="image-fluid w-100 my-1" src="https://d20exy1ygbh3sg.cloudfront.net/fms/images/newUi/ifmis-logo.png"  alt="" style="padding:px" ><hr class="line text-secondary">
              
              <div class="list text-white" style="list-style-type:none" style="padding:0px" style="margin:0px">
                  <li class="active">Home</li>
                  <li>Masters</li>
                  <li>Transactions</li>
                  <li>Reports</li>
                  <li>Return Cheque generation</li>
                  <li>Forest Transactions</li>
                  <li>Forest Transactions report</li>
                  <li>E-Kuber Return Received List</li>
                  <li>E-Kuber Return Challan Print</li>
                  <li>UTR</li>
                  <li>Failed Transactions (ACK Reject)</li>
                  <li>Cheque Status Report</li>
                  <li>Finyear New Cheques Report</li>
                  <li>Pd Budget Check</li>
                  <li>Update Rejects Used Amount</li>
              
            </div>
        </div>   
            <div class="Content position-relative p-0" style="background-color:rgb(195, 195, 194)">
            <div class="bg-image" style="background-image:url('./bg.jpeg'); background-color:rgb(17, 53, 90)">
            <div class=" d-flex justify-content-between align-items-center">
              <div class="section d-flex align-items-center ">
                <div class="top_navbar">
                  <div class="hamburger text-white p-3">
                      
                          <i class="fas fa-bars" id="hamBurger" onclick="sidebar1()"></i>
                      
                  </div>
                  </div>
                <div class="logo d-flex d-md-flex d-lg-none align-items-center">
                  <div class="bg-image  d-flex align-items-center justify-content-sm-around" style="background-image: url('bg_city.jpeg')">
                      <img
                        src="https://ifmis.telangana.gov.in/images/govt_logo.png"
                        width="40px"
                        height="40px"
                        class=""
                        alt="..."/>
                    </div>
                      <h4 class="p-0 text-white">
                          IFMIS
                      </h4>
                   </div>
                <div class="text-white py-2 align-items-center">
                  
              </div>
              <div class="align-items-center py-1 px-1 d-flex rounded-3" style="background-color:rgba(149, 145, 145, 0.614)">
                  <div class="text-white">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="20"
                        height="20"
                        fill="currentColor"
                        class="bi bi-boxes"
                        viewBox="0 0 16 16"
                      >
                        <path
                          d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z"
                        />
                      </svg>
                    </div>
                    <div class="text-white">
                      <h5>
                          Modules 
                      </h5>
                    </div>
                </div>
             </div>
             <div class="right d-flex align-items-center">
              <div class="row text-white d-none d-lg-block mx-2" style="font-size:0.8rem">
                  <p  class="m-0 text-secondary"> Last Login</p>
                  <p id="displayDateTime"  class="m-0" onload="dateAndTime()">
                  <?php
                      date_default_timezone_set('Asia/Kolkata');
                      $today = date("d-M-Y");
                      $time = date("h:i A");
                      echo $today;
                      echo "<br/>";
                      echo $time;
                  ?>
                  </p>  
              </div>
          <div class="dropdown align-items-center justify-content-center  d-flex bg-secondary bg-opacity-75  rounded-2" style="font-size: 0.8rem"> 
          <button class="btn  dropdown-toggle d-flex p-0 align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false"> 
          <div class="icon text-white bg-secondary p-2">
              <i class="bi text-white bi-person m-0"></i>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                </svg>
              </div>
                <div class="text-white align-items-center d-none d-lg-block  px-1 m-0 " style="font-size:0.8rem"> 
                  <p class="m-0">WELCOME M.USHASREE</p>
                  <p class="m-0">(23031014097)</p> 
               </div> 
              </button>
              <ul class="dropdown-menu w-100 text-white">
                <li><a class="dropdown-item d-flex align-items-center" href="#">
                  <i class="bi text-white bi-person m-0 "></i>
                  <svg class="text-success" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    </svg><br>
                  <P class="m-0 mx-2">Profile</P>
                </a></li>
                <li><a class="dropdown-item d-flex align-items-center" href="#">
                  <svg class="text-success" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                    <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
                    <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                  </svg>
                  <p class="m-0 mx-2">Change Password</p></a></li>
                <li><a class="dropdown-item d-flex align-items-center"  href="#">
                  <svg class=text-success
                   xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
                 <p class="m-0 mx-2" id="logIn">Logout</p></a></li>
              </ul>
          </div> 
          <div class="d-none d-lg-block ">
              <button type="button"  class="logout d-flex bg-secondary border-0 bg-opacity-25 text-white align-items-center  rounded-2 m-2"> 
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                      <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                  </svg>
                    <h6 class="p-2" id="logOut">Logout</h6>
              </button>  
          </div>
            </div>
            </div>
            </div>
            <div class="body" >
            <div class="p-1 card m-3  border-1">
            <div class=" border-0 d-flex image-fluid p-2 d-none d-md-flex " style="background-color:rgba(198, 211, 231, 0.973)">
              <div class="icon py-1 ">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="primary" class="bi bi-credit-card-2-front-fill align-items-center" viewBox="0 0 16 16">
                  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zm0 3a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zm0 2a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1zm3 0a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1h-1z"/>
                </svg>
              </div>
                <div class="text-bg-warning bg-opacity-25 active text-primary bg-opacity-10 " style="padding:5px"> 
                  <h5>
                       Issue cheque (E-Kuber Cheque from 01/03/2019)
                  </h5>
                </div>
            </div>
      <div class=" card my-2 bar-block border-3" style="background-color:rgb(241, 243, 213)" style="padding:20px" style="font-size:1rem"  >
             <br><h5>
              Points to be remember
            </h5>
            <div class="m-0">
            <ul class="list-unstyled">
                 <ul>
                        <li>Note that all cheques which are approved from DDOChecker/ Officer/Govt from 01/03/2019 shall get paid through E-kuber which is a Core Banking Solution of RBI. </li>
                        <li>There is no need to present the cheques at the Bank for these cheques which got approved after 01/03/2019.</li>
                        <li>Please give correct account details as it is when the Account was opened. </li>
                        <li>Make sure there is no "Your self' or 'Self" in the account names while issuing cheques. Such cheques get auto-rejected by the E-Kuber </li>
                        <li>Please check the exact length of the Bank Account Number and NO special characters are to be entered, which leads to auto-rejection. </li>
                        <li>Finally, in multiple party cheques please do not enter the same party details in the same chequeno which will be considered as a duplicacy transaction and gets auto-rejeted. </li>
                        <li>This is just a one-time procedure to get your Party details corrected and once when corrected the same details can be re-used for smooth transactions. </li>
                        <li>PD-to-PD cheques shall be adjusted in treasury itself in the regular procedure. </li><br>
                 </ul>  
            </ul>
          </div>
        </div><br>
        
        <form class="form m-2" onsubmit="return false">
        <div class="type m-3  d-lg-flex justify-content-between align-item-start">
          <h5>
              <b>
                Transcation Type
              </b>  
            </h5>
       
      <div class="form-check form-check-inline">
          <input class="form-check-input " type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" >
          <label class="form-check-label" for="inlineRadio1">Single-Party</label>
      </div>
      <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
          <label class="form-check-label" for="inlineRadio2">Multiple Parties</label>
      </div>
      <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option1">
              <label class="form-check-label" for="inlineRadio3">PD Account to PD Account</label>
      </div>
      <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option2">
              <label class="form-check-label" for="inlineRadio4">PD Account to others</label>
      </div>
      </div>
      
      
            <div class="form-group d-lg-flex justify-content-between">
            <div class="col-lg-4 col-sm-12">
                <p>Party Account No *</p></div>
                <input type="text" class="form-control"  id="partyAccountNumber" aria-describedby="emailHelp" placeholder="Enter A/C No" autocomplete="off">
            </div>
            <div class="d-lg-flex text-danger">
                <p class="col-lg-4"><p>
                <p  id="partyAccountNumberErr"></p></div>
            <div class="form-group d-lg-flex">
              <div class="col-lg-4 col-sm-12">
                <label>Confirm Party Account No *</label></div>
                <input type="text" class="form-control " id="confirmPartyAccountNumber" placeholder="Enter A/C No" autocomplete="off">
            </div>
            <div class="d-lg-flex text-danger">
                <p class="col-lg-4"><p>
                <p id="confirmPartyAccountNumberErr"></p></div>
            <div class="form-group d-lg-flex justify-content-between">
              <div class="col-lg-4 col-sm-12">
                <label>Party Name</label></div>
                <input type="email" class="form-control " id="partyName" onkeypress="return blockSpecialChar(event)" aria-describedby="emailHelp" placeholder="Enter Party Name">
            </div>
            <div class="d-lg-flex text-danger">
                <p class="col-lg-4"><p>
                <p id="partyNameErr"></p>
            </div>
      <div class="container-fluid  bg-opacity-10" style="margin:5px" >
          <div class="row" style="background-color:rgba(240, 244, 245, 0.942)">
            <div class="d-lg-flex justify-content-between">
              <div class="col-lg-4 col-sm-12">
              <label>Bank IFSC Code</label></div>
                 <div class="input-group ">
                    <input type="text" class="form-control"  id="bankIFSCCode"   placeholder="Enter IFSC Code" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                             <button class="btn btn-outline-secondary btn-primary text-white" id="search" type="button">Search</button>
                        </div>
                </div>
            </div>
            <div class="d-lg-flex text-danger">
                <p class="col-lg-4"><p>
                <p id="bankIFSCCodeErr"></p></div>
            <div class="d-lg-flex justify-content-between">
              <div class="col-lg-4 col-sm-12">
                  <label><b>Bank Name</b></label></div>
                  <label class="col-lg-8 col-sm-12" id="bankName"></label>
            </div><br><p></p>
            <div class="d-lg-flex justify-content-between">
              <div class="col-lg-4 col-sm-12">
                  <label"> <b>Bank Branch</b></label></div> 
                  <label class="col-lg-8 col-sm-12" id="bankBranch"></label>
            </div><br><p></p>
         </div>
      </div>
      <br>
        <div class="d-lg-flex justify-content-between">
          <div class="col-lg-4 col-sm-12">
           <label><b>Head of the Account</b></label></div>
              <select class="form-control"  id="headOfAccount">
                  <option value="">Select</option>
                  <option value="0853001020002000000NVN">0853001020002000000NVN</option>
                  <option value="8342001170004001000NVN">8342001170004001000NVN</option>
                  <option value="2071011170004320000NVN">2071011170004320000NVN</option>
                  <option value="8342001170004002000NVN">8342001170004002000NVN</option>
                  <option value="2204000030006300303NVN">8342001170004002000NVN</option>
              </select>
            </div><br>
              <div class="d-lg-flex justify-content-between">
                <div class="col-lg-4 col-sm-12">
                   <label > <b>Balance (in Rs.)* </b>  </label></div>
                   <label class="col-lg-8 col-sm-12" id="balance" ></label>   
              </div><br>
              <div class="d-lg-flex justify-content-between">
                    <label class="col-lg-4 col-sm-12"> <b>LOC (in Rs.)* </b>  </label> 
                    <label class="col-lg-8 col-sm-12" id="Loc"></label>
              </div><br>
              <div class="d-lg-flex justify-content-between">  
                    <label class="col-lg-4 col-sm-12"> <b>Expenditure type</b></label>
                    <select class="form-select form-select-sm" name="select1" id="expenditureType">
                      <option value="" >Select </option>
                       <option value="Capital_Expenditure">Capital Expenditure</option> 
                       <option value="Revenue_Expenditure">Revenue Expenditure</option> 
                      <option value="Deferred_Revenue_Expenditure">Deferred Revenue Expenditure</option> 
   
                    </select>
              </div><br>
              <div class="d-lg-flex justify-content-between">
              <label class="col-lg-4 col-sm-12"> <b>Purpose type</b>  </label>
              <select class="form-select form-select-sm" name="purposeType" id="purposeType"  > </select>
              <option value="" selected="selected"></option>
            </div>
            <br>
                  <div class="form-group d-lg-flex justify-content-between">
                  <div class="col-lg-4 col-sm-12">
                    <label> <b> Purpose * </b></label></div>
                    <input type="text" class="form-control" id="purpose" aria-describedby="emailHelp" placeholder="Enter Purpose here" maxlength="500">
                  </div>
                  <div class="d-lg-flex text-danger">
                      <p class="col-lg-4"><p>
                      <p id="purposeErr"></p>
                  </div>
                  <div class="form-group d-lg-flex justify-content-between">
                    <div class="col-lg-4 col-sm-12">
                    <label> <b> Party amount</b> (in Rs.) *</label></div>
                    <input type="text" class="form-control" id="partyAmount" placeholder="Enter Party Amount" oninput="numberToWords()" autocomplete="off">
                  </div>
                  <div class="d-lg-flex text-danger">
                      <p class="col-lg-4"><p>
                      <p id="partyAmountErr"></p>
                  </div>
              <div class="d-lg-flex justify-content-between" method="GET">
              <label  class="col-lg-4 col-sm-12"> <b>Party Amount in Words </b></label>
              <label id="partyAmountWords" class="col-lg-8 col-sm-12"></label>  
              </div><br>
              <div class="form-group d-lg-flex justify-content-between">
              <div class="col-lg-4 col-sm-12">
                <label> <b>Upload Documents</b></label></div>
                <div class="d-flex justify-content-between col-lg-8 col-sm-12">
                  <input type="file" class="form-control-file card p-1 w-100 "  id="uploadDocuments" multiple>
                  <button type="button" class="btn btn-primary align-item-end" onclick="addfiles()">+ADD</button><br>
              </div>
              </div>
             <br>
              <div class="d-lg-flex justify-content-between">
              <label class="col-lg-4 col-sm-12"></label>
              <label class="col-lg-8 col-sm-12">Note:Documents of Cheque (Letters/G.O.etc)can be uploaded here</label>
              </div>
              <p id="filesList"></p>
              <hr>
              <div class="d-flex justify-content-center">
              <button type="submit" id="submit" class="btn btn-primary">Next>></button>
            </form>
            </div>
          </div>
        </div>
        </div> 
  </body>
</html>
