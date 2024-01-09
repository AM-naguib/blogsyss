<?php 
require_once "../../../app/config.php";
require_once MAIN_PATH . "views/dash/inc/header.php";
// admin_view();
$data = [
    "tables" => ["settings"],
    "columns" => ["*"]
];
$settings = selectData($data)[0];

?>
<div class="conatainer">
    <div class="row">
        <h1 class="text-center my-5 display-1 border-bottom">Settings</h1>
        <div class="col-6 mx-auto">
            <form action="" method="post">
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
            </form>
        </div>
    </div>
</div>