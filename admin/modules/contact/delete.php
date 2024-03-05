<?php
$open = "contact";
require_once __DIR__."/../../autoload/autoload.php";

$id = intval(getInput('id'));
//_debug($id);

$DeleteAdmin = $db->fetchID("contact", $id);
if(empty($DeleteAdmin))
{
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("contact");
}
$num = $db->delete("contact", $id);
if ($num > 0)
{
    $_SESSION['success'] = "Xóa thành công";
    redirectAdmin("contact");
}
else
{
    $_SESSION['error'] = "Xóa thất bại";
    redirectAdmin("contact");
}
?>
