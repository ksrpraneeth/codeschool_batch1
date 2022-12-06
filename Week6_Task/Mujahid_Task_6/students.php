<!-- PHP CONNECT -->
<?php
include "include/admin_header.php";
include "include/auth.php";
?>
<!-- PHP CONNECT -->

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include "include/admin_navigation.php" ?>
        <!-- Navigation -->
        <div id="page-wrapper">
            <div class="container-fluid mw-100 vw-100">
                <div class="bb">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        ADD STUDENTS
                    </button>
                    <!-- Button trigger modal -->
                </div>


                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Students Data
                        </h1>
                    </div>
                </div>


                <!-- /.row -->
                <div class="">
                    <?php
                    $query = "SELECT * FROM students";
                    if (isset($_POST['submit'])) {
                        // echo "hello";
                        $stu_name = $_POST['stu_name'];
                        $stu_class = $_POST['stu_class'];
                        $stu_branch = $_POST['stu_branch'];
                        $hostel_name = $_POST['hostel_name'];
                        if (empty($stu_name)) {
                            # code...
                            // echo "This feild should not be empty";
                            echo "<p class='text-danger strong'>Please fill all the feilds to insert data into table<p>";
                        } else {
                            $query = "INSERT INTO students(stu_name,stu_class,stu_branch,hostel_name)";
                            $query .= "VALUES('{$stu_name}','{$stu_class}','{$stu_branch}','{$hostel_name}') ";
                            $add_student_query = mysqli_query($conn, $query);
                            if (!$add_student_query) {
                                # code...
                                die('QUERY FAILED' . mysqli_error($conn));
                            }
                        }
                    }
                    ?>


                    <!-- ADD STUDENT MODAL START-->
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="exampleModalLabel">Add Student</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- FORM STUDENTS START -->
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <!-- <h2></h2> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="stu_name">Add Students Name</label>
                                            <input type="text" name="stu_name" class="form-control" id="">
                                        </div>
                                        <div class="form-group">
                                            <label for="stu_class">Add Students Class</label>
                                            <input type="text" name="stu_class" class="form-control" id="">
                                        </div>
                                        <div class="form-group">
                                            <label for="stu_branch">Add Students Branch</label>
                                        </div>
                                        <div class="form-group">
                                            <select name="stu_branch" class="form-select" placeholder="Select">
                                                <option class="d-none" value="-1">
                                                    Select
                                                </option>
                                                <!-- PHP FOR ADDING BRANCH NAME IN DROP DOWN -->
                                                <?php
                                                $query = "SELECT * FROM branch";
                                                $query_run = mysqli_query($conn, $query);
                                                if (mysqli_num_rows($query_run) > 0) {
                                                    while ($row = mysqli_fetch_array($query_run)) {
                                                        echo "
                                                        <option value='" . $row['id'] . "'>" . $row['id'] . "</option>
                                                    ";
                                                    }
                                                }
                                                ?>
                                                <!-- PHP FOR ADDING BRANCH NAME IN DROP DOWN -->
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="hostel_name">Add Hostel</label>
                                        </div>
                                        <div class="form-group">
                                            <select name="hostel_name" class="form-select" placeholder="Select">
                                                <option class="d-none" value="-1">
                                                    Select
                                                </option>
                                                <!-- PHP FOR ADDING HOSTEL NAME IN DROP DOWN -->
                                                <?php
                                                $query = "SELECT * FROM hostel";
                                                $query_run = mysqli_query($conn, $query);
                                                if (mysqli_num_rows($query_run) > 0) {
                                                    while ($row = mysqli_fetch_array($query_run)) {
                                                        echo "
                                                        <option value='" . $row['hostel_id'] . "'>" . $row['hostel_id'] . "</option>
                                                    ";
                                                    }
                                                }
                                                ?>
                                                <!-- PHP FOR ADDING HOSTEL NAME IN DROP DOWN -->
                                            </select>
                                        </div>


                                        <!-- FORM STUDENTS ENDS-->
                                </div>
                                <div class="modal-footer">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <input type="submit" name="submit" class="btn btn-primary" value="Add">
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ADD STUDENT MODAL END -->


                    <!-- STUDENT DATA TABLE STARTS -->
                </div>
                <div class="">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Id </th>
                                <th scope="col"></th>
                                <th scope="col">Sudent Name</th>
                                <th scope="col"></th>
                                <th scope="col">Sudent Class</th>
                                <th scope="col"></th>
                                <th scope="col">Sudent Branch</th>
                                <th scope="col"></th>
                                <th scope="col">Hostel Name</th>
                                <th scope="col"></th>
                                <th scope="col">Operations</th>
                            <tr>
                        </thead>
                        <tbody>

                            <!-- PHP FOR SHOWING STUDENT TABLES -->
                            <?php
                            $query = "select * from branch b,students s , hostel h where b.id=s.stu_branch AND h.hostel_id=s.hostel_name;";
                            $select_students_data = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($select_students_data)) {
                                # code...
                                $stu_id = $row['stu_id'];
                                $stu_name = $row['stu_name'];
                                $stu_class = $row['stu_class'];
                                $branch_name = $row['branch_name'];
                                $hostel_name = $row['hostel_name'];
                                echo "<tr>";
                                echo "<th scope='row'>{$stu_id}<th>";
                                echo "<td scope='row'>{$stu_name}<td>";
                                echo "<td scope='row'>{$stu_class}<td>";
                                echo "<td scope='row'>{$branch_name}<td>";
                                echo "<td scope='row'>{$hostel_name}<td>";
                                // echo "<td><a href='students.php?delete={$}'>Delete</a><td>";
                                echo "<td ><a class='btn btn-danger text-danger' onClick=\"javascript: return confirm('Please confirm deletion');\" href='students.php?delete={$stu_id}'>Delete</a> 
                                <a class='btn btn-warning text-warning' onClick=\"javascript: return confirm('Please confirm deletion');\" href='students.php?udate={$stu_id}'>Update</a>
                                <a class='btn btn-primary text-warning' onClick=\"javascript: return confirm({$stu_id});\" href='#?view={$stu_id}'>View</a>
                                </td>";
                                echo "</tr>";
                            }
                            ?>
                            <!-- ,{$stu_name},{$stu_class},{$branch_name},{$hostel_name} -->
                            <!-- PHP FOR SHOWING STUDENT TABLES -->


                            <!--PHP FOR DELETE STUDENTS DATA-->
                            <?php
                            if (isset($_GET['delete'])) {
                                # code...
                                $the_student_id = $_GET['delete'];
                                $query = "DELETE FROM students WHERE stu_id = {$the_student_id}";
                                $delete_query = mysqli_query($conn, $query);
                                header("location: students.php");
                            }
                            ?>
                            <!--PHP FOR DELETE STUDENTS DATA END -->
                        </tbody>
                    </table>
                    <!-- STUDENT DATA TABLE STARTS -->


                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>