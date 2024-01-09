<?php
require_once "../../../app/config.php";
require_once MAIN_PATH . "views/dash/inc/header.php";

admin_view()

?>

<div class="container">
    <div class="row">
        <h1 class="text-center display-1">All Categories</h1>
        <div class="col-8 mx-auto">
            <?php
            alert_display("success","success");
            alert_display("erorrs","danger");
            ?>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(get_all("categories")): ?>
                    <?php foreach(get_all("categories") as $category): ?>
                    <tr>
                        <td><?= $category["id"] ?></td>
                        <td><?= $category["name"] ?></td>
                        <td>
                            <a href="<?= URL."views/dash/categories/edit.php?cat_id=" . $category["id"]."&cat_name=" .$category["name"]   ?>" class="btn btn-primary">Edit</a>
                            <a href="<?= URL."/src/categories/delete.php?cat_id=" . $category["id"] ?>" class="btn btn-danger">Remove</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif ?>
                </tbody>
                </table>
        </div>
    </div>
</div>
<?php 
require_once MAIN_PATH . "views/dash/inc/footer.php";

?>