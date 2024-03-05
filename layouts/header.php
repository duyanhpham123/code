<?php
/*
 * Lấy ra tất cả các danh mục sản phẩm được active - hiển thị
 * */

$sqlHomecate = "SELECT name, id FROM category_product WHERE  home = 1 ORDER BY updated_at";
//$sqlHomecate = "SELECT * FROM category_product WHERE  home = 1 ORDER BY updated_at";
$CategoryProductHome = $db->fetchsql($sqlHomecate);
//_debug($CategoryProductHome);


?>
<!DOCTYPE html>
<html>
<head>
    <title>Motor Cao Sơn</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/bootstrap.min.css">

    <script  src="<?php echo base_url() ?>public/frontend/js/jquery-3.2.1.min.js"></script>
    <script  src="<?php echo base_url() ?>public/frontend/js/bootstrap.min.js"></script>
    <script  src="<?php echo base_url() ?>public/frontend/js/main.js"></script>
    <!---->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick-theme.css"/>
    <!--slide-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3&appId=387173625269621&autoLogAppEvents=1"></script>

</head>
<body>
<div id="wrapper">
    <!---->
    <!--HEADER-->
    <div id="header">
        <div id="header-top">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-md-6" id="header-text">
                        <a>Motor Cao Sơn</a><b>xin kính chào quý khách !</b>
                    </div>
                    <div class="col-md-6">
                        <nav id="header-nav-top">
                            <ul class="list-inline pull-right" id="headermenu">
                                <!--Kiểm tra điều kiện nếu đăng nhâp tài khoản thì hiện nút thoát hoặc đăng xuất-->

                                <?php if (isset($_SESSION['name_user'])): ?>
                                    <li>
                                        Xin chào: <strong style="color: red;"><?php echo $_SESSION['name_user'] ?></strong>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-user"></i> Tài khoản <i class="fa fa-caret-down"></i></a>
                                        <ul id="header-submenu">
                                            <li><a href="">Thông tin</a></li>
                                            <li><a href="gio-hang.php">Giỏ hàng</a></li>
                                            <li><a href="logout.php">Đăng xuất</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="logout.php"><i class="fa fa-share-square-o"></i> Đăng xuất</a>
                                    </li>
                                <!--Còn ngược lại sẽ hiển thị đăng ký - đăng nhập-->
                                <?php else: ?>
                                    <li>
                                        <a href="dang-nhap.php"><i class="fa fa-unlock"></i> Đăng nhập</a>
                                    </li>
                                    <li>
                                        <a href="dang-ky.php"><i class="fa fa-users"></i> Đăng ký</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row" id="header-main">
                <div class="col-md-5">
                    <form action="search.php" method="GET" class="form-inline" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" id="searchf" name="search" placeholder="Nhập tên sản phẩm tìm kiếm" class="form-control">
                            <button type="submit" name="btnsearch" id="searchbtn" value="Search" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </form>


                </div>
                <div class="col-md-4">
                    <a href="">
                        <img class="logo-img" src="<?php echo uploads() ?>/logo/logo2.png">
                    </a>
                </div>
                <div class="col-md-3" id="header-right">
                    <div class="pull-right">
                        <div class="pull-left">
                            <i class="glyphicon glyphicon-phone-alt"></i>
                        </div>
                        <div class="pull-right">
                            <p id="hotline">HOTLINE</p>
                            <p>0336636255</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END HEADER-->


    <!--MENUNAV-->
    <div id="menunav" class="header-fix">
        <div class="container">
            <nav>
                <ul id="menu-main" class="menu-custom">
                    <li>
                        <a href="<?php echo base_url() ?>">Trang chủ</a>
                    </li>
                    <li>
                        <a href="page-product.php">Sản phẩm</a>
                    </li>
                    <li>
                        <a href="page-post.php">Tin tức</a>
                    </li>
                    <li>
                        <a href="contact.php">Liên hệ</a>
                    </li>
                </ul>
                <!-- end menu main-->

                <!--Shopping-->
                <ul class="pull-right" id="main-shopping">
                    <li>
                        <a href="gio-hang.php"><i class="fa fa-shopping-basket"></i> Giỏ hàng </a>
                    </li>
                </ul>
                <!--end Shopping-->
            </nav>
        </div>
    </div>
    <!--ENDMENUNAV-->

    <div id="maincontent">
        <div class="container">
            <div class="col-md-3  fixside" >
                <div class="box-left box-menu" >
                    <h3 class="box-title"><i class="fa fa-list"></i>  Danh mục sản phẩm</h3>
                    <ul>
                        <?php foreach ($category_product as $item) : ?>
                            <li>
                                <a href="category-product.php?id=<?php echo $item['id'] ?>">
                                    <?php echo $item['name'] ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="box-left box-menu" >
                    <h3 class="box-title"><i class="fa fa-book"></i>  Danh mục tin tức</h3>
                    <ul>
                        <?php foreach ($category_post as $item) : ?>
                            <li>
                                <a href="category-post.php?id=<?php echo $item['id'] ?>">
                                    <?php echo $item['name'] ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="box-left box-menu">
                    <h3 class="box-title"><i class="fa fa-motorcycle"></i>  Sản phẩm mới </h3>
                    <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                    <ul>
                        <?php foreach ($productNew as $item) : ?>
                            <li class="clearfix">
                                <a href="product-detail.php?id=<?php echo $item['id'] ?>">
                                    <img src="<?php echo uploads() ?>product/<?php echo $item['thumbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                    <div class="info pull-right">
                                        <p class="name"><?php echo $item['name'] ?></p >
                                        <?php if ($item['sale'] > 0): ?>
                                            <p><strike class="sale"><?php echo formatPrice($item['price']) ?></strike>
                                                <br>
                                                <b class="price"><?php echo formatpricesale($item['price'],$item['sale']) ?></b></p>
                                        <?php else: ?>
                                            <p><b style="color: #ea3a3c;"><?php echo formatPrice($item['price']) ?></b></p>
                                        <?php endif;  ?>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <!-- </marquee> -->
                </div>
            </div>