<?php
$open = "contact";
require_once __DIR__."/../../autoload/autoload.php";

/*
 * Lấy danh sách danh mục sản phẩm
 */
$id = intval(getInput('id'));
//_debug($id);

$Editproduct = $db->fetchID("contact", $id);
//_debug($Editproduct);die;
if(empty($Editproduct))
{
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("contact");
}

$home = $Editproduct['home'] == 0 ? 1 : 0;

$update = $db->update("contact", array("home" => $home), array("id" => $id));

if($update > 0)
{
    $_SESSION['success'] = "Cập nhật thành công";
    redirectAdmin("contact");
}
else
{
    $_SESSION['error'] = "Dữ liệu không thay đổi";
    redirectAdmin("contact");
}

?>