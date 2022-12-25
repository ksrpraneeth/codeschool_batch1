$("document").ready(function () {
  hideall();
});


function hideall() {
  $("#mainForm").addClass("d-none");
  $("#formsuppl").addClass("d-none");
  $("#otherBills").addClass("d-none");
  $("#salaryBills").addClass("d-none");

  $("#formSuppBills").addClass("d-none");
  $("#hr").addClass("d-none");
  $("#selectSupplBill").addClass("d-none");
  $("#forms").addClass("d-none");
  $("#empSearchFilterType").addClass("d-none");

  $("#selectBillId").addClass("d-none");
  $("#enterEmpCode").addClass("d-none");
  $("#enterBankAcNO").addClass("d-none");
  $("#selectEmp").addClass("d-none");
  $("#empNameEmp").addClass("d-none");
  $("#empNameBank").addClass("d-none");
  $("#dateId").addClass("d-none");
  $("#inputErrors").addClass("d-none");

  $("#employeeSearchBill").addClass("d-none");
  $("#empSearchBank").addClass("d-none");
  $("#empSearchEmp").addClass("d-none");
  $("#transactionType").addClass("d-none");
  $("#enterAmount").addClass("d-none");
  $("#earningTable").addClass("d-none");
  $("#deductionTable").addClass("d-none");
  $("#finalBillTable").addClass("d-none");
}

function unHideForm() {
  hideall();
  $("#mainForm").removeClass("d-none");
  $("#inputErrors").removeClass("d-none");
}

function unHideForm47() {
  $("#mainForm").removeClass("d-none");
  $("#formsuppl").removeClass("d-none");
  $("#otherBills").addClass("d-none");
  $("#salaryBills").addClass("d-none");
  $("#formSuppBills").removeClass("d-none");
  $("#hr").removeClass("d-none");
  $("#selectSupplBill").removeClass("d-none");
  $("#forms").removeClass("d-none");
  $("#empSearchFilterType").removeClass("d-none");
}

function unHideSalaryBill() {
  hideall();
  $("#salaryBills").removeClass("d-none");
  $("#mainForm").removeClass("d-none");

  otherBills;
}

function unHideotherBill() {
  hideall();
  $("#mainForm").removeClass("d-none");
  $("#otherBills").removeClass("d-none");

  otherBills;
}

function billIdUnHide() {
  hideall();

  $("#mainForm").removeClass("d-none");
  $("#formsuppl").removeClass("d-none");

  $("#formSuppBills").removeClass("d-none");
  $("#hr").removeClass("d-none");
  $("#selectSupplBill").removeClass("d-none");
  $("#forms").removeClass("d-none");
  $("#empSearchFilterType").removeClass("d-none");

  $("#selectBillId").removeClass("d-none");
  $("#selectEmp").removeClass("d-none");
  $("#dateId").removeClass("d-none");
  $("#employeeSearchBill").removeClass("d-none");
  $("#transactionType").removeClass("d-none");
  $("#enterAmount").removeClass("d-none");
}

function employeeCodeUnHide() {
  hideall();

  $("#mainForm").removeClass("d-none");
  $("#mainForms").removeClass("d-none");

  $("#formSuppBills").removeClass("d-none");
  $("#hr").removeClass("d-none");
  $("#selectSupplBill").removeClass("d-none");
  $("#forms").removeClass("d-none");
  $("#empSearchFilterType").removeClass("d-none");

  $("#enterEmpCode").removeClass("d-none");
  $("#empNameEmp").removeClass("d-none");
  $("#dateId").removeClass("d-none");
  $("#empSearchEmp").removeClass("d-none");
  $("#transactionType").removeClass("d-none");
  $("#enterAmount").removeClass("d-none");
}

