<?php
session_start();
error_reporting(0);
include('dbconnection.php');

if (isset($_POST['submit'])) {
    $adminid = $_SESSION['id'];
    $AName = $_POST['adminname'];
    $mobno = $_POST['mobilenumber'];
    $email = $_POST['email'];
    $sql = "update tbladmin set AdminName=:adminname,MobileNumber=:mobilenumber,Email=:email where ID=:aid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':adminname', $AName, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':mobilenumber', $mobno, PDO::PARAM_STR);
    $query->bindParam(':aid', $adminid, PDO::PARAM_STR);
    $query->execute();
    echo '<script>alert("Profile has been updated.")</script>';
}
?> 

<!DOCTYPE html>
<html>

<head>

    <title>Bus Pass Management System | User Home</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />

</head>

<body>

    <!--  wrapper -->
    <div id="wrapper" style="background-color: rgb(83, 163, 163);">
        <!-- navbar top -->
        <?php include_once('includes/header.php'); ?>
        <!-- end navbar top -->

        <!-- navbar side -->
        <?php include_once('includes/sidebar.php'); ?>
        <!-- end navbar side -->
        <!--  page-wrapper -->
        <div id="page-wrapper">
            <div class="row">
                <!-- page header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Home</h1>
                </div>
                <!--end page header -->

                <!-- Home Screen Section -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Welcome!!!
                        </div>
                        <div class="panel-body">
                            <!-- Add your home screen content here -->
                            <p>Please proceed with your bus pass application</p>
                        </div>
                    </div>
                </div>
                <!-- End Home Screen Section -->
            </div>

            <script src="assets/plugins/jquery-1.10.2.js"></script>
            <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
            <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
            <script src="assets/plugins/pace/pace.js"></script>
            <script src="assets/scripts/siminta.js"></script>
</body>

</html>
