<?php

require('../config/dbconfig.php');

// Student Medical
if (isset($_POST['student_medical_update'])) {
    $user_id = $_POST['user_id'];
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
    $other_disease = $_POST['other_disease'];

    // Assuming mp_id and mh_id are known
    $mp_id = $_POST['mp_id'];
    $mh_id = $_POST['mh_id'];

    // Update medical_present table
    $query1 = "UPDATE medical_present 
                SET ispresent = '$medicationPresent', 
                mp_diagnosis = '$diagnosis', 
                mp_treatment = '$treatment' 
                WHERE mp_id = '$mp_id'";
    $result1 = mysqli_query($conn, $query1);

    if ($result1) {
        // Update medical_history table
        $query2 = "UPDATE medical_history 
                    SET Hyperthension = '$hyperthension', 
                    Diabetes = '$diabetes', 
                    Cardiovascular_desease = '$cardio', 
                    PTB = '$ptb', 
                    Hyperacidity = '$hyperacidity', 
                    Allergy = '$allergy', 
                    Epilepsy = '$epilepsy', 
                    Asthma = '$asthma', 
                    Dysmenorrhea = '$dysmenorrhea', 
                    liver_Desease = '$liver', 
                    other_disease= '$other_disease' 
                    WHERE mh_id = '$mh_id'";
        $result2 = mysqli_query($conn, $query2);

        if ($result2) {
            echo 'success';
        } else {
            echo 'error';
        }
    } else {
        echo 'error';
    }
}

if (isset($_POST['student_medical_add'])) {
    $user_id = $_POST['user_id'];
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
    $other_disease = $_POST['other_disease'];


    $query = "INSERT INTO medical_present (ispresent, mp_diagnosis, mp_treatment) VALUES (' $medicationPresent', '$diagnosis', '$treatment')";
    $result = mysqli_query($conn, $query);


    if ($result) {
        $mp_id = mysqli_insert_id($conn);

        $query2 = "INSERT INTO medical_history (Hyperthension, Diabetes, Cardiovascular_desease, PTB, Hyperacidity, Allergy, Epilepsy, Asthma, Dysmenorrhea, liver_Desease, other_disease ) VALUES ('$hyperthension', '$diabetes', '$cardio', '$ptb', '$hyperacidity', '$allergy', '$epilepsy', ' $asthma', '$dysmenorrhea', '$liver', '$other_disease')";
        $result2 = mysqli_query($conn, $query2);

        if ($result2) {
            $mh_id = mysqli_insert_id($conn);

            $query3 = "INSERT INTO med_cert (u_id, mh_id, mp_id, med_type) VALUES ('$user_id', '$mh_id', '$mp_id', 1)";
            $result3 = mysqli_query($conn, $query3);
            if ($result3) {
                echo 'success';
            } else {
                echo 'error';
            }
        } else {
            echo 'error';
        }
    }

}


// Employee Medical
if (isset($_POST['employee_medical_update'])) {
    $user_id = $_POST['user_id'];
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
    $employee_edit_other_disease = $_POST['employee_edit_other_disease'];

    // Assuming mp_id and mh_id are known
    $mp_id = $_POST['mp_id'];
    $mh_id = $_POST['mh_id'];

    // Update medical_present table
    $query1 = "UPDATE medical_present 
                SET ispresent = '$medicationPresent', 
                mp_diagnosis = '$diagnosis', 
                mp_treatment = '$treatment' 
                WHERE mp_id = '$mp_id'";
    $result1 = mysqli_query($conn, $query1);

    if ($result1) {
        // Update medical_history table
        $query2 = "UPDATE medical_history 
                    SET Hyperthension = '$hyperthension', 
                    Diabetes = '$diabetes', 
                    Cardiovascular_desease = '$cardio', 
                    PTB = '$ptb', 
                    Hyperacidity = '$hyperacidity', 
                    Allergy = '$allergy', 
                    Epilepsy = '$epilepsy', 
                    Asthma = '$asthma', 
                    Dysmenorrhea = '$dysmenorrhea', 
                    liver_Desease = '$liver',
                    other_disease = '$employee_edit_other_disease'
                    WHERE mh_id = '$mh_id'";
        $result2 = mysqli_query($conn, $query2);

        if ($result2) {
            echo 'success';
        } else {
            echo 'error';
        }
    } else {
        echo 'error';
    }
}

