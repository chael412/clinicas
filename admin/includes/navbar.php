<!-- Sidebar -->
<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #6C757C">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand   d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
            <img src="../assets/img/menu.png" width="75" height="75">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0 ">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-columns"></i>
            <span>Dashboard</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Clients
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">All Users:</h6>
                <a class="collapse-item" href="admin.php">Admins</a>
                <a class="collapse-item" href="students.php">Students</a>
                <a class="collapse-item" href="employees.php">Employees</a>
                <a class="collapse-item" href="visitors.php">Visitors</a>
            </div>
        </div>
    </li>






    <li class="nav-item ">
        <a class="nav-link" href="medicines.php">
            <i class="fas fa-prescription"></i>
            Medicine
        </a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseConsult"
            aria-expanded="false" aria-controls="collapseTwo">
            <i class="fas fa-user-md"></i>
            <span>Consultations</span>
        </a>
        <div id="collapseConsult" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar"
            style="">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="consult.php">Students</a>
                <a class="collapse-item dropdown text-secondary dropdown-toggle" href="#" role="button"
                    data-toggle="dropdown" aria-expanded="false">
                    Employees
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="consult1.php">Consult</a>
                    <a class="dropdown-item" href="consult1.2.php">Mothly Consult</a>
                </div>
                <a class="collapse-item" href="consult2.php">Visitors</a>
            </div>
        </div>
    </li>

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Consultation
    </div> -->




    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Requirments
    </div>
    <li class="nav-item">
        <a class="nav-link" href="medcerts.php">
            <i class="fas fa-notes-medical"></i>
            <span>MedCert</span>
        </a>
    </li> -->


    <!-- Divider -->
    <hr class="sidebar-divider">



    <!-- Nav Item - Pages Collapse Menu -->




    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link-success d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <div class="navbar-nav-text mx-3 text-dark">
                <h5>
                    <strong>CLINICA'S</strong>
                </h5>
            </div>

            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->

                <li class="nav-item active dropdown no-arrow d-sm-none">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <!-- Dropdown - Messages -->
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small"
                                    placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>



                <!-- Nav Item - User Information -->
                <li class="nav-item active dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                            <?= $_SESSION['username'] ?>
                        </span>
                        <img width="70" src="../assets/img/acc.jpg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="admin.php">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a> -->
                        <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->


        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>



        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Logout <strong><em><u>
                                        <?php echo $_SESSION['username']; ?>
                                    </u></em></strong>?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Are you sure to leave?</div>
                    <div class="modal-footer">
                        <form>
                            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="button"
                                data-dismiss="modal">Cancel</button>
                        </form>
                        <form action="logout.php" method="POST">
                            <button type="submit" name="logout_btn"
                                class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>