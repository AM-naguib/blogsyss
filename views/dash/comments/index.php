<?php
require_once "../../../app/config.php";
require_once MAIN_PATH . "views/dash/inc/header.php";
$comments = selectData(
    [
        "tables" => ["comments"],
        "columns" => ["*"]
    ]
);

?>


<div class="container">
    <div class="row">
        <h1 class="text-center display-1 border-bottom p-3">Comments</h1>
        <div class="col-8 mx-auto">
            <?php
            alert_display("success", "success");
            alert_display("erorrs", "danger");
            ?>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Comment</th>
                        <th>Post Link</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($comments): ?>
                        <?php foreach ($comments as $comment): ?>
                            <tr>
                                <td>
                                    <?= $comment['id'] ?>
                                </td>
                                <td>
                                    <?= $comment['c_name'] ?>
                                </td>
                                <td>
                                    <?= $comment['c_content'] ?>
                                </td>
                                <td><a href="<?= URL ?>views/front/post.php?pid=<?= $comment['c_post_id'] ?>">
                                        View Post
                                    </a></td>
                                <td>
                                    <a href="<?= URL ?>src/comments/delete.php?c_id=<?= $comment['id'] ?>"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else: ?>

                        <tr>
                            <td colspan="5">No comments found</td>
                        </tr>

                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>