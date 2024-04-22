<?php
require ('../config/dbconfig.php');

// Check if the search term is provided
$searchTerm = isset ($_GET['searchTerm']) ? $_GET['searchTerm'] : '';

// Modify search term to only consider the first letter of the last name
$searchTermFirstLetter = $searchTerm . '%';



$query = "
SELECT s.s_id, s.student_no, cs.cs_id, ojt.ojt_id, uac.username, uac.password, uac.user_type, CONCAT(us.firstname,' ', us.middlename,' ' ,us.lastname) AS student_name, ojt.urinalysis, ojt.x_ray, ojt.pregnacy_test  
FROM students s
INNER JOIN courses AS cs ON s.cs_id = cs.cs_id
INNER JOIN user_accs AS uac ON s.uac_id = uac.uac_id
INNER JOIN users AS us ON s.u_id = us.u_id
INNER JOIN ojts AS ojt ON s.s_id = ojt.ojt_id
WHERE s.student_no LIKE ?
";

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $searchTermFirstLetter);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$dataArray = [];

// Check if any results are found
if (mysqli_num_rows($result) > 0) {
    // Loop through the result set
    while ($row = mysqli_fetch_assoc($result)) {
        $rowData = [
            "student_no" => $row["student_no"],
            "student_name" => $row["student_name"],
            "actions" => '<div class="action">
                            <button id="' . $row["ojt_id"] . '" class="select_ojt btn-sm btn-outline-success">
                                <i class="fas fa-check"></i>
                                Select
                            </button>
                        </div>'
        ];

        // Add the row data to the main array
        $dataArray[] = $rowData;
    }
} else {
    // If no records found, return a row with a message
    $dataArray[] = [
        "student_no" => "",
        "student_name" => "No records found",
        "actions" => ""
    ];
}

// Output the JSON-encoded array
echo json_encode(["data" => $dataArray]);

// Close connection
mysqli_close($conn);
