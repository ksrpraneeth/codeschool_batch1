<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>

<?php
    include "include/admin_header.php"
    ?>
<body>

    <div id="wrapper">
        <!-- Navigation -->
        <?php include "include/admin_navigation.php" ?>
        <div id="page-wrapper">
            <div class="container-fluid">


                <!-- Page Heading -->
                <?php include "include/admin_footer.php" ?>
                <h3 class="text-success">YOU ARE LOGGED IN SUCCESSFULLY</h3>
                <h3>EXPLORE THE STUDENT DATABASE FROM THE LEFT NAV BAR</h3>
                <P>This pages contains student details including their hostel and branch details</P>
                <!-- /.row -->
                <div class="col-xs-6">
                </div>
                <!-- Page Heading -->


                <!-- STUDENT TABLE START -->
                <div class="col-xs-12">
                    <h3 class="page-header">STUDENT DATA</h3>
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                            <th>Total Sudents</th>
                            </tr>
                            <!-- PHP FOR SHOWING STUDENT TABLES -->
                            <?php
                            $result = mysqli_query($conn, "SELECT COUNT(stu_name) AS `count` FROM `Students`");
                            $row = mysqli_fetch_array($result);
                            $count = $row['count'];
                            echo "<tr>";
                            echo "<td>{$count}<td>";
                            echo "</tr>";
                            ?>
                            <!-- PHP FOR SHOWING STUDENT TABLES -->
                        </tbody>
                    </table>
                    <!-- STUDENT TABLE END -->


                    <!-- HOSTEL TABLE START -->
                    <h3 class="page-header">HOSTEL DATA</h3>
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <th>Hostel Name</th>
                            <th></th>
                            <th>Total Sudents in Hostel</th>
                            <th></th>
                            <!-- PHP FOR SHOWING STUDENT TABLES -->
                            <?php
                            // $result = mysqli_query($conn, "SELECT hostel_name, COUNT(hostel_id) AS `count` FROM `hostel` GROUP BY hostel_name,hostel_id;");
                            // $row = mysqli_fetch_array($result);
                            // $count = $row['count'];
                            // $hostel_name = $row['hostel_name'];
                            // echo "<tr>";
                            // echo "<td>{$hostel_name}<td>";
                            // echo "<td>{$count}<td>";
                            // echo "</tr>";
                            ?>

                            <!-- PHP QUERY FOR HOSTEL TABLE -->
                            <?php
                            $result = mysqli_query($conn, "SELECT h.hostel_name,count(1) as count FROM students s join hostel h on h.hostel_id=s.hostel_name GROUP by hostel_id;");
                            while ($row = mysqli_fetch_assoc($result)) {
                                # code...
                                $count = $row['count'];
                                $hostel_name = $row['hostel_name'];
                                echo "<tr>";
                                echo "<th scope='row'>{$hostel_name}<th>";
                                echo "<td>{$count}<td>";
                                echo "</tr>";
                            }
                            ?>
                            <!-- PHP QUERY FOR HOSTEL TABLE -->
                            <!-- HOSTEL TABLE ENDS -->
                        </tbody>
                    </table>
                    <!-- HOSTEL TABLE END -->


                    <!-- BRANCH TABLE END -->
                    <h3 class="page-header">BRANCH DATA</h3>
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <th>Branch Name</th>
                            <th></th>
                            <th>Total Sudents in Branch</th>
                            <th></th>
                            <!-- PHP FOR SHOWING BRANCH TABLES -->
                            <?php
                            // $result = mysqli_query($conn, "SELECT branch_name, COUNT(id) AS `count` FROM `branch` GROUP BY branch_name,id;");
                            // $row = mysqli_fetch_array($result);
                            // $count = $row['count'];
                            // $branch_name = $row['branch_name'];
                            // echo "<tr>";
                            // echo "<td>{$branch_name}<td>";
                            // echo "<td>{$count}<td>";
                            // echo "</tr>";
                            ?>


                            <?php
                            $result = mysqli_query($conn, "SELECT b.branch_name,count(1) as count FROM students s join branch b on b.id=s.stu_branch GROUP by id;");
                            while ($row = mysqli_fetch_assoc($result)) {
                                # code...
                                $count = $row['count'];
                                $branch_name = $row['branch_name'];
                                echo "<tr>";
                                echo "<th scope='row'>{$branch_name}<th>";
                                echo "<td>{$count}<td>";
                                echo "</tr>";
                            }
                            ?>
                            <!-- PHP FOR SHOWING BRANCH TABLES -->
                        </tbody>
                    </table>
                    <!-- BRANCH TABLE END -->
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


<?php
} else {
    header("Location: index.php");
    exit();
}
?>