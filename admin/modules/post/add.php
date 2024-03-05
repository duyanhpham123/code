<?php
$open = "post";
require_once __DIR__."/../../autoload/autoload.php";

/*
 * Lấy danh sách danh mục tin tức
 */
$category = $db->fetchAll('category_post');


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $data =
        [
            "name" => postInput('name'),
            "slug" => to_slug(postInput("name")),
            "category_id" => postInput('category_id'),
            "short_description" => postInput('short_description'),
            "content" => postInput('content')
        ];

    $error = [];

    if (postInput('name') == ''){
        $error['name'] = "Yêu cầu nhập đầy đủ thông tin";
    }

    if (postInput('category_id') == ''){
        $error['category_id'] = "Yêu cầu nhập đầy đủ thông tin";
    }


    if (postInput('short_description') == ''){
        $error['short_description'] = "Yêu cầu nhập đầy đủ thông tin";
    }

    if (postInput('content') == ''){
        $error['content'] = "Yêu cầu nhập đầy đủ thông tin";
    }

    if ( ! isset($_FILES['thumbar']))
    {
        $error['thumbar'] = "Yêu cầu chọn hình ảnh";
    }


    // error trống có nghĩa là không có lỗi
    if(empty($error))
    {
        $isset = $db->fetchOne("post","name = '".$data['name']."' ");
        if(count($isset) > 0){
            $_SESSION['error'] = "Tên tin tức đã tồn tại";
        }
        else
        {
            if (isset($_FILES['thumbar']))
            {
                $file_name = $_FILES['thumbar']['name'];
                $file_tmp = $_FILES['thumbar']['tmp_name'];
                $file_type = $_FILES['thumbar']['type'];
                $file_erro = $_FILES['thumbar']['error'];

                if ($file_erro == 0){
                    $part = ROOT ."post/";
                    $data['thumbar'] = $file_name;
                }
            }
//        _debug($data);
            $id_insert = $db->insert("post", $data);
            if ($id_insert)
            {
                move_uploaded_file($file_tmp, $part.$file_name);
                $_SESSION['success'] = "Thêm mới thành công";
                redirectAdmin("post");
            }
            else
            {
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
                <a href="index.php">Tin tức</a>
            </li>
            <li class="breadcrumb-item active">Thêm mới tin tức</li>
        </ol>
        <!-- End.Breadcrumbs-->

        <div class="admin-title-top">
            <h1>Thêm mới tin tức</h1>
        </div>
        <!-- End. admin-title-top   -->
        <div class="button-custom">
            <a class="btn-add" href="index.php"><i class="fa fa-angle-double-left"></i> Trở về</a>
        </div>
        <!--Thông báo lỗi-->
        <?php require_once __DIR__."/../../../partials/notification.php"; ?>

        <div class="admin-content">
            <div class="form-add-category form-product">
                <form action="" method="POST" role="form" class="form-horizontal" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-border-left">
                                <div class="form-group">
                                    <label for="exampleInputCategory">Tiêu đề</label>
                                    <input type="text" class="form-control" id="exampleInputCategory" name="name" placeholder="Mời bạn nhập tiêu đề tin tức">
                                    <?php if (isset($error['name'])): ?>
                                        <p class="text-danger">
                                            <?php echo $error['name'] ?>
                                        </p>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputCategory">Mô tả ngắn</label>
                                    <textarea class="form-control" id="textarea-1" name="short_description" rows="4"></textarea>
                                    <?php if (isset($error['short_description'])): ?>
                                        <p class="text-danger">
                                            <?php echo $error['short_description'] ?>
                                        </p>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputCategory">Nội dung</label>
                                    <textarea class="form-control" id="textarea-1" name="content" rows="8"></textarea>
                                    <?php if (isset($error['content'])): ?>
                                        <p class="text-danger">
                                            <?php echo $error['content'] ?>
                                        </p>
                                    <?php endif ?>
                                </div>


                                <button type="submit" class="btn btn-primary">Lưu</button>
                            </div>
                        </div>
                        <!--End.col-md-8-->

                        <div class="col-md-4">
                            <div class="form-border-right">
                                <div class="form-group">
                                    <label for="exampleInputCategory">Danh mục tin tức</label>
                                    <select class="form-control" name="category_id">
                                        <option value="">- Chọn danh mục tin tức -</option>
                                        <?php foreach ($category as $item): ?>
                                            <option value="<?php echo $item['id'] ?>">
                                                <?php echo $item['name'] ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php if (isset($error['category'])): ?>
                                        <p class="text-danger">
                                            <?php echo $error['category'] ?>
                                        </p>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputCategory">Ảnh đại diện</label>
                                    <input type="file" class="form-control" id="exampleInputCategory" name="thumbar">
                                    <?php if (isset($error['thumbar'])): ?>
                                        <p class="text-danger">
                                            <?php echo $error['thumbar'] ?>
                                        </p>
                                    <?php endif ?>
                                </div>


                            </div>
                        </div>
                        <!--End.col-md-4-->
                    </div>

                </form>
            </div>
        </div>
        <!--End.admin-content-->
    </div>
    <!--End.container-fluid-->

<?php require_once __DIR__."/../../layouts/footer.php"; ?>