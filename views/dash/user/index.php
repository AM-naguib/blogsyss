<?php
require_once "../../../app/config.php";
require_once MAIN_PATH . "views/dash/inc/header.php";
admin_view();
$data = [
    "tables" => ["users"],
    "columns" => ["*"],
];
$users = selectData($data,"");


?>

<div class="container">
    <div class="row">
        <h1 class="text-center display-1 p-3 border-bottom">Users</h1>
        <div class="col-8 mx-auto p-3">
            <?php
            alert_display("success", "success");
            alert_display("erorrs", "danger");
            alert_display("erorr", "danger");
            ?>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= $user["id"] ?></td>
                        <td><?= $user["u_name"] ?></td>
                        <td><?= $user["u_username"] ?></td>
                        <td><?php echo $user["u_role"] == "1" ? "Admin" : "Writer" ?></td>
                        <td><?php echo $user["u_status"] == "1" ? "Active" : "Inactive" ?></td>
                        <td>
                            <a href="<?= URL."src/users/delete.php?u_id=".$user["id"]?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                            <a href="<?= URL."views/dash/user/edit.php?u_id=".$user["id"]?>" class="btn btn-primary"><i class="fa-solid fa-pen"></i></a>
                            <!-- not work -->
                            <a href="<?= URL."src/users/status.php?u_id=".$user["id"]?>" class="btn btn-warning"><i class="fa-solid fa-hand"></i></a>
                            <a href="<?= URL."src/users/status.php?u_id=".$user["id"]?>" class="btn btn-success"><i class="fa-solid fa-check"></i></a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>