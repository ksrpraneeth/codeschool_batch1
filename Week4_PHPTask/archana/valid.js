
$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
    $("#bankcode").blur(function () { 
        getifsc();
    });
 });
//normal form validation

$(document).ready(function () {
    $("#submitBtn").click(function () {
        var partyaccount = $("#partyaccount").val();
        var cpartyaccount = $("#cpartyaccount").val();
        var partyname = $("#partyname").val();
        var purpose = $("#purpose").val();
        //status
        console.log("BEfore calling indrex.php");
        $.post("./indrex.php",
            {
                data: {
                    source: 'normal',
                    partyaccount: partyaccount,
                    cpartyaccount: cpartyaccount,
                    partyname: partyname,
                    purpose: purpose
                }
            },
            function (res, status) {
                var response = JSON.parse(res);
                console.log(response);
                $("#e_partyaccount").html('');
                $("#e_cpartyaccount").html('');
                $("#e_partyname").html('');
                $("#e_purpose").html('');
                if(response.status==false){
                    $("#e_partyaccount").html(response.errors.e_partyaccount);
                    $("#e_cpartyaccount").html(response.errors.e_cpartyaccount);
                    $("#e_partyname").html(response.errors.e_partyname);
                    $("#e_purpose").html(response.errors.e_purpose);
                    response.errors;
                }else{
                    alert("All validated successfully");
                }
            });
        console.log("After calling indrex.php");
    });
});

function expenditureSelect(){
    expenditureType=$("#expenditureType").val();
    $.ajax({
        method:"POST",
        data:{'expenditureType':expenditureType},
        url:'expen.php',
        success:function(message)
        {
            
        console.log(124);
       
        }
    });
}


    
