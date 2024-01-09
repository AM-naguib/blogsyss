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
        <div class="col-8 mx-auto">
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
                    <?php foreach ($posts as $post) : ?>
                    <tr>
                        <td><?= $post['pid'] ?></td>
                        <td><?= $post['u_username'] ?></td>
                        <td><?= $post['p_title'] ?></td>
                        <td><?= $post['p_content'] ?></td>
                        <td><?= $post['p_date'] ?></td>
                        <td>
                            <a href=""></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>