<?php

require ('../config/dbconfig.php');

/// ===================================== STUDENT SECTION ===============================================================
if (isset($_POST['student_add'])) {
    $student_no = $_POST['student_no'];
    $course_id = $_POST['course_id'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $sex = $_POST['sex'];
    $contact_no = $_POST['contact_no'];


    $query2 = "INSERT INTO users (firstname, middlename, lastname, birthdate, sex, contact_no) VALUES ('$firstname', '$middlename', '$lastname', '$birthdate', '$sex', '$contact_no')";
    $result2 = mysqli_query($conn, $query2);
    if ($result2) {
        $u_id = mysqli_insert_id($conn);
        $query3 = "INSERT INTO students (student_no, u_id, cs_id) VALUES ('$student_no', '$u_id', '$course_id')";
        $result3 = mysqli_query($conn, $query3);
        if ($result3) {
            echo "success";
        } else {
            echo 'error';
        }

    } else {
        echo 'error 2';
    }


}

if (isset($_POST['student_update'])) {
    $sID = $_POST['sID'];
    $student_no = $_POST['student_no'];
    $course_id = $_POST['course_id'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $sex = $_POST['sex'];
    $contact_no = $_POST['contact_no'];


    $query = "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', birthdate='$birthdate', sex='$sex', contact_no='$contact_no' WHERE u_id = (SELECT u_id FROM students WHERE s_id = '$sID')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Finally, update students table
        $query = "UPDATE students SET cs_id='$course_id' WHERE s_id='$sID'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "success";
        } else {
            echo 'error updating students table';
        }
    } else {
        echo 'error updating users table';
    }

}

if (isset($_GET['stud_idx'])) {
    $stud_idx = $_GET['stud_idx'];

    // Assuming $conn is your database connection

    // First, delete from the students table
    $query = "DELETE FROM students WHERE s_id='$stud_idx'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Then, delete from the users table
        $query = "DELETE FROM users WHERE u_id = (SELECT u_id FROM students WHERE s_id = '$stud_idx')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Finally, delete from the user_accs table
            $query = "DELETE FROM user_accs WHERE uac_id = (SELECT uac_id FROM students WHERE s_id = '$stud_idx')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "success";
            } else {
                echo 'error deleting from user_accs table';
            }
        } else {
            echo 'error deleting from users table';
        }
    } else {
        echo 'error deleting from students table';
    }
}




/// ===================================== STUDENT SECTION===============================================================



/// ===================================== OJT SECTION===============================================================
if (isset($_POST['ojtmed_update'])) {
    // Code for updating existing records
    $ojtID = $_POST['ojtID'];

    $query = "SELECT urinalysis, x_ray, pregnancy_test FROM ojts WHERE ojt_id = '$ojtID'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $existingUrinalysis = $row['urinalysis'];
    $existingXRay = $row['x_ray'];
    $existingPregnancyTest = $row['pregnancy_test'];

    // Handle file uploads
    $urinalysis = $_FILES['urinalysis']['tmp_name'];
    $x_ray = $_FILES['x_ray']['tmp_name'];
    $pregnancy_test = $_FILES['pregnancy_test']['tmp_name'];

    $urinalysisPath = "../assets/upload/" . basename($_FILES['urinalysis']['name']);
    $x_rayPath = "../assets/upload/" . basename($_FILES['x_ray']['name']);
    $pregnancy_testPath = "../assets/upload/" . basename($_FILES['pregnancy_test']['name']);

    move_uploaded_file($urinalysis, $urinalysisPath);
    move_uploaded_file($x_ray, $x_rayPath);
    move_uploaded_file($pregnancy_test, $pregnancy_testPath);

    // Update database
    $query = "UPDATE ojts SET urinalysis = '$urinalysisPath', x_ray = '$x_rayPath', pregnancy_test = '$pregnancy_testPath' WHERE ojt_id = '$ojtID'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Delete previous files if they exist and have changed
        if (!empty($existingUrinalysis) && $existingUrinalysis != $urinalysisPath) {
            unlink($existingUrinalysis);
        }
        if (!empty($existingXRay) && $existingXRay != $x_rayPath) {
            unlink($existingXRay);
        }
        if (!empty($existingPregnancyTest) && $existingPregnancyTest != $pregnancy_testPath) {
            unlink($existingPregnancyTest);
        }

        echo 'success';
    } else {
        echo 'error';
    }
}