if (isset($_POST['employee_medical_add'])) {
    $user_id = $_POST['user_id'];
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
    $employee_other_disease = $_POST['employee_other_disease'];


    $query = "INSERT INTO medical_present (ispresent, mp_diagnosis, mp_treatment) VALUES (' $medicationPresent', '$diagnosis', '$treatment')";
    $result = mysqli_query($conn, $query);


    if ($result) {
        $mp_id = mysqli_insert_id($conn);

        $query2 = "INSERT INTO medical_history (Hyperthension, Diabetes, Cardiovascular_desease, PTB, Hyperacidity, Allergy, Epilepsy, Asthma, Dysmenorrhea, liver_Desease, other_disease) VALUES ('$hyperthension', '$diabetes', '$cardio', '$ptb', '$hyperacidity', '$allergy', '$epilepsy', ' $asthma', '$dysmenorrhea', '$liver', '$employee_other_disease')";
        $result2 = mysqli_query($conn, $query2);

        if ($result2) {
            $mh_id = mysqli_insert_id($conn);

            $query3 = "INSERT INTO med_cert (u_id, mh_id, mp_id, med_type) VALUES ('$user_id', '$mh_id', '$mp_id', 1)";
            $result3 = mysqli_query($conn, $query3);
            if ($result3) {
                echo 'success';
            } else {
                echo 'error';
            }
        } else {
            echo 'error';
        }
    }

}

//Visitor Add
if (isset($_POST['visitor_medical_add'])) {
    $user_id = $_POST['user_id'];
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
    $other_disease = $_POST['visitor_other_disease'];


    $query = "INSERT INTO medical_present (ispresent, mp_diagnosis, mp_treatment) VALUES (' $medicationPresent', '$diagnosis', '$treatment')";
    $result = mysqli_query($conn, $query);


    if ($result) {
        $mp_id = mysqli_insert_id($conn);

        $query2 = "INSERT INTO medical_history (Hyperthension, Diabetes, Cardiovascular_desease, PTB, Hyperacidity, Allergy, Epilepsy, Asthma, Dysmenorrhea, liver_Desease, other_disease) VALUES ('$hyperthension', '$diabetes', '$cardio', '$ptb', '$hyperacidity', '$allergy', '$epilepsy', ' $asthma', '$dysmenorrhea', '$liver', '$other_disease')";
        $result2 = mysqli_query($conn, $query2);

        if ($result2) {
            $mh_id = mysqli_insert_id($conn);

            $query3 = "INSERT INTO med_cert (u_id, mh_id, mp_id, med_type) VALUES ('$user_id', '$mh_id', '$mp_id', 1)";
            $result3 = mysqli_query($conn, $query3);
            if ($result3) {
                echo 'success';
            } else {
                echo 'error';
            }
        } else {
            echo 'error';
        }
    }

}

