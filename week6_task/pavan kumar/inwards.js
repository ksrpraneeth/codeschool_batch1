$("#save").click(function () {
    var formData = {
        'patient_id': $("#patient").val(),
        'doctor_id': $("#doctors").val(),
        'room_id': $("#rooms").val(),
        'disease_id': $("#diseases").val(),
    };
    console.log(formData);
    $.ajax({
        type: "POST",
        data: formData,
        url: "Apis/createinward.php",
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

$("document").ready(function () {

    $.ajax({
        type: "GET",
        url: "Apis/getmasterlist.php",
        success: function (responseData) {
            responseData = JSON.parse(responseData);
            if (responseData.status) {
                $("#patient").empty();
                $("#patient").append('<option value ="">select</option>')
                for (let i = 0; i < responseData.data.patients.length; i++) {
                    $("#patient").append(`<option value="${responseData.data.patients[i].id}">${responseData.data.patients[i].name}</option>`)
                }
                $("#doctors").empty();
                $("#doctors").append('<option value ="">select</option>')
                for (let i = 0; i < responseData.data.doctors.length; i++) {
                    $("#doctors").append(`<option value="${responseData.data.doctors[i].id}">${responseData.data.doctors[i].name}</option>`)
                }
                $("#rooms").empty();
                $("#rooms").append('<option value ="">select</option>')
                for (let i = 0; i < responseData.data.rooms.length; i++) {
                    $("#rooms").append(`<option value="${responseData.data.rooms[i].id}">${responseData.data.rooms[i].room_name}</option>`)
                }
                $("#diseases").empty();
                $("#diseases").append('<option value ="">select</option>')
                for (let i = 0; i < responseData.data.diseases.length; i++) {
                    $("#diseases").append(`<option value="${responseData.data.diseases[i].id}">${responseData.data.diseases[i].disease}</option>`)
                }
            }
        }

    })

})



