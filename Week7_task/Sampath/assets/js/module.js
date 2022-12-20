$("document").ready(() => {
    $("#mobileMenuBtn").click(() => {
        toggleMobileSidebar();
    });
    $("#mobileMenuBackground").click(() => {
        toggleMobileSidebar();
    });

    function toggleMobileSidebar() {
        if ($(".sidebar").css("left") == "0px") {
            $(".sidebar").css("left", "-250px");
            $("#mobileMenuBackground").addClass("d-none");
        } else {
            $(".sidebar").css("left", "0px");
            $("#mobileMenuBackground").removeClass("d-none");
        }
    }
});

function gotoMenu(menuId) {
    var url = new URL(location.href);
    if (url.searchParams.get("menuId") == menuId) {
        return;
    }
    url.searchParams.set("menuId", menuId);
    location.href = url;
}