if (isset($_POST['visitor_medical_update'])) {
    $user_id = $_POST['user_id'];
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
    $other_disease = $_POST['visitor_edit_other_disease'];

    // Assuming mp_id and mh_id are known
    $mp_id = $_POST['mp_id'];
    $mh_id = $_POST['mh_id'];

    // Update medical_present table
    $query1 = "UPDATE medical_present 
                SET ispresent = '$medicationPresent', 
                mp_diagnosis = '$diagnosis', 
                mp_treatment = '$treatment' 
                WHERE mp_id = '$mp_id'";
    $result1 = mysqli_query($conn, $query1);

    if ($result1) {
        // Update medical_history table
        $query2 = "UPDATE medical_history 
                    SET Hyperthension = '$hyperthension', 
                    Diabetes = '$diabetes', 
                    Cardiovascular_desease = '$cardio', 
                    PTB = '$ptb', 
                    Hyperacidity = '$hyperacidity', 
                    Allergy = '$allergy', 
                    Epilepsy = '$epilepsy', 
                    Asthma = '$asthma', 
                    Dysmenorrhea = '$dysmenorrhea', 
                    liver_Desease = '$liver',
                    other_disease  = '$other_disease'
                    WHERE mh_id = '$mh_id'";
        $result2 = mysqli_query($conn, $query2);

        if ($result2) {
            echo 'success';
        } else {
            echo 'error';
        }
    } else {
        echo 'error';
    }
}



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

    // Update the users table
    $query = "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', birthdate='$birthdate', sex='$sex', contact_no='$contact_no' WHERE u_id = (SELECT u_id FROM students WHERE s_id = '$sID')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Update the students table
        $query = "UPDATE students SET student_no = '$student_no', cs_id='$course_id' WHERE s_id='$sID'";
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
    $sID = $_GET['stud_idx'];

    // Fetch the user ID associated with the student
    $user_query = "SELECT u.u_id FROM students s
                   INNER JOIN users u ON s.u_id = u.u_id 
                   WHERE s.s_id = $sID";
    $result = mysqli_query($conn, $user_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $uID = $row['u_id'];

        $studDel = "DELETE FROM students WHERE s_id = $sID";
        if (mysqli_query($conn, $studDel)) {
            $userDel = "DELETE FROM users WHERE u_id = $uID";
            if (mysqli_query($conn, $userDel)) {
                echo "Student deleted successfully!";
            } else {
                echo "Error deleting user record: " . mysqli_error($conn);
            }
        } else {
            echo "Error deleting student record: " . mysqli_error($conn);
        }
    } else {
        echo "No user found for the provided student ID.";
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
//Sudent consult
if (isset($_POST["consult_id"])) {
    $consult_id = $_POST['consult_id'];

    // Query to get the client's name
    $clientNameQuery = "SELECT us.u_id, CONCAT(us.firstname,' ', us.middlename,' ' ,us.lastname) AS client_name 
                        FROM users us
                        INNER JOIN students st ON us.u_id = st.u_id
                        WHERE us.u_id = ? LIMIT 1";

    $stmt = mysqli_prepare($conn, $clientNameQuery);
    mysqli_stmt_bind_param($stmt, "i", $consult_id);
    mysqli_stmt_execute($stmt);
    $clientResult = mysqli_stmt_get_result($stmt);
    $clientRow = mysqli_fetch_assoc($clientResult);

    if ($clientRow) {
        // Query to get medical records
        $medicalQuery = "SELECT  us.u_id, mc.mc_id, mp.mp_id, mh.mh_id, 
                                CONCAT(us.lastname, ' ', us.firstname,' ', us.middlename) AS client_name, 
                                mc.med_type, mp.ispresent, mp.mp_diagnosis, mp.mp_treatment, 
                                mh.Hyperthension, mh.Diabetes, mh.Cardiovascular_desease, mh.PTB, 
                                mh.Hyperacidity, mh.Allergy, mh.Epilepsy, mh.Asthma, mh.Dysmenorrhea, 
                                mh.liver_Desease  
                         FROM  users us
                         INNER JOIN med_cert AS mc ON us.u_id = mc.u_id
                         INNER JOIN medical_present AS mp ON mc.mp_id = mp.mp_id
                         INNER JOIN medical_history AS mh ON mc.mh_id = mh.mh_id
                         WHERE us.u_id = ? LIMIT 1";

        $stmt = mysqli_prepare($conn, $medicalQuery);
        mysqli_stmt_bind_param($stmt, "i", $consult_id);
        mysqli_stmt_execute($stmt);
        $medicalResult = mysqli_stmt_get_result($stmt);
        $medicalRow = mysqli_fetch_assoc($medicalResult);

        if ($medicalRow) {
            // Merge clientRow and medicalRow arrays to send all data in one response
            $response = array_merge($clientRow, $medicalRow);
            echo json_encode($response);
        } else {
            // Return only the client's name if no medical records are found
            echo json_encode($clientRow);
        }
    } else {
        echo json_encode(["error" => "No data found for client with ID: $consult_id"]);
    }

    mysqli_close($conn);
}
//employee reg consult
if (isset($_POST["consult_id1"])) {
    $consult_id = $_POST['consult_id1'];

    // Query to get the client's name
    $clientNameQuery = "SELECT us.u_id, CONCAT(us.firstname,' ', us.middlename,' ' ,us.lastname) AS client_name 
                        FROM users us
                        INNER JOIN employees emp ON us.u_id = emp.u_id
                        WHERE emp.u_id = ? LIMIT 1";

    $stmt = mysqli_prepare($conn, $clientNameQuery);
    mysqli_stmt_bind_param($stmt, "i", $consult_id);
    mysqli_stmt_execute($stmt);
    $clientResult = mysqli_stmt_get_result($stmt);
    $clientRow = mysqli_fetch_assoc($clientResult);

    if ($clientRow) {
        // Query to get medical records
        $medicalQuery = "SELECT  us.u_id, mc.mc_id, mp.mp_id, mh.mh_id, 
                                CONCAT(us.lastname, ' ', us.firstname,' ', us.middlename) AS client_name, 
                                mc.med_type, mp.ispresent, mp.mp_diagnosis, mp.mp_treatment, 
                                mh.Hyperthension, mh.Diabetes, mh.Cardiovascular_desease, mh.PTB, 
                                mh.Hyperacidity, mh.Allergy, mh.Epilepsy, mh.Asthma, mh.Dysmenorrhea, 
                                mh.liver_Desease  
                         FROM  users us
                         INNER JOIN med_cert AS mc ON us.u_id = mc.u_id
                         INNER JOIN medical_present AS mp ON mc.mp_id = mp.mp_id
                         INNER JOIN medical_history AS mh ON mc.mh_id = mh.mh_id
                         WHERE us.u_id = ? LIMIT 1";

        $stmt = mysqli_prepare($conn, $medicalQuery);
        mysqli_stmt_bind_param($stmt, "i", $consult_id);
        mysqli_stmt_execute($stmt);
        $medicalResult = mysqli_stmt_get_result($stmt);
        $medicalRow = mysqli_fetch_assoc($medicalResult);

        if ($medicalRow) {
            // Merge clientRow and medicalRow arrays to send all data in one response
            $response = array_merge($clientRow, $medicalRow);
            echo json_encode($response);
        } else {
            // Return only the client's name if no medical records are found
            echo json_encode($clientRow);
        }
    } else {
        echo json_encode(["error" => "No data found for client with ID: $consult_id"]);
    }

    mysqli_close($conn);
}

//employee monthly
if (isset($_POST["consult_id2"])) {
    $consult_id = $_POST['consult_id2'];

    // Query to get the client's name
    $clientNameQuery = "SELECT us.u_id, CONCAT(us.firstname,' ', us.middlename,' ' ,us.lastname) AS client_name 
                        FROM users us
                        INNER JOIN employees emp ON us.u_id = emp.u_id
                        WHERE emp.u_id = ? LIMIT 1";

    $stmt = mysqli_prepare($conn, $clientNameQuery);
    mysqli_stmt_bind_param($stmt, "i", $consult_id);
    mysqli_stmt_execute($stmt);
    $clientResult = mysqli_stmt_get_result($stmt);
    $clientRow = mysqli_fetch_assoc($clientResult);

    if ($clientRow) {
        // Query to get medical records
        $medicalQuery = "SELECT  us.u_id, mc.mc_id, mp.mp_id, mh.mh_id, 
                                CONCAT(us.lastname, ' ', us.firstname,' ', us.middlename) AS client_name, 
                                mc.med_type, mp.ispresent, mp.mp_diagnosis, mp.mp_treatment, 
                                mh.Hyperthension, mh.Diabetes, mh.Cardiovascular_desease, mh.PTB, 
                                mh.Hyperacidity, mh.Allergy, mh.Epilepsy, mh.Asthma, mh.Dysmenorrhea, 
                                mh.liver_Desease  
                         FROM  users us
                         INNER JOIN med_cert AS mc ON us.u_id = mc.u_id
                         INNER JOIN medical_present AS mp ON mc.mp_id = mp.mp_id
                         INNER JOIN medical_history AS mh ON mc.mh_id = mh.mh_id
                         WHERE us.u_id = ? LIMIT 1";

        $stmt = mysqli_prepare($conn, $medicalQuery);
        mysqli_stmt_bind_param($stmt, "i", $consult_id);
        mysqli_stmt_execute($stmt);
        $medicalResult = mysqli_stmt_get_result($stmt);
        $medicalRow = mysqli_fetch_assoc($medicalResult);

        if ($medicalRow) {
            // Merge clientRow and medicalRow arrays to send all data in one response
            $response = array_merge($clientRow, $medicalRow);
            echo json_encode($response);
        } else {
            // Return only the client's name if no medical records are found
            echo json_encode($clientRow);
        }
    } else {
        echo json_encode(["error" => "No data found for client with ID: $consult_id"]);
    }

    mysqli_close($conn);
}

//visitor
if (isset($_POST["consult_id3"])) {
    $consult_id = $_POST['consult_id3'];

    // Query to get the client's name
    $clientNameQuery = "SELECT us.u_id, CONCAT(us.firstname,' ', us.middlename,' ' ,us.lastname) AS client_name 
                        FROM users us
                        INNER JOIN visitors vs ON us.u_id = vs.u_id
                        WHERE vs.u_id = ? LIMIT 1";

    $stmt = mysqli_prepare($conn, $clientNameQuery);
    mysqli_stmt_bind_param($stmt, "i", $consult_id);
    mysqli_stmt_execute($stmt);
    $clientResult = mysqli_stmt_get_result($stmt);
    $clientRow = mysqli_fetch_assoc($clientResult);

    if ($clientRow) {
        // Query to get medical records
        $medicalQuery = "SELECT  us.u_id, mc.mc_id, mp.mp_id, mh.mh_id, 
                                CONCAT(us.lastname, ' ', us.firstname,' ', us.middlename) AS client_name, 
                                mc.med_type, mp.ispresent, mp.mp_diagnosis, mp.mp_treatment, 
                                mh.Hyperthension, mh.Diabetes, mh.Cardiovascular_desease, mh.PTB, 
                                mh.Hyperacidity, mh.Allergy, mh.Epilepsy, mh.Asthma, mh.Dysmenorrhea, 
                                mh.liver_Desease  
                         FROM  users us
                         INNER JOIN med_cert AS mc ON us.u_id = mc.u_id
                         INNER JOIN medical_present AS mp ON mc.mp_id = mp.mp_id
                         INNER JOIN medical_history AS mh ON mc.mh_id = mh.mh_id
                         WHERE us.u_id = ? LIMIT 1";

        $stmt = mysqli_prepare($conn, $medicalQuery);
        mysqli_stmt_bind_param($stmt, "i", $consult_id);
        mysqli_stmt_execute($stmt);
        $medicalResult = mysqli_stmt_get_result($stmt);
        $medicalRow = mysqli_fetch_assoc($medicalResult);

        if ($medicalRow) {
            // Merge clientRow and medicalRow arrays to send all data in one response
            $response = array_merge($clientRow, $medicalRow);
            echo json_encode($response);
        } else {
            // Return only the client's name if no medical records are found
            echo json_encode($clientRow);
        }
    } else {
        echo json_encode(["error" => "No data found for client with ID: $consult_id"]);
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


    // Update consultations table
    $updateQuery = "UPDATE consultations SET chief_complaints = '$complaints', recommendation = '$recommendation', med_desc = '$med_desc' WHERE ct_id = '$ctId'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if (isset($_POST['consult_update2'])) {
    $ctId = $_POST['ct_id'];
    $complaints = $_POST['complaints'];
    $recommendation = $_POST['recommendation'];
    $med_desc = $_POST['med_desc'];

    // Update consultations table
    $updateQuery = "UPDATE consult_monthly SET chief_complaints = '$complaints', recommendation = '$recommendation', med_desc = '$med_desc' WHERE ctm_id = '$ctId'";
    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        echo 'success';
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


    $query = "INSERT INTO medicine (medicine_name, brand_name, type_id, ml, quantity) VALUES ('$medicine', '$brand', '$medicine_type', '$ml', '$quantity')";
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


    $query = "UPDATE medicine SET medicine_name='$medicine', brand_name='$brand', type_id='$medicine_type', ml='$ml', quantity = '$quantity'  WHERE mdn_id='$mdn_id' ";

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
if (isset($_POST['visitor_update'])) {
    $vID = $_POST['vID'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $sex = $_POST['sex'];
    $contact_no = $_POST['contact_no'];

    // Update the users table
    $query = "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', birthdate='$birthdate', sex='$sex', contact_no='$contact_no' WHERE u_id = (SELECT u_id FROM visitors WHERE v_id = '$vID')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "success";
    } else {
        echo 'error updating visitor table';
    }
}
if (isset($_POST['v_idz'])) {
    $vID = $_POST['v_idz'];

    // Fetch the user ID associated with the employee
    $user_query = "SELECT u.u_id FROM visitors vs
                   INNER JOIN users u ON vs.u_id = u.u_id 
                   WHERE vs.v_id = $vID";
    $result = mysqli_query($conn, $user_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $uID = $row['u_id'];

        $vDel = "DELETE FROM visitors WHERE v_id = $vID";
        if (mysqli_query($conn, $vDel)) {
            $userDel = "DELETE FROM users WHERE u_id = $uID";
            if (mysqli_query($conn, $userDel)) {
                echo "Visitor deleted successfully!";
            } else {
                echo "Error deleting user record: " . mysqli_error($conn);
            }
        } else {
            echo "Error deleting visitor record: " . mysqli_error($conn);
        }
    } else {
        echo "No user found for the provided visitor ID.";
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

if (isset($_POST['employee_update'])) {
    $empID = $_POST['empID'];
    $employee_no = $_POST['employee_no'];
    $dep_id = $_POST['dep_id'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $sex = $_POST['sex'];
    $contact_no = $_POST['contact_no'];

    // Update the users table
    $query = "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', birthdate='$birthdate', sex='$sex', contact_no='$contact_no' WHERE u_id = (SELECT u_id FROM employees WHERE emp_id = '$empID')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Update the students table
        $query = "UPDATE employees SET employee_no = '$employee_no', dp_id='$dep_id' WHERE emp_id='$empID'";
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

if (isset($_POST['emp_idz'])) {
    $empID = $_POST['emp_idz'];

    // Fetch the user ID associated with the employee
    $user_query = "SELECT u.u_id FROM employees emp
                   INNER JOIN users u ON emp.u_id = u.u_id 
                   WHERE emp.emp_id = $empID";
    $result = mysqli_query($conn, $user_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $uID = $row['u_id'];

        $empDel = "DELETE FROM employees WHERE emp_id = $empID";
        if (mysqli_query($conn, $empDel)) {
            $userDel = "DELETE FROM users WHERE u_id = $uID";
            if (mysqli_query($conn, $userDel)) {
                echo "Employee deleted successfully!";
            } else {
                echo "Error deleting user record: " . mysqli_error($conn);
            }
        } else {
            echo "Error deleting employee record: " . mysqli_error($conn);
        }
    } else {
        echo "No user found for the provided employee ID.";
    }
}