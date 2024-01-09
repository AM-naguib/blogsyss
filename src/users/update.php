<?php
require_once "../../app/config.php";
admin_view();
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $erorrs = [];
    foreach ($_POST as $key => $value) {
        $$key = sanitaiz($value);
    }
    if(!if_exists("users","where id = '$id'")){
        $erorrs[] = "User not found";
    }
    if (required_input($name)) {
        $erorrs[] = "Name is required";
    } elseif (min_length($name, 3)) {
        $erorrs[] = "Name must be at least 3 characters";
    } elseif (max_length($name, 20)) {
        $erorrs[] = "Name must be at most 20 characters";
    }

    if (required_input($username)) {
        $erorrs[] = "Username is required";
    } elseif (min_length($username, 3)) {
        $erorrs[] = "Username must be at least 3 characters";
    } elseif (max_length($username, 20)) {
        $erorrs[] = "Username must be at most 20 characters";
    }

    if (required_input($password)) {
        $erorrs[] = "Password is required";
    } elseif (min_length($password, 3)) {
        $erorrs[] = "Password must be at least 3 characters";
    } elseif (max_length($password, 20)) {
        $erorrs[] = "Password must be at most 20 characters";
    }


    if (empty($erorrs)) {
        $data = [
            "u_name" => $name,
            "u_username" => $username,
            "u_password" => $password,
            "u_role" => $role, // 1 = admin, 2 = writer
        ];
        if(dbUpdate("users", "u_name = '$name',u_username = '$username',u_password = '$password',u_role = $role","id = '$id'" )){
            $_SESSION["success"] = ["User Updated"];
        }else{
            $_SESSION["erorrs"] = ["User Not Updated"];
        }
    }else{
        $_SESSION["erorrs"] = $erorrs;
    }
    header("location:" . URL . "views/dash/user");

}