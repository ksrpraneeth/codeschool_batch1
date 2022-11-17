<?php

if(isset($_POST['name'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    if(strlen($name) > 20 || strlen($name) < 5){
        echo json_encode(["message" => "Invalid"]);
    } else {
        echo json_encode(["message" => "Success"]);
    }
} else {
    echo json_encode(["message" => "No Name Data"]);
}

?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $("document").ready(function() {
        $("#submit").click(function() {
            // Input data
            let name = $("#name").val()
            let age = $("#age").val()

            // AJAX Call
            $.ajax({
                url: "validate.php",
                method: "POST",
                data: {
                    partyName,
                    partyAccountNumber
                },
                success: (data) => {
                    data = JSON.parse(data);
                    console.log(data)
                    $("#errors").text(data.message)
                },
                error: () => {
                    alert("Something went wrong!")
                }
            })
        })
    })

    function getData() {

    }
</script>

<div id="errors"></div>
<input type="text" id="name">
<input type="text" id="age">
<button id="submit">Submit</button>