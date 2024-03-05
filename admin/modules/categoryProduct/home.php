<?php
$open = "categoryProduct";
require_once __DIR__."/../../autoload/autoload.php";

$id = intval(getInput('id'));

$EditCategory = $db->fetchID("category_product", $id);
//_debug($EditCategory);die;
if(empty($EditCategory))
{
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("categoryProduct");
}


$home = $EditCategory['home'] == 0 ? 1 : 0;

$update = $db->update("category_product", array("home" => $home), array("id" => $id));

if($update > 0)
{
    $_SESSION['success'] = "Cập nhật thành công";
    redirectAdmin("categoryProduct");
}
else
{
    $_SESSION['error'] = "Dữ liệu không thay đổi";
    redirectAdmin("categoryProduct");
}

?>