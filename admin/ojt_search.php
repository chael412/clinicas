<?php
require ('../config/dbconfig.php');

// Check if the search term is provided
$searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';

// Modify search term to only consider the first letter of the last name
$searchTermFirstLetter = $searchTerm . '%';

$query = "
SELECT  s.s_type, s.s_id, s.student_no, cs.cs_id, uac.username, uac.password, uac.user_type, CONCAT(us.firstname,' ', us.middlename,' ' ,us.lastname) AS student_name  FROM students s
INNER JOIN courses AS cs ON s.cs_id = cs.cs_id
INNER JOIN user_accs AS uac ON s.uac_id = uac.uac_id
INNER JOIN users AS us ON s.u_id = us.u_id
WHERE s.s_type = 1
AND s.student_no LIKE ?
";

// Prepare and bind parameters
$statement = $conn->prepare($query);
$statement->bind_param('s', $searchTermFirstLetter);
$statement->execute();
$result = $statement->get_result();

$dataArray = [];

// Check if any results are found
if ($result->num_rows > 0) {
    // Loop through the result set
    while ($row = $result->fetch_assoc()) {
        $rowData = [
            "student_no" => $row["student_no"],
            "student_name" => $row["student_name"],
            "actions" => '<div class="action">
                            <button id="' . $row["s_id"] . '" class="select_ojt btn-sm btn-outline-success">
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

// Close statement and connection
$statement->close();
$conn->close();
