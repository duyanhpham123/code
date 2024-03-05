<?php
require_once __DIR__."/autoload/autoload.php";
$id = intval(getInput('id'));
$EditCategory = $db->fetchID("category_product", $id);
$EditCategoryProduct = $db->fetchID("product", $id);


// Nếu người dùng submit form thì thực hiện
if (isset($_REQUEST['btnsearch']))
{
    // Gán hàm addslashes để chống sql injection
    $search = addcslashes($_GET['search'], " \t\n\r\0\x0B");
    // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
    if (empty($search)){
        echo "Yêu cầu nhập dữ liệu vào ô trống";
    }
    else
    {
        //Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
        $query = "SELECT * FROM product WHERE name LIKE '%{$search}%'";
        // Thực thi câu truy vấn
        $arr_result = $db->fetchsql($query);

//        _debug($arr_result);
    }
}

?>

<?php require_once __DIR__."/layouts/header.php"; ?>
<div class="col-md-9 bor">

    <section class="box-main1">
        <div class="product-show">
            <div class="product-title">
                <h2>
                    <a href="#">
                        Tìm kiếm sản phẩm
                    </a>
                </h2>
                <div class="title_hr_office">
                    <div class="title_hr_icon">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="product-search showitem">
                <?php foreach($arr_result as $row ):  ?>

                    <div class="col-md-3 col-xs-12 item-product">
                        <div class="item-product-custom border bor">
                            <a href="product-detail.php?id=<?php echo $row['id'] ?>">
                                <img src="<?php echo uploads() ?>/product/<?php echo $row['thumbar'] ?>" class="" width="100%" height="180">
                            </a>
                            <div class="info-item">
                                <h1 class="info-product-item">
                                    <a href="product-detail.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a>
                                </h1>

                                <?php if ($row['sale'] > 0): ?>
                                    <p><strike class="sale"><?php echo formatPrice($row['price']) ?></strike>
                                        <br>
                                        <b class="price"><?php echo formatpricesale($row['price'],$row['sale']) ?></b></p>
                                <?php else: ?>
                                    <p><b style="color: #ea3a3c;"><?php echo formatPrice($row['price']) ?></b></p>
                                <?php endif;  ?>

                            </div>
                            <div class="hidenitem">
                                <p><a href="product-detail.php?id=<?php echo $row['id'] ?>"><i class="fa fa-search"></i></a></p>
                                <p><a href=""><i class="fa fa-heart"></i></a></p>
                                <p><a href="addcart.php?id=<?php echo $row['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>


        <!-- Nội dung -->
    </section>
</div>
<?php require_once __DIR__."/layouts/footer.php"; ?>


