<?php
require_once "../../app/config.php";
require_once URL . "views/front/inc/header.php";
$about_data = selectData(["tables" => ["settings"], "columns" => ["*"]])[0];

?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('<?= URL ?>public/assets/img/about-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1><?= $about_data['about_title'] ?></h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <?= $about_data['about_content'] ?>
            </div>
        </div>
    </div>
</main>
<?php require_once URL . "views/front/inc/footer.php"; ?>