if (isset($_POST['ojtmed_add'])) {
    $medicationPresent = $_POST['medicationPresent'];
    $diagnosis = $_POST['diagnosis'];
    $treatment = $_POST['treatment'];

    $hyperthension = $_POST['hyperthension'];
    $diabetes = $_POST['diabetes'];
    $cardio = $_POST['cardio'];
    $ptb = $_POST['ptb'];
    $hyperacidity = $_POST['hyperacidity'];
    $allergy = $_POST['allergy'];
    $epilepsy = $_POST['epilepsy'];
    $asthma = $_POST['asthma'];
    $dysmenorrhea = $_POST['dysmenorrhea'];
    $liver = $_POST['liver'];

    $ojtID = $_POST['ojtID'];
    $urinalysis = $_FILES['urinalysis']['tmp_name'];
    $x_ray = $_FILES['x_ray']['tmp_name'];
    $pregnancy_test = $_FILES['pregnancy_test']['tmp_name'];

    $urinalysisPath = "../assets/upload/ojt/" . basename($_FILES['urinalysis']['name']);
    $x_rayPath = "../assets/upload/ojt/" . basename($_FILES['x_ray']['name']);
    $pregnancy_testPath = "../assets/upload/ojt/" . basename($_FILES['pregnancy_test']['name']);

    move_uploaded_file($urinalysis, $urinalysisPath);
    move_uploaded_file($x_ray, $x_rayPath);
    move_uploaded_file($pregnancy_test, $pregnancy_testPath);




    $query = "INSERT INTO medical_present (ispresent, mp_diagnosis, mp_treatment) VALUES (' $medicationPresent', '$diagnosis', '$treatment')";
    $result = mysqli_query($conn, $query);


    if ($result) {
        $mp_id = mysqli_insert_id($conn);

        $query2 = "INSERT INTO medical_history (Hyperthension, Diabetes, Cardiovascular_desease, PTB, Hyperacidity, Allergy, Epilepsy, Asthma, Dysmenorrhea, liver_Desease) VALUES ('$hyperthension', '$diabetes', '$cardio', '$ptb', '$hyperacidity', '$allergy', '$epilepsy', ' $asthma', '$dysmenorrhea', '$liver')";
        $result2 = mysqli_query($conn, $query2);

        if ($result2) {
            $mh_id = mysqli_insert_id($conn);

            $query3 = "INSERT INTO ojts (s_id, mh_id, mp_id, urinalysis, x_ray, pregnancy_test) VALUES ('$ojtID', '$mh_id', '$mp_id', '$urinalysisPath', '$x_rayPath', '$pregnancy_testPath')";
            $result3 = mysqli_query($conn, $query3);
            if ($result3) {
                echo 'success';
            } else {
                echo 'error';
            }
        }
    }

}

if (isset($_POST["ojt_id"])) {
    $ojt_id = $_POST['ojt_id'];


    $query = "SELECT s.s_id, s.student_no, cs.cs_id, uac.username, uac.password, uac.user_type, CONCAT(us.firstname,' ', us.middlename,' ' ,us.lastname) AS student_name FROM students s
    INNER JOIN courses AS cs ON s.cs_id = cs.cs_id
    INNER JOIN user_accs AS uac ON s.uac_id = uac.uac_id
    INNER JOIN users AS us ON s.u_id = us.u_id
    WHERE s.s_id = ?
    LIMIT 1";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $ojt_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        echo json_encode($row);
    } else {
        echo json_encode(["error" => "No data found for employee with ID: $ojt_id"]);
    }

    mysqli_close($conn);
}

