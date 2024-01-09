<?php
require_once "../../../app/config.php";
require_once MAIN_PATH . "views/dash/inc/header.php";
admin_view()
?>

<div class="container">
    <div class="row">
        <h1 class="text-center display-1">ADD CATEGORY</h1>
        <div class="col-5 mx-auto">
        <?php
            alert_display("success","success");
            alert_display("erorrs","danger");
            ?>
            <form action="<?= URL."src/categories/store.php" ?>" class="mt-5 border p-5" method="POST">
                <div class="mb-3">
                    <label for="">Add Category</label>
                    <input type="text" name="category" class="form-control">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php 
require_once MAIN_PATH . "views/dash/inc/footer.php";

?>