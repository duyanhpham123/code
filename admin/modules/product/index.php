<?php
$open = "product";
require_once __DIR__."/../../autoload/autoload.php";

// Lấy tên danh mục sản phẩm

//$sql = "SELECT * FROM product WHERE home = 1 ORDER BY created_at DESC";
//$product = $db->fetchsql($sql);

// Lấy tên danh mục tin tức
$sql = "SELECT * FROM product ORDER BY id DESC";
//$product = $db->fetchAll("product");
$product = $db->fetchsql($sql);

//
//$sql = "SELECT product.*,category_product.name as namecate FROM product
//       LEFT JOIN category_product on category_product.id = $product.category_id";
//$sql = "SELECT product.*,category_product.name as namecate FROM product
//    LEFT JOIN category_product on category.id = product.category_id";
?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>


    <!--Nội dụng-->
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active">Sản phẩm</li>
        </ol>
        <!-- End.Breadcrumbs-->
        <div class="admin-title-top">
            <h1>Sản phẩm</h1>
        </div>
        <!-- End. admin-title-top   -->
        <div class="button-custom">
            <a class="btn-add" href="add.php"><i class="fa fa-plus"></i> Thêm mới</a>
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
                    Sản phẩm</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Slug</th>
                                <th>Home</th>
                                <th>Ảnh</th>
                                <th>Thông tin</th>
                                <th>Ngày tạo</th>
                                <th>Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $stt = 1; foreach ($product as $item): ?>
                                <tr>
                                    <td><?php echo $stt ?></td>
                                    <td><?php echo $item['name'] ?></td>
                                    <td><?php echo $item['slug'] ?></td>
                                    <td>
                                        <a class="btn <?php echo $item['home'] == 1 ? 'btn-success' : 'btn-danger' ?>" href="home.php?id=<?php echo $item['id'] ?>">
                                            <?php echo $item['home'] == 1 ? 'Active' : 'Pause' ?>
                                        </a>
                                    </td>
                                    <td>
                                        <img src="<?php echo uploads() ?>product/<?php echo $item['thumbar'] ?>" width="80px" height="80px" />
                                    </td>
                                    <td>
                                        <ul style="margin: 0; padding: 0;">
                                            <li>Giá: <?php echo formatPrice($item['price']) ?> VNĐ</li>
                                            <li>Số lượng: <?php echo $item['number'] ?> xe</li>
                                        </ul>
                                    </td>

                                    <td><?php echo $item['created_at'] ?></td>
                                    <td>
                                        <ul class="list-action">
                                            <li class="item-edit">
                                                <a href="edit.php?id=<?php echo $item['id'] ?>" title="Chỉnh sửa danh mục">
                                                    <i class="fa fa-edit"></i>
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