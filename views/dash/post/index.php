<?php
require_once "../../../app/config.php";
require_once MAIN_PATH . "views/dash/inc/header.php";

$data = [
    "tables" => ["posts", "categories"],
    "columns" => ["posts.id as p_id", "p_title", "p_content", "p_date", "p_user_id", "name"],
];
if ($_SESSION["user"]["u_role"] == 2) {
    $posts = selectData($data, "where posts.p_category_id = categories.id AND p_user_id = " . $_SESSION["user"]["id"]);
} elseif ($_SESSION["user"]["u_role"] == 1) {
    $posts = selectData($data, "where posts.p_category_id = categories.id");
}




?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center display-1 border-bottom p-3">Posts</h1>
        </div>
        <div class="col-8 mx-auto">
            <?php
            alert_display("success", "success");
            alert_display("erorrs", "danger");
            ?>
                <div class="posts col-12 border p-3 my-3 bg-body-secondary rounded shadow ">
                    <?php if ($posts): ?>
                        <?php foreach ($posts as $post): ?>
                        <div class="post border p-3 border-3 my-4 border-dark-subtle rounded">
                            <div class="post-head border-bottom my-2">
                                <div class="post_title">
                                    <h1>
                                        <?= $post["p_title"] ?>
                                    </h1>
                                </div>
                                <div class="date-category d-flex justify-content-between align-items-center">
                                    <div class="date-cat">
                                        <p class="mb-0"> Date :
                                            <?= $post["p_date"] ?>
                                        </p>
                                        <p class="mb-0"> Category :
                                            <?= $post["name"] ?>
                                        </p>
                                    </div>
                                    <div class="delete-edit-btn">
                                        <a href="<?= URL . "src/posts/delete.php?p_id=" . $post["p_id"] ?>"
                                            class="btn btn-danger">Delete Post</a>
                                        <a href="<?= URL . "views/dash/post/edit.php?p_id=" . $post["p_id"] ?>"
                                            class="btn btn-primary">Edit Post</a>
                                    </div>
                                </div>
                            </div>
                            <div class="post-body">
                                <p>
                                    <?= $post["p_content"] ?>
                                </p>
                            </div>
                            <div class="comments border p-3 bg-light rounded border-bottom">
                                <div class="all-comments ">
                                    <h4>All Comments : </h4>
    
                                    <?php $comments = selectData(["tables" => ["comments"], "columns" => ["*"]], "where c_post_id = " . $post["p_id"]); ?>
                                    <?php if ($comments): ?>
                                        <?php foreach ($comments as $comment): ?>
                                            <div class="comment border-bottom border-top d-flex justify-content-between align-items-center">
                                                <div class="comment-content">
                                                    <p class="my-3">Name :
                                                        <?= $comment['c_name'] ?>
                                                    </p>
                                                    <span>Date :
                                                        <?= $comment['c_date'] ?>
                                                    </span>
                                                    <p class="my-3">
                                                        <?= $comment['c_content'] ?>
                                                    </p>
                                                </div>
                                                <?php if ($_SESSION["user"]["u_role"] == 1): ?>
                                                    <div class="comment-btn">
                                                        <a href="<?= URL . "src/comments/delete.php?c_id=" . $comment["id"] ?>"
                                                            class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                                    </div>
                                                <?php endif ?>
                                            </div>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                    <?php if ($_SESSION["user"]["u_role"] == 1): ?>
                                        <div class="add-comment">
                                            <form action="<?= URL . "src/comments/add.php" ?>" method="post">
                                                <p>Name :</p>
                                                <input type="text" class="form-control" name="c_name">
                                                <p class="mt-3">Add Comment :</p>
                                                <input type="text" class="form-control" name="c_content">
                                                <input type="hidden" class="form-control" name="p_id" value="<?= $post["p_id"] ?>">
                                                <button class="btn btn-primary mt-3">Submit</button>
                                            </form>
                                        </div>
                                    <?php endif ?>
                                </div>
                                <div class="comments">
    
                                </div>
    
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php else: ?>
                <h3 class="text-center mt-5 display-1">No Post Found</h3>
            <?php endif ?>

        </div>
    </div>