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
            user_data += '<td>' + '<img src=value.avatar></img>' + '</td>';
            user_data += '</tr>';
        });
        $('#user_data').append(user_data);
    });
    function renderData() {
        window.userData.forEach((user) => {
            $("#user_data").append(`<tr>
            <td>${user.id}</td>
            <td>${user.email}</td>
            <td>${user.first_name}</td>
            <td>${user.last_name}</td>
            <td>${user.avatar}</td>
            </tr>`);
        });
    }
    (function ($, window, document) {
        $(() => {
            window.userData = [];
            window.ifscCodeValid = false;

            $("#addData").click(() => {
                var errorsElement = $("#errorList");
                let errors = [];
                errorsElement.addClass("d-none");
                let idNumber = $("#idNumber").val();
                let emailId = $("#emailId").val();
                let firstName = $("#firstName").val();
                let lastName = $("#lastName").val();
                let urlImg = $("#urlImg").val();


                if (idNumber.length == 5 || idNumber.length > 20) {
                    errors.push(
                        "Serial Number should be greater than 5"
                    );
                }

                if (firstName.length == 0 || firstName.length == 20) {
                    errors.push("Enter Valid Name");
                }

                if (firstName.length == 0) {
                    errors.push("First name Number shouldn't be empty");
                }

                if (lastName.length == 0) {
                    errors.push("Last Name shouldn't be empty");
                }

                if (errors.length > 0) {
                    errorsElement.html("");

                    errors.forEach((error) => {
                        errorsElement.append(`<li>${error}</li>`);
                    });

                } else {
                    bankData.push({ idNumber,emailId,number,lastName,ifscCode,});
                    renderData()
                    $("#addUserData").modal("hide");
                    $("#idNumber").val("");
                    $("#emailId").val("");
                    $("#firstName").val("");
                    $("#lastName").val("");
                    $("#urlImg").val("");
                }
            });
        });
    });
});



