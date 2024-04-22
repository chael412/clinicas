<?php
include ('includes/header.php');
include ('includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3 m-0 d-flex justify-content-between align-items-center">
            <h6 class="font-weight-bold text-success"> View Medcert</h6>
            <a href="consult.php" name="cancel_btn"
                class="btn  d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm "><i
                    class="fas fa-chevron-circle-left"></i> Back</a>
        </div>

        <div class="card-body">
            <?php
            if (isset($_POST['view_medcert_btn'])) {
                $ct_id = $_POST['view_id'];

                $query = "SELECT ct.ct_id, us.u_id, CONCAT(us.firstname, ' ', us.middlename, ' ', us.lastname) AS user_fullname, ct.chief_complaints, ct.recommendation, ct.process_date, GROUP_CONCAT(m.medicine_name SEPARATOR ', ') AS medicines
                        FROM consultations ct
                        INNER JOIN consult_medicine cm ON ct.ct_id = cm.ct_id
                        LEFT JOIN medicine m ON cm.mdn_id = m.mdn_id
                        INNER JOIN users us ON ct.u_id = us.u_id
                        WHERE ct.ct_id = '$ct_id'
                        GROUP BY ct.ct_id, us.u_id, user_fullname, ct.chief_complaints, ct.recommendation, ct.process_date";

                $result = mysqli_query($conn, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <table class="table">

                        <tr>
                            <th>Client Name</th>
                            <td><?php echo $row['user_fullname']; ?></td>
                        </tr>
                        <tr>
                            <th>Chief Complaints</th>
                            <td><?php echo $row['chief_complaints']; ?></td>
                        </tr>
                        <tr>
                            <th>Recommendation</th>
                            <td><?php echo $row['recommendation']; ?></td>
                        </tr>
                        <tr>
                            <th>Process Date</th>
                            <td><?php echo date("F d, Y", strtotime($row['process_date'])); ?></td>
                        </tr>
                        <tr>
                            <th>Medicines</th>
                            <td><?php echo $row['medicines']; ?></td>
                        </tr>
                    </table>
                    <?php
                } else {
                    echo "No data found for consultation ID: $ct_id";
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