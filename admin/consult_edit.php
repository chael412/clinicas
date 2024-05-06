<?php
include ('includes/header.php');
include ('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Edit Consult</h6>
            <a class="btn btn-primary btn-sm float-right mb-1" href="consult.php" role="button">
                <i class="fas fa-chevron-circle-left"></i> Back
            </a>
        </div>

        <div class="card-body">

            <?php

            if (isset($_POST['edit_btn'], $_POST['edit_id'])) {
                $ct_id = $_POST['edit_id'];

                $query = "SELECT ct.ct_id, us.u_id, cm.cm_id, CONCAT(us.firstname, ' ', us.middlename, ' ', us.lastname) AS user_fullname, ct.chief_complaints, ct.recommendation, ct.process_date, GROUP_CONCAT(CONCAT(m.medicine_name, ' (', cm.cm_quantity, ')') SEPARATOR ', ') AS medicines_with_quantity, ct.med_desc
                FROM consultations ct
                INNER JOIN consult_medicine cm ON ct.ct_id = cm.ct_id 
                LEFT JOIN medicine m ON cm.mdn_id = m.mdn_id 
                INNER JOIN users us ON ct.u_id = us.u_id  
                WHERE ct.ct_id = '$ct_id'
                ";
                $query_run = mysqli_query($conn, $query);

                foreach ($query_run as $row) {
                    $ctID = $row['ct_id'];
                    ?>

                    <form id="consultform_edit" action="code.php" method="post">
                        <div class="modal-body" style="overflow-y: auto; max-height: calc(90vh - 120px);">
                            <div class="row justify-content-between">
                                <div class="col-6" style="border-right: 2px solid #9ca3af">
                                    <input type="hidden" id="ct_id" value="<?= $row['ct_id'] ?>">
                                    <div class="form-group">
                                        <label>Client Name</label>
                                        <input type="hidden" id="uID" class="form-control form-control-sm">
                                        <input type="text" class="form-control form-control-sm" disabled
                                            value="<?= $row['user_fullname'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Chief Complaints</label>
                                        <textarea id="complaints" rows="4" cols="50" class="form-control"
                                            placeholder="Type your complaints here..."><?= $row['chief_complaints'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Recommendation</label>
                                        <textarea id="recommendation" rows="4" cols="50" class="form-control"
                                            placeholder="Type your recommendation here..."><?= $row['recommendation'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h5 class="bg-info py-1 px-2 w-75 text-light">Medicine</h5>
                                    <div class="row medicine-row">

                                        <div class="col-12">
                                            <?php
                                            $ct_id = mysqli_real_escape_string($conn, $ct_id); // Assuming $conn is your database connection
                                            $query_medicine = "SELECT m.mdn_id, cm.cm_id, m.medicine_name, cm.cm_quantity
                                            FROM consultations ct
                                            INNER JOIN consult_medicine cm ON ct.ct_id = cm.ct_id 
                                            LEFT JOIN medicine m ON cm.mdn_id = m.mdn_id 
                                            WHERE ct.ct_id = '$ct_id'";
                                            $result_medicine = mysqli_query($conn, $query_medicine);
                                            if (mysqli_num_rows($result_medicine) > 0) {
                                                while ($medicine = mysqli_fetch_assoc($result_medicine)) {
                                                    ?>
                                                    <div class="row">
                                                        <input type="hidden" id="cmID" value="<?= $medicine['cm_id'] ?>">
                                                        <div class="col-8">
                                                            <div class="form-group">
                                                                <label>Medicine Name</label>
                                                                <input type="text" id="medicines" name="medicine[]"
                                                                    class="form-control form-control-sm"
                                                                    value=" <?= $medicine['medicine_name'] ?>" disabled>

                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <div class="form-group">
                                                                <label>Quantity</label>
                                                                <input type="number" class="form-control form-control-sm"
                                                                    value="<?= $medicine['cm_quantity'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-2">
                                                            <button type="button" id="remove-current-medicine"
                                                                class="d-none d-sm-inline-block btn btn-sm btn-danger"
                                                                style="margin-top: 30px">
                                                                x
                                                            </button>
                                                        </div>
                                                    </div>


                                                    <?php
                                                }
                                            } else {
                                                echo '<div class="form-group"><label>No medicine found</label></div>';
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <div id="additionalMedicineInputs"></div>
                                    <button type="button" id="addMedicineBtn" class="btn btn-primary btn-sm">Add More
                                        Medicine</button>

                                    <div class="row">
                                        <div class="col">
                                            <label>Medicine Description</label>
                                            <textarea id="med_desc" rows="4" cols="50" class="form-control"
                                                placeholder="Type your medicine description here..."><?= $row['med_desc'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-outline-secondary shadow-sm"
                                data-dismiss="modal"><i class="fas fa-ban"></i> Cancel</button>
                            <button type="submit" id="consult_update_btn" name="consult_update_btn"
                                class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                    class="fas fa-save mx-1"></i>Update</button>
                        </div>
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
<script>
    $(document).ready(function () {
        $("#addMedicineBtn").click(function () {
            var numInputs = $(".additional-medicine-input").length + 1;

            var newMedicineInput = `
    <div class="row additional-medicine-input">
        <div class="col-8">
            <div class="form-group">
                <label>Medicine Name</label>
                <select id="medicine${numInputs}" name="medicine[]" class="form-control form-control-sm">
                <?php
                $query = "SELECT mdn_id, medicine_name FROM medicine";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    ?>
                                                <option value="" disabled selected>------- Select Medicine --------</option>
                                                <?php
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo '<option value="' . $row['mdn_id'] . '">' . $row['medicine_name'] . '</option>';
                                                }
                } else {
                    echo '<option value="">No medicine found</option>';
                }
                ?>
                </select>
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <label>Quantity</label>
                <input type="number" name="quantity[]" class="form-control form-control-sm">
            </div>
        </div>
        <div class="col-2">
            <button type="button" class="remove-medicine-input btn btn-sm btn-danger" style="margin-top: 30px">x</button>
        </div>
    </div>`;

            $("#additionalMedicineInputs").append(newMedicineInput);
        });

        $(document).on("click", ".remove-medicine-input", function () {
            $(this).closest(".additional-medicine-input").remove();
        });

        $(document).on("click", "#remove-current-medicine", function () {
            var cmId = $(this).closest(".row").find("#cmID").val();

            var confirmed = confirm("Are you sure you want to remove this medicine?");

            if (confirmed) {
                $.ajax({
                    url: "consult_medicine_delete.php",
                    type: "POST",
                    data: { cm_id: cmId },
                    dataType: "json",
                    success: function (response) {
                        if (response.status === "success") {

                            $(this).closest(".row").remove();
                            alert(response.message);
                            window.location.reload();
                        } else {
                            alert("Failed to delete consult medicine. Please try again later.");
                        }
                    },
                    error: function () {
                        alert("Failed to delete consult medicine. Please try again later.");
                    }
                });
            }
        });



    });

</script>