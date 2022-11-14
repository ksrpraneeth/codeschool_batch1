<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>document</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
    integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
    integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
    crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
    integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
    crossorigin="anonymous"></script>

</head>

<body>
  <div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <!--  <img src="logo-login.png" class="img-responsive"> -->
        <img class="img-fluid" src="https://pre-prod.dev.pixelvidetesting.com/images/logo-login.png">
      </div>
      <ul class="list-unstyled components">
        <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
        <li class="active">
          <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Masters</a>
          <ul class="collapse list-unstyled" id="homeSubmenu">
            <li>
              <a href="#">Home 1</a>
            </li>
            <li>
              <a href="#">Home 2</a>
            </li>
            <li>
              <a href="#">Home 3</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Transactions</a>
          <ul class="collapse list-unstyled" id="pageSubmenu">
            <li>
              <a href="#">Page 1</a>
            </li>
            <li>
              <a href="#">Page 2</a>
            </li>
            <li>
              <a href="#">Page 3</a>
            </li>
          </ul>
        </li>
        <li><a href="#">Reports</a></li>
        <li><a href="#">Return Cheque Generation</a></li>
        <li><a href="#">Forest Transactions</a></li>
        <li><a href="#">Forest Transactions Report</a></li>
        <li><a href="#">E-Kuber Returns Received List</a></li>
        <li><a href="#">E-Kuber Return Challan Print</a></li>
        <li><a href="#">UTR Search</a></li>
        <li><a href="#">Field transactions(ACK Reject)</a></li>
        <li><a href="#">Cheque Status Report</a></li>
        <li><a href="#">Finyear New Cheques Report</a></li>
        <li><a href="#">PD budget Check</a></li>
        <li><a href="#">Upadate Receipts Used Ammount</a></li>
      </ul>
    </nav>
    <div id="content">
      <div id="Navbarr">
        <nav class="navbar navbar-expand-lg navbar-light bg-darkblue m-0 p-1">
          <div class="container-fluid" style="background-image: url(IFMIS-BACKGROUND.jpeg)">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
              <svg class="svg-inline--fa fa-align-left fa-w-14" aria-hidden="true" data-prefix="fas"
                data-icon="align-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                data-fa-i2svg="">
                <path fill="currentColor"
                  d="M288 44v40c0 8.837-7.163 16-16 16H16c-8.837 0-16-7.163-16-16V44c0-8.837 7.163-16 16-16h256c8.837 0 16 7.163 16 16zM0 172v40c0 8.837 7.163 16 16 16h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16zm16 312h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm256-200H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16h256c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16z">
                </path>
              </svg><!-- <i class="fas fa-align-left"></i> -->
              <span>Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
              data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true"
              aria-label="Toggle navigation">
              <svg class="svg-inline--fa fa-align-justify fa-w-14" aria-hidden="true" data-prefix="fas"
                data-icon="align-justify" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                data-fa-i2svg="">h<path fill="currentColor"
                  d="M0 84V44c0-8.837 7.163-16 16-16h416c8.837 0 16 7.163 16 16v40c0 8.837-7.163 16-16 16H16c-8.837 0-16-7.163-16-16zm16 144h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 256h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0-128h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z">
                </path></svg><!-- <i class="fas fa-align-justify"></i> -->
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                  <button type="button" class="nav-link rounded"
                    style="background-color: rgb(7, 56, 68); color: aliceblue; " href="#">Sign Up</button>
                </li>
                <li class="nav-item">
                  <button type="button" class="nav-link rounded"
                    style="background-color: rgb(7, 56, 68); color: aliceblue; href=" #>Last login</button>
                 <span id="lltime" class="active"></span>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
      <div class="header" style="background-color: rgb(79, 204, 179) ">

        <h3 style="text-align: center; padding: 25px;"> <i class='fas fa-money-check'
            style='color:rgb(42, 52, 112);padding: 5px;'></i>Issue Cheque(E-Kuber Cheque From 01/03/2019)</h3>
      </div>
      <div class="container-fluid m-5 p-4" id="PointsContent" style="border-radius: 30px;">
        <h3>
          <div class=PointstoRemember>Points to Remember :</div>
        </h3>
        <ul id="NewList">
          <li>Please note that all cheques which are approved from DDPChecker?Office?Govt from 01/03/3019 shall be get
            paid.</li>
          <li>There is no need to present the cheques at the bank for these cheques.</li>
          <li>Please give correct account details as it is when the account was created.</li>
          <li>Make sure there is no "Your self" or "Self" in the account names.</li>
          <li>Please check the exact length of the Bank Account number.</li>
          <li>Finally in multiple party cheques please do not enter same party details in both slips.</li>
        </ul>
      </div>
      <form class="form-horizontal" name="signup">
        <div class="form-inline m-2 p-2">
          <label class="control-label col-sm-3"><b>Transacation type </b><span class="text-danger">*</span></label>
          <div class="col-md-8 col-sm-9">
            <div class="form-inline">
              <label><input name="Transacation type" type="radio" style="height:15px; width:15px;" value=" Single party"
                  checked>
                Single party </label>
              <label><input name="Transacation type" type="radio" value=" Multiple parties" checked>
                Multiple parties </label>
              <label><input name="Transacation type" type="radio" value=" PD Account to PD Account" checked>
                PD Account to PD Account </label>
              <label><input name="Transacation type" type="radio" value=" PD Account to other" checked>
                PD Account to other </label>
            </div>
          </div>
        </div>
        <div class="form-inline m-2">
          <label class="control-label col-sm-3"><b>Party Account No :</b><span class="text-danger">*</span></label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="number" class="form-control" id="partyaccount" name="AcNum" placeholder="Enter A/c No" value=""  />
            </div>
          </div>
          <div class=e_partyaccount>dd</div>
        </div>
       
        <div class="form-inline m-2">
          <label class="control-label col-sm-3"> <b>Confirm Party Account No :</b> <span
              class="text-danger">*</span></label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="number" class="form-control" id="cpartyaccount" name="CnfrmAcNum" placeholder="Confirm A/c No" value="" />
            </div>
          </div>
          <div class=e_cpartyaccount>dd</div>
        </div>
        <div class="form-inline m-2">
          <label class="control-label col-sm-3"><b>Party Name* </b><span class="text-danger">*</span></label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="text" class="form-control" name="PName" id="partyname" placeholder="Enter Party Name" value=""  />
            </div>
          </div>
          <div class=e_partyname></div>
        </div>
        <div class="form-inline m-2">
          <label class="control-label col-sm-3"><b>Bank IFSC Code* :</b><span class="text-danger">*</span></label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="text" class="form-control" name="IfscCode" id="bankcode" placeholder="Enter IFSC Code" value=""/>
            </div>
          </div>
        </div>
        <div class="form-inline m-2">
          <label class="control-label col-sm-3"><b>Bank name :</b> <span class="text-danger">*</span></label>
          <div class="col-xs-8">
            <div class="form-inline">
              <div class="col-md-5 col-sm-9">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-inline m-2">
          <label class="control-label col-sm-3"> <b> Bank head :</b> <span class="text-danger">*</span></label>
          <div class="col-xs-8">
            <div class="form-inline">
              <div class="col-md-5 col-sm-9">
                <span class="input-group-addon"> <i class="glyphicon glyphicon-lock"></i></span>
            
              </div>
            </div>
          </div>
        </div>


        <div class="form-inline m-2 p-2">
          <label class="control-label col-sm-3"><b>Head of Account* :</b> <span class="text-danger">*</span></label>
          <div class="col-md-8 col-sm-9">
            <div class="form-inline m-2 ">
              <select style="height:25px; width:200px;" onchange="inputChange(this)">
                <option> Search </option>
                <option value="1">0853001020002000000NVN </option>
                <option value="2">8342001170004001000NVN </option>
                <option value="3">2071011170004320000NVN </option>
                <option value="4">8342001170004002000NVN </option>
                <option value="5"> 2204000030006300303NVN</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-inline m-2">
          <label class="control-label col-sm-3"><b> Balance (in Rs) :</b><span class="text-danger">*</span></label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group">
              <input type="text" class="form-control" id="Balance" />
            </div>
          </div>
        </div>

        <div class="form-inline m-2">
          <label class="control-label col-sm-3"><b> LOC (in Rs) :</b><span class="text-danger">*</span></label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group">
              <input type="text" class="form-control" id="Loc" />
            </div>
          </div>
        </div>
        <div class="form-inline m-2 p-2">
          <label class="control-label col-sm-3"><b>Expenditure Type*:</b> <span class="text-danger">*</span></label>
          <div class="col-md-8 col-sm-9">
            <div class="form-inline m-2 p-2"><label>
                <select id="expenditureType" style="height:auto;" onchange="expenditureTypeChanged(this)">
                  <option value="">select</c>
                  <option value="option1">Capital Expenditure</option>
                  <option value="option2">Reevnue Expenditure</option>
                  <option value="option3">Deffered Revnue EXpenditure</option>
                </select>
            </div>
          </div>
        </div>
        <div class="form-inline m-2 p-2">
          <label class="control-label col-sm-3"><b>Purpose Type* :</b> <span class="text-danger">*</span></label>
          <div class="col-md-8 col-sm-9">
            <div class="form-inline m-2 p-2"><label>
                <select style="height:25px; width:200px;" id="purposeType">
                  <option> Search </option>
                </select>
            </div>
          </div>
        </div>
        <div class="form-inline m-2">
          <label class="control-label col-sm-3"><b>Purpose :</b><span class="text-danger">*</span></label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="text" class="form-control" name="purpose" id="purpose" placeholder="Enter Purpose Here"
                value=""/>
            </div>
          </div>
          <div class=e_purpose>dd</div>
        </div>

        <div class="form-inline m-2">
          <label class="control-label col-sm-3"><b>Party Amount(in Rs) :</b><span class="text-danger">*</span></label>
          <div class="col-md-5 col-sm-8">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input type="number" class="form-control" id="PartyAmount" placeholder="Enter Party Amount"
                onkeyup="toWords(this.value)" />
            </div>
          </div>
        </div>
        <div class="form-inline m-2">
          <label class="control-label col-sm-3"><b>Party Amount in words :</b><span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="AmntTOwords" />
        </div>
    </div>
  </div>
  <div class="form-inline m-2">
    <label class="control-label col-sm-3"><b>Upload Documents</b> <br></label>
    <div class="col-md-5 col-sm-8">
      <div class="input-group"> <span class="input-group-addon" id="file_upload> <i 
        class="glyphicon glyphicon-upload>"</i></span>
        <input type="file" name="file_nm" id="uploadfiles" class="form-control upload" placeholder=""
          aria-describedby="file_upload" multiple />
          <button type="button" class="btn btn-primary align-item-end" onclick="addfiles()">+ADD</button><br>
      </div>
      <ul id="filesList" class="list-group"></ul>
    </div>
  </div>
  <div class="form-inline m-2">
    <div class="col-xs-offset-3 col-md-8 col-sm-9" style="text-align: center;"><span class="text-muted"><span
          class="label label-danger"><small>Note : Documents of Cheque can be uploaded here</small> </span></span>
    </div>
  </div>
  <div class="col-xs-offset-3 col-xs-10" style="text-align: center">
    <div class="button-holder">
      <input name="Submit" type="button" id="submitBtn" value="Submit" class="btn btn-primary">
    </div>
  </div>
  </form>
  </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <!-- Popper.JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
    integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
    crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
    integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
    crossorigin="anonymous"></script>
     <!-- jQuery Custom Scroller CDN -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
  <script type="text/javascript" src="valid.js"></script>
  <!--ifsc code-->
  <script>
  function getifsc(){
	bankcode = $('#bankcode').val();
	$.ajax({
		method:'POST',
		data:{'ifsc':bankcode},
		url:'ifsc.php',
		success:function(msg){
            var response= JSON.parse(msg);
			//console.log(msg);
            if(response.status==true){
            $('#bankname').html(response.data.CITY);
            $('#bankbranch').html(response.data.BRANCH);
        }else{
            $('#e_bankcode').html(response.error);
        }
		}
	});
}
//head of account
function accountChange(){
    headOfAccount=$("#headOfAccount").val();
    $.ajax({
        method:"POST",
        data:{'headOfAccount':headOfAccount},
        url:'hoa.php',
        success:function(data)
        {
            var response=JSON.parse(data);
            if(response.status==true){
        console.log(124);
        $('#balance').html(response.data.balance);
            $('#loc').html(response.data.loc);
            }else{
                $('#balance').html(response.error);
            }
        }
    });
}

//expenditure
function expenditureSelect() {
            expenditureType = $("#expenditureType").val();
            $("#e_purposeType").html('');
            $('#purposeType').find('option').remove();
            $.ajax({
                method: "POST",
                data: {'expenditureType': expenditureType},
                url: 'expen.php',
                success: function (result) {
                    result = JSON.parse(result);
                    console.log('see',result);
                    if(result.status==false){
                        $("#e_purposeType").html(result.error);
                    }else{
                        console.log(result.data);
                        $('#purposeType').append(`<option value="0">Select</option>`);
                        for (let i=0;i<result.data.length;i++){
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