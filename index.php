<?php
require_once __DIR__."/autoload/autoload.php";
//unset($_SESSION['cart']);

/*
 * Lấy ra tất cả các danh mục sản phẩm được active - hiển thị
 * */
//_debug($_SESSION['name_user']);
$sqlHomecate = "SELECT name, id FROM category_product WHERE  home = 1 ORDER BY updated_at";
//$sqlHomecate = "SELECT * FROM category_product WHERE  home = 1 ORDER BY updated_at";
$CategoryProductHome = $db->fetchsql($sqlHomecate);
//_debug($CategoryProductHome);

/*
 * Lấy ra tất cả các danh mục tin tức được active - hiển thị
 * */
$sqlHomecateNew = "SELECT * FROM category_post WHERE  home = 1 ORDER BY updated_at";
$CategoryPostHome = $db->fetchsql($sqlHomecateNew);

/*
 * Lấy ra tất cả các sản phẩm được active - hiển thị
 * */
$sqlHomeProduct = "SELECT * FROM product WHERE  home = 1 ORDER BY updated_at";
$ProductHome = $db->fetchsql($sqlHomeProduct);

/*
 * Lấy ra tất cả các tin tức được active - hiển thị
 * */
$sqlHomePost = "SELECT * FROM product WHERE  home = 1 ORDER BY updated_at";
$PostHome = $db->fetchsql($sqlHomePost);


$data = [];

foreach ($CategoryProductHome as $item)
{
    $cateId = intval($item['id']);
    $sql = "SELECT * FROM product WHERE category_id = $cateId and home = 1";
    $productHome = $db->fetchsql($sql);
    $data[$item['name']] = $productHome;
}
//_debug($data);

?>

<?php require_once __DIR__."/layouts/header.php"; ?>
<div class="col-md-9 no-padding-left">
    <section id="slide" class="text-center" >
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">

                <div class="item item-img active">
                    <img src="<?php echo uploads() ?>/slider/1a.jpg" alt="Los Angeles" style="width:100%;">
                </div>

                <div class="item item-img">
                    <img src="<?php echo uploads() ?>/slider/1b.jpg" alt="Chicago" style="width:100%;">
                </div>

                <div class="item item-img">
                    <img src="<?php echo uploads() ?>/slider/1c.jpg" alt="New York" style="width:100%;">
                </div>

                <div class="item item-img">
                    <img src="<?php echo uploads() ?>/slider/1d.jpg" alt="New York" style="width:100%;">
                </div>

            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>

    <section class="box-main1">
        <div class="product-show product-hot">
            <div class="product-title">
                <h2>
                    <a href="#">
                        Sản phẩm bán chạy
                    </a>
                </h2>
                <div class="title_hr_office">
                    <div class="title_hr_icon">
                        <i class="fa fa-motorcycle" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="showitem">
                <?php foreach ($productPay as $item): ?>
                    <div class="col-md-3 col-xs-12 item-product">
                        <div class="item-product-custom border bor">
                            <a href="product-detail.php?id=<?php echo $item['id'] ?>">
                                <img src="<?php echo uploads() ?>/product/<?php echo $item['thumbar'] ?>" class="" width="100%" height="180">
                            </a>
                            <div class="info-item">
                                <h1 class="info-product-item">
                                    <a href="product-detail.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                                </h1>
                                <?php if ($item['sale'] > 0): ?>
                                    <p><strike class="sale"><?php echo formatPrice($item['price']) ?></strike>
                                        <br>
                                        <b class="price"><?php echo formatpricesale($item['price'],$item['sale']) ?></b></p>
                                <?php else: ?>
                                    <p><b style="color: #ea3a3c;"><?php echo formatPrice($item['price']) ?></b></p>
                                <?php endif;  ?>
                            </div>
                            <div class="hidenitem">
                                <p><a href="product-detail.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                                <p><a href=""><i class="fa fa-heart"></i></a></p>
                                <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php foreach ($data as $key => $value): ?>
        <div class="product-show">
            <div class="product-title">
                <h2>
                    <a href="#">
                        <?php echo $key ?>
                    </a>
                </h2>
                <div class="title_hr_office">
                    <div class="title_hr_icon">
                        <i class="fa fa-motorcycle" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="showitem">
                <?php foreach ($value as $item): ?>
                    <div class="col-md-3 col-xs-12 item-product">
                        <div class="item-product-custom border bor">
                            <a href="product-detail.php?id=<?php echo $item['id'] ?>">
                                <img src="<?php echo uploads() ?>/product/<?php echo $item['thumbar'] ?>" class="" width="100%" height="180">
                            </a>
                            <div class="info-item">
                                <h1 class="info-product-item">
                                    <a href="product-detail.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                                </h1>
                                <?php if ($item['sale'] > 0): ?>
                                    <p><strike class="sale"><?php echo formatPrice($item['price']) ?></strike>
                                        <br>
                                        <b class="price"><?php echo formatpricesale($item['price'],$item['sale']) ?></b></p>
                                <?php else: ?>
                                    <p><b style="color: #ea3a3c;"><?php echo formatPrice($item['price']) ?></b></p>
                                <?php endif;  ?>
                            </div>
                            <div class="hidenitem">
                                <p><a href="product-detail.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                                <p><a href=""><i class="fa fa-heart"></i></a></p>
                                <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endforeach; ?>

        <div class="banner-motor">
            <div class="bannerBlock imageHover">
                <a href="">
                    <img src="<?php echo base_url() ?>public/frontend/images/glx.png" alt="Kawasaki">
                </a>
            </div>
        </div>

        <div class="page-news">
            <div class="product-title">
                <h2>
                    <a href="#">
                        Tin tức mới
                    </a>
                </h2>
                <div class="title_hr_office">
                    <div class="title_hr_icon">
                        <i class="fa fa-book" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="post-row">
                <div class="row">
                    <?php foreach ($postNew as $item) : ?>
                        <div class="col-xs-12 col-md-4">
                            <div class="post-custom">
                                <div class="post-img">
                                    <a href="post-detail.php?id=<?php echo $item['id'] ?>" title="<?php echo $item['name'] ?>">
                                        <img src="<?php echo uploads() ?>post/<?php echo $item['thumbar'] ?>" alt="" />
                                    </a>
                                </div>
                                <div class="post-info">
                                    <h3 class="post-info-title">
                                        <a href="post-detail.php?id=<?php echo $item['id'] ?>" title="<?php echo $item['name'] ?>" ><?php echo $item['name'] ?></a>
                                    </h3>
                                    <div class="post-des"><?php echo $item['short_description'] ?></div>
                                    <div class="readMore">
                                        <a href="post-detail.php?id=<?php echo $item['id'] ?>">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
<!--  End.page      -->

    </section>
</div>
<?php require_once __DIR__."/layouts/footer.php"; ?>


