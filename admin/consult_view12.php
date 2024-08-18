<?php
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">
    <?php
    if (isset($_POST['view_medcert_btn'])) {
        $u_id = $_POST['view_id'];

        $query_name = "SELECT ctm.ctm_id, us.u_id, CONCAT(us.firstname, ' ', us.middlename, ' ', us.lastname) AS user_fullname 
        FROM consult_monthly ctm        
        INNER JOIN users us ON ctm.u_id = us.u_id
        WHERE us.u_id = '$u_id' LIMIT  1
        ";
        $result_name = mysqli_query($conn, $query_name);
        $row_name = mysqli_fetch_assoc($result_name);
        $user_fullname = $row_name ? $row_name['user_fullname'] : "No user found";


        $query = "SELECT @row_number := @row_number + 1 AS row_number, ctm.ctm_id, us.u_id, CONCAT(us.firstname, ' ', us.middlename, ' ', us.lastname) AS user_fullname, ctm.chief_complaints, ctm.recommendation, ctm.process_date, GROUP_CONCAT(CONCAT(m.medicine_name, ' (', cm.ctmm_quantity, ')') SEPARATOR ', ') AS medicines_with_quantity, ctm.med_desc
                FROM consult_monthly ctm
                INNER JOIN consult_monthly_medicine cm ON ctm.ctm_id = cm.ctm_id 
                LEFT JOIN medicine m ON cm.mdn_id = m.mdn_id 
                INNER JOIN users us ON ctm.u_id = us.u_id  
                WHERE us.u_id = '$u_id'
                GROUP BY ctm.ctm_id, us.u_id
                ORDER BY ctm.process_date DESC
        ";

        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            ?>
            <div class="row">
                <div class="col-12">
                    <a class="btn btn-primary btn-sm float-right mb-1" href="consult1.2.php" role="button">
                        <i class="fas fa-chevron-circle-left"></i> Back
                    </a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2" class="text-center text-primary">
                                <h4>Monthly Consultation Information for <?= $user_fullname ?></h4>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr style="border-bottom: 3px solid #22c55e">
                                <td>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title text-success fw-bold"> Consultation
                                                <?= $i++ ?>
                                            </h5>
                                            <p class="card-text"><strong>Chief Complaints:
                                                </strong><?php echo $row['chief_complaints']; ?></p>
                                            <p class="card-text"><strong>Recommendation:
                                                </strong><?php echo $row['recommendation']; ?></p>

                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="">

                                        <form method="POST" action="">
                                            <input type="hidden" name="delete_id" value="<?= $row['ctm_id'] ?>">
                                            <button type="submit" name="del_consult" onclick="return confirmDelete()"
                                                class="btn btn-sm btn-outline-danger float-right">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </span>
                                    <span>
                                        <form action="consult_edit12.php" method="POST">
                                            <input type="hidden" name="edit_id" value="<?= $row['ctm_id']; ?>">
                                            <button type="submit" name="edit_btn"
                                                class="d-none d-sm-inline-block btn btn-sm btn-outline-primary float-right mx-2"><i
                                                    class="fas fa-edit"></i></button>
                                        </form>
                                    </span>

                                    <p class="card-text"><strong>Medicines Given:
                                        </strong><?php echo $row['medicines_with_quantity']; ?>
                                    </p>

                                    <p class="card-text"><strong>Medicine Description:
                                        </strong><?php echo $row['med_desc']; ?></p>
                                    <p class="card-text"><strong>Process Date:
                                        </strong><?php echo date("F d, Y", strtotime($row['process_date'])); ?></p>
                                </td>
                            </tr>
                            <tr>

                            </tr>

                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
        } else {
            echo "No data found";
        }
    }
    ?>
</div>

<script>
    function confirmDelete() {
        return confirm('Are you sure you want to delete this consultation?');
    }
</script>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>

<?php
if (isset($_POST['del_consult'])) {
    $ct_id = $_POST['delete_id'];

    // Delete from consult_medicine table
    $query = "DELETE FROM consult_monthly_medicine WHERE ctmm_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $ct_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Delete from consultations table
    $query = "DELETE FROM consult_monthly WHERE ctm_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'i', $ct_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    // Redirect or display a success message
    echo "<script>alert('Consultation deleted successfully'); window.location.href = 'consult1.2.php';</script>";
}
?>