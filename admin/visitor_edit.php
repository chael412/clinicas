<?php

include ('includes/header.php');
include ('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">

        <div class="card-header py-3 m-0 d-flex align-items-center justify-content-between">
            <h6>
                <span class=" font-weight-bold text-success">Edit Visitor</span>
            </h6>
            <a href="visitors.php" name="cancel_btn"
                class="btn  d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-chevron-circle-left"></i> Back</a>
        </div>

        <div class="card-body">
            <?php
            if (isset($_POST['edit_btn'])) {
                $id = $_POST['edit_id'];

                $query = "SELECT vs.v_id, us.u_id, us.firstname, us.middlename,us.lastname, us.birthdate, us.sex, us.contact_no FROM visitors vs
                        INNER JOIN users AS us ON vs.u_id = us.u_id  WHERE vs.v_id='$id'";
                $query_run = mysqli_query($conn, $query);

                foreach ($query_run as $row) {

                    ?>
                    <form id="visitorform_edit">

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Firstname</label>
                                    <input type="hidden" value="<?= $row['v_id'] ?>" id="vID">
                                    <input type="text" name="firstname" id="firstname" value="<?= $row['firstname'] ?>"
                                        class="form-control form-control-sm">
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Middlename</label>
                                    <input type="text" name="" id="middlename" value="<?= $row['middlename'] ?>"
                                        class="form-control form-control-sm">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Lastname</label>
                                    <input type="text" name="lastname" id="lastname" value="<?= $row['lastname'] ?>"
                                        class="form-control form-control-sm">
                                </div>

                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Birthdate</label>
                                    <input type="date" name="birthdate" id="birthdate" value="<?= $row['birthdate'] ?>"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">

                                    <div class="form-group">
                                        <label>Sex</label>
                                        <select name="sex" id="sex" class="form-control form-control-sm">
                                            <option value="1" <?php if ($row['sex'] == 1)
                                                echo 'selected'; ?>>Male</option>
                                            <option value="2" <?php if ($row['sex'] == 2)
                                                echo 'selected'; ?>>Female</option>

                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Mobile No.</label>
                                    <input type="text" name="contact_no" id="contact_no" value="<?= $row['contact_no'] ?>"
                                        class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <a href="visitors.php" name="cancel_btn"
                                    class="btn  d-none d-sm-inline-block btn-sm btn-outline-secondary shadow-sm"><i
                                        class="fas fa-ban"></i>
                                    Cancel</a>
                                <button type="submit" id="visitor_update_btn" name="visitor_update_btn"
                                    class="btn btn-success delbtn d-none d-sm-inline-block btn btn-sm shadow-sm"><i
                                        class="fas fa-upload"></i> Update</button>
                            </div>
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