<?php
require_once __DIR__."/autoload/autoload.php";

$id = intval(getInput('id'));

// Chi tiết tin tức

$detail_post = $db->fetchID('post', $id);


// Lấy danh mục sản phẩm
$cateId = intval($detail_post['category_id']);
//_debug($cateId);
$sql = "SELECT * FROM post WHERE category_id = $cateId ORDER BY ID DESC LIMIT 4";
$tintuccungloai = $db->fetchsql($sql);
//_debug($tintuccungloai);
?>

<?php require_once __DIR__."/layouts/header.php"; ?>
<div class="col-md-9 bor">

    <section class="box-main1">
        <div class="post-detail">
            <div class="post-detail-top">
                <h1 class="text-center post-detail-title">
                    <?php echo $detail_post['name'] ?>
                </h1>
            </div>
            <div class="post-detail-avata">
                <img src="<?php echo uploads() ?>post/<?php echo $detail_post['thumbar'] ?>" alt="" />
            </div>
            <div class="post-detail-content">
                <?php echo  $detail_post['content'] ?>
            </div>

        </div>

        <div class="comment-fb-post">
            <div class="fb-comments" data-href="https://www.facebook.com/profile.php?id=100008472666189" data-width="100%" data-numposts="5"></div>
        </div>

        <div class="post-type">
            <div class="page-news">
                <div class="product-title">
                    <h2>
                        <a href="#">
                            Tin tức cùng loại
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
                        <?php foreach ($tintuccungloai as $item) : ?>
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
                                            <a href="">Xem thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nội dung -->
    </section>
</div>
<?php require_once __DIR__."/layouts/footer.php"; ?>


