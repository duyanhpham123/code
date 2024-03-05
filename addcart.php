<?php

require_once __DIR__."/autoload/autoload.php";

// Bắt điều kiện nếu đã đăng nhập thành công thì sẽ không được vào trang đăng ký.
if ( !isset($_SESSION['name_id']))
{
    echo "<script>alert('Để mua hàng, yêu cầu quý khách đăng nhập tài khoản.');location.href='index.php'</script>";
}

$id = intval(getInput('id'));
$product = $db->fetchID("product", $id);
//_debug($product);

// Kiểm tra nếu tồn tại giỏ hàng thì cập nhật giỏ hàng.
// Ngược lại thì tạo mới

if ( !isset($_SESSION['cart'][$id]))
{
    //Nếu không tồn tại $_SESSION['cart'][$id] thì tạo mới giỏ hàng

    $_SESSION['cart'][$id]['name'] = $product['name'];
    $_SESSION['cart'][$id]['thumbar'] = $product['thumbar'];
    $_SESSION['cart'][$id]['qty'] = 1;
    $_SESSION['cart'][$id]['price'] = ((100 - $product['sale']) * $product['price']) / 100;
}
else
{
    // Cập nhật lại giỏ hàng

    $_SESSION['cart'][$id]['qty'] += 1;
}

echo "<script>alert('Thêm sản phẩm thành công.');location.href='gio-hang.php'</script>";

?>