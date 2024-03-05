<?php
$open = "contact";
require_once __DIR__."/../../autoload/autoload.php";

$id = intval(getInput('id'));

$view_contact = $db->fetchID('contact', $id);
if(empty($view_contact))
{
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("contact");
}
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data =
        [
            "name" => postInput('name'),
            "email" => postInput('email'),
            "address" => postInput('address'),
            "phone" => postInput('phone'),
            "content" => postInput('content'),
            "created_at" => postInput('created_at')
        ];
}
//_debug($view_user);



?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>


    <!--Nội dụng-->
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active">User</li>
            <li class="breadcrumb-item active">Thông tin khách hàng</li>
        </ol>
        <!-- End.Breadcrumbs-->
        <div class="admin-title-top">
            <h1>Thông tin khách hàng</h1>
        </div>
        <div class="button-custom">
            <a class="btn-add" href="index.php"><i class="fa fa-angle-double-left"></i> Trở về</a>
        </div>
        <div class="clearfix"></div>
        <div class="info-user">
            <ul>
                <li>
                    <i class="fa fa-user"></i> Họ tên: <span><?php echo $view_contact['name'] ?></span>
                </li>
                <li>
                    <i class="fa fa-envelope"></i> Email: <span><?php echo $view_contact['email'] ?></span>
                </li>
                <li>
                    <i class="fa fa-address-card"></i> Địa chỉ: <span><?php echo $view_contact['address'] ?></span>
                </li>
                <li>
                    <i class="fa fa-phone"></i> Số điện thoại: <span><?php echo $view_contact['phone'] ?></span>
                </li>
                <li>
                    <i class="fa fa-calendar"></i> Ngày liên hệ: <span><?php echo $view_contact['created_at'] ?></span>
                </li>
                <li>
                    <i class="fa fa-calendar"></i> Nội dung: <span><?php echo $view_contact['content'] ?></span>
                </li>
            </ul>

        </div>

        <div class="sent-email pull-left">
            <a class="btn btn-danger" href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" style="margin: 30px 0px; float: right;">Gửi Email Liên Hệ</a>
        </div>
    </div>
    <!--End.container-fluid-->


<?php require_once __DIR__."/../../layouts/footer.php"; ?>