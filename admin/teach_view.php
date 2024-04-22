<?php

include ('includes/header.php');
include ('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3 m-0 d-flex justify-content-between align-items-center">
            <h6 class="font-weight-bold text-success"> View Practice Teaching</h6>
            <a href="teach.php" name="cancel_btn"
                class="btn  d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm "><i
                    class="fas fa-chevron-circle-left"></i> Back</a>
        </div>

        <div class="card-body ">

            <?php
            if (isset ($_POST['view_teach_btn'])) {
                $id = $_POST['view_id'];

                $query = "SELECT s.s_id, s.student_no, cs.cs_id, teach.teach_id, uac.username, uac.password, uac.user_type, CONCAT(us.lastname, ' ', us.firstname,' ', us.middlename) AS student_name, teach.cbc, teach.urinalysis, teach.x_ray  FROM students s
                INNER JOIN courses AS cs ON s.cs_id = cs.cs_id
                INNER JOIN user_accs AS uac ON s.uac_id = uac.uac_id
                INNER JOIN users AS us ON s.u_id = us.u_id
                INNER JOIN practice_teaching AS teach ON s.s_id = teach.s_id
                WHERE s.s_type = 3 AND teach.teach_id= '$id'";
                $query_run = mysqli_query($conn, $query);

                foreach ($query_run as $row) {
                    ?>

                    <div class="form-group">
                        <label>Student Name</label>
                        <p class="bg-info text-light px-4 py-2 w-50">
                            <?= $row['student_name'] ?>
                        </p>

                    </div>



                    <div class="d-flex justify-content-center flex-column align-items-center">
                        <div class="form-group d-flex flex-column mb-4">
                            <label style="border-bottom: 2px solid grey; font-size: 1.35rem; font-weight: 600">CBC</label>
                            <img src="<?= $row['cbc'] ?>" width="450" alt="cbc">
                        </div>

                        <div class="form-group d-flex flex-column mb-4">
                            <label style="border-bottom: 2px solid grey; font-size: 1.35rem; font-weight: 600">Urinalyis</label>
                            <img src="<?= $row['urinalysis'] ?>" width="450" alt="urinalusis">
                        </div>

                        <div class="form-group d-flex flex-column mb-4">
                            <label style="border-bottom: 2px solid grey; font-size: 1.35rem; font-weight: 600">X-ray</label>
                            <img src="<?= $row['x_ray'] ?>" width="450" alt="urinalusis">
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