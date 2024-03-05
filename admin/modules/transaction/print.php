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
    <div class="container" id="printableArea" >

        <!-- End.Breadcrumbs-->
        <!--Thông báo lỗi    -->
        <?php require_once __DIR__."/../../../partials/notification.php"; ?>
        <div class="store-top">
            <h3>Cửa hàng xe máy Cao Sơn</h3>
            <p>Phường đồng nguyên - T.X Từ Sơn - Bắc Ninh</p>
        </div>
        <div class="admin-title-top">
            <h1>Phiếu xuất hàng</h1>
        </div>
        <!-- End. admin-title-top   -->

        <div class="store-infor">
            <div class="row">
                <div class="col-md-5">
                    <div class="infor-user-order">
                        <ul>
                            <li>
                                <ul class="item-order">
                                    <li class="order-item-1"><strong>Họ tên khách hàng: </strong></li>
                                    <li class="order-item-2"><?php echo $view_user['name'] ?></li>
                                </ul>
                            </li>

                            <li>
                                <ul class="item-order">
                                    <li class="order-item-1"><strong>Email: </strong></li>
                                    <li class="order-item-2"><?php echo $view_user['email'] ?></li>
                                </ul>
                            </li>

                            <li>
                                <ul class="item-order">
                                    <li class="order-item-1"><strong>Số điện thoại: </strong></li>
                                    <li class="order-item-2"><?php echo $view_user['phone'] ?></li>
                                </ul>
                            </li>

                            <li>
                                <ul class="item-order">
                                    <li class="order-item-1"><strong>Địa chỉ: </strong></li>
                                    <li class="order-item-2"><?php echo $view_user['address'] ?></li>
                                </ul>
                            </li>
                            <li>
                                <ul class="item-order">
                                    <li class="order-item-1"><strong>Ngày đặt hàng: </strong></li>
                                    <li class="order-item-2"><?php echo $view_transaction['created_at'] ?></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="infor-user-order">
                        <ul>
                            <li>
                                <ul class="item-order">
                                    <li class="order-item-1 order-item-3"><strong>Cửa hàng: </strong></li>
                                    <li class="order-item-2">Cửa hàng xe máy Cao  Sơn</li>
                                </ul>
                            </li>

                            <li>
                                <ul class="item-order">
                                    <li class="order-item-1 order-item-3"><strong>Email: </strong></li>
                                    <li class="order-item-2">xemaycaoson@gmail.com</li>
                                </ul>
                            </li>

                            <li>
                                <ul class="item-order">
                                    <li class="order-item-1 order-item-3"><strong>Số điện thoại: </strong></li>
                                    <li class="order-item-2">0336636255</li>
                                </ul>
                            </li>
                            <li>
                                <ul class="item-order">
                                    <li class="order-item-1 order-item-3"><strong>Địa chỉ: </strong></li>
                                    <li class="order-item-2">Phường Đồng Nguyên - T.X Từ Sơn - Tỉnh Bắc Ninh</li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
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
        </div>
        <!--End.admin-content-->
        <div class="order-2">
            <div class="row">
                <div class="col-md-6">
                    <div class="order-2-left">
                        <p>
                            <strong>Phương thức thanh toán</strong>
                        </p>
                        <div class="infor-user-order">
                            <ul>
                                <li>
                                    <ul class="item-order">
                                        <li class="order-item-1 item-order-4"><strong>Tiền mặt: </strong></li>

                                        <li class="order-item-2"><?php echo formatPrice($total_price); ?></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="order-2-right">
                        <div class="infor-user-order">
                            <ul>
                                <li>
                                    <ul class="item-order">
                                        <li class="order-item-1 item-order-4"><strong>Tổng tiền: </strong></li>

                                        <li class="order-item-2"><?php echo formatPrice($total_price); ?></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="item-order">
                                        <li class="order-item-1 item-order-4"><strong>Chiết khấu: </strong></li>

                                        <li class="order-item-2">0</li>
                                    </ul>
                                </li>
                                <li>
                                    <ul class="item-order">
                                        <li class="order-item-1 item-order-4"><strong>Thanh toán: </strong></li>

                                        <li class="order-item-2"><?php echo formatPrice($total_price); ?></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="order-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="order-3-left order-3-custom">
                        <h4>Khách hàng</h4>
                        <i>(Ký, họ tên)</i>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="order-3-between order-3-custom">
                        <h4>Nv bán hàng</h4>
                        <i>(Ký, họ tên)</i>
                        <p>PG Cao Sơn</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="order-3-right order-3-custom">
                        <h4>Thu ngân</h4>
                        <i>(Ký, họ tên)</i>
                        <p>Nguyễn Thi Huyền</p>
                    </div>
                </div>
            </div>
        </div>
        <!--End. order-3-->
        <div class="order-4"></div>
        <div class="order-5">
            <p>
                * Trung tâm bảo hành motor - xe máy chính hãng: Tại Bắc Ninh: ĐC: Cửa hàng motor - xe máy Cao Sơn. Địa chỉ: Phường Đồng Nguyên - T.X Từ Sơn - Bắc Ninh.

            </p>
            <p>
                <i>
                    <strong>Xin Quý khách lưu ý: </strong>
                </i>
            </p>
            <ul class="note-list">
                <li>
                    1. Quý khách vui lòng sử dụng sản phẩm theo đúng hướng dẫn sử dụng đi kèm của nhà sản xuất
                </li>
                <li>
                    2. Quý khách vui lòng mang xe đến trung tâm bảo hành của cửa hàng xe máy Cao Sơn để thay dầu và bảo hành theo thời hạn.
                </li>
            </ul>
            <p>
                <i>
                    <strong>Trân trọng cảm ơn Quý khách! </strong>
                </i>
            </p>
        </div>

    </div>
    <!--End.container-fluid-->

<div class="container">
    <input type="button" onclick="printDiv('printableArea')" value="In hóa đơn" />
</div>
<script>
    // $( document ).ready(function () {
    //     console.log("123")
    //     window.print();
    // });

    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>

<style>
    @import url('https://fonts.googleapis.com/css?family=Lora&display=swap');
    body{
        font-family: 'Lora', serif !important;
        font-size: 13px;
    }
    .navbar-expand{
        display: none;
    }
    .sidebar.navbar-nav{
        display:none;
    }
    .sticky-footer{
        display: none !important;
    }
    .breadcrumb{
        display: none;
    }
    .store-top h3{
        font-size: 14px;
        margin-bottom: 5px;
        text-transform: uppercase;
        font-weight: bold;
    }
    .store-top p{
        font-size: 12px;
    }
    .item-order li{
        display: inline-block;
    }
    li.order-item-1{
        width: 150px;
    }
    .order-item-3{
        width: 110px !important;
    }
    .infor-user-order ul li{
        margin-bottom: 5px !important;
    }
    #wrapper #content-wrapper{
        background: #fff !important;
    }
    .order-2-right{
        margin-top: -30px !important;
        float: right;
    }
    .item-order-4{
        width: 200px !important;
    }
    .order-3-custom{
        text-align: center;
    }
    .order-3-custom h4{
        color: #111;
        font-size: 13px !important;
        font-weight: bold;
        margin-bottom: 0px !important;
    }
    .order-3-custom i{
        font-size: 12px;
    }
    .order-3-custom p{
        margin-top: 80px !important;
        font-size: 14px;
    }
    .order-4{
        width: 500px;
        height: 1px;
        background: #111;
        margin: 15px auto;
        display: table;
    }
    .note-list{
        margin: 0;
        padding: 0;
    }
</style>


<?php require_once __DIR__."/../../layouts/footer.php"; ?>