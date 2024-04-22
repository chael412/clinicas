<?php
include ('includes/header.php');
include ('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Edit Admin</h6>
        </div>

        <div class="card-body">

            <?php


            if (isset ($_POST['edit_btn'], $_POST['edit_id'])) {
                $id = $_POST['edit_id'];

                $query = "SELECT * FROM admins WHERE a_id='$id'";
                $query_run = mysqli_query($conn, $query);

                foreach ($query_run as $row) {
                    ?>

                    <form action="code.php" method="POST">

                        <input type="hidden" id="admin_id" name="admin_id" value="<?= $row['a_id'] ?>">

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" id="username" name="username" value="<?= $row['username'] ?>"
                                class="form-control form-control-sm" required placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="password" name="password" class="form-control form-control-sm" required
                                placeholder="Enter Password">
                        </div>

                        <a href="admin.php" name="cancel_btn"
                            class="btn  d-none d-sm-inline-block btn-sm btn-outline-secondary shadow-sm"><i
                                class="fas fa-ban"></i>
                            Cancel</a>
                        <button type="submit" id="admin_update_btn" name="admin_update_btn"
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