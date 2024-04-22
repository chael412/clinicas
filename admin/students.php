<?php
include ('includes/header.php');
include ('includes/navbar.php');
include ('modal/modal-student.php');
?>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-brown">Students
                <button type="button" class="d-none d-sm-inline-block float-right btn btn-sm btn-success shadow-sm m-1"
                    data-toggle="modal" data-target="#modal_studentADD"><i class="fas fa-plus"></i> Add Student</button>
            </h5>
        </div>
        <div class="card-body">

            <?php

            $query = "SELECT s.s_id, s.s_type, s.student_no, cs.cs_id, uac.username, uac.password, uac.user_type, CONCAT(us.firstname,' ', us.middlename,' ' ,us.lastname) AS student_name  FROM students s
            INNER JOIN courses AS cs ON s.cs_id = cs.cs_id
            INNER JOIN user_accs AS uac ON s.uac_id = uac.uac_id
            INNER JOIN users AS us ON s.u_id = us.u_id ORDER BY s.s_id DESC";
            $query_run = mysqli_query($conn, $query);

            ?>
            <div class="table-responsive">
                <table id="datatableid" class="students_table table table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th style="width: 10%">No.</th>
                            <th style="width: 35%">Student No.</th>
                            <th style="width: 35%">Fullname</th>
                            <th style="width: 20%"></th>
                        </tr>
                    </thead>
                    <?php
                    $a = 1;
                    if (mysqli_num_rows($query_run) > 0) {
                        while ($row = mysqli_fetch_assoc($query_run)) {
                            ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <?= $a++ ?>
                                    </td>

                                    <td>
                                        <?php echo $row['student_no']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['student_name']; ?>
                                    </td>

                                    <td>
                                        <div class="row justify-content-center">
                                            <div class="col col-lg-2">
                                                <form action="student_view.php" method="POST">
                                                    <input type="hidden" name="view_id" value="<?= $row['s_id']; ?>">
                                                    <button type="submit" name="view_btn"
                                                        class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"><i
                                                            class="fa fa-eye" aria-hidden="true"></i></button>
                                                </form>
                                            </div>
                                            <div class="col col-lg-2 mx-1">
                                                <form action="student_edit.php" method="POST">
                                                    <input type="hidden" name="edit_id" value="<?= $row['s_id']; ?>">
                                                    <button type="submit" name="edit_btn"
                                                        class="d-none d-sm-inline-block btn btn-sm btn-outline-success shadow-sm"><i
                                                            class="fas fa-edit"></i></button>
                                                </form>
                                            </div>
                                            <div class="col col-lg-2">
                                                <button type="button" name="del_student"
                                                    onclick="deleteStudent(<?= $row['s_id'] ?>)"
                                                    class="d-none d-sm-inline-block btn btn-sm btn-outline-danger shadow-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php

                        }
                    } else {
                        echo "No Record Found";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>



<?php
include ('includes/scripts.php');
include ('includes/footer.php');
?>