function bankAcNoUnHide() {
  hideall();

  $("#mainForm").removeClass("d-none");
  $("#mainForms").removeClass("d-none");

  $("#formSuppBills").removeClass("d-none");
  $("#hr").removeClass("d-none");
  $("#selectSupplBill").removeClass("d-none");
  $("#forms").removeClass("d-none");
  $("#empSearchFilterType").removeClass("d-none");

  $("#enterBankAcNO").removeClass("d-none");
  $("#enterBankAcNO").removeClass("d-none");
  $("#empNameBank").removeClass("d-none");
  $("#empSearchBank").removeClass("d-none");
  $("#dateId").removeClass("d-none");
  $("#transactionType").removeClass("d-none");
  $("#enterAmount").removeClass("d-none");
}

function EmpNameFromEmpCode(event) {
  $("#inputErrors").removeClass("d-none");
  $("#empName").removeClass("d-none");

  var empCodeInput = $("#empCodeInput").val();
  $.ajax({
    type: "POST",
    url: "APIs/employee_name_validations.php",
    data: { empCodeInput: empCodeInput },
    success: function (responseData) {
      responseData = JSON.parse(responseData);
      if (responseData.status) {
        billDataForm.emp_id = responseData.data[0].id;
        billDataForm.emp_name = responseData.data[0].employee_name;
        $("#emplnameFromEmpCode").text(responseData.data[0].employee_name);
        $("#inputError").html(responseData);
        billDataForm.emp_id = responseData.data[0].id;
      } else {
        $("#inputError").html(responseData.message);
      }
    },
    error: function () {},
  });
}

var empName = $("#emplnameFromEmpCode").text();
var empNames = $("#emplnameFromBankAcNo").text();

function EmpNameFromBankAcNo(event) {
  $("#inputErrors").removeClass("d-none");
  $("#empName").removeClass("d-none");

  var enterBankAcInput = $("#enterBankAcInput").val();
  $.ajax({
    type: "POST",
    url: "APIs/bank_ac_no_validations.php",
    data: { enterBankAcInput },
    success: function (responseData) {
      responseData = JSON.parse(responseData);
      if (responseData.status) {
        billDataForm.emp_id = responseData.data[0].id;
        billDataForm.emp_name = responseData.data[0].employee_name;
        $("#inputError").html(responseData);
        $("#emplnameFromBankAcNo").text(responseData.data[0].employee_name);
        transactionArray.push();
        console.log(transactionArray[0]);
        $("#emCodeFromBankAc").text(responseData.data[0].id);
      } else {
        $("#inputError").html(responseData.message);
      }
    },
    error: function () {},
  });
}

function employeeSelectFromBill(ele) {
  billDataForm.emp_id = $(ele).val();
  billDataForm.emp_name = $("#selectEmployee").find("option:selected").text();
}

function billIdSelecter(event) {
  // var empCodeInput = $("#empCodeInput").val();
  $.ajax({
    type: "POST",
    url: "APIs/bill_id_to_emp_select.php",
    data: { billIdSelect: event.target.value },
    success: function (responseData) {
      responseData = JSON.parse(responseData);
      console.log(responseData);
      var options = "<option selected disabled>Select</option>";
      for (var i = 0; i < responseData.data.length; i++) {
        options +=
          "<option value='" +
          responseData.data[i].id +
          "'>" +
          responseData.data[i].employee_name +
          "</option>";
      }
      $("#selectEmployee").find("option").remove().end().append($(options));
      $("#emCodeFromBillId").text(responseData.data[0].id);
    },
    error: function () {},
  });
}

function showEarningsFromEmpCode() {
  var empcode = $("#empCodeInput").val();
  $.ajax({
    type: "POST",
    url: "APIs/empcode_to_earnings.php",
    data: { empCodeInput: empcode },
    success: function (responseData) {
      responseData = JSON.parse(responseData);
      console.log(responseData);
      var options = "<option selected disabled>Select</option>";
      for (var i = 0; i < responseData.data.length; i++) {
        options +=
          "<option value='" +
          responseData.data[i].entry_type +
          "'>" +
          responseData.data[i].entry_name +
          "</option>";
      }
      $("#earningType").html($(options));
    },
  });
}

