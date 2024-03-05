<?php
require_once __DIR__."/autoload/autoload.php";


$id = intval(getInput('id'));
$EditCategory = $db->fetchID("category_post", $id);
if (isset($_GET['p']))
{
    $p = $_GET['p'];
}
else
{
    $p = 1;
}

$sql = "SELECT * FROM post";

/*
 * Đếm tổng số bản ghi
 * */
$total = count($db->fetchsql($sql));


$post = $db -> fetchJones("post",$sql,$total,$p,8,true);
$sotrang = $post['page'];
unset($post['page']);
//_debug($post);

$path = $_SERVER['SCRIPT_NAME'];
?>

<?php require_once __DIR__."/layouts/header.php"; ?>
<div class="col-md-9 bor">

    <section class="box-main1">
        <div class="page-news">
            <div class="product-title">
                <h2>
                    <a href="#">
                        Tin tức
                    </a>
                </h2>
                <div class="title_hr_office">
                    <div class="title_hr_icon">
                        <i class="fa fa-book" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="post-row">
                <div class="row">
                    <?php foreach ($post as $item) : ?>
                        <div class="col-xs-12 col-md-4">
                            <div class="post-custom">
                                <div class="post-img">
                                    <a href="post-detail.php?id=<?php echo $item['id'] ?>" title="<?php echo $item['name'] ?>">
                                        <img src="<?php echo uploads() ?>post/<?php echo $item['thumbar'] ?>" alt="" />
                                    </a>
                                </div>
                                <div class="post-info">
                                    <h3 class="post-info-title">
                                        <a title="<?php echo $item['name'] ?>" href="post-detail.php?id=<?php echo $item['id'] ?>" ><?php echo $item['name'] ?></a>
                                    </h3>
                                    <div class="post-des post-des-cate"><?php echo $item['short_description'] ?></div>
                                    <div class="readMore">
                                        <a href="post-detail.php?id=<?php echo $item['id'] ?>">Xem thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="pagination-custom">
            <nav class="pagination-nav">
                <ul class="pagination">
                    <?php for ($i=1; $i <= $sotrang; $i++) : ?>
                        <li class="<?php echo isset($_GET['p']) && $_GET['p'] == $i ? 'active' : '' ?>"><a href="<?php echo $path ?>?id=<?php echo $id ?>&&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>
        <!-- Nội dung -->
    </section>
</div>
<?php require_once __DIR__."/layouts/footer.php"; ?>


