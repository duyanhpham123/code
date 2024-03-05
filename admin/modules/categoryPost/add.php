<?php
$open = "categoryPost";
require_once __DIR__."/../../autoload/autoload.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $data =
        [
            "name" => postInput('name'),
            "slug" => to_slug(postInput("name"))
        ];

    $error = [];

    if (postInput('name') == ''){
        $error['name'] = "Yêu cầu nhập đầy đủ thông tin";
    }

    // error trống có nghĩa là không có lỗi
    if(empty($error)){
        $isset = $db->fetchOne("category_post","name = '".$data['name']."' ");
        if (count($isset) > 0)
        {
            $_SESSION['error'] = "Tên danh mục đã tồn tại !";
        }
        else
        {
            $id_insert = $db->insert("category_post", $data);
//        print_r($id_insert);
            if($id_insert > 0)
            {
                $_SESSION['success'] = "Thêm mới thành công";
                redirectAdmin("categoryPost");
            }
            else
            {
                // Thêm thất bại
                $_SESSION['error'] = "Thêm mới thất bại";
            }
        }
    }
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
            <li class="breadcrumb-item">
                <a href="index.php">Danh mục</a>
            </li>
            <li class="breadcrumb-item active">Thêm mới danh mục tin tức</li>
        </ol>
        <!-- End.Breadcrumbs-->

        <div class="admin-title-top">
            <h1>Thêm mới danh mục tin tức</h1>
        </div>
        <!-- End. admin-title-top   -->
        <div class="button-custom">
            <a class="btn-add" href="index.php"><i class="fa fa-angle-double-left"></i> Trở về</a>
        </div>
        <!--Thông báo lỗi-->
        <?php require_once __DIR__."/../../../partials/notification.php"; ?>
        <div class="admin-content">
            <div class="form-add-category form-category-product">
                <form action="" method="POST" role="form" class="form-horizontal">
                    <div class="form-group">
                        <label for="exampleInputCategory">Tên danh mục</label>
                        <input type="text" class="form-control" id="exampleInputCategory" name="name" placeholder="Mời bạn nhập tên danh mục">
                        <?php if (isset($error['name'])): ?>
                            <p class="text-danger">
                                <?php echo $error['name'] ?>
                            </p>
                        <?php endif ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>
            </div>
        </div>
        <!--End.admin-content-->
    </div>
    <!--End.container-fluid-->

<?php require_once __DIR__."/../../layouts/footer.php"; ?>