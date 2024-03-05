<?php
$open = "transaction";
require_once __DIR__."/../../autoload/autoload.php";
require_once __DIR__."/../../PHPMailer-master/mailerController.php";


$id = intval(getInput('id'));
$view_transaction = $db->fetchID('transaction', $id);
$view_user = $db->fetchID('users', $view_transaction['users_id']);
//_debug($view_transaction);

//_debug($view_user);
$orders = $db->fetchsql("SELECT * FROM orders WHERE transaction_id = ".$view_transaction['id']);



if(empty($view_transaction))
{
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("transaction");
}
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $data =
        [
            "user_id" => postInput('user_id'),
            "amount" => postInput('amount'),
            "note" => postInput('note'),
            "created_at" => postInput('created_at')
        ];
}
?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>


    <!--Nội dụng-->
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active">Đơn hàng</li>
            <li class="breadcrumb-item active">Thông tin đơn hàng</li>
        </ol>
        <!-- End.Breadcrumbs-->
        <!--Thông báo lỗi    -->
        <?php require_once __DIR__."/../../../partials/notification.php"; ?>
        <div class="admin-title-top">
            <h1>Thông tin đơn hàng</h1>
        </div>
        <!-- End. admin-title-top   -->


        <div class="infor-user-order">
            <ul>
                <li>
                    <span>Họ tên khách hàng: </span> <strong><?php echo $view_user['name'] ?></strong>
                </li>

                <li>
                    <span>Email: </span> <strong><?php echo $view_user['email'] ?></strong>
                </li>

                <li>
                    <span>Số điện thoại: </span> <strong><?php echo $view_user['phone'] ?></strong>
                </li>

                <li>
                    <span>Địa chỉ: </span> <strong><?php echo $view_user['address'] ?></strong>
                </li>

                <li>
                    <span>Ghi chú: </span> <strong><?php echo $view_transaction['note'] ?></strong>
                </li>

                <li>
                    <span>Ngày tạo: </span> <strong><?php echo $view_transaction['created_at'] ?></strong>
                </li>
            </ul>
        </div>

        <!--End.button-custom    -->
        <div class="clearfix"></div>
        <!--Thông báo lỗi    -->
        <?php require_once __DIR__."/../../../partials/notification.php"; ?>
        <div class="admin-content">
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Đơn hàng</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total_price = 0;
                                foreach ($orders as $key=>$order):
                                    $product = $db->fetchsql("SELECT name FROM product WHERE id = ".$order['product_id']);
                                    $total_price += $order['qty'] * $order['price'];
                                ?>
                                <tr>
                                    <td><?php echo $key+1; ?></td>
                                    <td><?php echo $product[0]['name']; ?></td>
                                    <td><?php echo $order['qty']; ?></td>
                                    <td><?php echo formatPrice($order['price'] * $order['qty']); ?></td>
                                </tr>
                                <?php endforeach; ?>

                                <tr>
                                    <td class="text-right" colspan="3">Tổng tiền:</td>
                                    <td><?php echo formatPrice($total_price); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="sent-email">
                <a class="btn btn-danger" href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" style="margin: 30px 0px; float: right;">Gửi Email Xác Nhận</a>
            </div>
        </div>
        <!--End.admin-content-->
    </div>
    <!--End.container-fluid-->


<?php require_once __DIR__."/../../layouts/footer.php"; ?>