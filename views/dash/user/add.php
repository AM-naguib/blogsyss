<?php
require_once "../../../app/config.php";
require_once MAIN_PATH . "views/dash/inc/header.php";
admin_view();
?>
<div class="container">
    <div class="row">
        <h1 class="text-center display-1 border-bottom p-3">Add User</h1>
        <div class="col-6 mx-auto">
            <?php
            alert_display("success", "success");
            alert_display("erorrs", "danger");
            ?>
            <form action="<?= URL . "src/users/store.php" ?>" method="post" class="p-3">
                <div class="mb-3">
                    <label for="name" class="form-label">Name : </label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username : </label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password : </label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>