function showDeductionsFromEmpCode() {
  var empcode = $("#empCodeInput").val();
  $.ajax({
    type: "POST",
    url: "APIs/empcode_to_deductions.php",
    data: { empCodeInput: empcode },
    success: function (responseData) {
      responseData = JSON.parse(responseData);
      console.log(responseData);
      var options = "<option selected disabled>Select</option>";
      for (var i = 0; i < responseData.data.length; i++) {
        options +=
          "<option value='" +
          responseData.data[i].entry_type +
          "'>" +
          responseData.data[i].entry_name +
          "</option>";
      }
      $("#earningType").html($(options));
    },
  });
}

function showEarningsFromBankAcNO() {
  var bankAcNoEarning = $("#enterBankAcInput").val();
  $.ajax({
    type: "POST",
    url: "APIs/bank_ac_to_earnings.php",
    data: { enterBankAcInput: bankAcNoEarning },
    success: function (responseData) {
      responseData = JSON.parse(responseData);
      console.log(responseData);
      var options = "<option selected disabled>Select</option>";
      for (var i = 0; i < responseData.data.length; i++) {
        options +=
          "<option value='" +
          responseData.data[i].entry_type +
          "'>" +
          responseData.data[i].entry_name +
          "</option>";
      }
      $("#earningType").html($(options));
    },
  });
}

function showDeductionsFromBankAcNO() {
  var bankAcnoDeduction = $("#enterBankAcInput").val();
  $.ajax({
    type: "POST",
    url: "APIs/bank_ac_to_deductions.php",
    data: { enterBankAcInput: bankAcnoDeduction },
    success: function (responseData) {
      responseData = JSON.parse(responseData);
      console.log(responseData);
      var options = "<option selected disabled>Select</option>";
      for (var i = 0; i < responseData.data.length; i++) {
        options +=
          "<option value='" +
          responseData.data[i].entry_type +
          "'>" +
          responseData.data[i].entry_name +
          "</option>";
      }
      $("#earningType").html($(options));
    },
  });
}

function showBillIdtoEarningType() {
  let id = $("#selectEmployee").val();
  $.ajax({
    url: "APIs/bill_id_to_earnings.php",
    type: "POST",
    data: { id: id },
    success: function (responseData) {
      responseData = JSON.parse(responseData);
      var options = "<option selected disabled>Select</option>";
      for (var i = 0; i < responseData.data.length; i++) {
        options +=
          "<option value='" +
          responseData.data[i].entry_type +
          "'>" +
          responseData.data[i].entry_name +
          "</option>";
      }
      $("#earningType").html($(options));
    },
  });
}

function showBillIdToDeductionType() {
  let id = $("#selectEmployee").val();
  $.ajax({
    url: "APIs/bill_id_to_deductions.php",
    type: "POST",
    data: { id: id },
    success: function (responseData) {
      responseData = JSON.parse(responseData);
      var options = "<option selected disabled>Select</option>";
      for (var i = 0; i < responseData.data.length; i++) {
        options +=
          "<option value='" +
          responseData.data[i].entry_type +
          "'>" +
          responseData.data[i].entry_name +
          "</option>";
      }
      billDataForm.emp_id = id;

      $("#earningType").html($(options));
    },
  });
}

var sumOfEarnings = 0;
var sumOfDeductions = 0;

var billData = [];
let earnings = [];
let deductions = [];

