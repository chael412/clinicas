<?php

include ('../config/dbconfig.php');
session_start(); // Start the session
include ('auth.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CLINICA'S</title>

    <!-- font awesome icons -->
    <link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/all.min.css">
    <!-- font awesome icons (end) -->

    <!-- bootstrap -->
    <!-- <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css"> -->
    <!--end bootstrap download -->

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

    <!-- Print -->
    <link rel="stylesheet" href="../assets/css/bootstrap-print.min.css" media="print">

    <style type="text/css" media="print">
        @media print {

            .noprint,
            .noprint * {
                display: none;
                !important;
            }
        }

        @page {
            size: auto;
            !important;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">