<?php
include "include/admin_header.php";
include "include/auth.php";
?>


<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include "include/admin_navigation.php" ?>
        <div id="page-wrapper">
            <div class="container-fluid mw-100 vw-100">
                <div class="bb">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addDataModal">
                        ADD HOSTEL
                    </button>
                    <!-- Button trigger modal -->
                </div>


                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Hostel Data
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="">


                    <!-- PHP QUERIS FOR ADDING HOSTEL DATA -->
                    <?php
                    $query = "SELECT * FROM hostel";
                    if (isset($_POST['submitHostel'])) {
                        // echo "hello";
                        $hostel_name = $_POST['hostel_name'];
                        $hostel_address = $_POST['hostel_address'];
                        $hostel_type = $_POST['hostel_type'];
                        $hostel_room_no = $_POST['hostel_room_no'];
                        $check = mysqli_query($conn, "select * from hostel where hostel_name='$hostel_name'");
                        $checkrows = mysqli_num_rows($check);
                        if (empty($hostel_name)) {
                            # code...
                            echo "<p class='text-bold text-danger'>Please add the data properly again!!!<p>";
                        }
                        if ($checkrows > 0) {
                            global $errormsg;
                            $errormsg = "<p class='text-bold text-danger'>Hostel already exits!!</p>";
                            // echo $errormsg;
                        } else {
                            $query = "INSERT INTO hostel(hostel_name,hostel_address,hostel_type,hostel_room_no)";
                            $query .= "VALUES('{$hostel_name}','{$hostel_address}','{$hostel_type}','{$hostel_room_no}') ";
                            $add_hostel_query = mysqli_query($conn, $query);
                            if (!$add_hostel_query) {
                                # code...
                                die('QUERY FAILED' . mysqli_error($conn));
                            }
                        }
                    }
                    ?>
                    <!-- PHP QUERIS FOR ADDING HOSTEL DATA ENDS -->


                    <!-- ADD STUDENT MODAL START-->
                    <!-- Modal -->
                    <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog"
                        aria-labelledby="addDataModalLabel" aria-hidden="false">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="addDataModalLabel">Add hostel</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- FORM START -->
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="hostel_name">Add Hostel Name</label>
                                            <input type="text" name="hostel_name" class="form-control" id="">
                                        </div>
                                        <?php
                                            global $errormsg;
                                            echo $errormsg;
                                        ?>
                                        <div class="form-group">
                                            <label for="hostel_address">Add Hostel Address</label>
                                            <input type="text" name="hostel_address" class="form-control" id="">
                                        </div>
                                        <div class="form-group">
                                            <label for="hostel_type">Add Hostel Type</label>
                                            <input type="text" name="hostel_type" class="form-control" id="">
                                        </div>
                                        <div class="form-group">
                                            <label for="hostel_room_no">Add Hostel Room Number</label>
                                            <input type="text" name="hostel_room_no" class="form-control" id="">
                                        </div>
                                        <!-- FORM ENDS-->
                                </div>
                                <div class="modal-footer">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <input type="submit" name="submitHostel" class="btn btn-primary" value="Add">
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ADD HOSTEL MODAL END -->


                    <!-- PHP QUERIES FOR UPDATING H0STEL DATA -->
                    <?php
                    $query = "SELECT * FROM hostel";
                    if (isset($_POST['updateHostel'])) {
                        // echo "hello";
                        $hostel_name = $_POST['hostel_name'];
                        $hostel_address = $_POST['hostel_address'];
                        $hostel_type = $_POST['hostel_type'];
                        $hostel_room_no = $_POST['hostel_room_no'];
                    }
                    ?>
                    <!-- PHP QUERIES FOR UPDATING H0STEL DATA ENDS -->


                    <!-- UPDATE DATA MODAL -->
                    <div class="modal fade" id="updatedatamodal" tabindex="-1" role="dialog"
                        aria-labelledby="updateModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="updateModalLabel">Update hostel</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- FORM START -->
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="hostel_name">Add Hostel Name</label>
                                            <input type="text" value="<?php echo "$hostel_name" ?>" name="hostel_name"
                                                class="form-control" id="">
                                        </div>
                                        <div class="form-group">
                                            <label for="hostel_address">Add Hostel Address</label>
                                            <input type="text" name="hostel_address" class="form-control" id="">
                                        </div>
                                        <div class="form-group">
                                            <label for="hostel_type">Add Hostel Type</label>
                                            <input type="text" name="hostel_type" class="form-control" id="">
                                        </div>
                                        <div class="form-group">
                                            <label for="hostel_room_no">Add Hostel Room Number</label>
                                            <input type="text" name="hostel_room_no" class="form-control" id="">
                                        </div>
                                        <!-- FORM ENDS-->
                                </div>
                                <div class="modal-footer">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <input type="submit" name="updateHostel" class="btn btn-primary" value="Add">
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- UPDATE DATA MODAL ENDS -->
                </div>


                <!-- HOSTEL DATA TABLE STARTS -->
                <div class="">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Id </th>
                                <th scope="col"></th>
                                <th scope="col">Hostel Name</th>
                                <th scope="col"></th>
                                <th scope="col">Hostel Adress</th>
                                <th scope="col"></th>
                                <th scope="col">Hostel Type</th>
                                <th scope="col"></th>
                                <th scope="col">Operations</th>
                            <tr>
                        </thead>
                        <tbody>
                            <!-- PHP QUERIES FOR SHOWING HOSTEL TABLE -->
                            <?php
                            $query = "SELECT * FROM hostel";
                            $select_HOSTEL_data = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($select_HOSTEL_data)) {
                                # code...
                                $hostel_id = $row['hostel_id'];
                                $hostel_name = $row['hostel_name'];
                                $hostel_address = $row['hostel_address'];
                                $hostel_type = $row['hostel_type'];
                                $hostel_room_no = $row['hostel_room_no'];
                                echo "<tr>";
                                echo "<th scope='row'>{$hostel_id}<th>";
                                echo "<td>{$hostel_name}<td>";
                                echo "<td>{$hostel_address}<td>";
                                echo "<td>{$hostel_type}<td>";
                                // echo "<td><a href='hostel_type.php?delete={$hostel_id}'>Delete</a><td>"
                                echo "<td ><a class='btn btn-danger text-danger' onClick=\"javascript: return confirm('Please confirm deletion');\" href='hostel_type.php?delete={$hostel_id}'>Delete</a> 
                                <a class='btn btn-warning text-warning'  class='btn btn-success' data-toggle='modal' data-target='#updatedatamodal'>Update</a></td>";
                                echo "</tr>";
                            }
                            ?>
                            <!-- PHP QUERIES FOR SHOWING HOSTEL TABLE -->


                            <!--PHP QUERIES DELETE HOSTEL -->
                            <?php
                            if (isset($_GET['delete'])) {
                                # code...
                                $the_hostel_id = $_GET['delete'];
                                $query = "DELETE FROM hostel WHERE hostel_id = {$the_hostel_id}";
                                $delete_query = mysqli_query($conn, $query);
                                header("location: hostel_type.php");
                            }
                            ?>
                            <!--PHP QUERIES DELETE HOSTEL END -->


                        </tbody>
                    </table>
                    <!-- HOSTEL DATA TABLE ENDS-->
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>