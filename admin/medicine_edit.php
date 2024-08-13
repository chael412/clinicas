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
                        <div class="row">
                            <div class="col" style="border-right: 2px solid #9ca3af">
                                <input type="hidden" id="mdn_id" name="mdn_id" value="<?= $row['mdn_id'] ?>">
                                <div class="form-group">
                                    <label>Brand Name</label>
                                    <input type="text" id="brand" name="brand" value="<?= $row['brand_name'] ?>" class="form-control form-
                                -sm" required placeholder="Enter a medicine">
                                </div>
                                <div class="form-group">
                                    <label>Medicine Name</label>
                                    <input type="text" id="medicine" name="medicine" value="<?= $row['medicine_name'] ?>" class="form-control form-
                                -sm" required placeholder="Enter a medicine">
                                </div>

                                <div class="form-group">
                                    <label>Dossage</label>
                                    <input type="text" id="ml" name="ml" class="form-control form-control-sm"
                                        onchange="setTwoNumberDecimal" min="0" max="10" step="0.25"
                                        placeholder="Enter a Dossage ammount" value="<?= $row['ml'] ?>">
                                </div>
                                <div class="form-group">
                                    <select class="form-control form-control-sm" id="medicine_type" name="medicine_type"
                                        required>
                                        <option value="" disabled>------ Select Medicine type-------
                                        </option>
                                        <?php
                                        $displayDept = "SELECT * FROM types";
                                        $deptResult = mysqli_query($conn, $displayDept);

                                        if (mysqli_num_rows($deptResult) > 0) {
                                            foreach ($deptResult as $deptItem) {
                                                $selected = ($deptItem['type_id'] == $row['type_id']) ? 'selected' : '';
                                                ?>
                                                <option value='<?= $deptItem['type_id'] ?>' <?= $selected ?>>
                                                    <?= $deptItem['type_name'] ?>
                                                </option>
                                                <?php
                                            }
                                        } else {
                                            echo '<option>No Medicine type found!</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="text" id="quantity" name="quantity" value="<?= $row['quantity'] ?>" class="form-control form-
                                -sm" required placeholder="Enter a quantity">
                                </div>
                            </div>
                            <!-- <div class="col">
                                <div class="form-goup">
                                    <label>Medicine Prescription</label>
                                    <textarea id="pres_desc" rows="4" cols="50" class="form-control"
                                        placeholder="Type your medicine description here..."><?= $row['med_prescription'] ?></textarea>
                                </div>

                            </div> -->
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