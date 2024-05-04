<?php

include ('includes/header.php');
include ('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <?php
        if (isset ($_POST['view_btn'], $_POST['view_id'])) {
            $id = $_POST['view_id'];

            $query = "SELECT s.s_id, s.s_type, s.student_no, cs.cs_id, uac.username, uac.password, uac.user_type, us.firstname, us.middlename, us.lastname, us.birthdate, us.sex, us.contact_no  FROM students s
            INNER JOIN courses AS cs ON s.cs_id = cs.cs_id
            INNER JOIN user_accs AS uac ON s.uac_id = uac.uac_id
            INNER JOIN users AS us ON s.u_id = us.u_id WHERE s_id='$id'";
            $query_run = mysqli_query($conn, $query);

            foreach ($query_run as $row) {
                ?>
                <div class="card-header py-3 m-0 d-flex align-items-center justify-content-between">
                   
                    <a href="students.php" name="cancel_btn"
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
                                <label>Student No.</label>
                                <input type="hidden" id="sID" value="<?= $row['s_id'] ?>">

                                <input type="text" id="student_no" value="<?= $row['student_no'] ?>"
                                    class="form-control form-control-sm" readonly disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Course</label>
                                <select class="form-control form-control-sm" id="course_id" readonly disabled>

                                    <?php
                                    $displayDept = "SELECT cs_id, course_name, acro FROM courses";
                                    $deptResult = mysqli_query($conn, $displayDept);
                                    if (mysqli_num_rows($deptResult) > 0) {
                                        foreach ($deptResult as $deptItem) {
                                            ?>
                                            <option value='<?= $deptItem['cs_id'] ?>'>
                                                <?= $deptItem['course_name'] ?>
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
                        <div class="col">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" id="username" value="<?= $row['username'] ?>"
                                    class="form-control form-control-sm" readonly disabled>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" id="password" class="form-control form-control-sm" readonly disabled>
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


                    <?php
            }
        }
        ?>
        </div>
    </div>

</div>

<?php
include ('includes/scripts.php');
include ('includes/footer.php');
?>