<?php

include ('includes/header.php');
include ('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success"> View Admin</h6>
        </div>

        <div class="card-body">

            <?php
            if (isset ($_POST['view_btn'], $_POST['view_id'])) {
                $id = $_POST['view_id'];

                $query = "SELECT * FROM admins WHERE a_id='$id'";
                $query_run = mysqli_query($conn, $query);

                foreach ($query_run as $row) {
                    ?>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="view_username" id="formControlReadonly" value="<?php echo $row['username'] ?>"
                            class="form-control form-control-sm" readonly>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="view_password" id="formControlReadonly"
                            value="<?php echo $row['password'] ?>" class="form-control form-control-sm" readonly>
                    </div>
                    <a href="admin.php" name="cancel_btn"
                        class="btn  d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-chevron-circle-left"></i> Back</a>
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