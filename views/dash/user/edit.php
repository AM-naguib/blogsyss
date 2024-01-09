<?php

require_once "../../../app/config.php";
require_once MAIN_PATH . "views/dash/inc/header.php";
admin_view();

$data= ["tables" => ["users"], "columns" => ["*"]];
$user = selectData($data, "where id = '$_GET[u_id]'")[0];
if(!$user) {
    $_SESSION["erorr"] = ["User Not Found"];
    header("location: " . URL . "views/dash/user/index.php");
}
?>
<div class="container">
    <div class="row">
        <h1 class="text-center display-1 border-bottom p-3">Edit User</h1>
        <div class="col-6 mx-auto">
            <?php
            alert_display("erorrs", "danger");
            ?>
            <form action="<?= URL . "src/users/update.php" ?>" method="post" class="p-3">
                <div class="mb-3">
                    <label for="name" class="form-label">Name : </label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user["u_name"] ?>">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username : </label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $user["u_username"] ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password : </label>
                    <input type="password" class="form-control" id="password" name="password" value="<?= $user["u_password"] ?>">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role : </label>
                    <select name="role" id="" class="form-select">
                        <option value="2">Writer</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
                <input type="d" class="form-control" id="password" name="id" value="<?= $user["id"] ?>">
                <div class="mb-3">
                    <button class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>