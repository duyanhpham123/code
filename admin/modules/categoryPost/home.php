<?php
$open = "categoryPost";
require_once __DIR__."/../../autoload/autoload.php";

$id = intval(getInput('id'));

$EditCategory = $db->fetchID("category_post", $id);
//_debug($EditCategory);die;
if(empty($EditCategory))
{
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("categoryPost");
}


$home = $EditCategory['home'] == 0 ? 1 : 0;

$update = $db->update("category_post", array("home" => $home), array("id" => $id));

if($update > 0)
{
    $_SESSION['success'] = "Cập nhật thành công";
    redirectAdmin("categoryPost");
}
else
{
    $_SESSION['error'] = "Dữ liệu không thay đổi";
    redirectAdmin("categoryPost");
}

?>