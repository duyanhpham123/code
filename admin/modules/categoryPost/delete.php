<?php
$open = "categoryPost";
require_once __DIR__."/../../autoload/autoload.php";

$id = intval(getInput('id'));
//_debug($id);

$EditCategory = $db->fetchID("category_post", $id);
if(empty($EditCategory))
{
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("categoryPost");
}

/*
 * Kiểm tra xem danh mục có sản phẩm
 * */

$is_post = $db->fetchOne("post", " category_id = $id ");
//_debug($is_post);die;
if ($is_post == NULL)
{
    $num = $db->delete("category_post", $id);
    if ($num > 0)
    {
        $_SESSION['success'] = "Xóa thành công";
        redirectAdmin("categoryPost");
    }
    else
    {
        $_SESSION['error'] = "Xóa thất bại";
        redirectAdmin("categoryPost");
    }
}
else
{
    $_SESSION['error'] = "Danh mục có bài viết ! Bạn không thể xóa";
    redirectAdmin("categoryProduct");
}


?>
