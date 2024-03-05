<?php
$open = "post";
require_once __DIR__."/../../autoload/autoload.php";

$id = intval(getInput('id'));
//_debug($id);

$Editpost = $db->fetchID("post", $id);
if(empty($Editpost))
{
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("post");
}
$num = $db->delete("post", $id);
if ($num > 0)
{
    $_SESSION['success'] = "Xóa thành công";
    redirectAdmin("post");
}
else
{
    $_SESSION['error'] = "Xóa thất bại";
    redirectAdmin("post");
}
?>
