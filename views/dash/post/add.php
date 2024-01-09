<?php
require_once "../../../app/config.php";
require_once MAIN_PATH . "views/dash/inc/header.php";
$categories = get_all("categories");

?>
<div class="container">
    <div class="row">
        <h1 class="text-center mt-5 display-1 border-bottom">ADD POST</h1>
        <div class="col-10 mx-auto">
            <?php
            alert_display("success", "success");
            alert_display("erorrs", "danger");
            ?>
            <form action="<?= URL . "src/posts/store.php" ?>" class="mt-5 " method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" rows="3" name="content"></textarea>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label d-block">Select Category</label>
                    <select name="category_id" id="category" class="form-select">
                        <?php if (!empty($categories)): ?>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category["id"] ?>">
                                    <?= $category["name"] ?>
                                </option>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
</div>