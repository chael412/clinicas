<?php
include('includes/header.php');
include('includes/navbar.php');

// Assume $id2 is the variable for which you want to check the record
$id2 = $_POST['edit_id'];

// Query to check if there is a record in query2
$query2 = "SELECT *FROM users us
            INNER JOIN employees emp ON us.u_id = emp.u_id
            WHERE emp.emp_id = '$id2'";
$query2_run = mysqli_query($conn, $query2);

if (mysqli_num_rows($query2_run) == 0) {
    // No record found, display a message or handle accordingly
    echo "<div class='alert alert-warning'>No medical record found for this employee.</div>";
} else {
    // Record found, display the edit form
    ?>

    <div class="container-fluid">
        <?= $id2 ?>

        <div class="card shadow mb-4">

            <div class="card-header py-3 m-0 d-flex align-items-center justify-content-between">
                <h6>
                    <span class="font-weight-bold text-success">Edit Employee </span>
                </h6>
                <a href="employees.php" name="cancel_btn"
                    class="btn d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-chevron-circle-left"></i> Back</a>
            </div>

            <div class="card-body">
                <?php
                if (isset($_POST['edit_btn'])) {
                    $id = $_POST['edit_id'];

                    $query = "SELECT emp.emp_id, emp.employee_no, us.firstname, us.middlename, us.lastname, 
                                us.birthdate, us.sex, us.contact_no, dep.dp_id, dep.dp_name  
                                FROM employees emp
                                INNER JOIN users AS us ON emp.u_id = us.u_id
                                LEFT JOIN departments AS dep ON emp.dp_id = dep.dp_id 
                                WHERE emp.emp_id='$id'";
                    $query_run = mysqli_query($conn, $query);

                    foreach ($query_run as $row) {
                        ?>
                        <form id="studentform_edit">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Employee No.</label>
                                        <input type="hidden" id="empID" value="<?= $row['emp_id'] ?>">
                                        <input type="text" id="employee_no" value="<?= $row['employee_no'] ?>"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Department</label>
                                        <select class="form-control form-control-sm" id="dep_id" required>
                                            <?php
                                            $displayDept = "SELECT * FROM departments dept";
                                            $deptResult = mysqli_query($conn, $displayDept);
                                            if (mysqli_num_rows($deptResult) > 0) {
                                                foreach ($deptResult as $deptItem) {
                                                    $selected = ($deptItem['dp_id'] == $row['dp_id']) ? 'selected' : '';
                                                    ?>
                                                    <option value='<?= $deptItem['dp_id'] ?>' <?= $selected ?>>
                                                        <?= $deptItem['dp_name'] ?>
                                                    </option>
                                                    <?php
                                                }
                                            } else {
                                                echo '<option>No Course found!</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Firstname</label>
                                        <input type="text" name="firstname" id="firstname" value="<?= $row['firstname'] ?>"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Middlename</label>
                                        <input type="text" name="middlename" id="middlename" value="<?= $row['middlename'] ?>"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Lastname</label>
                                        <input type="text" name="lastname" id="lastname" value="<?= $row['lastname'] ?>"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Birthdate</label>
                                        <input type="date" name="birthdate" id="birthdate" value="<?= $row['birthdate'] ?>"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Sex</label>
                                        <select name="sex" id="sex" class="form-control form-control-sm">
                                            <option value="1" <?= ($row['sex'] == 1) ? 'selected' : '' ?>>Male</option>
                                            <option value="2" <?= ($row['sex'] == 2) ? 'selected' : '' ?>>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Mobile No.</label>
                                        <input type="text" name="contact_no" id="contact_no" value="<?= $row['contact_no'] ?>"
                                            class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <a href="employees.php" name="cancel_btn"
                                        class="btn d-none d-sm-inline-block btn-sm btn-outline-secondary shadow-sm"><i
                                            class="fas fa-ban"></i> Cancel</a>
                                    <button type="submit" id="employee_update_btn" name="student_update_btn"
                                        class="btn btn-success delbtn d-none d-sm-inline-block btn btn-sm shadow-sm">
                                        <i class="fas fa-upload"></i> Update</button>
                                </div>
                            </div>
                        </form>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <?php
}

include('includes/scripts.php');
include('includes/footer.php');
?>