<?php
function alert_display($key, $class)
{
    if (isset($_SESSION[$key])) {
        foreach ($_SESSION[$key] as $value) {
            echo "<div class='alert alert-$class'>$value</div>";
        }
        unset($_SESSION[$key]);
    }
}

function role_check()
{
    if (!$_SESSION["user"]["u_role"] == 2 && !$_SESSION["user"]["u_role"] == 1) {
        header("location:" . URL . "views/dash/login.php");
        exit();
    }
}


function checkUserRole()
{
    $userRole = $_SESSION["user"]["u_role"];
    $allowedRoles = [1, 2];

    if (!in_array($userRole, $allowedRoles)) {
        header("location:" . URL . "views/dash/login.php");
        exit();
    }
}
function admin_view()
{
    if (!$_SESSION["user"]["u_role"] == 1) {
        header("location:" . URL . "views/dash/login.php");
        die();
    }
}

