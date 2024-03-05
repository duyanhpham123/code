<?php
require_once __DIR__."/autoload/autoload.php";
//if(isset($_GET['id'])) {
//    $id = $_GET['id'];
//    $db = new Database();
//    $detail_product = $db->fetchID('product', $id);
//}
$id = intval(getInput('id'));

// Chi tiết sản phẩm

$detail_product = $db->fetchID('product', $id);


// Lấy danh mục sản phẩm
$cateId = intval($detail_product['category_id']);
//_debug($cateId);
$sql = "SELECT * FROM product WHERE category_id = $cateId ORDER BY ID DESC LIMIT 4";
$sanphamcungloai = $db->fetchsql($sql);
//_debug($sanphamcungloai);


?>

<?php require_once __DIR__."/layouts/header.php"; ?>
<div class="col-md-9 bor">
    <div class="product-detail-page">
        <section class="box-main1" >
            <div class="col-md-6 text-center">
                <img src="<?php echo uploads() ?>/product/<?php echo $detail_product['thumbar'] ?>" class="img-responsive bor" id="imgmain" width="100%" height="370" data-zoom-image="images/16-270x270.png">
            </div>
            <div class="col-md-6 bor" style="margin-top: 20px;padding: 30px;">
                <ul id="right">
                    <li><h3><?php echo $detail_product['name'] ?></h3></li>
                    <li class="short-description"><?php echo $detail_product['short_description'] ?></li>
                    <?php if ($detail_product['sale'] > 0): ?>
                        <li><p style="font-size: 20px;"><strike class="sale"><?php echo formatPrice($detail_product['price']) ?></strike> <b class="price"><?php echo formatpricesale($detail_product['price'],$detail_product['sale']) ?></b></p></li>
                    <?php else: ?>
                        <li><p style="font-size: 20px;"><b style="color: #ea3a3c;"><?php echo formatPrice($detail_product['price']) ?></b></p></li>
                    <?php endif;  ?>
                    <li><a href="addcart.php?id=<?php echo $item['id'] ?>" class="btn btn-default"> <i class="fa fa-shopping-basket"></i>Mua hàng</a></li>
                </ul>
            </div>

        </section>
        <div class="col-md-12" id="tabdetail">
            <div class="row">

                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Thông tin sản phẩm </a></li>
                    <li><a data-toggle="tab" href="#menu1">Bình luận facebook</a></li>
                    <li><a data-toggle="tab" href="#menu2">Bình luận</a></li>
                </ul>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <h3 style="margin-bottom: 20px">Xe: <?php echo $detail_product['name'] ?></h3>
                        <div class="product-detail-content">
                            <?php echo $detail_product['content'] ?>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <div class="fb-comments" data-href="https://www.facebook.com/profile.php?id=100008472666189" data-width="100%" data-numposts="5"></div>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST"){

                            $data =
                                [
                                    "name" => postInput('name'),
                                    "email" => postInput('email'),
                                    "phone" => postInput('phone'),
                                    "product_id" => $detail_product['id'],
                                    "time" => date('Y-m-d H:i:s'),
                                    "message" => postInput('message')
                                ];

                            $error = [];

                            if (postInput('name') == ''){
                                $error['name'] = "Yêu cầu nhập đầy đủ thông tin";
                            }

                            if (postInput('email') == ''){
                                $error['email'] = "Yêu cầu nhập đầy đủ thông tin";
                            }

                            if (postInput('phone') == ''){
                                $error['phone'] = "Yêu cầu nhập đầy đủ thông tin";
                            }

                            if (postInput('message') == ''){
                                $error['message'] = "Yêu cầu nhập đầy đủ thông tin";
                            }

                            // error trống có nghĩa là không có lỗi
                            if(empty($error)){
                                $isset = $db->fetchOne("comment","name = '".$data['name']."' ");
                                $id_insert = $db->insert("comment", $data);

                                if($id_insert > 0)
                                {
                                    $_SESSION['success'] = "Thêm mới thành công";
//                                    redirectAdmin("categoryPost");
                                }
                                else
                                {
                                    // Thêm thất bại
                                    $_SESSION['error'] = "Thêm mới thất bại";
                                }
                            }
                        }
                        ?>
                        <div class="form-comment">
                            <div class="notification-text">
                                <?php if (isset($_SESSION['success'])) :?>
                                    <div class="alert alert-success">
                                        <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!--End.notification-text-->
                            <div class="notification-text">
                                <?php if (isset($_SESSION['error'])) :?>
                                    <div class="alert alert-danger">
                                        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!--End.notification-text-->
                            <!--Kiểm tra điều kiện nếu đăng nhâp tài khoản thì hiện nút thoát hoặc đăng xuất-->

                            <?php if (isset($_SESSION['name_user'])): ?>
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="email">Họ tên:</label>
                                        <input type="text" name="name" class="form-control" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Số điện thoại:</label>
                                        <input type="number" name="phone" class="form-control" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Nội dung bình luận:</label>
                                        <textarea type="text" name="message" class="form-control" rows="4"></textarea>

                                    </div>

                                    <button type="submit" class="btn btn-default">Bình luận</button>
                                </form>
                            <?php else: ?>

                                <p class="" style="font-size: 15px; color: red; font-style: italic; font-weight: bold">Để thực hiện được chức năng bình luận yêu cầu đăng nhập tài khoản vào hệ thống.</p>
                            <?php endif; ?>
                        </div>

                        <div class="comment-customer">
                            <?php
                            $sql = "SELECT * FROM comment WHERE status = 1 AND product_id = ".$detail_product['id']." ORDER BY time DESC";
                            $comment = $db->fetchsql($sql);
                            ?>

                            <?php foreach ($comment as $item): ?>
                               <div class="comment-item">
                                   <p><strong><?php echo $item['name'] ?></strong></p>
                                   <span><?php echo $item['time'] ?></span>
                                   <p class="content-comment"><?php echo $item['message'] ?></p>
                               </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="product-type">
            <div class="product-show">
                <div class="product-title">
                    <h2>
                        <a href="#">
                            Sản phẩm cùng loại
                        </a>
                    </h2>
                    <div class="title_hr_office">
                        <div class="title_hr_icon">
                            <i class="fa fa-motorcycle" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="showitem">
                    <?php foreach ($sanphamcungloai as $item): ?>
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
        </div>
    </div>
</div>
<?php require_once __DIR__."/layouts/footer.php"; ?>