if (isset($_GET['ojt_idx'])) {
    $ojt_id = $_GET['ojt_idx'];

    // Retrieve paths of files associated with the record
    $selectQuery = "SELECT urinalysis, x_ray, pregnancy_test FROM ojts WHERE ojt_id = '$ojt_id'";
    $result = mysqli_query($conn, $selectQuery);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Delete files from the server
        $urinalysisPath = $row['urinalysis'];
        $xRayPath = $row['x_ray'];
        $pregnancyTestPath = $row['pregnancy_test'];

        // Delete files only if paths are not empty
        if (!empty($urinalysisPath)) {
            unlink($urinalysisPath); // Delete urinalysis file
        }
        if (!empty($xRayPath)) {
            unlink($xRayPath); // Delete x-ray file
        }
        if (!empty($pregnancyTestPath)) {
            unlink($pregnancyTestPath); // Delete pregnancy test file
        }
    }

    // Delete record from the database
    $deleteQuery = "DELETE FROM ojts WHERE ojt_id = '$ojt_id'";
    if (mysqli_query($conn, $deleteQuery)) {
        echo "Deleted Successfully!";
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

/// ===================================== OJT SECTION===============================================================



//#######################################################  Admin Section #######################################################

if (isset($_POST['admin_add'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO admins (username, password) VALUES ('$username', '$password')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if (isset($_POST['admin_update'])) {
    $id = $_POST['admin_id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "UPDATE admins SET  username='$username',  password='$password' WHERE a_id='$id' ";

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo "success";
    } else {
        echo "error";
    }

}

if (isset($_GET['a_idz'])) {
    $adminID = $_GET['a_idz'];

    $deleteQuery = "DELETE FROM admins WHERE a_id = $adminID";

    if (mysqli_query($conn, $deleteQuery)) {
        echo "Admin Deleted Successfully!";
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}



//#######################################################  Consult Section #######################################################
if (isset($_POST["consult_id"])) {
    $consult_id = $_POST['consult_id'];

    $query = "SELECT  us.u_id, CONCAT(us.firstname,' ', us.middlename,' ' ,us.lastname) AS client_name FROM users us
    WHERE us.u_id = ? LIMIT 1";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $consult_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        echo json_encode($row);
    } else {
        echo json_encode(["error" => "No data found for employee with ID: $ojt_id"]);
    }

    mysqli_close($conn);
}

if (isset($_POST['consult_add'])) {
    // Sanitize input
    $uID = mysqli_real_escape_string($conn, $_POST['uID']);
    $complaints = mysqli_real_escape_string($conn, $_POST['complaints']);
    $recommendation = mysqli_real_escape_string($conn, $_POST['recommendation']);
    $med_desc = mysqli_real_escape_string($conn, $_POST['med_desc']);

    $medicines = $_POST['medicines'];
    $quantities = $_POST['quantities'];

    // Check if the requested quantities are available in the inventory
    $allAvailable = true;
    $insufficientStock = [];

    foreach ($medicines as $key => $medicine_id) {
        $quantity = $quantities[$key];

        // Query to check inventory stock
        $inventoryQuery = "SELECT medicine_name, quantity FROM medicine WHERE mdn_id = ?";
        $inventoryStmt = mysqli_prepare($conn, $inventoryQuery);
        mysqli_stmt_bind_param($inventoryStmt, 'i', $medicine_id);
        mysqli_stmt_execute($inventoryStmt);
        mysqli_stmt_bind_result($inventoryStmt, $medicine_name, $stock);
        mysqli_stmt_fetch($inventoryStmt);
        mysqli_stmt_close($inventoryStmt);

        // Check if stock is sufficient
        if ($stock < $quantity) {
            $allAvailable = false;
            $insufficientStock[] = [
                'name' => $medicine_name,
                'available' => $stock
            ];
        }
    }

    if ($allAvailable) {
        // Insert into consultations table
        $query = "INSERT INTO consultations (u_id, chief_complaints, recommendation, med_desc) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'isss', $uID, $complaints, $recommendation, $med_desc);
        $result = mysqli_stmt_execute($stmt);
        $ct_id = mysqli_insert_id($conn);  // Get the inserted consultation ID
        mysqli_stmt_close($stmt);

        if ($result) {
            // Prepare statement for inserting into consult_medicine table
            $query2 = "INSERT INTO consult_medicine (ct_id, mdn_id, cm_quantity) VALUES (?, ?, ?)";
            $stmt2 = mysqli_prepare($conn, $query2);
            $consultationSuccess = true;

            foreach ($medicines as $key => $medicine_id) {
                $quantity = $quantities[$key];
                mysqli_stmt_bind_param($stmt2, 'iii', $ct_id, $medicine_id, $quantity);
                $result2 = mysqli_stmt_execute($stmt2);

                if ($result2) {
                    // Deduct the quantity from the inventory
                    $updateQuery = "UPDATE medicine SET quantity = quantity - ? WHERE mdn_id = ?";
                    $updateStmt = mysqli_prepare($conn, $updateQuery);
                    mysqli_stmt_bind_param($updateStmt, 'ii', $quantity, $medicine_id);
                    mysqli_stmt_execute($updateStmt);
                    mysqli_stmt_close($updateStmt);
                } else {
                    $consultationSuccess = false;
                    break;
                }
            }

            mysqli_stmt_close($stmt2);

            if ($consultationSuccess) {
                echo 'success';
            } else {
                echo 'error';
            }
        } else {
            echo 'error';
        }
    } else {
        echo 'insufficient stock: ';
        foreach ($insufficientStock as $medicine) {
            echo $medicine['name'] . ' (available: ' . $medicine['available'] . '), ';
        }
    }
}

if (isset($_POST['consult_add1'])) {
    // Sanitize input
    $uID = mysqli_real_escape_string($conn, $_POST['uID']);
    $complaints = mysqli_real_escape_string($conn, $_POST['complaints']);
    $recommendation = mysqli_real_escape_string($conn, $_POST['recommendation']);
    $med_desc = mysqli_real_escape_string($conn, $_POST['med_desc']);

    $medicines = $_POST['medicines'];
    $quantities = $_POST['quantities'];

    // Check if the requested quantities are available in the inventory
    $allAvailable = true;
    $insufficientStock = [];

    foreach ($medicines as $key => $medicine_id) {
        $quantity = $quantities[$key];

        // Query to check inventory stock
        $inventoryQuery = "SELECT medicine_name, quantity FROM medicine WHERE mdn_id = ?";
        $inventoryStmt = mysqli_prepare($conn, $inventoryQuery);
        mysqli_stmt_bind_param($inventoryStmt, 'i', $medicine_id);
        mysqli_stmt_execute($inventoryStmt);
        mysqli_stmt_bind_result($inventoryStmt, $medicine_name, $stock);
        mysqli_stmt_fetch($inventoryStmt);
        mysqli_stmt_close($inventoryStmt);

        // Check if stock is sufficient
        if ($stock < $quantity) {
            $allAvailable = false;
            $insufficientStock[] = [
                'name' => $medicine_name,
                'available' => $stock
            ];
        }
    }

    if ($allAvailable) {
        // Insert into consultations table
        $query = "INSERT INTO consultations (u_id, chief_complaints, recommendation, med_desc) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'isss', $uID, $complaints, $recommendation, $med_desc);
        $result = mysqli_stmt_execute($stmt);
        $ct_id = mysqli_insert_id($conn);  // Get the inserted consultation ID
        mysqli_stmt_close($stmt);

        if ($result) {
            // Prepare statement for inserting into consult_medicine table
            $query2 = "INSERT INTO consult_medicine (ct_id, mdn_id, cm_quantity) VALUES (?, ?, ?)";
            $stmt2 = mysqli_prepare($conn, $query2);
            $consultationSuccess = true;

            foreach ($medicines as $key => $medicine_id) {
                $quantity = $quantities[$key];
                mysqli_stmt_bind_param($stmt2, 'iii', $ct_id, $medicine_id, $quantity);
                $result2 = mysqli_stmt_execute($stmt2);

                if ($result2) {
                    // Deduct the quantity from the inventory
                    $updateQuery = "UPDATE medicine SET quantity = quantity - ? WHERE mdn_id = ?";
                    $updateStmt = mysqli_prepare($conn, $updateQuery);
                    mysqli_stmt_bind_param($updateStmt, 'ii', $quantity, $medicine_id);
                    mysqli_stmt_execute($updateStmt);
                    mysqli_stmt_close($updateStmt);
                } else {
                    $consultationSuccess = false;
                    break;
                }
            }

            mysqli_stmt_close($stmt2);

            if ($consultationSuccess) {
                echo 'success';
            } else {
                echo 'error';
            }
        } else {
            echo 'error';
        }
    } else {
        echo 'insufficient stock: ';
        foreach ($insufficientStock as $medicine) {
            echo $medicine['name'] . ' (available: ' . $medicine['available'] . '), ';
        }
    }
}

if (isset($_POST['consult_add12'])) {
    // Sanitize input
    $uID = mysqli_real_escape_string($conn, $_POST['uID']);
    $complaints = mysqli_real_escape_string($conn, $_POST['complaints']);
    $recommendation = mysqli_real_escape_string($conn, $_POST['recommendation']);
    $med_desc = mysqli_real_escape_string($conn, $_POST['med_desc']);

    $medicines = $_POST['medicines'];
    $quantities = $_POST['quantities'];

    // Check if the requested quantities are available in the inventory
    $allAvailable = true;
    $insufficientStock = [];

    foreach ($medicines as $key => $medicine_id) {
        $quantity = $quantities[$key];

        // Query to check inventory stock
        $inventoryQuery = "SELECT medicine_name, quantity FROM medicine WHERE mdn_id = ?";
        $inventoryStmt = mysqli_prepare($conn, $inventoryQuery);
        mysqli_stmt_bind_param($inventoryStmt, 'i', $medicine_id);
        mysqli_stmt_execute($inventoryStmt);
        mysqli_stmt_bind_result($inventoryStmt, $medicine_name, $stock);
        mysqli_stmt_fetch($inventoryStmt);
        mysqli_stmt_close($inventoryStmt);

        // Check if stock is sufficient
        if ($stock < $quantity) {
            $allAvailable = false;
            $insufficientStock[] = [
                'name' => $medicine_name,
                'available' => $stock
            ];
        }
    }

    if ($allAvailable) {
        // Insert into consultations table
        $query = "INSERT INTO consult_monthly (u_id, chief_complaints, recommendation, med_desc) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'isss', $uID, $complaints, $recommendation, $med_desc);
        $result = mysqli_stmt_execute($stmt);
        $ct_id = mysqli_insert_id($conn);  // Get the inserted consultation ID
        mysqli_stmt_close($stmt);

        if ($result) {
            // Prepare statement for inserting into consult_medicine table
            $query2 = "INSERT INTO consult_monthly_medicine (ctm_id, mdn_id, ctmm_quantity) VALUES (?, ?, ?)";
            $stmt2 = mysqli_prepare($conn, $query2);
            $consultationSuccess = true;

            foreach ($medicines as $key => $medicine_id) {
                $quantity = $quantities[$key];
                mysqli_stmt_bind_param($stmt2, 'iii', $ct_id, $medicine_id, $quantity);
                $result2 = mysqli_stmt_execute($stmt2);

                if ($result2) {
                    // Deduct the quantity from the inventory
                    $updateQuery = "UPDATE medicine SET quantity = quantity - ? WHERE mdn_id = ?";
                    $updateStmt = mysqli_prepare($conn, $updateQuery);
                    mysqli_stmt_bind_param($updateStmt, 'ii', $quantity, $medicine_id);
                    mysqli_stmt_execute($updateStmt);
                    mysqli_stmt_close($updateStmt);
                } else {
                    $consultationSuccess = false;
                    break;
                }
            }

            mysqli_stmt_close($stmt2);

            if ($consultationSuccess) {
                echo 'success';
            } else {
                echo 'error';
            }
        } else {
            echo 'error';
        }
    } else {
        echo 'insufficient stock: ';
        foreach ($insufficientStock as $medicine) {
            echo $medicine['name'] . ' (available: ' . $medicine['available'] . '), ';
        }
    }
}


if (isset($_POST['consult_update'])) {
    $ctId = $_POST['ct_id'];
    $complaints = $_POST['complaints'];
    $recommendation = $_POST['recommendation'];
    $med_desc = $_POST['med_desc'];
    $medicines = $_POST['medicines'];
    $quantities = $_POST['quantities'];

    // Update consultations table
    $updateQuery = "UPDATE consultations SET chief_complaints = '$complaints', recommendation = '$recommendation', med_desc = '$med_desc' WHERE ct_id = '$ctId'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        // Delete existing consult_medicine entries for this consultation
        $deleteQuery = "DELETE FROM consult_medicine WHERE ct_id = '$ctId'";
        $deleteResult = mysqli_query($conn, $deleteQuery);

        if ($deleteResult) {
            // Insert new consult_medicine entries
            $success = true;
            foreach ($medicines as $key => $medicine) {
                $medicine_id = $medicine['id'];
                $quantity = $quantities[$key];

                $insertQuery = "INSERT INTO consult_medicine (ct_id, mdn_id, cm_quantity) VALUES ('$ctId', '$medicine_id', '$quantity')";
                $insertResult = mysqli_query($conn, $insertQuery);

                if (!$insertResult) {
                    $success = false;
                    break;
                }
            }

            if ($success) {
                echo 'success';
            } else {
                echo 'error';
            }
        } else {
            echo 'error';
        }
    } else {
        echo 'error';
    }
}





//#######################################################  Medicine Section #######################################################

if (isset($_POST['medicine_add'])) {
    $medicine = $_POST['medicine'];
    $brand = $_POST['brand'];
    $medicine_type = $_POST['medicine_type'];
    $ml = $_POST['ml'];
    $quantity = $_POST['quantity'];
    $pres_desc = $_POST['pres_desc'];

    $query = "INSERT INTO medicine (medicine_name, brand_name, type_id, ml, quantity, med_prescription) VALUES ('$medicine', '$brand', '$medicine_type', '$ml', '$quantity', '$pres_desc')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if (isset($_POST['medicine_update'])) {
    $mdn_id = $_POST['mdn_id'];
    $medicine = $_POST['medicine'];
    $brand = $_POST['brand'];
    $medicine_type = $_POST['medicine_type'];
    $ml = $_POST['ml'];
    $quantity = $_POST['quantity'];
    $pres_desc = $_POST['pres_desc'];

    $query = "UPDATE medicine SET medicine_name='$medicine', brand_name='$brand', type_id='$medicine_type', ml='$ml', quantity = '$quantity', med_prescription='$pres_desc'  WHERE mdn_id='$mdn_id' ";

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo "success";
    } else {
        echo "error";
    }

}

if (isset($_GET['mdn_idz'])) {
    $mdnID = $_GET['mdn_idz'];

    $deleteQuery = "DELETE FROM medicine WHERE mdn_id = '$mdnID'";

    if (mysqli_query($conn, $deleteQuery)) {
        echo "Medicine Deleted Successfully!";
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}


// ==================================================================================== visitor
if (isset($_POST['visitor_add'])) {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $sex = $_POST['sex'];
    $contact_no = $_POST['contact_no'];


    $query2 = "INSERT INTO users (firstname, middlename, lastname, birthdate, sex, contact_no) VALUES ('$firstname', '$middlename', '$lastname', '$birthdate', '$sex', '$contact_no')";
    $result2 = mysqli_query($conn, $query2);
    if ($result2) {
        $u_id = mysqli_insert_id($conn);
        $query3 = "INSERT INTO visitors (u_id) VALUES ('$u_id')";
        $result3 = mysqli_query($conn, $query3);
        if ($result3) {
            echo "success";
        } else {
            echo 'error';
        }

    } else {
        echo 'error 2';
    }


}

// ===================================================================================== Employee
if (isset($_POST['employee_add'])) {
    $employee_no = $_POST['employee_no'];
    $dp_id = $_POST['dp_id'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $sex = $_POST['sex'];
    $contact_no = $_POST['contact_no'];


    $query2 = "INSERT INTO users (firstname, middlename, lastname, birthdate, sex, contact_no) VALUES ('$firstname', '$middlename', '$lastname', '$birthdate', '$sex', '$contact_no')";
    $result2 = mysqli_query($conn, $query2);
    if ($result2) {
        $u_id = mysqli_insert_id($conn);
        $query3 = "INSERT INTO employees(employee_no, u_id, dp_id) VALUES ('$employee_no', '$u_id', '$dp_id')";
        $result3 = mysqli_query($conn, $query3);
        if ($result3) {
            echo "success";
        } else {
            echo 'error';
        }

    } else {
        echo 'error 2';
    }


}