$("document").ready(function () {
  $("#submit").click(function () {
    // Input data
    let partyAccountno = $("#partyAccountno").val()
    let confirmPartyaccountno = $("#confirmPartyaccountno").val()
    let partyName = $("#partyName").val()
    // AJAX Call
    $.ajax({
      url: "validate.php",
      method: "POST",
      datatype: JSON,
      data: {
        partyAccountno,
        confirmPartyaccountno,
        partyName
      },
      success: (data) => {
        data = JSON.parse(data);
        // $("#errors").text(JSON.stringify(data.errors));
        $("#partyAccountnoerr").text(JSON.stringify(data.errors));
        $("#confirmPartyaccountnoerr").text(JSON.stringify(data.errors));
        $("#partyNameerr").text(JSON.stringify(data.errors));
        //$("#errors").text(JSON.stringify(data.errors));
        //$("#errors").text(JSON.stringify(data.errors));
      }
    })
  })
})
//////////////////////////////////////////////////////////////////////////////////
//Ajaxcl for ifscvalidations
$("document").ready(function () {
  $("#search").click(function () {
    // Input data      
    let ifscCode = $("#ifscCode").val()
    $.ajax({
      url: "ifscvalidations.php",
      method: "POST",
      datatype: JSON,
      data: {
        ifscCode
      },
      success: (data) => {
        console.log(data)
        data = JSON.parse(data);

        if (data.status == false) {
          $("#ifscCodeerr").val(data.errors["ifscCode"]);
        }
        else {
          $("#bankName").html(data.data.bank);
          $("#bankBranch").html(data.data.branch)
          // document.getElementById("#bankName").innerHtml = data.data.bank;
          // document.getElementById("#bankBranch").innerHtml = data.data.branch;
        }
      }
    })
  })
})
//////////////////////////////////////////////////////////////////////////////////////
////////////Ajax cl for hoa 
$("document").ready(function () {
  $("#hoa").change( function () {
    // Input data      
    let hoa = $("#hoa").val()
    $.ajax({
      url: "hoavalidations.php",
      method: "POST",
      datatype: JSON,
      data: {
        hoa

      },
      success: (data) => {
        console.log(data)
        data = JSON.parse(data);

        if (data.status == false) {
          $("#hoa").val(data.errors["hoaerr"]);
        }
        else {
          $("#Balance").html(data.data.Balance);
          $("#Loc").html(data.data.Loc)
        }
      }
    })
  })
})
////////////////////////////////////////////////////////////////////////////////////////////////////////////
function expenditureSelect() {
  expenditureType = $("#expenditureType").val();
  $("#purposeTypeerr").html('');
  $('#purposeType').find('option').remove();
  $.ajax({
      method: "POST",
      data: {'expenditureType': expenditureType},
      url: 'Expendituretype.php',
      success: function (result) {
          result = JSON.parse(result);
          console.log('see',result);
          if(result.status==false){
              $("#purposeTypeerr").html(result.error);
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