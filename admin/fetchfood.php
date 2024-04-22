<?php
require ('../config/dbconfig.php');


$query = "
SELECT s.s_id, s.student_no, cs.cs_id, uac.username, uac.password, uac.user_type, CONCAT(us.firstname,' ', us.middlename ,'  ',us.lastname) AS student_name  FROM students s
INNER JOIN courses AS cs ON s.cs_id = cs.cs_id
INNER JOIN user_accs AS uac ON s.uac_id = uac.uac_id
INNER JOIN users AS us ON s.u_id = us.u_id
WHERE s.s_type = 4
";

$result = mysqli_query($conn, $query);
$i = 1;
$dataArray = [];

// Loop through the result set
while ($row = mysqli_fetch_assoc($result)) {
    $rowData = [
        "index" => $i,
        "student_no" => $row["student_no"],
        "student_name" => $row["student_name"],
        "actions" => '<div class="action">
                        <button id="' . $row["s_id"] . '" class="select_food btn-sm btn-outline-primary">
                            <i class="fas fa-check"></i>
                            select
                        </button>
                    </div>'
    ];

    // Add the row data to the main array
    $dataArray[] = $rowData;

    // Increment the index counter
    $i++;
}

// Output the JSON-encoded array
echo json_encode(["data" => $dataArray]);

// Close connection
mysqli_close($conn);
