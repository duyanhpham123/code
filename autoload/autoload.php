<?php
session_start();
require_once  __DIR__."/../libraries/Database.php";
require_once __DIR__."/../libraries/Function.php";
$db = new Database;

define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/storemotor/public/uploads/");

$sql = "SELECT * FROM category_product WHERE status = 1 AND home = 1";
$category_product = $db->fetchsql($sql);


$sql = "SELECT * FROM category_post WHERE status = 1 AND home = 1";
$category_post = $db->fetchsql($sql);

$sql = "SELECT * FROM category_product WHERE status = 1";
$category_product = $db->fetchsql($sql);
/*
 * Lấy danh sách sản phẩm mới
 * */
$sqlNew = "SELECT * FROM product WHERE home = 1 ORDER BY ID DESC LIMIT 5";
$productNew = $db->fetchsql($sqlNew);


/*
 * Lấy danh sách bài viết mới
 * */
$sqlNew = "SELECT * FROM post WHERE home = 1 ORDER BY ID DESC LIMIT 6";
$postNew = $db->fetchsql($sqlNew);


/*
 * Lấy danh sách sản phẩm bán chạy
 * */
$sqlPay = "SELECT * FROM product WHERE 1 ORDER BY PAY DESC LIMIT 8";
$productPay = $db->fetchsql($sqlPay);

?>