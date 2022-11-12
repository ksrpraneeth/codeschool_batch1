//sidebar collapse
$(document).ready(function () {
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
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
        $.post("./validate.php",
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
    });
});


    
