<?php
require_once __DIR__."/autoload/autoload.php";

$category = $db->fetchAll("category_product");
//var_dump($category);
?>
<?php require_once __DIR__."/layouts/header.php"; ?>
<!--Nội dụng-->
<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Tổng quan website</li>
    </ol>
    <!-- End.Breadcrumbs-->

    <!-- Icon Cards-->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <?php
                    $sql = "SELECT * FROM product";
                    $total = count($db->fetchsql($sql));
                ?>
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-motorcycle"></i>
                    </div>
                    <div class="mr-5"><?php  echo $total; ?> Sản phẩm</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url() ?>admin/modules/product/">
                    <span class="float-left">Chi tiết</span>
                    <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
                <?php
                $sql = "SELECT * FROM post";
                $totalNew = count($db->fetchsql($sql));

                ?>
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-list"></i>
                    </div>
                    <div class="mr-5"><?php echo $totalNew; ?> Bài viết</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url() ?>admin/modules/post/">
                    <span class="float-left">Chi tiết</span>
                    <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <?php
                $sql = "SELECT * FROM transaction";
                $totalOrder = count($db->fetchsql($sql));

                ?>
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-shopping-cart"></i>
                    </div>
                    <div class="mr-5"><?php echo $totalOrder; ?> Đơn hàng</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url() ?>admin/modules/transaction/">
                    <span class="float-left">Chi tiết</span>
                    <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <?php
                $sql = "SELECT * FROM users";
                $totalUser = count($db->fetchsql($sql));

                ?>
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-life-ring"></i>
                    </div>
                    <div class="mr-5"><?php echo $totalUser; ?> Tài khoản khách hàng</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url() ?>admin/modules/user/">
                    <span class="float-left">Chi tiết</span>
                    <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
                </a>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-secondary o-hidden h-100">
                <?php
                $sql = "SELECT * FROM comment";
                $totalComment = count($db->fetchsql($sql));
                ?>
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-comments"></i>
                    </div>
                    <div class="mr-5"><?php  echo $totalComment; ?> Bình luận</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url() ?>admin/modules/comment/">
                    <span class="float-left">Chi tiết</span>
                    <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
                </a>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <?php
                $sql = "SELECT * FROM contact";
                $totalContact = count($db->fetchsql($sql));
                ?>
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-address-book"></i>
                    </div>
                    <div class="mr-5"><?php  echo $totalContact; ?> Liên hệ</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url() ?>admin/modules/contact/">
                    <span class="float-left">Chi tiết</span>
                    <span class="float-right">
          <i class="fas fa-angle-right"></i>
        </span>
                </a>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
<?php require_once __DIR__."/layouts/footer.php"; ?>

