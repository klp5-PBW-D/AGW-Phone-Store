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
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/all.css">
    <link rel="stylesheet" href="../assets/css/style-dashboard.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light p-0 fixed-top shadow-sm">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0 bg-blue text-center" href="#">AGW PHONE STORE</a>
        <ul class="navbar-nav ml-auto mr-2">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600">Hai, demo</span>
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
                            <a class="nav-link active" href="#">
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
                            <a class="nav-link" href="penjualan.php">
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
                            <a class="nav-link" href="barang.php">
                                <i class="fas fa-fw fa-boxes"></i>
                                <span>Data Barang</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="kategori.php">
                                <i class="fas fa-fw fa-clipboard-list"></i>
                                <span>Data Kategori</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="supplier.php">
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
                            <a class="nav-link" href="user.php">
                                <i class="fas fa-fw fa-boxes"></i>
                                <span>Data User</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="col-md-9 ml-sm-auto col-lg-10 px-4 content">
                <div class="content-main">