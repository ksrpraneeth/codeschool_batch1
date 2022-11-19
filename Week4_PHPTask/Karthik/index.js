$("document").ready(function () {
  $("#submit").click(function () {
    let partyAccountNumber = $("#partyAccountNumber").val();
    let confirmPartyAccountNumber = $("#confirmPartyAccountNumber").val();
    let partyName = $("#partyName").val();
    let bankIFSCCode = $("#bankIFSCCode").val();
    let purpose = $("#purpose").val();
    let partyAmount = $("#partyAmount").val();
    $.ajax({
      url: "validate.php",
      method: "POST",
      dataType: "json",
      data: {
        partyAccountNumber,
        confirmPartyAccountNumber,
        partyName,
        purpose,
        bankIFSCCode,
        partyAmount,
      },
      success: function (data) {
        $("#partyAccountNumberErr").html(data.partyAccountNumberErr);
        $("#confirmPartyAccountNumberErr").html(data.confirmPartyAccountNumberErr);
        $("#partyNameErr").html(data.partyNameErr);
        $("#purposeErr").html(data.purposeErr);
        $("#partyAmountErr").html(data.partyAmountErr);
        $("#bankIFSCCodeErr").html(data.bankIFSCCodeErr);
      },
    });
  });
  $("#search").click(function () {
    let bankIFSCCode = $("#bankIFSCCode").val();
    $.ajax({
      url: "bankIFSCCode.php",
      method: "POST",
      dataType: "JSON",
      data: {
        bankIFSCCode,
      },
      success: function (data) {
        $("#bankName").html(data.details.bankName);
        $("#bankBranch").html(data.details.bankBranch);
        $("#bankIFSCCodeErr").html(data.details.Error);
      },
    });
  });
  $("#headOfAccount").change(function () {
    let headOfAccount = $("#headOfAccount").val();
    $.ajax({
      url: "headOfAccount.php",
      method: "POST",
      dataType: "JSON",
      data: {
        headOfAccount,
      },
      success: function (data) {
        $("#balance").html(data.balance);
        $("#Loc").html(data.loc);
      },
    });
  });
  $("#expenditureType").change(function () {
    let expenditureType = $("#expenditureType").val();
    $.ajax({
      url: "expenditureType.php",
      method: "POST",
      dataType: "JSON",
      data: {
        expenditureType,
      },
      success: function (data) {
       var options="";
       console.log(data);
       for(var i=0;i<data.length;i++){
         options+="<option value='"+data[i]+"'>"+data[i]+"</option>";
       }
       $("select[name='purposeType']").find('option').remove().end().append($(options));
      },
    });
  });
});
