<?php
$open = "post";
require_once __DIR__."/../../autoload/autoload.php";

/*
 * Lấy danh sách danh mục tin tức
 */
$id = intval(getInput('id'));
//_debug($id);

$Editpost = $db->fetchID("post", $id);
if(empty($Editpost))
{
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("post");
}
$home = $Editpost['home'] == 0 ? 1 : 0;

$update = $db->update("post", array("home" => $home), array("id" => $id));

if($update > 0)
{
    $_SESSION['success'] = "Cập nhật thành công";
    redirectAdmin("post");
}
else
{
    $_SESSION['error'] = "Dữ liệu không thay đổi";
    redirectAdmin("post");
}


?>