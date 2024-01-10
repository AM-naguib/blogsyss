<?php require_once "../../app/config.php";
require_once URL . "views/front/inc/header.php";
$cat_id = $_GET["cid"];
$posts = selectData(["tables" => ["users", "posts", "categories"], "columns" => ["posts.id as pid", "p_title", "p_content", "p_date", "u_name", "name","p_category_id"]], " where users.id = posts.p_user_id and posts.p_category_id =categories.id and categories.id = $cat_id AND p_approve = 1");

?>
<header class="masthead" style="background-image: url('<?= URL ?>public/assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1><?= $posts[0]["name"]?></h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <?php foreach ($posts as $post): ?>
                <!-- Post preview-->
                <div class="post-preview">
                    <a href="post.php?pid=<?= $post["pid"] ?>">
                        <h2 class="post-title">
                            <?= $post["p_title"] ?>
                        </h2>
                        <h3 class="post-subtitle">
                            <?= $post["p_content"] ?>
                        </h3>
                    </a>
                    <p class="post-meta">
                    Posted by
                    <a href="<?= URL . "views/front/category.php?cid=" . $post["p_category_id"] ?>"><?= $post["name"] ?></a>
                    <?= $post["p_date"] ?>
                </p>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
            <?php endforeach ?>
            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts
                    →</a></div>
        </div>
    </div>
</div>
<?php require_once URL . "views/front/inc/footer.php"; ?>