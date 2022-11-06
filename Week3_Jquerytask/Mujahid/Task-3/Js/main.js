$(document).ready(function () {
    $.getJSON("https://reqres.in/api/users?page=1", function (data) {
        // console.log(data);
        var user_data = '';
        $.each(data.data, function (key, value) {
            user_data += '<tr>';
            user_data += '<td>' + value.id + '</td>';
            user_data += '<td>' + value.email + '</td>';
            user_data += '<td>' + value.first_name + '</td>';
            user_data += '<td>' + value.last_name + '</td>';
            user_data += '<td> <img src=' + value.avatar + '</td>';
            user_data += '</tr>';
        });
        $('#userData').append(user_data);
    });
});

(function ($, window, document) {
    $(() => {
        window.emptyData = [];
        $("#submitDataBtn").click(() => {
            var errorsElement = $("#errorList");
            let errors = [];
            errorsElement.addClass("d-none");
            let id = $("#idNum").val();
            let email = $("#emailId").val();
            let fname = $("#fName").val();
            let lName = $("#lName").val();
            let url = $("#imgUrl").val();

            if (id.length != 1 || isNaN(id) == true) {
                errors.push("Plase enter the id in single digit");
            }

            if (email.length == 0 || email.length > 20) {
                errors.push("Plase input your email id");
            }

            if (fname.length == 0 || fname.length > 20) {
                errors.push("Please enter your first name");
            }
            
            if (lName.length == 0 || lName.length > 20) {
                errors.push("Please enter your Last name");
            }

            if (url.length == 0 || url.length > 500) {
                errors.push("Should contain a url including http:");
            }

            if (errors.length > 0) {
                errorsElement.html("");

                errors.forEach((error) => {
                    errorsElement.append(`<li>${error}</li>`);
                });

                errorsElement.removeClass("d-none");
            } else {
                emptyData.push({id,email,fname,lName,url,});
                showData()
                $("#serDataModal").modal("hide");
                $("#idNum").val("");
                $("#emailId").val("");
                $("#fName").val("");
                $("#lName").val("");
                $("#imgUrl").val('<td> <img src=' + value.avatar + '</td>');
            }
        });

        function showData() {
            window.emptyData.forEach((bank) => {
                $("#userData").append(`<tr>
                <td>${bank.name}</td>
                <td>${bank.email}</td>
                <td>${bank.fname}</td>
                <td>${bank.lName}</td>
                <td>${bank.url}</td>
                </tr>`);
            });
        }
    });
})(window.jQuery, window, document);
