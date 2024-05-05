<?php
include ('includes/header.php');
include ('includes/navbar.php');
include ('modal/modal-consult.php');

?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />



<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-brown">Consultation
                <button type="button" class="d-none d-sm-inline-block float-right btn btn-sm btn-success shadow-sm m-1"
                    data-toggle="modal" data-target="#modal_consultADD"><i class="fas fa-plus mx-1"></i>Create
                    Consult</button>

            </h5>
        </div>
        <div class="card-body">

            <?php
            $query = "SELECT ct.ct_id,us.u_id, CONCAT(us.firstname, ' ', us.middlename,' ', us.lastname) AS user_fullname, ct.chief_complaints, ct.recommendation, ct.process_date, GROUP_CONCAT(m.medicine_name SEPARATOR ', ') AS medicines
            FROM consultations ct
            INNER JOIN consult_medicine cm ON ct.ct_id = cm.ct_id
            LEFT JOIN medicine m ON cm.mdn_id = m.mdn_id
            INNER JOIN users us ON ct.u_id = us.u_id
            GROUP BY  us.u_id
            ORDER BY ct.ct_id DESC            
            ";
            $query_run = mysqli_query($conn, $query);

            ?>
            <div class="table-responsive">
                <table id="datatableid" class="consult_table table table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th style="width: 10%">No.</th>
                            <th style="width: 70%">FullName</th>
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
                                        <?php echo $row['user_fullname']; ?>
                                    </td>
                                    <td>
                                        <div class="row justify-content-center">
                                            <div class="col col-lg-2">
                                                <form action="consult_view.php" method="POST">
                                                    <input type="hidden" name="view_id" value="<?= $row['u_id']; ?>">
                                                    <button type="submit" name="view_medcert_btn"
                                                        class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"><i
                                                            class="fa fa-eye" aria-hidden="true"></i></button>
                                                </form>
                                            </div>
                                            <div class="col col-lg-2 mx-1">
                                                <form action="consult_edit.php" method="POST">
                                                    <input type="hidden" name="edit_ojt" value="<?= $row['ct_id']; ?>">
                                                    <button disabled type="submit" name="edit_ojt_btn"
                                                        class="d-none d-sm-inline-block btn btn-sm btn-outline-success shadow-sm"><i
                                                            class="fas fa-edit"></i></button>
                                                </form>
                                            </div>
                                            <div class="col col-lg-2">
                                                <button disabled type="button" name="del_student"
                                                    onclick="deleteCT(<?= $row['ct_id'] ?>)"
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        // Initialize Select2 for the categories dropdown
        $('#medicine').select2();

        $("#addMedicineBtn").click(function () {
            var numInputs = $(".additional-medicine-input").length + 1;

            var newMedicineInput = `
            <div class="row additional-medicine-input">
            <div class="col-6">
                <div class="form-group">
                <label>Medicine Name</label>
                    <select id="medicine1" name="medicine[]" class="form-control form-control-sm" >
                        <?php
                        $query = "SELECT mdn_id, medicine_name FROM medicine";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {

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
            <div class="col-4">
                <div class="form-group">
                <label>Quantity</label>
                <input type="number" name="quantity[]" class="form-control form-control-sm">
                </div>
            </div>
            <div class="col-2">
                <button type="button" id="remove-medicine-input"
                    class="d-none d-sm-inline-block btn btn-sm btn-danger" style="margin-top: 30px">
                    x
                </button>
            </div>
            </div>
        `;

            $("#additionalMedicineInputs").append(newMedicineInput);
        });

        $(document).on("click", "#remove-medicine-input", function () {
            $(this).closest(".additional-medicine-input").remove();
        });


    })
</script>