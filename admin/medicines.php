<?php

include ('includes/header.php');
include ('includes/navbar.php');
include ('modal/modal-medicine.php');
?>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-brown">Medicine
                <button type="button" class="d-none d-sm-inline-block float-right btn btn-sm btn-success shadow-sm m-1"
                    data-toggle="modal" data-target="#modal_medicineADD"><i class="fas fa-plus mx-1"></i>Add Medicine
                </button>
            </h5>
        </div>
        <div class="card-body">

            <?php
            $query = "SELECT mdn_id, medicine_name FROM medicine 
            ORDER BY mdn_id DESC          
            ";
            $query_run = mysqli_query($conn, $query);

            ?>
            <div class="table-responsive">
                <table id="datatableid" class="medicines_table table table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th style="width: 10%">No.</th>

                            <th style="width: 70%">Medicine Name</th>
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
                                        <?php echo $row['medicine_name']; ?>
                                    </td>

                                    <td>
                                        <div class="row justify-content-center">

                                            <div class="col col-lg-2 mx-1">
                                                <form action="medicine_edit.php" method="POST">
                                                    <input type="hidden" name="edit_id" value="<?= $row['mdn_id']; ?>">
                                                    <button type="submit" name="edit_medicine_btn"
                                                        class="d-none d-sm-inline-block btn btn-sm btn-outline-success shadow-sm"><i
                                                            class="fas fa-edit"></i></button>
                                                </form>
                                            </div>
                                            <div class="col col-lg-2">
                                                <button type="button" name="del_student"
                                                    onclick="deleteMedicine(<?= $row['mdn_id'] ?>)"
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
<script>
    $(document).ready(function () {
        $('input[type="radio"][name="medicationPresent"]').change(function () {
            if ($(this).val() == "1") {
                $('#diagnosisGroup').show();
                $('#treatmentGroup').show();
                $('#diagnosis, #treatment').prop('disabled', false);
            } else {
                $('#diagnosisGroup').hide();
                $('#treatmentGroup').hide();
                $('#diagnosis, #treatment').prop('disabled', true);
                $('#diagnosis, #treatment').val('');

            }
        });
    });
</script>