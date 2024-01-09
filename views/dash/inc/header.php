<?php require_once "../../../app/config.php";
print_r($_SESSION);
// checkUserRole();
 ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if($_SESSION["user"]['u_role'] == '1'): ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="<?= URL . "views/dash/categories/" ?>">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="<?= URL . "views/dash/categories/add.php" ?>">Add Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= URL . "views/dash/user/" ?>">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                        href="<?= URL . "views/dash/user/add.php" ?>">Add User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                        href="<?= URL . "views/dash/settings.php" ?>">Settings</a>
                    </li>
                    <?php endif ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= URL . "views/dash/post/" ?>">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= URL . "views/dash/post/add.php" ?>">Add
                            Post</a>
                    </li>
                </ul>

                    <a href="<?= URL ?>views/dash/logout.php">Logout</a>

            </div>
        </div>
    </nav>