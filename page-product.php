<?php
require_once __DIR__."/autoload/autoload.php";

$id = intval(getInput('id'));
$EditCategory = $db->fetchID("category_product", $id);
$EditCategoryProduct = $db->fetchID("product", $id);
if (isset($_GET['p']))
{
    $p = $_GET['p'];
}
else
{
    $p = 1;
}

$sql = "SELECT * FROM product";

/*
 * Đếm tổng số bản ghi
 * */
$total = count($db->fetchsql($sql));


$product = $db -> fetchJones("product",$sql,$total,$p,8,true);
$sotrang = $product['page'];
unset($product['page']);
//_debug($product);

$path = $_SERVER['SCRIPT_NAME'];

?>

<?php require_once __DIR__."/layouts/header.php"; ?>
<div class="col-md-9 bor">

    <section class="box-main1">
        <div class="product-show">
            <div class="product-title">
                <h2>
                    <a href="#">
                        Các loại xe
                    </a>
                </h2>
                <div class="title_hr_office">
                    <div class="title_hr_icon">
                        <i class="fa fa-motorcycle" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="showitem clearfix">
                <?php foreach ($product as $item): ?>
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
        <div class="pagination-custom">
            <nav class="pagination-nav">
                <ul class="pagination">
                    <?php for ($i=1; $i <= $sotrang; $i++) : ?>
                        <li class="<?php echo isset($_GET['p']) && $_GET['p'] == $i ? 'active' : '' ?>"><a href="<?php echo $path ?>?id=<?php echo $id ?>&&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>
    </section>

</div>
<?php require_once __DIR__."/layouts/footer.php"; ?>


