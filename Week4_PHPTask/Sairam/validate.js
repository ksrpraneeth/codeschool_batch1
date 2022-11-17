$("document").ready(function () {
  $("#submit").click(function () {
    // Input data

    let partyAccountnumber = $("#partyAccountNumber").val()
    let confirmpartyAccountNumber = $("#confirmpartyAccountNumber").val()
    let partyName = $("#partyName").val()
    let purpose = $("#purpose").val()
    let bankifsccode = $("#bankifsccode").val()
    let headofAccount = $("#headofAccount").val()
     let Expendituretype = $("#Expendituretype").val()
     let purposetype= $("#Purposetype").val()
    // let partyAmount = $("#partyAmount").val()

    // AJAX Call
    $.ajax({
      url: "validation.php",
      method: "POST",
      datatype: JSON,
      data: {
        partyAccountnumber,
        confirmpartyAccountNumber,
        partyName,
        ifsccode,
        Partyname,
        purpose,

      },

      success: (data) => {

        data = JSON.parse(data);

        errors = [""];
        for(i=0;i<data.length;i++){
           errors +="<li>" + data[i]+"</li>";
          }
          document.getElementById("errorsid").innerHTML = errors;

      },

    });

  });

});


$("document").ready(function () {
  $("#search").click(function () {
    //input data
    let bankifsccode = $("#bankifsccode").val()
    $.ajax({
      url: "bankifsc.php",
      method: "POST",
      data: {
        bankifsccode,
      },

      success: (data) => {

        data = JSON.parse(data);

        $("#errorsid").text(data.Errors);
        $("#bankname").text(data.bankName);
        $("#bankbranch").text(data.bankbranch);
      },


    });

  });
});



//input data
$("#headofAccount").change(function () {
  let headofAccount = $("#headofAccount").val()
  $.ajax({
    url: "headofaccount.php",
    method: "POST",
    data: {
      headofAccount,
    },
    success: (data) => {
      data = JSON.parse(data);
      console.log(data)
      $("#balance").text(data.balance);
      $("#Loc").text(data.Loc);
    },

  });

});

// //input data
// ("#Expendituretype").change(function(){
//   let Expendituretype = $("#Expendituretype").val()
//   $.ajax({
//       url : "Expendituretype.php",
//       method:"POST",
      
//       data:{
//         Expendituretype,
//       },
//       success:(data) => {
//            data = JSON.parse(data);
//            var ar="";
//            console.log(data.Purposetype)
//            for(var i = 0; i < data.length; i++) {
//             ar += "<option value='" + data[i] + "'>" + data[i] + "</option>";
//         }
//         $("select['#Purposetype']").append('<option>'+data[i]+'</option');
//       }
//       })
//     })


$("#Expendituretype").change(function(){
  let Expendituretype = $("#Expendituretype").val()
  $.ajax({
      url : "Expendituretype.php",
      method:"POST",
      
      data:{
        Expendituretype,
      },

      
      success:(data) => {
         
          data = JSON.parse(data);
          console.log(data.Purposetype)
          var array2=data.Purposetype;
          $("#Purposetype").html('');
          for (var i=0;i<array2.length;i++){
              $("#Purposetype").append('<option>'+array2[i]+'</option')
          }
          //    $("#purposetype").html(Option);
            
      },
    });

  });