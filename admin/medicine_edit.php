<?php
include ('includes/header.php');
include ('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Edit Medicine</h6>
        </div>

        <div class="card-body">

            <?php


            if (isset($_POST['edit_medicine_btn'])) {
                $id = $_POST['edit_id'];

                $query = "SELECT * FROM medicine WHERE mdn_id='$id'";
                $query_run = mysqli_query($conn, $query);

                foreach ($query_run as $row) {
                    ?>

                    <form>

                        <input type="hidden" id="mdn_id" name="mdn_id" value="<?= $row['mdn_id'] ?>">

                        <div class="form-group">
                            <label>Medicine Name</label>
                            <input type="text" id="medicine" name="medicine" value="<?= $row['medicine_name'] ?>"
                                class="form-control form-control-sm" required placeholder="Enter a medicine">
                        </div>


                        <a href="medicines.php" name="cancel_btn"
                            class="btn  d-none d-sm-inline-block btn-sm btn-outline-secondary shadow-sm"><i
                                class="fas fa-ban"></i>
                            Cancel</a>
                        <button type="submit" id="medicine_update_btn" name="medicine_update_btn"
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