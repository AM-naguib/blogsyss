<?php
require_once "../../app/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = sanitaiz($_POST["username"]);
    $password = sanitaiz($_POST["password"]);

    $user = selectData(["tables" => ["users"], "columns" => ["*"]], "where u_username = '$username' AND u_password = '$password' ")[0];

    if (!empty($user)) {
        $_SESSION["user"] = $user;
        header("Location: " . URL . "views/dash/user/index.php");
    } else {
        $_SESSION["erorrs"] = ["Invalid username or password"];
        header("Location: " . URL . "views/dash/login.php");
    }
}else{
    header("Location: " . URL . "views/dash/login.php");
}

