<?php
include ('includes/header.php');
include ('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3 m-0 d-flex justify-content-between align-items-center">
            <h6 class="font-weight-bold text-success">Edit Ojt</h6>
            <a href="ojts.php" name="cancel_btn"
                class="btn  d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm "><i
                    class="fas fa-chevron-circle-left"></i> Back</a>
        </div>

        <div class="card-body">

            <?php


            if (isset ($_POST['edit_ojt_btn'])) {
                $id = $_POST['edit_ojt'];

                $query = "SELECT s.s_id, s.student_no, cs.cs_id,ojt.ojt_id, uac.username, uac.password, uac.user_type, CONCAT(us.firstname,' ', us.middlename,' ' ,us.lastname) AS student_name, ojt.urinalysis, ojt.x_ray, ojt.pregnancy_test  FROM students s
                INNER JOIN courses AS cs ON s.cs_id = cs.cs_id
                INNER JOIN user_accs AS uac ON s.uac_id = uac.uac_id
                INNER JOIN users AS us ON s.u_id = us.u_id
                INNER JOIN ojts AS ojt ON s.s_id = ojt.s_id
                WHERE s.s_type = 1 AND ojt.ojt_id='$id'";
                $query_run = mysqli_query($conn, $query);

                foreach ($query_run as $row) {
                    ?>
                    <form id="ojtform_edit">

                        <input type="hidden" id="ojtID" name="ojtID" value="<?= $row['ojt_id'] ?>">

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" id="username" name="username" value="<?= $row['student_name'] ?>"
                                class="form-control form-control-sm" required placeholder="Enter Username" readonly>
                        </div>
                        <div class="form-group">
                            <label>Urinalysis</label>
                            <input type="file" id="urinalysis" name="urinalysis" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label>X-ray</label>
                            <input type="file" id="x_ray" name="x_ray" class="form-control form-control-sm">
                        </div>
                        <div class="form-group">
                            <label>Pregnancy test</label>
                            <input type="file" id="pregnancy_test" name="pregnancy_test" class="form-control form-control-sm">
                        </div>

                        <a href="ojts.php" name="cancel_btn"
                            class="btn  d-none d-sm-inline-block btn-sm btn-outline-secondary shadow-sm"><i
                                class="fas fa-ban"></i>
                            Cancel</a>
                        <button type="submit" id="ojtmed_update_btn" name="ojtmed_update_btn"
                            class="btn btn-success delbtn d-none d-sm-inline-block btn btn-sm shadow-sm"><i
                                class="fas fa-upload"></i> Update</button>

                    </form>

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