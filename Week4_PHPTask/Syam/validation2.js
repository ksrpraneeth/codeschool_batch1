
// function validation2(){
    
//         partyAccount = $("#partyAccount").val(),
//         confirmPartyAccount = $("#confirmPartyAcc").val(),
//         PartyName = $("#partyname").val(),
//         Purpose = $("#purpose").val()
    
// }

$("document").ready(function(){
    $("#submit").click(function(){
    let partyAccount = $("#partyAccount").val();
    let confirmPartyAccount = $("#confirmPartyAcc").val();
    let partyName = $("#partyname").val();
    let purpose = $("#purpose").val();
    let ifscCode = $("ifscCode").val();
        $.ajax({
            url: "validation1.php",
            method: "POST",
            dataType:"JSON",
            data: {
                partyAccount,
                confirmPartyAccount,
                ifscCode,
                partyName,
                purpose,
            },
            success: (data) => {
                 Errors =[""];
                 for(i=0;i<data.length;i++){
                    Errors += "<li>" + data[i] + "</br>";
                    document.getElementById("errorid").innerHTML = Errors;
                  }  
                 
                // $("#errorid").html(data);
            },
        });
    });    
         $("#search").click(function(){
         let ifscCode = $("#ifscCode").val();
         console.log(ifscCode)
           $.ajax({
             url: "ifsc.php",
             method: "POST",
             dataType:"JSON",
             data: {
                 ifscCode,
             },
             success: (data) => {
                  $("#bankname").html(data.bankname);
                  $("#bankbranch").html(data.bankbranch);
             },    
         });
         });
        

        $("#headOfAccount").change(function(){
            let headOfAccount = $("#headOfAccount").val()
            $.ajax({
                url : "headOfAccount.php",
                method:"POST",
                
                data:{
                    headOfAccount,
                },
                success:(data) => {
                    data = JSON.parse(data);
                    $("#balance").html(data.balance);
                    $("#loc").html(data.loc);
                },

            });
        });

        $("#expenditureType").change(function(){
            let expenditureType = $("#expenditureType").val()
            $.ajax({
                url : "expenditure.php",
                method:"POST",
                
                data:{
                    expenditureType,
                },
                success:(data) => {
                   
                    data = JSON.parse(data);
                    console.log(data.purposetype)
                    var array2=data.purposetype;
                    $("#purposetype").html('');
                    for (var i=0;i<array2.length;i++){
                        $("#purposetype").append('<option>'+array2[i]+'</option')
                    }
                    //    $("#purposetype").html(Option);
                      
                },

            });
        });

      
    
});