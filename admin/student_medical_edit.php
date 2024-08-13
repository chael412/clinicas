<?php
include ('includes/header.php');
include ('includes/navbar.php');
include ('modal/modal-medcert.php');
?>

<?php
if (isset($_POST['edit_btn'])) {
?>

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">

                <?php
                $u_id = $_POST['edit_id'];
                $user_display = "SELECT u_id, CONCAT(firstname,' ', lastname) AS full_name FROM users WHERE u_id = '$u_id'";
                $user_display_run = mysqli_query($conn, $user_display);
                // Check if the query was successful and fetch the results as an associative array
                $user = ($user_display_run) ? mysqli_fetch_assoc($user_display_run) : null;
                ?>
                <h5 class="m-0 font-weight-bold text-brown">
                    Edit Medical History of <span class="text-info"><?= $user['full_name'] ?></span>
                </h5>
            </div>
            <div class="card-body">
                <?php
                $query = "SELECT mc.mc_id, mp.mp_id, mh.mh_id, CONCAT(us.lastname, ' ', us.firstname,' ', us.middlename) AS full_name, 
                        mc.med_type, mp.ispresent, mp.mp_diagnosis, mp.mp_treatment, mh.Hyperthension, mh.Diabetes, 
                        mh.Cardiovascular_desease, mh.PTB, mh.Hyperacidity, mh.Allergy, mh.Epilepsy, mh.Asthma, 
                        mh.Dysmenorrhea, mh.liver_Desease  
                        FROM users us
                        INNER JOIN med_cert AS mc ON us.u_id = mc.u_id
                        INNER JOIN medical_present AS mp ON mc.mp_id = mp.mp_id
                        INNER JOIN medical_history AS mh ON mc.mh_id = mh.mh_id
                        WHERE us.u_id = '$u_id'
                        ORDER BY mc.mc_id DESC";
                $query_run = mysqli_query($conn, $query);
                $medItem = ($query_run) ? mysqli_fetch_assoc($query_run) : null;
                ?>
                <div class="row justify-content-between">

                    <div class="col-6" style="border-right: 2px solid #9ca3af">
                        <div>
                            <h5 class="bg-info py-1 px-2 w-75 text-light">Medication Present</h5>
                            <div class="form-group">
                                <div class="d-flex gap-4">
                                    <p>Have any medication present?</p>
                                    <span>
                                        <input type="hidden" id="student_edit_id" name="student_user_id" value="<?= $u_id ?>">
                                        <input type="hidden" id="student_edit_mpid" name="student_user_id" value="<?= $medItem['mp_id'] ?>">
                                        <input type="hidden" id="student_edit_mhid" name="student_user_id" value="<?= $medItem['mh_id'] ?>">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="student_edit_medicationPresent"
                                                id="medicationNo" value="0" 
                                                <?php echo (isset($medItem['ispresent']) && $medItem['ispresent'] == 0) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="medicationNo">No</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="student_edit_medicationPresent"
                                                id="medicationYes" value="1" 
                                                <?php echo (isset($medItem['ispresent']) && $medItem['ispresent'] == 1) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="medicationYes">Yes</label>
                                        </div>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Diagnosis</label>
                                <input disabled type="text" id="student_edit_diagnosis" class="form-control form-control-md" value="<?= isset($medItem['mp_diagnosis']) ? $medItem['mp_diagnosis'] : '' ?>">
                            </div>
                            <div class="form-group">
                                <label>Treatment</label>
                                <input disabled type="text" id="student_edit_treatment" class="form-control form-control-md" value="<?= isset($medItem['mp_treatment']) ? $medItem['mp_treatment'] : '' ?>">
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div>
                            <h5 class="bg-info py-1 px-2 w-75 text-light">Past Medical History</h5>
                            <div class="form-group">
                                <div class="form-check">
                                    <input id="student_edit_hyperthension" class="form-check-input" type="checkbox" <?= (isset($medItem['Hyperthension']) && $medItem['Hyperthension'] == 1) ? 'checked' : ''; ?>>
                                    <label class="form-check-label">Hypertension</label>
                                </div>
                                <div class="form-check">
                                    <input id="student_edit_diabetes" class="form-check-input" type="checkbox" <?= (isset($medItem['Diabetes']) && $medItem['Diabetes'] == 1) ? 'checked' : ''; ?>>
                                    <label class="form-check-label">Diabetes</label>
                                </div>
                                <div class="form-check">
                                    <input id="student_edit_cardio" class="form-check-input" type="checkbox" <?= (isset($medItem['Cardiovascular_desease']) && $medItem['Cardiovascular_desease'] == 1) ? 'checked' : ''; ?>>
                                    <label class="form-check-label">Cardiovascular (Heart) Disease</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="student_edit_ptb" <?= (isset($medItem['PTB']) && $medItem['PTB'] == 1) ? 'checked' : ''; ?>>
                                    <label class="form-check-label">PTB</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="student_edit_hyperacidity" <?= (isset($medItem['Hyperacidity']) && $medItem['Hyperacidity'] == 1) ? 'checked' : ''; ?>>
                                    <label class="form-check-label">Hyperacidity</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="student_edit_allergy" <?= (isset($medItem['Allergy']) && $medItem['Allergy'] == 1) ? 'checked' : ''; ?>>
                                    <label class="form-check-label">Allergy</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="student_edit_epilepsy" <?= (isset($medItem['Epilepsy']) && $medItem['Epilepsy'] == 1) ? 'checked' : ''; ?>>
                                    <label class="form-check-label">Epilepsy</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="student_edit_asthma" <?= (isset($medItem['Asthma']) && $medItem['Asthma'] == 1) ? 'checked' : ''; ?>>
                                    <label class="form-check-label">Asthma</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="student_edit_dysmenorrhea" <?= (isset($medItem['Dysmenorrhea']) && $medItem['Dysmenorrhea'] == 1) ? 'checked' : ''; ?>>
                                    <label class="form-check-label">Dysmenorrhea</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="student_edit_liver" <?= (isset($medItem['liver_Desease']) && $medItem['liver_Desease'] == 1) ? 'checked' : ''; ?>>
                                    <label class="form-check-label">Liver/Gall Bladder Disease</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-end">
                        <a href="students.php" class="d-none d-sm-inline-block btn btn-sm btn-outline-secondary shadow-sm">
                            <i class="fas fa-ban"></i> Cancel
                        </a>
                        <button type="submit" id="student_medical_update_btn" name="registerbtn"
                            class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                            <i class="fas fa-save mx-1"></i> Update Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
} 
?>

<?php
include ('includes/scripts.php');
include ('includes/footer.php');
?>

<script>
    $(document).ready(function () {
        // Toggle diagnosis and treatment input fields based on medication presence
        $('input[type="radio"][name="student_medicationPresent"]').change(function () {
            if ($(this).val() == "1") {
                $('#student_edit_diagnosis').prop('disabled', false);
                $('#student_edit_treatment').prop('disabled', false);
            } else {
                $('#student_edit_diagnosis').prop('disabled', true).val('');
                $('#student_edit_treatment').prop('disabled', true).val('');
            }
        });

        // Trigger change to set the initial state based on current selection
        $('input[type="radio"][name="student_edit_medicationPresent"]:checked').trigger('change');
    });
</script>
