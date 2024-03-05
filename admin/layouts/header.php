<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Motor Cao Sơn</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url() ?>public/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>public/admin/css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>public/admin/css/style-admin.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>public/admin/vendor/jquery/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lora&display=swap" rel="stylesheet">
</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="<?php echo base_url() ?>admin">Motor Cao Sơn</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->


    <!-- Navbar -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-fw"></i> <?php echo $_SESSION['admin_name'] ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/storemotor/dang-xuat.php">Đăng xuất</a>
            </div>
        </li>
    </ul>

</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url() ?>admin">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>
                    <strong>ADMIN - <?php echo $_SESSION['admin_name'] ?></strong>
                </span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Danh mục</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <ul class="dropdowm-menu-list">
                    <li>
                        <a class="dropdown-item" href="<?php echo modules("categoryProduct") ?>">Sản phẩm</a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="<?php echo modules("categoryPost") ?>">Tin tức</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item <?php echo isset($open) && $open == 'product' ? 'active' : '' ?>">
            <a class="nav-link" href="<?php echo modules("product") ?>">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Sản phẩm</span>
            </a>
        </li>
        <li class="nav-item <?php echo isset($open) && $open == 'post' ? 'active' : '' ?>">
            <a class="nav-link" href="<?php echo modules("post") ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Tin tức</span></a>
        </li>
        <li class="nav-item <?php echo isset($open) && $open == 'admin' ? 'active' : '' ?>">
            <a class="nav-link" href="<?php echo modules("admin") ?>">
                <i class="fa fa-user"></i>
                <span>Admin</span></a>
        </li>

        <li class="nav-item <?php echo isset($open) && $open == 'user' ? 'active' : '' ?>">
            <a class="nav-link" href="<?php echo modules("user") ?>">
                <i class="fa fa-users"></i>
                <span>User</span></a>
        </li>

        <li class="nav-item <?php echo isset($open) && $open == 'transaction' ? 'active' : '' ?>">
            <a class="nav-link" href="<?php echo modules("transaction") ?>">
                <i class="fa fa-university"></i>
                <span>Quản lý đơn hàng</span></a>
        </li>

        <li class="nav-item <?php echo isset($open) && $open == 'comment' ? 'active' : '' ?>">
            <a class="nav-link" href="<?php echo modules("comment") ?>">
                <i class="fa fa-comment"></i>
                <span>Bình luận</span></a>
        </li>

        <li class="nav-item <?php echo isset($open) && $open == 'contact' ? 'active' : '' ?>">
            <a class="nav-link" href="<?php echo modules("contact") ?>">
                <i class="fa fa-address-book"></i>
                <span>Liên hệ</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/storemotor/dang-xuat.php">
                <i class="fas fa-user-circle fa-fw"></i>
                <span>Đăng xuất</span></a>
        </li>
    </ul>
    <div id="content-wrapper">
