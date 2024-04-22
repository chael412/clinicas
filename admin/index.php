<?php
include ('includes/header.php');
include ('includes/navbar.php');
?>

<?php
$query_admin = "SELECT COUNT(a_id) AS total_admin FROM admins;";
$adminRes = mysqli_query($conn, $query_admin);
$total_admin = $adminRes ? mysqli_fetch_assoc($adminRes)['total_admin'] : 0;

$query_employee = "SELECT COUNT(emp_id) AS total_employee FROM employees;";
$empRes = mysqli_query($conn, $query_employee);
$total_employee = $empRes ? mysqli_fetch_assoc($empRes)['total_employee'] : 0;

$query_student = "SELECT COUNT(s_id) AS total_student FROM students;";
$studRes = mysqli_query($conn, $query_student);
$total_student = $studRes ? mysqli_fetch_assoc($studRes)['total_student'] : 0;

$query_visitor = "SELECT COUNT(v_id) AS total_visitor FROM visitors;";
$visitorRes = mysqli_query($conn, $query_visitor);
$total_visitor = $visitorRes ? mysqli_fetch_assoc($visitorRes)['total_visitor'] : 0;

?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h6 class="m-0 font-weight-bold text-dark">Dashboard </h6>

    </div>

    <!-- Content Row -->
    <div class="row">


        <!-- Total Admin -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-brown text-uppercase mb-1">
                                Admin</div>
                            <div class="h5 mb-0 font-weight-bold text-dark">
                                <h4>
                                    <?= $total_admin ?>
                                </h4>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cogs fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-brown text-uppercase mb-1">
                                Total Employees</div>
                            <div class="h5 mb-0 font-weight-bold text-dark">
                                <h4>
                                    <?= $total_employee ?>
                                </h4>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Total Customer -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-brown text-uppercase mb-1">
                                Total Students</div>
                            <div class="h5 mb-0 font-weight-bold text-dark">
                                <h4>
                                    <?= $total_student ?>
                                </h4>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-brown text-uppercase mb-1">
                                Total Visitors</div>
                            <div class="h5 mb-0 font-weight-bold text-dark">
                                <h4>
                                    <?= $total_visitor ?>
                                </h4>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</div>
<!-- End of Main Content -->



<?php include ('includes/scripts.php'); ?>
<?php include ('includes/footer.php'); ?>