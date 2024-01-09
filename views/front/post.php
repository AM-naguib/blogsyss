<?php
require_once "../../app/config.php";
require_once URL . "views/front/inc/header.php";
if (!isset($_GET["pid"])) {
    header("Location: " . URL . "views/front/");
}

$p_id = $_GET["pid"];
$post = selectData(
["tables" => ["users", "posts", "categories"], 
"columns" => ["posts.id as pid", "p_title", "p_content", "p_date", "u_name", "name"]],
"where users.id = posts.p_user_id 
AND posts.p_category_id =categories.id 
AND posts.id = $p_id 
")[0];
$comments = selectData(["tables" => ["posts", "comments"], "columns" => ["c_name", "c_content", "c_date"]], " where posts.id = comments.c_post_id AND posts.id = $p_id ");
views_counter($p_id);

?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('<?= URL ?>public/assets/img/post-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>
                        <?= $post["p_title"] ?>
                    </h1>
                    <span class="meta">
                        Posted by
                        <a href="#!">
                            <?= $post["u_name"] ?>
                        </a>
                        <?= $post["p_date"] ?>
                    </span>
                    <p class="m-0">Post views : <?php echo @post_views($post["pid"]) ? post_views($post["pid"]) : "1000" ?> </p>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>
                    <?= $post["p_content"] ?>
                </p>
            </div>
        </div>
    </div>
</article>
<div class="container">
    <div class="comments-section">
        <?php if($comments): ?> 
        <h3>All Comments</h3>
        <div class="all-comments p-3">
            <?php foreach ($comments as $comment): ?>
                <div class="comment p-3 border my-2">
                    <div class="comment-head border-bottom">
                        <h5>Name : <?= $comment["c_name"] ?></h4>
                            <span><?= $comment["c_date"] ?></span>
                    </div>
                    <div class="comment-body">
                        <p class="m-0"><?= $comment["c_content"] ?></p>
                    </div>
                </div>
            <?php endforeach ?>
            <?php endif ?> 
        </div>

        <div class="add-comment">
            <form action="<?= URL . "src/comments/add.php" ?>" method="post">
                <h3>Add Comment</h3>
                <p>Name :</p>
                <input type="text" class="form-control" name="c_name">
                <p class="mt-3">Add Comment :</p>
                <input type="text" class="form-control" name="c_content">
                <input type="hidden" class="form-control" name="p_id" value="<?= $p_id ?>">
                <button class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>


</div>
</div>

<?php require_once URL . "views/front/inc/footer.php"; ?>