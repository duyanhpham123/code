<?php
$open = "comment";
require_once __DIR__."/../../autoload/autoload.php";

$id = intval(getInput('id'));
//_debug($id);

$DeleteAdmin = $db->fetchID("comment", $id);
if(empty($DeleteAdmin))
{
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("comment");
}
$num = $db->delete("comment", $id);
if ($num > 0)
{
    $_SESSION['success'] = "Xóa thành công";
    redirectAdmin("comment");
}
else
{
    $_SESSION['error'] = "Xóa thất bại";
    redirectAdmin("comment");
}
?>
