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
            // Check if the view_id is set and not empty
            if (isset($_POST['view_id']) && !empty($_POST['view_id'])) {
                // Get the ct_id from the POST data
                $ct_id = $_POST['view_id'];

                // Query to get consultation details based on ct_id
                $query = "SELECT ct.ct_id, us.u_id, cm.cm_id, CONCAT(us.firstname, ' ', us.middlename,' ', us.lastname) AS user_fullname, ct.chief_complaints, ct.recommendation, ct.process_date, cm.Ambroxol_Tab, cm.Amoxcilin_Tab, cm.Ascorbic_Tab, cm.Azithromycin_Tab, cm.Cefalixin_Cap, cm.Catapres_Tab, cm.Chlorphenamine_Tab, cm.Cinnarize_Tab, cm.Ciprofloxacin_Tab, cm.Co_Amoxicillin_Tab
                FROM consult_medicine cm
                INNER JOIN consultations AS ct ON cm.ct_id = ct.ct_id 
                INNER JOIN users AS us ON ct.u_id = us.u_id          
                WHERE ct.ct_id = '$ct_id'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <div class="row">
                        <div class="col-12">

                            <p><span class="fw-bold">Client Name:</span> <br /> <?= $row['user_fullname'] ?></p>
                            <p><span class="fw-bold">Chief Complaints:</span> <br /> <?= $row['chief_complaints'] ?></p>
                            <p><span class="fw-bold">Recommendation:</span> <br /> <?= $row['recommendation'] ?></p>
                        </div>
                        <div class="col-12">
                            <h4 class="bg-secondary">Medicine</h4>
                            <div>
                                <?php
                                // Using ternary operator to display column name or NULL
                                $ambroxol = $row['Ambroxol_Tab'] == 1 ? 'Ambroxol_Tab' : ($row['Ambroxol_Tab'] == 0 ? ' ' : 'Not specified');
                                echo "<p> $ambroxol</p>";

                                $amoxicillin = $row['Amoxcilin_Tab'] == 1 ? 'Amoxcilin_Tab' : ($row['Amoxcilin_Tab'] == 0 ? ' ' : 'Not specified');
                                echo "<p> $amoxicillin </p>";

                                $Ascorbic = $row['Ascorbic_Tab'] == 1 ? 'Ascorbic_Tab ' : ($row['Ascorbic_Tab'] == 0 ? ' ' : 'Not specified');
                                echo "<p>  $Ascorbic </p>";

                                $Azithromycin = $row['Azithromycin_Tab'] == 1 ? 'Azithromycin_Tab ' : ($row['Azithromycin_Tab'] == 0 ? ' ' : 'Not specified');
                                echo "<p>  $Azithromycin </p>";

                                $Cefalixin = $row['Cefalixin_Cap'] == 1 ? 'Cefalixin_Cap' : ($row['Cefalixin_Cap'] == 0 ? ' ' : 'Not specified');
                                echo "<p>  $Cefalixin </p>";

                                $Catapres = $row['Catapres_Tab'] == 1 ? 'Catapres_Tab' : ($row['Catapres_Tab'] == 0 ? ' ' : 'Not specified');
                                echo "<p>  $Catapres </p>";

                                $Chlorphenamine = $row['Chlorphenamine_Tab'] == 1 ? 'Chlorphenamine_Tab' : ($row['Chlorphenamine_Tab'] == 0 ? ' ' : 'Not specified');
                                echo "<p>  $Chlorphenamine </p>";

                                $Cinnarize = $row['Cinnarize_Tab'] == 1 ? 'Cinnarize_Tab' : ($row['Cinnarize_Tab'] == 0 ? ' ' : 'Not specified');
                                echo "<p>  $Cinnarize </p>";

                                $Ciprofloxacin = $row['Ciprofloxacin_Tab'] == 1 ? 'Ciprofloxacin_Tab' : ($row['Ciprofloxacin_Tab'] == 0 ? ' ' : 'Not specified');
                                echo "<p>  $Ciprofloxacin </p>";

                                $Co_Amoxicillin = $row['Co_Amoxicillin_Tab'] == 1 ? 'Co_Amoxicillin_Tab' : ($row['Co_Amoxicillin_Tab'] == 0 ? ' ' : 'Not specified');
                                echo "<p>  $Co_Amoxicillin </p>";


                                ?>


                            </div>


                        </div>
                    </div>

                    <?php
                } else {
                    echo "Consultation details not found.";
                }
            } else {
                echo "No consultation selected.";
            }
            ?>



        </div>
    </div>

</div>

<?php
include ('includes/scripts.php');
include ('includes/footer.php');
?>