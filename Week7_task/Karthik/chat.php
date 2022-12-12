<?php

session_start();
if ($_SESSION['role_id'] == 12) {
	include "adminAuthentication.php";
} else {
	include "employeeAuthentication.php";
}
$statement = $pdo->prepare(" select distinct on (m.to_empid) * from messages m,employee e where m.from_empid =? and m.to_empid=e.emp_id  order by m.to_empid,m.msg_id DESC;");
$statement->execute([$_SESSION['emp_id']]);
$nameList = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="./index.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
		crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
	<style>
		.chat {
			background-color: blue;
			opacity: 60%;
			color: white;
		}

		.chat:hover {
			background-color: blue;
			opacity: 60%;
			color: white;

		}
	</style>
	<div class="container-fluid">
		<div class="row">
			<?php
            if ($_SESSION['role_id'] == 12) {
	            include "adminHeader.php";
            } else {
	            include "employeeHeader.php";
            }
            ?>
			<div class="container  mt-3 overflow-auto">
				<div class="d-flex justify-content-between py-2">
					<h5 class="align-items-center">Messages</h5>
					<!-- <a class="btn bg-primary text-white" href="chat.php">Send Message</a> -->
				</div>
				<div class="d-lg-flex py-2 gap-5">
					<ul class="list-group">
						<?php
                        foreach ($nameList as $row)
	                        if ($row['emp_id'] == $_GET['to_empid']) {
		                        echo "<a class='list-group-item active 'href='chat.php?to_empid=" . $row['emp_id'] . "'>" . $row['emp_name'] . "</a>";
	                        } else {
		                        echo "<a class='list-group-item' href='chat.php?to_empid=" . $row['emp_id'] . "'>" . $row['emp_name'] . "</a>";
	                        }?>
					</ul>
					<!-- Chat -->

					<div class="w-100 row justify-content-center m-0">
						<div class="border rounded-3 col-lg-6 overflow-auto" id="messages" style="max-height: 500px;">
							<table class="table table-borderless overflow-auto" >
								<?php
                                $toEmpId = $_GET['to_empid'];
                                $fromEmpId = $_SESSION['emp_id'];
                                $statement = $pdo->prepare("(SELECT * FROM messages 
											WHERE from_empid = ? AND to_empid = ? 
											UNION 
											SELECT * FROM messages
											WHERE to_empid = ? AND from_empid = ?)
											ORDER BY msg_id;");
                                $statement->execute([$fromEmpId, $toEmpId, $fromEmpId, $toEmpId]);
                                $results = $statement->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($results as $row) {
	                                if ($row["from_empid"] == $fromEmpId) {
		                                echo "<tr>
									<td class=\"d-flex justify-content-end\">
									";
		                                if ($row["file_name"] != "") {
			                                echo "<img src='./uploads/" . $row["file_name"] . "' width='150px'/>";
		                                } else {
			                                echo "<span class=\"bg-secondary p-2 px-3 text-white rounded-2\">" . $row['message'] . "</span>";
									
										}
		                                echo "</td>
								</tr>";
	                                } else {
								echo "<tr>
								<td class=\"d-flex justify-content-start \">
								";
		                                if ($row["file_name"] != "") {
											
			                                echo "
											<div class='d-flex flex-column'>
											<img src='./uploads/" . $row["file_name"] . "' width='150px' />
											<a class='text-decoration-none btn' download href='./uploads/" . $row["file_name"] . "' width='150px'>Download</a>
												</div>
											";
		                                } else {
			                                echo "<span class=\"bg-primary p-2 px-3 text-white rounded-2\">" . $row['message'] . "</span>";
									
										}
		                                echo "</td>
								</tr>";
	                                }
                                }
                                ?>
							</table>
							<div class="d-flex">
								<input type="text" placeholder="Type here...." class="form-control m-0 mb-3 "
									id="sendMessage" data-id='<?php echo $_GET['to_empid'] ?>'
									onkeydown="sendMessage(this,event)">
								<input type="file" hidden id="fileInput" data-id='<?php echo $_GET['to_empid'] ?>'
									onchange="uploadFile()" accept="image/*">
								<i class="bi bi-upload bg-secondary text-white p-2 rounded-2 ms-2 mb-3"
									onclick="addFile()"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
	$("document").ready(() => {
		scrollToBottom();
	})
	function scrollToBottom() {
		let message = document.getElementById("messages");
		messages.scrollTop = messages.scrollHeight;
	}
	function sendMessage(element, event) {
		if (event.key == "Enter") {
			let message = element.value;
			let to_empid = element.dataset.id;
			// let fileInput = $("#fileInput").files[0].name
			$.ajax({
				url: "./apis/employeeChat.php",
				type: "POST",
				data: { message, toEmpId: to_empid },
				dataType: "json",
				success: function (data) {
					if (data.status) {
						location.reload();
					} else {
						alert("Something went wrong!");
					}
				}
			})
		}
	}
	function addFile() {
		$("#fileInput").click()
	}
	function uploadFile() {
		let ele = document.getElementById("fileInput");
		if (ele.files) {
			let to_empid = ele.dataset.id;
			var file = ele.files[0];
			var formData = new FormData();
			formData.append("file", file);
			formData.append("toEmpId", to_empid)
			$.ajax({
				url: "./apis/chatFileUpload.php",
				type: "POST",
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json",
				success: function (data) {
					if (data.status) {
						location.reload();
					} else {
						alert("Something went wrong!");
					}
				}
			})
		}
	}
</script>

</html>