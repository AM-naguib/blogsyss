<?php 
require_once "../../../app/config.php";
require_once MAIN_PATH . "views/dash/inc/header.php";
admin_view();
$data = [
    "tables" => ["settings"],
    "columns" => ["*"]
];
$settings = @selectData($data)[0];

?>
<div class="conatainer">
    <div class="row">
        <h1 class="text-center my-5 display-1 border-bottom">Settings</h1>
        <div class="col-6 mx-auto">
        <?php
            alert_display("success", "success");
            alert_display("erorrs", "danger");
            ?>
            <form action="<?= URL ?>src/settings/settings.php" method="post">
                <?php if($settings): ?>
                <?php foreach ($settings as $key => $value): ?>
                    <?php if ($key == 'id'):
                        continue; endif ?>
                    <div class="mb-3">
                        <label for="<?= $key ?>" class="form-label">
                            <?= $key ?> :
                        </label>
                        <input type="text" class="form-control" id="<?= $key ?>" name="<?= $key ?>" value="<?= $value ?>">
                    </div>
                <?php endforeach ?>
                <button type="submit" class="btn btn-primary form-control my-3">Submit</button>
                <?php else: ?>
                    <h1 class="text-center my-5 display-1 border-bottom">No Settings</h1>
                <?php endif ?>

            </form>
        </div>
    </div>
</div>