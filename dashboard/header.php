<?php
session_start();
  if (!isset($_SESSION['login'])) {
      header("Location: ../index.php");
  }
  $baseName = basename($_SERVER['PHP_SELF'], '.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGW - Dashboard</title>

    <link rel="shortcut icon" href="../assets/img/agw-icon.ico" type="image/x-icon">
    <!-- FONT -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- CSS -->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/all.css">
    <link rel="stylesheet" href="../assets/css/style-dashboard.css">

    <!-- SCRIPT -->
    <script src="../assets/vendor/sweet-alert/sweetalert.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light p-0 fixed-top shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0 bg-blue text-center" href="#">AGW PHONE STORE</a>
        <ul class="navbar-nav ml-auto mr-2">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600">Hai, <?= $_SESSION['username'] ?></span>
                    <i class="fas fa-user"></i>
                </a>

                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow">
                    <a class="dropdown-item disabled" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Detail Profile
                    </a>
                    <a class="dropdown-item disabled" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Ganti Password
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../logout.php">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block sidebar bg-blue">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?= ($baseName=='index') ? 'active' : '' ?>" href="index.php">
                                <i class="fas fa-home"></i>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    </ul>
                    <div class="divider"></div>
                    <h6 class="sidebar-content-header">
                        Penjualan
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link <?= ($baseName=='penjualan') ? 'active' : '' ?>" href="penjualan.php">
                                <i class="fas fa-fw fa-chart-area"></i>
                                <span>Entry Penjualan</span></a>
                        </li>
                    </ul>
                    <div class="divider"></div>
                    <h6 class="sidebar-content-header">
                        Barang
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link <?= ($baseName=='barang') ? 'active' : '' ?>" href="barang.php">
                                <i class="fas fa-fw fa-boxes"></i>
                                <span>Data Barang</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($baseName=='kategori') ? 'active' : '' ?>" href="kategori.php">
                                <i class="fas fa-fw fa-clipboard-list"></i>
                                <span>Data Kategori</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($baseName=='supplier') ? 'active' : '' ?>" href="supplier.php">
                                <i class="fas fa-fw fa-clipboard-list"></i>
                                <span>Data Supplier</span></a>
                        </li>
                    </ul>
                    <div class="divider"></div>
                    <h6 class="sidebar-content-header">
                        User
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link <?= ($baseName=='user') ? 'active' : '' ?>" href="user.php">
                                <i class="fas fa-fw fa-boxes"></i>
                                <span>Data User</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="col-md-9 ml-sm-auto col-lg-10 px-4 content">
                <div class="content-main mb-5">