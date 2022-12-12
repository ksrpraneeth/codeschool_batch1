$("#save").click(function () {
    var formData = {
        'firstname': $("#firstname").val(),
        'lastname': $("#lastname").val(),
        'Aadharnumber': $("#Aadharnumber").val(),
        'mobilenumber': $("#mobilenumber").val(),
        'department': $("#department").val(),
        'designation': $("#designation").val(),
    };
    $.ajax({
        type: "POST",
        data: formData,
        url: "Addemployee.php",
        success: function (responseData) {
            responseData = JSON.parse(responseData);
            if (!responseData.status) {
                $('#errors').text(responseData.message);
            } else {
                alert(responseData.message);
            }
        },
        error: function () {

        }
    })
});

    $("document").ready(function() {

        $.ajax({
            type: "POST",
            url: "getdepartment&designationdetails.php",
            success: function(responseData) {
                responseData = JSON.parse(responseData);
                if (responseData.status) {
                    $("#department").empty();
                    $("#department").append('<option value ="">select</option>')
                    for (let i = 0; i < responseData.data.department.length; i++) {
                        $("#department").append(`<option value="${responseData.data.department[i].id}">${responseData.data.department[i].name}</option>`)
                    }
                    $("#designation").empty();
                    $("#designation").append('<option value ="">select</option>')
                    for (let i = 0; i < responseData.data.designation.length; i++) {
                        $("#designation").append(`<option value="${responseData.data.designation[i].id}">${responseData.data.designation[i].name}</option>`)
                    }

                }
            }

        })

    })