$("document").ready(function () {
  $("#next").click(function () {
    let partyAccountNum = $("#partyAccountNum").val();
    let confirmPartyACnum = $("#confirmPartyACnum").val();
    let partyName = $("#partyName").val();
    let partyAmount = $("#partyAmount").val();
    // let ifscCode = $("#ifscCode").val();
    let purpose = $("#purpose").val();

    $.ajax({
      url: "valid01.php",
      method: "POST",
      data: {
        partyAccountNum,
        confirmPartyACnum,
        partyName,
        partyAmount,
        purpose,
      },
      success: (data) => {
        data = JSON.parse(data);

        // Errors in Line by line
        let Errorsss = "";
        for (i = 0; i < data.length; i++) {
          Errorsss += "<li>" + data[i] + "</br>";
          document.getElementById("Errors").innerHTML = Errorsss;
        }
      },
    });
  });


///////\\\\\\\\\\\\\\\\\\\\\\\///////////////\\\\\\\\\\\\\\\

  $("#search").click(function () {
    // let bankIFSCCode = $("#bankIFSCCode").val();
    var formData = {
      bankIFSCCode: $("#bankIFSCCode").val(),
    };
    $.ajax({
      url: "ifsccode01.php",
      method: "POST",
      // dataType:'JSON',
      data: formData,

      success: function (data, status) {
        // data = data.replace("POST","");
        data = JSON.parse(data);
         console.log(data);
        if (data.bankName) {
          $("#bankName").html(data.bankName);
          $("#bankBranch").html(data.bankBranch);
           
          $("#bankIFSCCodeErr").html("");
        } else {
          $("#bankIFSCCodeErr").html(data.errormessage);
          $("#bankName").html("");
          $("#bankBranch").html("");
        // console.log("im called");
        }
      },
    });
  });

///////\\\\\\\\\\\\\\\\\\\\\\\///////////////\\\\\\\\\\\\\\\

  $("#headOftheAccount").change(function(){
    let headOfTheAccount = $("#headOftheAccount").val();
    $.ajax({
      url: "headofAc.php",
      method : "POST",
      dataType: "JSON",
      data : {
        headOfTheAccount,
      },
      success:function(data){
        $("#balance").html(data.balance);
        $("#LOC").html(data.LOC);
      }
    })
  })

  //////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
  $("#expenditureType").change(function(){
    let expenditureType = $("#expenditureType").val();
    $.ajax({
      url: "expenditure.php",
      method : "POST",
      dataType: "JSON",
      data : {
        expenditureType,
      },
      success:function(data){

      var selectkeys ="";
        for (var  i=0 ; i<data.length; i++){
          selectkeys +="<option value='"+data[i]+"'>"+data[i]+ "</option>";
        }
        $("#purposeType").find('option').remove().end().append($(selectkeys));
      // $("#purposeType").html.(data.expenditureType[0]);

      }
    })
  })




});
