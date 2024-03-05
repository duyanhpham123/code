<?php
$open = "comment";
require_once __DIR__."/../../autoload/autoload.php";

$id = intval(getInput('id'));

$Editcomment = $db->fetchID("comment", $id);
//_debug($EditCategory);die;
if(empty($Editcomment))
{
    $_SESSION['error'] = "Dữ liệu không tồn tại";
    redirectAdmin("comment");
}


$status = $Editcomment['status'] == 0 ? 1 : 0;

$update = $db->update("comment", array("status" => $status), array("id" => $id));

if($update > 0)
{
    $_SESSION['success'] = "Cập nhật thành công";
    redirectAdmin("comment");
}
else
{
    $_SESSION['error'] = "Dữ liệu không thay đổi";
    redirectAdmin("comment");
}

?>