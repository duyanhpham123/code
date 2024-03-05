<?php
require_once __DIR__."/autoload/autoload.php";
$user = $db->fetchID("users",intval($_SESSION['name_id']));
//_debug($user);

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data =
    [
        "amount" => $_SESSION['total'],
        "users_id" => $_SESSION['name_id'],
        "note" => postInput("note")
    ];
    $idtran = $db->insert('transaction', $data);
    if ($idtran > 0)
    {
        foreach ($_SESSION['cart'] as $key => $value)
        {
            $data2 =
            [
                'transaction_id' => $idtran,
                'product_id' => $key,
                'qty' => $value['qty'],
                'qty' => $value['qty'],
                'price' => $value['price']
            ];

            $id_insert = $db->insert('orders', $data2);
        }

//        unset($_SESSION['cart']);
//        unset($_SESSION['total']);
        $_SESSION['success'] = "Lưu thông tin đơn hàng thành công ! Chúng tôi sẽ liên hệ với bạn sớm nhất.";
        header("location: thong-bao.php");
    }
}

?>

<?php require_once __DIR__."/layouts/header.php"; ?>
<div class="col-md-9 bor">

    <section class="box-main1">
        <div class="product-title">
            <h2>
                <a href="#">
                    Thanh toán đơn hàng
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
                    <label for="name">Họ và tên khách hàng</label>
                    <input type="text" readonly="" name="name" class="form-control" id="exampleInputName" placeholder="Nhập họ và tên" value="<?php echo $user['name'] ?>">
                </div>

                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" readonly="" name="email" class="form-control" id="exampleInputEmail" placeholder="Nhập email" value="<?php echo $user['email'] ?>">
                </div>

                <div class="form-group">
                    <label for="name">Số điện thoại</label>
                    <input type="number" readonly="" name="phone" class="form-control" id="exampleInputName" placeholder="Nhập số điện thoại" value="<?php echo $user['phone'] ?>">
                </div>

                <div class="form-group">
                    <label for="name">Địa chỉ</label>
                    <input type="text" readonly="" name="address" class="form-control" id="exampleInputName" placeholder="Nhập địa chỉ" value="<?php echo $user['address'] ?>">
                </div>

                <div class="form-group">
                    <label for="name">Tổng tiền</label>
                    <input type="text" readonly="" name="price" class="form-control" id="exampleInputName" placeholder="" value="<?php echo formatPrice($_SESSION['total']) ?>">
                </div>

                <div class="form-group">
                    <label for="name">Ghi chú</label>
                    <textarea type="text" name="note" class="form-control" id="exampleInputName" placeholder="Ghi chú" value="" rows="4"></textarea>
                    <p class="note-text" style="color: red; font-style: italic; font-weight: bold; margin-top: 10px;">Chú ý: Quý khách vui lòng ghi rõ thời gian đến xem xe, để bên cửa hàng chuẩn bị xe và đón tiếp được chu đáo. Xin chân thành cảm ơn !</p>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Xác nhận</button>
                </div>
            </form>
        </div>

        <!-- Nội dung -->
    </section>
</div>
<?php require_once __DIR__."/layouts/footer.php"; ?>


