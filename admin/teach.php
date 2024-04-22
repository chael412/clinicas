<?php

include ('includes/header.php');
include ('includes/navbar.php');
include ('modal/modal-teach.php');
?>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-brown">Practice Teaching
                <button type="button" class="d-none d-sm-inline-block float-right btn btn-sm btn-success shadow-sm m-1"
                    data-toggle="modal" data-target="#modal_teachADD"><i class="fas fa-plus mx-1"></i>Create
                    MedCert</button>
            </h5>
        </div>
        <div class="card-body">

            <?php
            $query = "SELECT s.s_id, s.student_no, cs.cs_id, teach.teach_id, uac.username, uac.password, uac.user_type, CONCAT(us.lastname, ' ', us.firstname,' ', us.middlename) AS student_name, teach.cbc, teach.urinalysis, teach.x_ray  FROM students s
            INNER JOIN courses AS cs ON s.cs_id = cs.cs_id
            INNER JOIN user_accs AS uac ON s.uac_id = uac.uac_id
            INNER JOIN users AS us ON s.u_id = us.u_id
            INNER JOIN practice_teaching AS teach ON s.s_id = teach.s_id
            ORDER BY teach.teach_id DESC 
            ";
            $query_run = mysqli_query($conn, $query);

            ?>
            <div class="table-responsive">
                <table id="datatableid" class="teach_table table table-bordered" width="100%" cellspacing="0">
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
                                                <form action="teach_view.php" method="POST">
                                                    <input type="hidden" name="view_id" value="<?= $row['teach_id']; ?>">
                                                    <button type="submit" name="view_teach_btn"
                                                        class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"><i
                                                            class="fa fa-eye" aria-hidden="true"></i></button>
                                                </form>
                                            </div>
                                            <div class="col col-lg-2 mx-1">
                                                <form action="teach_edit.php" method="POST">
                                                    <input type="hidden" name="edit_ojt" value="<?= $row['teach_id']; ?>">
                                                    <button disabled type="submit" name="edit_ojt_btn"
                                                        class="d-none d-sm-inline-block btn btn-sm btn-outline-success shadow-sm"><i
                                                            class="fas fa-edit"></i></button>
                                                </form>
                                            </div>
                                            <div class="col col-lg-2">
                                                <button disabled type="button" name="del_student"
                                                    onclick="deleteTeach(<?= $row['teach_id'] ?>)"
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