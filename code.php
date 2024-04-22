<?php
require ('./config/dbconfig.php');
session_start();

if (isset ($_POST['login_btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        if (mysqli_num_rows($query_run) > 0) {
            $_SESSION['username'] = $username;
            echo 'success';
        } else {
            echo 'Invalid credentials';
        }
    } else {
        echo 'error in execute';
    }
}
