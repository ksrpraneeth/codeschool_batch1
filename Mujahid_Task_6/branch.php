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
                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal">
                        ADD BRANCH
                    </button>
                </div>


                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Branch Data
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="">


                    <!-- PHP QUERIES FOR ADDING BRANCH DATA INTO TABLES -->
                    <?php
                    $query = "SELECT * FROM branch";
                    if (isset($_POST['submit'])) {
                        // echo "hello";
                        $branch_name = $_POST['branch_name'];
                        $branch_class = $_POST['branch_class'];
                        $branch_code = $_POST['branch_code'];
                        $check = mysqli_query($conn, "select * from branch where branch_name='$branch_name'");
                        $checkrows = mysqli_num_rows($check);
                        if (empty($branch_name)) {
                            # code...
                            echo "<p class='text-bold text-danger'>Please add the data properly again!!!<p>";
                        }
                        if ($checkrows > 0) {
                            global $errormsg;
                            $errormsg = "<p class='text-bold text-danger'>Branch already exits, please check and input values again!!</p>";
                            // echo $errormsg;
                        } else {
                            $query = "INSERT INTO branch(branch_name,branch_class,branch_code)";
                            $query .= "VALUES('{$branch_name}','{$branch_class}','{$branch_code}') ";
                            $add_branch_query = mysqli_query($conn, $query);
                            if (!$add_branch_query) {
                                # code...
                                die('QUERY FAILED' . mysqli_error($conn));
                            }
                        }
                    }
                    ?>
                    <!-- PHP QUERIES FOR ADDING BRANCH DATA INTO TABLES ENDS-->


                    <!-- ADD BRANCH MODAL START-->
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="exampleModalLabel">Add Branch</h2>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post">
                                        <?php
                                            global $errormsg;
                                            echo $errormsg;
                                        ?>
                                        <div class="form-group">
                                            <label for="branch_name">Add Branch Name</label>
                                            <input type="text" name="branch_name" class="form-control" id="">
                                        </div>
                                        <div class="form-group">
                                            <label for="branch_class">Add Branch Class</label>
                                            <input type="text" name="branch_class" class="form-control" id="">
                                        </div>
                                        <div class="form-group">
                                            <label for="branch_code">Add Branch Code</label>
                                            <input type="text" name="branch_code" class="form-control" id="">
                                        </div>
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
                    <!-- ADD BRANCH MODAL END -->
                </div>


                <!-- BRANCH DATA TABLE STARTS -->
                <div class="">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Id </th>
                                <th scope="col"></th>
                                <th scope="col">Branch Name</th>
                                <th scope="col"></th>
                                <th scope="col">Branch Class</th>
                                <th scope="col"></th>
                                <th scope="col">Branch Code</th>
                                <th scope="col"></th>
                                <th scope="col"> Action</th>
                            </tr>
                        </thead>
                        <tbody>


                        <!-- PHP QUERIES FETCHING BRANCH DATA -->
                        <?php
                            $query = "SELECT * FROM branch";
                            $select_BRANCH_data = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($select_BRANCH_data)) {
                                # code...
                                $id = $row['id'];
                                $branch_name = $row['branch_name'];
                                $branch_class = $row['branch_class'];
                                $branch_code = $row['branch_code'];
                                echo "<tr>";
                                echo "<th scope='row'>{$id}<th>";
                                echo "<td>{$branch_name}<td>";
                                echo "<td>{$branch_class}<td>";
                                echo "<td>{$branch_code}<td>";
                                // echo "<td><a href='branch.php?delete={$id}'>Delete</a><td>";
                                echo "<td ><a class='btn btn-danger text-danger' onClick=\"javascript: return confirm('Please confirm deletion');\" href='branch.php?delete={$id}'>Delete</a> 
                                <a class='btn btn-warning text-warning' onClick=\"javascript: return confirm('Please confirm deletion');\" href='branch.php?udate={$id}'>Update</a></td>" ;
                                echo "</tr>";
                            }
                            ?>
                        <!-- PHP QUERIES FOR FETCHING BRANCH DATA ENDS -->


                        <!-- PHP QUERIES DELETE BRANCH -->
                        <?php
                            if (isset($_GET['delete'])) {
                                # code...
                                $the_id = $_GET['delete'];
                                $query = "DELETE FROM branch WHERE id = {$the_id}";
                                $delete_query = mysqli_query($conn, $query);
                                header("location: branch.php");
                            }
                            ?>
                        <!-- PHP QUERIES DELETE BRANCH END -->


                        </tbody>
                    </table>
                <!-- BRANCH DATA TABLE STARTS -->
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