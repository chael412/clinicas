<?php
require ('../config/dbconfig.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the cm_id from the POST data
    $cmId = $_POST['cm_id'];

    // Assuming $conn is your database connection
    // Perform the deletion query
    $query = "DELETE FROM consult_medicine WHERE cm_id = $cmId";
    $result = mysqli_query($conn, $query);

    // Check if the deletion was successful
    if ($result) {
        // Return success message
        echo json_encode(array("status" => "success", "message" => "Consult medicine deleted successfully"));
    } else {
        // Return error message
        echo json_encode(array("status" => "error", "message" => "Failed to delete consult medicine"));
    }
} else {
    // Return error message if request method is not POST
    echo json_encode(array("status" => "error", "message" => "Invalid request method"));
}