function addIntoEarningsAndDeductionTables() {
  $("#earningTable").removeClass("d-none");
  $("#deductionTable").removeClass("d-none");
  let type = $("#earningType").find(":selected").text();
  let amount = $("#amountInput").val();
  var transactionTypes = $("input[type=radio][name=transaction]:checked").val();
  if (transactionTypes == 0) {
    if (earnings.filter((a) => a.type == type).length != 0) {
      alert("already exists");
      return;
    }
    let earningdetails = {
      type,
      amount,
    };
    earnings.push(earningdetails);
    sumOfEarnings += parseInt(earningdetails.amount);
    $("#tableEaringsPrint").html(``);
    for (let i = 0; i < earnings.length; i++) {
      $("#tableEaringsPrint").append(`
      <tr>
        <td> ${earnings[i].type}
    </td>
        <td> ${earnings[i].amount}  
    </td>
        </tr>  
        `);
    }
    $("#TotalofEarnings").html(
      `
  <tr>
    <td> Total
</td>
    <td id="totalEarnings"> ${sumOfEarnings}
</td>
    </tr>`
    );
  } else if (transactionTypes == 1) {
    if (deductions.filter((a) => a.type == type).length != 0) {
      alert("already exists");
      return;
    }
    let earningdetails = {
      type,
      amount,
    };
    let deductiondetails = {
      type,
      amount,
    };
    deductions.push(deductiondetails);
    sumOfDeductions += parseInt(deductiondetails.amount);
    $("#tableDeductionsPrint").html(``);
    for (let i = 0; i < deductions.length; i++) {
      $("#tableDeductionsPrint").append(`
      <tr>
        <td> ${deductions[i].type}
    </td>
        <td> ${deductions[i].amount}
    </td>
        </tr>`);
    }
    $("#TotalofDeductions").html(
      `
      <tr>
        <td> Total
    </td>
        <td id="totalDeductions"> ${sumOfDeductions}
    </td>
        </tr>
        `
    );
  }
}
var sumOfTotalEarnings = 0;
var sumOfTotalDeductions = 0; 
var sumOfTotalAmount = 0; 
var billDataForm = {};
function addIntoEmployeeTable() {
  $("#finalBillTable").removeClass("d-none");
  $("#earningTable").addClass("d-none");
  $("#deductionTable").addClass("d-none");

  if ($("#dateInput").val() == "") {
    alert("date is not found");
    return;
  }

  billDataForm = {
    netAmount: sumOfEarnings - sumOfDeductions,
    date: $("#dateInput").val(),
    typeOfPayment:$("#supplementarySalaryBills").val(), 
    userId : $("#userId").text(),
    earnings: earnings,
    deductions: deductions,
    sumOfEarnings: sumOfEarnings,
    sumOfDeductions: sumOfDeductions,
    sumOfTotalEarnings: sumOfTotalDeductions,
    sumOfTotalDeductions:sumOfTotalEarnings,
    sumOfTotalAmount : sumOfTotalAmount,
    ...billDataForm,
  };

  billData.push(billDataForm);
  sumOfTotalEarnings += sumOfEarnings ;
  sumOfTotalDeductions =+ sumOfDeductions;
  sumOfTotalAmount += sumOfEarnings - sumOfDeductions;

  var EmployeeSearchFilter = $(
    "input[name=EmployeeSearchFilter]:checked"
  ).val();

  $("#EmployeeAddBill").append(`
        <tr>
      <td> ${billDataForm.emp_name}
      </td>
      <td> ${billDataForm.emp_id}
      </td>
      <td> ${billDataForm.date}
      </td>
      <td> ${billDataForm.netAmount}
      </td>
      <td>
      </td>
     
       </tr>`);
       $("#tableEaringsPrint").html(``);
       $("#tableDeductionsPrint").html(``);
       $("#sumOf").html(``);
       $("#sumofs").html(``);
       billDataForm={};
       earnings=[];
       deductions=[];
       sumOfEarnings=0;
       sumOfDeductions=0;

     

}



function insertingDataInto() {
  $.ajax({
    type: "POST",
    url: "apis/submit_bill.php",
    dataType: "JSON",
    data: { billData: JSON.stringify(billData),sumOfTotalEarnings,sumOfTotalDeductions,sumOfTotalAmount },
    success: function (responseData) {
      if (!responseData.status) {
        alert(responseData.message);
      } else {
        alert(responseData.message);
        location.reload();
      }
    },
  });
}
