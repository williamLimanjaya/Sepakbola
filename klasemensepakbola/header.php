<?php
include 'koneksi.php';
date_default_timezone_set('Asia/Jakarta');
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Klasemen Sepak Bola</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/admin/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="assets/admin/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/admin/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/admin/assets/css/demo.css" />
    <link rel="stylesheet" href="assets/admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/admin/assets/vendor/libs/apex-charts/apex-charts.css" />
    <script src="assets/admin/assets/vendor/js/helpers.js"></script>
    <script src="assets/admin/assets/js/config.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="assets/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="assets/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    <style>
        .form-group {
            margin-bottom: 15px;
        }

        label {
            margin-bottom: 5px;
        }

        th {
            color: white !important;
        }
    </style>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <b class="text-body fw-bolder" style="font-size: 14px !important;">INVENTORY MANAGEMENT</b>
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <li class="menu-item">
                        <a class="menu-link" href="klub.php">
                            <i class="menu-icon fa fa-list"></i>
                            <span>Input Data Klub</span></a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="skor.php">
                            <i class="menu-icon fa fa-book"></i>
                            <span>Input Skor</span></a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="klasemen.php">
                            <i class="menu-icon fa fa-table"></i>
                            <span>Klasemen</span></a>
                    </li>
                </ul>
            </aside>
            <div class="layout-page">
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>
                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center" style="color: #323232;">
                                KLASEMEN SEPAK BOLA
                            </div>
                        </div>
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                            </div>
                        </ul>
                </nav>
                <div class="content-wrapper">