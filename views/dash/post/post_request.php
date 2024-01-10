<?php
require_once "../../../app/config.php";
require_once MAIN_PATH . "views/dash/inc/header.php";
$posts = selectData(
    [
        "tables" => ["users", "posts"],
        "columns" => ["posts.id as pid", "p_title", "p_content", "p_date", "u_username"]
    ],
    "where users.id = posts.p_user_id AND posts.p_approve= 0"
);


?>

<div class="container">
    <div class="row">
        <h1 class="text-center display-1 border-bottom">Posts Requests</h1>
        <div class="col-9 mx-auto">
        <?php
            alert_display("success", "success");
            alert_display("erorrs", "danger");
            ?>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>title</th>
                        <th>content</th>
                        <th>created at</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($posts): ?>
                    <?php foreach ($posts as $post) : ?>
                    <tr>
                        <td><?= $post['pid'] ?></td>
                        <td><?= $post['u_username'] ?></td>
                        <td><?= $post['p_title'] ?></td>
                        <td><?= $post['p_content'] ?></td>
                        <td><?= $post['p_date'] ?></td>
                        <td>
                            <a href="<?=  URL ?>src/posts/approve.php?p_id=<?= $post['pid'] ?>"><i class="fa-solid fa-check btn btn-success"></i></a>
                            <a href="<?=  URL ?>src/posts/delete.php?p_id=<?= $post['pid'] ?>"><i class="fa-solid fa-trash btn btn-danger"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No posts found</td>
                    </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>