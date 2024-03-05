<?php
$open = "comment";
require_once __DIR__."/../../autoload/autoload.php";

$id = intval(getInput('id'));

$view_comment = $db->fetchID('comment', $id);
$view_product = $db->fetchID('product', $view_comment['product_id']);
//_debug($view_product);

if(empty($view_comment))
{
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("comment");
}
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data =
        [
            "product_id" => postInput('product_id'),
            "name" => postInput('name'),
            "email" => postInput('email'),
            "message" => postInput('address'),
            "phone" => postInput('phone'),
            "time" => postInput('time')
        ];
}
//_debug($view_comment);



?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>


    <!--Nội dụng-->
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active">Bình luận</li>
            <li class="breadcrumb-item active">Nội dung bình luận</li>
        </ol>
        <!-- End.Breadcrumbs-->
        <div class="admin-title-top">
            <h1>Nội dung bình luận</h1>
        </div>
        <div class="button-custom">
            <a class="btn-add" href="index.php"><i class="fa fa-angle-double-left"></i> Trở về</a>
        </div>
        <div class="clearfix"></div>
        <div class="info-comment">
            <h4 class="title-product">Tên sản phẩm: <?php echo $view_product['name']?></h4>
            <div class="infor-content-customer">
                <ul class="info-list">
                    <li class="infor-label">Họ tên khách hàng:</li>
                    <li class="infor-cmt-content"><?php echo $view_comment['name'] ?></li>
                </ul>
                <ul class="info-list">
                    <li class="infor-label">Email:</li>
                    <li class="infor-cmt-content"><?php echo $view_comment['email'] ?></li>
                </ul>
                <ul class="info-list">
                    <li class="infor-label">Số điện thoại:</li>
                    <li class="infor-cmt-content"><?php echo $view_comment['phone'] ?></li>
                </ul>
                <ul class="info-list">
                    <li class="infor-label">Thời gian bình luận:</li>
                    <li class="infor-cmt-content"><?php echo $view_comment['time'] ?></li>
                </ul>
                <ul class="info-list">
                    <li class="infor-label">Nội dung bình luận:</li>
                    <li class="infor-cmt-content"><?php echo $view_comment['message'] ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!--End.container-fluid-->


<?php require_once __DIR__."/../../layouts/footer.php"; ?>