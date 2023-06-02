<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="./assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard | FTS </title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo ASSETS_URL . "/img/favicon/favicon.ico"; ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?php echo VENDOR_URL . "/fonts/boxicons.css"; ?>" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo ASSETS_URL . "/vendor/css/core.css"; ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo ASSETS_URL . "/vendor/css/theme-default.css"; ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo ASSETS_URL . "/css/demo.css"; ?>" />
    <link rel="stylesheet" href="<?php echo ASSETS_URL . "/css/custom.css"; ?>" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo ASSETS_URL . "/vendor/libs/perfect-scrollbar/perfect-scrollbar.css"; ?>" />

    <link rel="stylesheet" href="<?php echo ASSETS_URL . "/vendor/libs/apex-charts/apex-charts.css"; ?>" />

    <link rel="stylesheet" href="<?php echo ASSETS_URL . "/vendor/css/pages/page-auth.css"; ?>" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?php echo ASSETS_URL . "/vendor/js/helpers.js"; ?>"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?php echo ASSETS_URL . "/js/config.js"; ?>"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <?php
        session_start();
         
        if (isset($_SESSION['success_login']) != TRUE) {
            header('Location:'.PAGES_URL.'/login.php');
        }
    ?>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">