<?php

include ('includes/header.php');
include ('includes/navbar.php');
include ('modal/modal-consult.php');
?>


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
            $query = "SELECT ct.ct_id, us.u_id, cm.cm_id, CONCAT(us.firstname, ' ', us.middlename,' ', us.lastname) AS user_fullname, ct.chief_complaints, ct.recommendation, ct.process_date, cm.Ambroxol_Tab, cm.Amoxcilin_Tab, cm.Ascorbic_Tab, cm.Azithromycin_Tab, cm.Cefalixin_Cap, cm.Catapres_Tab, cm.Chlorphenamine_Tab, cm.Cinnarize_Tab, cm.Ciprofloxacin_Tab, cm.Co_Amoxicillin_Tab
            FROM consult_medicine cm
            INNER JOIN consultations AS ct ON cm.ct_id = ct.ct_id 
            INNER JOIN users AS us ON ct.u_id = us.u_id          
            GROUP BY us.u_id, ct.ct_id      
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
                                                <form action="medcert_view.php" method="POST">
                                                    <input type="hidden" name="view_id" value="<?= $row['ct_id']; ?>">
                                                    <button type="submit" name="view_ojt_btn"
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