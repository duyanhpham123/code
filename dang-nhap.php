<?php
require_once __DIR__."/autoload/autoload.php";

$data =
    [
        "email" => postInput('email'),
        "password" => postInput('password')
    ];
$error = [];
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if ($data['email'] == '')
    {
        $error['email'] = "Yêu cầu nhập đầy đủ thông tin.";
    }


    if ($data['password'] == '')
    {
        $error['password'] = "Yêu cầu nhập đầy đủ thông tin.";
    }

    if (empty($error))
    {
        $is_check = $db->fetchOne("users","email = '".$data['email']."' AND password = '".MD5($data['password'])."' ");
//        _debug($is_check);

        if ($is_check != NULL)
        {
            // Nếu $is_check khác NULL thì đăng nhập thất bại
            $_SESSION['name_user'] = $is_check['name'];
            $_SESSION['name_id'] = $is_check['id'];
            echo "<script>alert('Đăng nhập thành công');location.href='index.php'</script>";

        }
        else
        {
            // Ngược lại thì đăng nhập thất bại
            $_SESSION['error'] = "Email hoặc mật khẩu không đúng !";
        }
    }
}

?>

<?php require_once __DIR__."/layouts/header.php"; ?>
<div class="col-md-9 bor">

    <section class="box-main1">
        <div class="logIn-form">
            <div class="product-title">
                <h2>
                    <a href="#">
                        Đăng nhập
                    </a>
                </h2>
                <!--Thông báo lỗi-->
                <?php require_once __DIR__."/partials/notification.php"; ?>

                <div class="title_hr_office">
                    <div class="title_hr_icon">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="form-custom">
                <form action="" method="POST" class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="Nhập email">
                        <?php if (isset($error['email'])): ?>
                            <p class="text-danger" style="margin-top: 5px;">
                                <?php echo $error['email'] ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="name">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" id="exampleInputName" placeholder="Nhập mật khẩu">
                        <?php if (isset($error['password'])): ?>
                            <p class="text-danger" style="margin-top: 5px;">
                                <?php echo $error['password'] ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-danger">Đăng nhập </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Nội dung -->
    </section>
</div>
<?php require_once __DIR__."/layouts/footer.php"; ?>


