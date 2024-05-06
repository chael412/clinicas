<?php

require ('../config/dbconfig.php');

/// ===================================== STUDENT SECTION===============================================================
if (isset($_POST['student_add'])) {
    $student_no = $_POST['student_no'];
    $course_id = $_POST['course_id'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $birthdate = $_POST['birthdate'];
    $sex = $_POST['sex'];
    $contact_no = $_POST['contact_no'];

    $query1 = "INSERT INTO user_accs (username, password) VALUES ('$username', '$password')";
    $result1 = mysqli_query($conn, $query1);

    if ($result1) {
        $uac_id = mysqli_insert_id($conn);
        $query2 = "INSERT INTO users (firstname, middlename, lastname, birthdate, sex, contact_no) VALUES ('$firstname', '$middlename', '$lastname', '$birthdate', '$sex', '$contact_no')";
        $result2 = mysqli_query($conn, $query2);
        if ($result2) {
            $u_id = mysqli_insert_id($conn);
            $query3 = "INSERT INTO students (student_no, u_id, uac_id, cs_id) VALUES ('$student_no', '$u_id', '$uac_id', '$course_id')";
            $result3 = mysqli_query($conn, $query3);
            if ($result3) {
                echo "success";
            } else {
                echo 'error';
            }

        } else {
            echo 'error 2';
        }

    } else {
        echo 'error 1';
    }
}

if (isset($_POST['student_update'])) {
    $sID = $_POST['sID'];
    $student_no = $_POST['student_no'];
    $course_id = $_POST['course_id'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $birthdate = $_POST['birthdate'];
    $sex = $_POST['sex'];
    $contact_no = $_POST['contact_no'];


    // First, update user_accs table
    $query = "UPDATE user_accs SET username='$username', password='$password' WHERE uac_id = (SELECT uac_id FROM students WHERE s_id = '$sID')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Then, update users table
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
    } else {
        echo 'error updating user_accs table';
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

//#######################################################  RLE Section #######################################################
if (isset($_POST["rle_id"])) {
    $rle_id = $_POST['rle_id'];


    $query = "SELECT s.s_id, s.student_no, cs.cs_id, uac.username, uac.password, uac.user_type, CONCAT(us.firstname,' ', us.middlename,' ' ,us.lastname) AS student_name FROM students s
    INNER JOIN courses AS cs ON s.cs_id = cs.cs_id
    INNER JOIN user_accs AS uac ON s.uac_id = uac.uac_id
    INNER JOIN users AS us ON s.u_id = us.u_id
    WHERE s.s_id = ?
    LIMIT 1";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $rle_id);
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

if (isset($_POST['rlemed_add'])) {
    $sID = $_POST['sID'];
    $urinalysis = $_FILES['urinalysis']['tmp_name'];
    $x_ray = $_FILES['x_ray']['tmp_name'];
    $pregnancy_test = $_FILES['pregnancy_test']['tmp_name'];
    $screening = $_FILES['screening']['tmp_name'];
    $fecalysis = $_FILES['fecalysis']['tmp_name'];

    $urinalysisPath = "../assets/upload/" . basename($_FILES['urinalysis']['name']);
    $x_rayPath = "../assets/upload/" . basename($_FILES['x_ray']['name']);
    $pregnancy_testPath = "../assets/upload/" . basename($_FILES['pregnancy_test']['name']);
    $screeningPath = "../assets/upload/" . basename($_FILES['screening']['name']);
    $fecalysisPath = "../assets/upload/" . basename($_FILES['fecalysis']['name']);



    move_uploaded_file($urinalysis, $urinalysisPath);
    move_uploaded_file($x_ray, $x_rayPath);
    move_uploaded_file($pregnancy_test, $pregnancy_testPath);
    move_uploaded_file($screening, $screeningPath);
    move_uploaded_file($fecalysis, $fecalysisPath);

    $query = "INSERT INTO rle (s_id, urinalysis, screening, fecalysis, x_ray, pregnancy_test) VALUES ('$sID', '$urinalysisPath',  '$screeningPath', '$fecalysisPath', '$x_rayPath', '$pregnancy_testPath')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo 'success';
    } else {
        echo 'error';
    }
}

//#######################################################  Teaching Section #######################################################
if (isset($_POST["teach_id"])) {
    $teach_id = $_POST['teach_id'];


    $query = "SELECT s.s_id, s.student_no, cs.cs_id, uac.username, uac.password, uac.user_type, CONCAT(us.firstname,' ', us.middlename ,'  ',us.lastname) AS student_name  FROM students s
    INNER JOIN courses AS cs ON s.cs_id = cs.cs_id
    INNER JOIN user_accs AS uac ON s.uac_id = uac.uac_id
    INNER JOIN users AS us ON s.u_id = us.u_id
    WHERE s.s_id = ? LIMIT 1";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $teach_id);
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

if (isset($_POST['teachmed_add'])) {
    $sID = $_POST['sID'];
    $urinalysis = $_FILES['urinalysis']['tmp_name'];
    $x_ray = $_FILES['x_ray']['tmp_name'];
    $cbc = $_FILES['cbc']['tmp_name'];

    $cbcPath = "../assets/upload/" . basename($_FILES['cbc']['name']);
    $urinalysisPath = "../assets/upload/" . basename($_FILES['urinalysis']['name']);
    $x_rayPath = "../assets/upload/" . basename($_FILES['x_ray']['name']);


    move_uploaded_file($cbc, $cbcPath);
    move_uploaded_file($urinalysis, $urinalysisPath);
    move_uploaded_file($x_ray, $x_rayPath);


    $query = "INSERT INTO practice_teaching (s_id, cbc, urinalysis, x_ray) VALUES ('$sID', '$cbcPath', '$urinalysisPath',  '$x_rayPath')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo 'success';
    } else {
        echo 'error';
    }
}

//#######################################################  Food Section #######################################################
if (isset($_POST["food_id"])) {
    $food_id = $_POST['food_id'];


    $query = "SELECT s.s_id, s.student_no, cs.cs_id, uac.username, uac.password, uac.user_type, CONCAT(us.firstname,' ', us.middlename ,'  ',us.lastname) AS student_name  FROM students s
    INNER JOIN courses AS cs ON s.cs_id = cs.cs_id
    INNER JOIN user_accs AS uac ON s.uac_id = uac.uac_id
    INNER JOIN users AS us ON s.u_id = us.u_id
    WHERE s.s_id = ? LIMIT 1";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $food_id);
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

if (isset($_POST['foodmed_add'])) {
    $sID = $_POST['sID'];
    $urinalysis = $_FILES['urinalysis']['tmp_name'];
    $x_ray = $_FILES['x_ray']['tmp_name'];
    $cbc = $_FILES['cbc']['tmp_name'];

    $cbcPath = "../assets/upload/" . basename($_FILES['cbc']['name']);
    $urinalysisPath = "../assets/upload/" . basename($_FILES['urinalysis']['name']);
    $x_rayPath = "../assets/upload/" . basename($_FILES['x_ray']['name']);


    move_uploaded_file($cbc, $cbcPath);
    move_uploaded_file($urinalysis, $urinalysisPath);
    move_uploaded_file($x_ray, $x_rayPath);


    $query = "INSERT INTO practice_teaching (s_id, cbc, urinalysis, x_ray) VALUES ('$sID', '$cbcPath', '$urinalysisPath',  '$x_rayPath')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo 'success';
    } else {
        echo 'error';
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
    $uID = $_POST['uID'];
    $complaints = $_POST['complaints'];
    $recommendation = $_POST['recommendation'];
    $med_desc = $_POST['med_desc'];

    $medicines = $_POST['medicines'];
    $quantities = $_POST['quantities'];


    $query = "INSERT INTO consultations (u_id, chief_complaints, recommendation, med_desc) VALUES ('$uID', '$complaints', '$recommendation', '$med_desc')";
    $result = mysqli_query($conn, $query);

    $consultationSuccess = false;

    if ($result) {
        $ct_id = mysqli_insert_id($conn);

        // Loop through medicines
        foreach ($medicines as $key => $medicine) {
            $medicine_id = $medicine['id'];
            $quantity = $quantities[$key];

            $query2 = "INSERT INTO consult_medicine (ct_id, mdn_id, cm_quantity) VALUES ('$ct_id', '$medicine_id', '$quantity')";
            $result2 = mysqli_query($conn, $query2);

            if (!$result2) {
                $consultationSuccess = false;
                break;
            } else {
                $consultationSuccess = true;
            }
        }


        if ($consultationSuccess) {
            echo 'success';
        } else {
            echo 'error';
        }
    } else {
        echo 'error';
    }
}

if (isset($_POST['consult_update'])) {
    $ct_id = $_POST['ct_id'];
    $complaints = $_POST['complaints'];
    $recommendation = $_POST['recommendation'];
    $med_desc = $_POST['med_desc'];

    // Update the consultations table
    $update_query = "UPDATE consultations SET chief_complaints = '$complaints', recommendation = '$recommendation', med_desc = '$med_desc' WHERE ct_id = '$ct_id'";
    $update_result = mysqli_query($conn, $update_query);

    // Initialize consultation success flag
    $consultationSuccess = false;

    // Check if the update was successful
    if ($update_result) {
        $consultationSuccess = true; // Consultation update successful

        // Process each medicine update or insertion
        foreach ($_POST['medicines'] as $key => $medicine) {
            $cm_id = $medicine['cm_id'];
            $quantity = $_POST['quantities'][$key];

            // Check if this medicine exists in the consult_medicine table
            if ($cm_id != '') {
                // Update the quantity for existing medicine
                $update_med_query = "UPDATE consult_medicine SET cm_quantity = '$quantity' WHERE cm_id = '$cm_id'";
                $update_med_result = mysqli_query($conn, $update_med_query);

                // Check if the update was successful
                if (!$update_med_result) {
                    $consultationSuccess = false; // Update failed
                    break; // Exit loop
                }
            } else {
                // Insert new medicine if it doesn't exist
                $mdn_id = $medicine['id'];
                $insert_med_query = "INSERT INTO consult_medicine (ct_id, mdn_id, cm_quantity) VALUES ('$ct_id', '$mdn_id', '$quantity')";
                $insert_med_result = mysqli_query($conn, $insert_med_query);

                // Check if the insertion was successful
                if (!$insert_med_result) {
                    $consultationSuccess = false; // Insertion failed
                    break; // Exit loop
                }
            }
        }

        // Check consultation success flag
        if ($consultationSuccess) {
            // Return success message as JSON
            echo json_encode(array('status' => 'success'));
        } else {
            // Return error message as JSON
            echo json_encode(array('status' => 'error'));
        }
    } else {
        // Return error message as JSON if consultation update failed
        echo json_encode(array('status' => 'error'));
    }
}





//#######################################################  Medicine Section #######################################################

if (isset($_POST['medicine_add'])) {
    $medicine = $_POST['medicine'];
    $quantity = $_POST['quantity'];

    $query = "INSERT INTO medicine (medicine_name, quantity) VALUES ('$medicine','$quantity')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if (isset($_POST['medicine_update'])) {
    $mdn_id = $_POST['mdn_id'];
    $medicine_name = $_POST['medicine'];
    $quantity = $_POST['quantity'];

    $query = "UPDATE medicine SET medicine_name='$medicine_name', quantity = '$quantity' WHERE mdn_id='$mdn_id' ";

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



