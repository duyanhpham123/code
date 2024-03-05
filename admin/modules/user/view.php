<?php
$open = "user";
require_once __DIR__."/../../autoload/autoload.php";

$id = intval(getInput('id'));

$view_user = $db->fetchID('users', $id);
if(empty($view_user))
{
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("user");
}
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data =
        [
            "name" => postInput('name'),
            "email" => postInput('email'),
            "address" => postInput('address'),
            "phone" => postInput('phone'),
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
                    <i class="fa fa-user"></i> Họ tên: <span><?php echo $view_user['name'] ?></span>
                </li>
                <li>
                    <i class="fa fa-envelope"></i> Email: <span><?php echo $view_user['email'] ?></span>
                </li>
                <li>
                    <i class="fa fa-address-card"></i> Địa chỉ: <span><?php echo $view_user['address'] ?></span>
                </li>
                <li>
                    <i class="fa fa-phone"></i> Số điện thoại: <span><?php echo $view_user['phone'] ?></span>
                </li>
                <li>
                    <i class="fa fa-calendar"></i> Ngày đăng ký: <span><?php echo $view_user['created_at'] ?></span>
                </li>
            </ul>

        </div>
    </div>
    <!--End.container-fluid-->


<?php require_once __DIR__."/../../layouts/footer.php"; ?>