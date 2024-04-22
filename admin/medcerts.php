<?php

include ('includes/header.php');
include ('includes/navbar.php');
include ('modal/modal-medcert.php');
?>


<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-brown">MedCert
                <button type="button" class="d-none d-sm-inline-block float-right btn btn-sm btn-success shadow-sm m-1"
                    data-toggle="modal" data-target="#modal_ojtADD"><i class="fas fa-plus mx-1"></i>Create
                    MedCert</button>
            </h5>
        </div>
        <div class="card-body">

            <?php
            $query = "SELECT uac.uac_id, us.u_id, mc.mc_id, mp.mp_id, mh.mh_id, uac.username, uac.password,  CONCAT(us.lastname, ' ', us.firstname,' ', us.middlename) AS full_name, mc.med_type, mp.ispresent, mp.mp_diagnosis, mp.mp_treatment, mh.Hyperthension, mh.Diabetes, mh.Cardiovascular_desease, mh.PTB, mh.Hyperacidity, mh.Allergy, mh.Epilepsy, mh.Asthma, mh.Dysmenorrhea, mh.liver_Desease  FROM  users us
            INNER JOIN user_accs AS uac ON us.u_id = uac.uac_id
            INNER JOIN med_cert AS mc ON us.u_id = mc.u_id
            INNER JOIN medical_present AS mp ON mc.mp_id = mp.mp_id
            INNER JOIN medical_history AS mh ON mc.mh_id = mh.mh_id
            ORDER BY mc.mc_id DESC
            
            ";
            $query_run = mysqli_query($conn, $query);

            ?>
            <div class="table-responsive">
                <table id="datatableid" class="ojts_table table table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th style="width: 10%">No.</th>

                            <th style="width: 70%">Fullname</th>
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
                                        <?php echo $row['full_name']; ?>
                                    </td>

                                    <td>
                                        <div class="row justify-content-center">
                                            <div class="col col-lg-2">
                                                <form action="medcert_view.php" method="POST">
                                                    <input type="hidden" name="view_id" value="<?= $row['mc_id']; ?>">
                                                    <button disabled type="submit" name="view_medcert_btn"
                                                        class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm"><i
                                                            class="fa fa-eye" aria-hidden="true"></i></button>
                                                </form>
                                            </div>
                                            <div class="col col-lg-2 mx-1">
                                                <form action="medcert_edit.php" method="POST">
                                                    <input type="hidden" name="edit_id" value="<?= $row['mc_id']; ?>">
                                                    <button type="submit" name="edit_medcert_btn"
                                                        class="d-none d-sm-inline-block btn btn-sm btn-outline-success shadow-sm"><i
                                                            class="fas fa-edit"></i></button>
                                                </form>
                                            </div>
                                            <div class="col col-lg-2">
                                                <button disabled type="button" name="del_student"
                                                    onclick="deleteMedcert(<?= $row['mc_id'] ?>)"
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