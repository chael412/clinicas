<?php

include('includes/header.php');
include('includes/navbar.php');
include('modal/modal-medcert.php');
?>


<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?php
            $u_id = $_GET['u_id'];
            $user_display = "SELECT u_id, CONCAT(firstname,' ', lastname) AS full_name FROM users WHERE u_id = '$u_id'";
            $user_display_run = mysqli_query($conn, $user_display);
            // Check if the query was successful and fetch the results as an associative array
            $user = ($user_display_run) ? mysqli_fetch_assoc($user_display_run) : null;
            ?>
            <h5 class="m-0 font-weight-bold text-brown">
                Add Medical Histrory to <?= $user['full_name'] ?>
            </h5>
        </div>
        <div class="card-body">
            <?php
            $query = "SELECT  mc.mc_id, mp.mp_id, mh.mh_id, CONCAT(us.lastname, ' ', us.firstname,' ', us.middlename) AS full_name, mc.med_type, mp.ispresent, mp.mp_diagnosis, mp.mp_treatment, mh.Hyperthension, mh.Diabetes, mh.Cardiovascular_desease, mh.PTB, mh.Hyperacidity, mh.Allergy, mh.Epilepsy, mh.Asthma, mh.Dysmenorrhea, mh.liver_Desease  FROM  users us
            INNER JOIN med_cert AS mc ON us.u_id = mc.u_id
            INNER JOIN medical_present AS mp ON mc.mp_id = mp.mp_id
            INNER JOIN medical_history AS mh ON mc.mh_id = mh.mh_id
            ORDER BY mc.mc_id DESC";
            $query_run = mysqli_query($conn, $query);

            ?>
            <div class="row justify-content-between">

                <div class="col-6" style="border-right: 2px solid #9ca3af">
                    <div>
                        <h5 class="bg-info py-1 px-2 w-75 text-light">Medication Present</h5>
                        <div class="form-group">
                            <div class="d-flex gap-4">
                                <p> Have an medication present? </p>
                                <span>
                                    <input type="hidden" id="visitor_user_id" name="visitor_user_id"
                                        value="<?= $user['u_id'] ?>">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="visitor_add_medicationPresent" id="medicationNo" value="0">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                            name="visitor_add_medicationPresent" id="medicationYes" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Diagnosis</label>
                            <input disabled type="text" id="visitor_add_diagnosis" class="form-control form-control-md">
                        </div>
                        <div class="form-group">
                            <label>Treatment</label>
                            <input disabled type="text" id="visitor_add_treatment" class="form-control form-control-md">
                        </div>

                    </div>


                </div>

                <div class="col-6">
                    <div>
                        <h5 class="bg-info py-1 px-2 w-75 text-light">Past Medical History</h5>
                        <div class="form-group">

                            <div class="form-check">
                                <input id="visitor_add_hyperthension" class="form-check-input" type="checkbox">
                                <label class="form-check-label">
                                    Hyperthension
                                </label>
                            </div>
                            <div class="form-check">
                                <input id="visitor_add_diabetes" class="form-check-input" type="checkbox">
                                <label class="form-check-label">
                                    Diabetes
                                </label>
                            </div>
                            <div class="form-check">
                                <input id="visitor_add_cardio" class="form-check-input" type="checkbox">
                                <label class="form-check-label">
                                    Cardiovascular(Heart)Desease
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="visitor_add_ptb">
                                <label class="form-check-label">
                                    PTB
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="visitor_add_hyperacidity">
                                <label class="form-check-label" for="defaultCheck2">
                                    Hyperacidity
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="visitor_add_allergy">
                                <label class="form-check-label" for="defaultCheck2">
                                    Allergy
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="visitor_add_epilepsy">
                                <label class="form-check-label" for="defaultCheck2">
                                    Epilepsy
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="visitor_add_asthma">
                                <label class="form-check-label" for="defaultCheck2">
                                    Asthma
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="visitor_add_dysmenorrhea">
                                <label class="form-check-label" for="defaultCheck2">
                                    Dysmenorrhea
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="visitor_add_liver">
                                <label class="form-check-label" for="defaultCheck2">
                                    liver/Gall Blader Desease
                                </label>
                            </div>
                            <div class="mt-3">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Others"
                                        id="visitor_other_disease"></textarea>
                                    <label for="visitor_other_disease">Others: </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">

                <div class="col text-end">
                    <a href="visitors.php" class="d-none d-sm-inline-block btn btn-sm btn-outline-secondary shadow-sm">
                        <i class="fas fa-ban"></i> Cancel</a>
                    <button type="submit" id="visitor_medical_add_btn" name="registerbtn"
                        class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                        <i class="fas fa-save mx-1"></i>Save
                    </button>
                </div>


            </div>
        </div>
    </div>
</div>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');

?>
<script>
    $(document).ready(function () {
        $('input[type="radio"][name="visitor_add_medicationPresent"]').change(function () {
            if ($(this).val() == "1") {
                $('#diagnosisGroup').show();
                $('#treatmentGroup').show();
                $('#visitor_add_diagnosis, #visitor_add_treatment').prop('disabled', false);
            } else {
                $('#diagnosisGroup').hide();
                $('#treatmentGroup').hide();
                $('#visitor_add_diagnosis, #visitor_add_treatment').prop('disabled', true);
                $('#visitor_add_diagnosis, #visitor_add_treatment').val('');
            }
        });
    });
</script>