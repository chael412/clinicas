<?php

include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <?php
        if (isset($_POST['view_btn'], $_POST['view_id'])) {
            $id = $_POST['view_id'];

            $query = "SELECT emp.emp_id, us.u_id,dep.dp_id, emp.employee_no,   us.firstname, us.middlename, us.lastname, us.birthdate, us.sex, us.contact_no  FROM 
            employees emp
            INNER JOIN users AS us ON emp.u_id = us.u_id 
            LEFT JOIN departments dep  ON emp.dp_id = dep.dp_id
            WHERE emp.emp_id='$id'";
            $query_run = mysqli_query($conn, $query);



            foreach ($query_run as $row) {
                ?>
                <div class="card-header py-3 m-0 d-flex align-items-center justify-content-between">
                    <h6>
                        <span class=" font-weight-bold text-success">View Employee</span>
                    </h6>
                    <a href="employees.php" name="cancel_btn"
                        class="btn  d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-chevron-circle-left"></i> Back</a>
                </div>

                <div class="card-body">


                    <div class="row">
                        <div class="col"></div>


                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Employee ID No.</label>
                                <input type="hidden" id="empID" value="<?= $row['emp_id'] ?>">

                                <input type="text" id="student_no" value="<?= $row['employee_no'] ?>"
                                    class="form-control form-control-sm" readonly disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Department</label>
                                <select class="form-control form-control-sm" id="dep_id" disabled>
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
                                    class="form-control form-control-sm" readonly disabled>
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Middlename</label>
                                <input type="text" name="" id="middlename" value="<?= $row['middlename'] ?>"
                                    class="form-control form-control-sm" readonly disabled>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Lastname</label>
                                <input type="text" name="lastname" id="lastname" value="<?= $row['lastname'] ?>"
                                    class="form-control form-control-sm" readonly disabled>
                            </div>

                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Birthdate</label>
                                <input type="date" name="birthdate" id="birthdate" value="<?= $row['birthdate'] ?>"
                                    class="form-control form-control-sm" readonly disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">

                                <div class="form-group">
                                    <label>Sex</label>
                                    <select name="sex" id="sex" class="form-control form-control-sm" readonly disabled>
                                        <option value="1" <?php if ($row['sex'] == 1)
                                            echo 'selected'; ?>>Male</option>
                                        <option value="2" <?php if ($row['s_type'] == 2)
                                            echo 'selected'; ?>>Female</option>

                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Mobile No.</label>
                                <input type="text" name="contact_no" id="contact_no" value="<?= $row['contact_no'] ?>"
                                    class="form-control form-control-sm" readonly disabled>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div class="row mt-5">

                        <div class="col-12">
                            <div class="table-responsive">
                                <?php
                                $query2 = "SELECT  mc.mc_id, mp.mp_id, mh.mh_id, CONCAT(us.lastname, ' ', us.firstname,' ', us.middlename) AS full_name, mc.med_type, mp.ispresent, mp.mp_diagnosis, mp.mp_treatment, mh.Hyperthension, mh.Diabetes, mh.Cardiovascular_desease, mh.PTB, mh.Hyperacidity, mh.Allergy, mh.Epilepsy, mh.Asthma, mh.Dysmenorrhea, mh.liver_Desease, mh.other_disease  FROM  users us
                                INNER JOIN med_cert AS mc ON us.u_id = mc.u_id
                                INNER JOIN medical_present AS mp ON mc.mp_id = mp.mp_id
                                INNER JOIN medical_history AS mh ON mc.mh_id = mh.mh_id
                                INNER JOIN employees emp ON us.u_id = emp.u_id
                                WHERE emp.emp_id = '$id'";
                                $query2_run = mysqli_query($conn, $query2);
                                if (mysqli_num_rows($query2_run) > 0) {
                                    foreach ($query2_run as $medItem) {
                                        ?>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="2" class="text-center " style="background: #dcfce7">
                                                        <h3 class="d-flex justify-content-center gap-4">
                                                            Medical
                                                            <?php
                                                            if ($medItem['mc_id']) {
                                                                ?>
                                                                <span>
                                                                    <form action="employee_medical_edit.php" method="POST">
                                                                        <input type="hidden" name="edit_id" value="<?= $row['u_id'] ?>">
                                                                        <button type="submit" name="edit_btn"
                                                                            class="d-none d-sm-inline-block btn btn-sm btn-outline-success shadow-sm">
                                                                            <i class="fas fa-edit"></i>
                                                                        </button>
                                                                    </form>
                                                                </span>

                                                                <?php
                                                            }

                                                            ?>

                                                        </h3>

                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td colspan="2">
                                                        <p><b>Diagnosis:</b> <?= $medItem['mp_diagnosis'] ?></p>
                                                        <p><b>Treatmen:</b> <?= $medItem['mp_treatment'] ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p class="card-text"><strong>
                                                                Hypertension: </strong>
                                                            <img width="20"
                                                                src="<?php echo $medItem['Hyperthension'] == 1 ? './assets/check-mark.png' : ($medItem['Hyperthension'] == 0 ? './assets/no.png' : 'no-record.png'); ?>">
                                                        </p>
                                                        <p class="card-text"><strong>
                                                                Diabetes: </strong>
                                                            <img width="20"
                                                                src="<?php echo $medItem['Diabetes'] == 1 ? './assets/check-mark.png' : ($medItem['Diabetes'] == 0 ? './assets/no.png' : 'no-record.png'); ?>">
                                                        </p>
                                                        <p class="card-text"><strong>
                                                                Cardiovascular desease: </strong>
                                                            <img width="20"
                                                                src="<?php echo $medItem['Cardiovascular_desease'] == 1 ? './assets/check-mark.png' : ($medItem['Cardiovascular_desease'] == 0 ? './assets/no.png' : 'no-record.png'); ?>">
                                                        </p>
                                                        <p class="card-text"><strong>
                                                                PTB: </strong>
                                                            <img width="20"
                                                                src="<?php echo $medItem['PTB'] == 1 ? './assets/check-mark.png' : ($medItem['PTB'] == 0 ? './assets/no.png' : 'no-record.png'); ?>">
                                                        </p>
                                                        <p class="card-text"><strong>
                                                                Hyperacidity: </strong>
                                                            <img width="20"
                                                                src="<?php echo $medItem['Hyperacidity'] == 1 ? './assets/check-mark.png' : ($medItem['Hyperacidity'] == 0 ? './assets/no.png' : 'no-record.png'); ?>">
                                                        </p>
                                                    </td>
                                                    <td>

                                                        <p class="card-text"><strong>
                                                                Allergy: </strong>
                                                            <img width="20"
                                                                src="<?php echo $medItem['Allergy'] == 1 ? './assets/check-mark.png' : ($medItem['Allergy'] == 0 ? './assets/no.png' : 'no-record.png'); ?>">
                                                        </p>
                                                        <p class="card-text"><strong>
                                                                Epilepsy: </strong>
                                                            <img width="20"
                                                                src="<?php echo $medItem['Epilepsy'] == 1 ? './assets/check-mark.png' : ($medItem['Epilepsy'] == 0 ? './assets/no.png' : 'no-record.png'); ?>">
                                                        </p>
                                                        <p class="card-text"><strong>
                                                                Dysmenorrhea: </strong>
                                                            <img width="20"
                                                                src="<?php echo $medItem['Dysmenorrhea'] == 1 ? './assets/check-mark.png' : ($medItem['Dysmenorrhea'] == 0 ? './assets/no.png' : 'no-record.png'); ?>">
                                                        </p>
                                                        <p class="card-text"><strong>
                                                                Liver Desease: </strong>
                                                            <img width="20"
                                                                src="<?php echo $medItem['liver_Desease'] == 1 ? './assets/check-mark.png' : ($medItem['liver_Desease'] == 0 ? './assets/no.png' : 'no-record.png'); ?>">
                                                        </p>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="card-text">
                                                            <p><b>Other:</b> <?= $medItem['other_disease'] ?></p>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                    }
                                } else {
                                    ?>
                                            <tr>
                                                <td>
                                                    <h3 class="d-flex justify-content-center gap-4" style="background: #dcfce7">
                                                        Medical</h3>
                                                    <p class="text-danger">No medical record found!</p>
                                                </td>
                                            </tr>

                                            <?php
                                }
                                ?>




                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>


                    <?php
            }
        }
        ?>
        </div>

    </div>

</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>