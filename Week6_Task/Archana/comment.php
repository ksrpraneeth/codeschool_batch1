<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Task Manager</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet"
   href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" />
</head>
<body>
    <div class="container">
        <div class="row"><p class="col-lg-4" id="errors"></p>
        <textarea id="Taskmanager"></textarea>
        <div class="row" style="margin-top: 30px">
    </div>
    </div>
    <div class="row" style="margin-top:10px">
    <div class="row"></div>
        <button class="btn btn-primary col-md-3" id="addcommentButton">Add comment </button>
    </div>
    <div class="d-grid" style="margin-top:30px">
                <button type ="submit" id="submitbutton" class="submit-btn">Submit</button>
              </div>
</div>
</body>
<script>
    if(localStorage.getItem("userData")==null){
        windo.location.assign("login.html");

    }
    var formData = {
        Username:JSON .parse(localStorage.getItem("userData"))["username"],
    };
    $.ajax({
            type: "POST",
            data: formData,
            url: "api/",
            success: function (responseData) {
                responseData = JSON.parse(responseData);
                if (!responseData.status) {
                    $("#errors").text(responseData.message);
                } else {
                    responseData.data.forEach((element) => {
                        $("#Addtask").append(
                            "<p>" + element["Addtask"] + "</p>"
                        );
                        console.log(element["Addtask"]);
                    });
                }
            },
            error: function () {},
        });

       /* $("#addTaskButton").click(function () {
            var formData = {
                task: $("#task").val(),
                userId: JSON.parse(localStorage.getItem("userData"))["id"]
            };*/
            $.ajax({
                type: "POST",
                data: formData,
                url: "api/",
                success: function (responseData) {
                    responseData = JSON.parse(responseData);
                    if (!responseData.status) {
                        $("#errors").text(responseData.message);
                    } else {
                        $("#Addcomment").append(
                            "<p>" + $("#comment").val() + "</p>"
                        );
                    }
                },
                error: function () {},
            });
    </script>
</html>