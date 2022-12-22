<?php
session_start();
include "conn.php";
include "include/auth.php";
include "include/admin_header.php";

// Retrieve earning types from the database
$query = "SELECT * FROM earnings";
$stmt = $dbh->prepare($query);
$stmt->execute();
$earningTypes = $stmt->fetchAll();
?>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include "include/admin_navigation.php" ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                </div>
                <div id="login-overlay" class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Add Employee Salary</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="well">
                                        <form id="salary-form" method="post" class="form-horizontal">
                                            <div class="form-group">
                                                <label for="name" class="col-sm-2 control-label">Name:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="name" name="name">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="phone_no" class="col-sm-2 control-label">Phone
                                                    Number:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="phone_no"
                                                        name="phone_no">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="emp_code" class="col-sm-2 control-label">Employee
                                                    Code:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="emp_code"
                                                        name="emp_code">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="earning_type" class="col-sm-2 control-label">Earning
                                                    Type:</label>
                                                <div class="col-sm-10">
                                                    <select multiple class="form-control" name="earning_type[]"
                                                        id="earning_type">
                                                        <?php
                                                        $earning_types = $dbh->query('SELECT * FROM earnings');

                                                        while ($row = $earning_types->fetch()) {
                                                            echo '<option value="' . $row['id'] . '" data-amount="' . $row['amount'] . '">' . $row['earning_type'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="earning_type_amount" class="col-sm-2 control-label">Earning
                                                    Type Amount:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="earning_type_amount"
                                                        name="earning_type_amount">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="deduction_type" class="col-sm-2 control-label">Deduction
                                                    Type:</label>
                                                <div class="col-sm-10">
                                                    <select multiple class="form-control" name="deduction_type[]"
                                                        id="deduction_type">
                                                        <?php
                                                        $deduction_types = $dbh->query('SELECT * FROM deduction');

                                                        while ($row = $deduction_types->fetch()) {
                                                            echo '<option value="' . $row['id'] . '" data-amount="' . $row['amount'] . '">' . $row['deduction_type'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="deduction_amount" class="col-sm-2 control-label">Deduction
                                                    Amount:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="deduction_amount"
                                                        name="deduction_amount">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="payable_salary" class="col-sm-2 control-label">Payable
                                                    Salary:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="payable_salary"
                                                        name="payable_salary">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-12">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>

                                        <script>
                                            $(document).ready(function () {
                                                // submit form data
                                                $("#salary-form").submit(function (e) {
                                                    e.preventDefault();

                                                    var formData = $(this).serialize();

                                                    $.ajax({
                                                        type: "POST",
                                                        url: "insert-salary.php",
                                                        data: formData,
                                                        success: function (data) {
                                                            // update table when form is submitted
                                                        }
                                                    });
                                                });
                                            });

                                        </script>
                                        <div id="table-container">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

</body>

</html>
<script>
    $(document).ready(function () {
        $('#salary-form').submit(function (e) {
            e.preventDefault();

            var name = $('#name').val();
            var phone_no = $('#phone_no').val();
            var emp_code = $('#emp_code').val();
            var earning_type_amount = $('#earning_type_amount').val();
            var deduction_type = $('#deduction_type').val();
            var deduction_amount = $('#deduction_amount').val();
            var payable_salary = $('#payable_salary').val();
            var earning_type_select = $("#earning_type option:selected");
            var deduction_type_select = $("#deduction_type option:selected");
            var earnings_total = 0;
            var deductions_total = 0;
            for (var i = 0; i < earning_type_select.length; i++) {
                earnings_total += parseInt(earning_type_select[i].dataset.amount);
            }
            for (var i = 0; i < deduction_type_select.length; i++) {
                deductions_total += parseInt(deduction_type_select[i].dataset.amount);
            }
            $.ajax({
                url: 'insert-salary.php',
                type: 'POST',
                data: {
                    name: name,
                    phone_no: phone_no,
                    emp_code: emp_code,
                    earning_type_amount: earning_type_amount,
                    deduction_type: deduction_type,
                    deduction_amount: deduction_amount,
                    payable_salary: payable_salary,
                    deductions_total,
                    earnings_total
                },
                success: function (data) {
                    $("form")[0].reset();
                    $("#success").css("display", "block");
                    $("#success").css("display", "block");
                    $("#success").text("Record Inserted Successfully");
                    setTimeout(function () {
                        $("#success").css("display", "none");
                    }, 3000);
                }
            });
        });
    });
</script>