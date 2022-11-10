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

$(document).ready(function(){
    $("#submitBtn").click(function() {
       var partyaccount=$("#partyaccount").val();
       var cpartyaccount=$("#cpartyaccount").val();
        //status
            $.post("validate.php",
            {
              partyaccount:partyaccount,
              cpartyaccount:cpartyaccount
            },
            function(res, status){
            var data=JSON.parse(res);
            $("#partyaccount").val("");
            $("#e_partyaccount").html(data.message);
            $("#cpartyaccount").val("");
            $("#e_cpartyaccount").html(data.message);

            });
          });
    });
