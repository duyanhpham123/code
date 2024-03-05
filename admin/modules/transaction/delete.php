<?php
$open = "transaction";
require_once __DIR__."/../../autoload/autoload.php";

$id = intval(getInput('id'));
//_debug($id);

$EditTransaction = $db->fetchID("transaction", $id);
if(empty($EditTransaction))
{
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("transaction");
}
$num = $db->delete("transaction", $id);
if ($num > 0)
{
    $_SESSION['success'] = "Xóa thành công";
    redirectAdmin("transaction");
}
else
{
    $_SESSION['error'] = "Xóa thất bại";
    redirectAdmin("transaction");
}
?>
