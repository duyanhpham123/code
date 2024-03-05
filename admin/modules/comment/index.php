<?php
$open = "comment";
require_once __DIR__."/../../autoload/autoload.php";

$comment = $db->fetchAll("comment");

$sql = "SELECT comment.* FROM comment ORDER BY ID DESC ";

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
        </ol>
        <!-- End.Breadcrumbs-->
        <div class="admin-title-top">
            <h1>Bình luận sản phẩm</h1>
        </div>
        <div class="clearfix"></div>
        <!--Thông báo lỗi    -->
        <?php require_once __DIR__."/../../../partials/notification.php"; ?>
        <div class="admin-content">
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Bình luận</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Hiển thị</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 1; foreach ($comment as $item): ?>
                                <tr>
                                    <td><?php echo $stt ?></td>
                                    <td><?php echo $item['name'] ?></td>
                                    <td><?php echo $item['phone'] ?></td>
                                    <td><?php echo $item['email'] ?></td>
                                    <td>
                                        <a class="btn <?php echo $item['status'] == 1 ? 'btn-success' : 'btn-danger' ?>" href="home.php?id=<?php echo $item['id'] ?>">
                                            <?php echo $item['status'] == 1 ? 'Hiển thị' : 'Không hiển thị' ?>
                                        </a>
                                    </td>
                                    <td>
                                        <ul class="list-action">
                                            <li class="item-edit">
                                                <a href="view.php?id=<?php echo $item['id'] ?>" title="Xem chi tiết">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </li>
                                            <li class="item-delete">
                                                <a href="delete.php?id=<?php echo $item['id'] ?>" title="Xóa danh mục">
                                                    <i class="fa fa-trash-alt"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <?php $stt++ ; endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted"></div>
            </div>
        </div>
        <!--End.admin-content-->
    </div>
    <!--End.container-fluid-->


<?php require_once __DIR__."/../../layouts/footer.php"; ?>