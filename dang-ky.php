<?php
require_once __DIR__."/autoload/autoload.php";

// Bắt điều kiện nếu đã đăng nhập thành công thì sẽ không được vào trang đăng ký.
if (isset($_SESSION['name_id']))
{
    echo "<script>alert('Bạn đã có tài khoản nên không thể đăng ký thêm tài khoản.');location.href='index.php'</script>";
}

$data =
    [
        "name" => postInput('name'),
        "email" => postInput('email'),
        "password" => postInput('password'),
        "address" => postInput('address'),
        "phone" => postInput('phone')
    ];
$error = [];
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Nếu tồn tại phương thức POST thì tiến hàng validate và đăng ký
    // echo "Đã submit";

    if ($data['name'] == '')
    {
        $error['name'] = "Yêu cầu nhập đầy đủ thông tin.";
    }


    if ($data['email'] == '')
    {
        $error['email'] = "Yêu cầu nhập đầy đủ thông tin.";
    }
    else
    {
        $is_check = $db->fetchOne("users","email = '".$data['email']."' ");
        if ($is_check != NULL)
        {
            $error['email'] = "Địa chỉ email đã tồn tại. Yêu cầu nhập địa chỉ email khác.";
        }
    }


    if ($data['password'] == '')
    {
        $error['password'] = "Yêu cầu nhập đầy đủ thông tin.";
    }
    else
    {
        $data['password'] = MD5(postInput('password'));
    }


    if ($data['address'] == '')
    {
        $error['address'] = "Yêu cầu nhập đầy đủ thông tin.";
    }


    if ($data['phone'] == '')
    {
        $error['phone'] = "Yêu cầu nhập đầy đủ thông tin.";
    }

    // Kiểm tra mảng error
    if (empty($error)) {
        $idinsert = $db->insert('users', $data);
        if ($idinsert > 0) {
            $_SESSION['success'] = "Đăng ký thành công";
            // Nếu đăng ký thành công thì sử dụng câu lệnh header("location: dang-nhap.php");
            // để chuyển sang trang đăng nhập
            header("location: dang-nhap.php");
        } else {
            // Thêm thất bại
            $_SESSION['error'] = "Đăng ký thất bại";
        }
    }
}

?>

<?php require_once __DIR__."/layouts/header.php"; ?>
<div class="col-md-9 bor">

    <section class="box-main1">
        <!--Thông báo lỗi-->
        <?php require_once __DIR__."/partials/notification.php"; ?>
        <div class="register-form">
            <div class="product-title">
                <h2>
                    <a href="#">
                        Đăng ký thành viên
                    </a>
                </h2>
                <div class="title_hr_office">
                    <div class="title_hr_icon">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="form-custom">
                <form action="" method="POST" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="name">Họ và tên</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Nhập họ và tên" value="<?php echo $data['name'] ?>">
                        <?php if (isset($error['name'])): ?>
                            <p class="text-danger" style="margin-top: 5px;">
                                <?php echo $error['name'] ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail" placeholder="Nhập email" value="<?php echo $data['email'] ?>">
                        <?php if (isset($error['email'])): ?>
                            <p class="text-danger" style="margin-top: 5px;">
                                <?php echo $error['email'] ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="name">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" id="exampleInputName" placeholder="Nhập mật khẩu" value="<?php echo $data['password'] ?>">
                        <?php if (isset($error['password'])): ?>
                            <p class="text-danger" style="margin-top: 5px;">
                                <?php echo $error['password'] ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="name">Số điện thoại</label>
                        <input type="number" name="phone" class="form-control" id="exampleInputName" placeholder="Nhập số điện thoại" value="<?php echo $data['phone'] ?>">
                        <?php if (isset($error['phone'])): ?>
                            <p class="text-danger" style="margin-top: 5px;">
                                <?php echo $error['phone'] ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="name">Địa chỉ</label>
                        <input type="text" name="address" class="form-control" id="exampleInputName" placeholder="Nhập địa chỉ" value="<?php echo $data['address'] ?>">
                        <?php if (isset($error['address'])): ?>
                            <p class="text-danger" style="margin-top: 5px;">
                                <?php echo $error['address'] ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Nội dung -->
    </section>
</div>
<?php require_once __DIR__."/layouts/footer.php"; ?>


