<?php
require_once "../../app/config.php";
admin_view();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $c_name = sanitaiz($_POST["c_name"]);
    $c_content = sanitaiz($_POST["c_content"]);
    $pid = sanitaiz($_POST["p_id"]);
    $c_date = date("Y-m-d H:i:a");
    $erorrs = [];

    if (required_input($c_name)) {
        $erorrs = "Please Enter Your Name";
    } elseif (min_length($c_name, 3)) {
        $erorrs = "Name Must Be At Least 3 Characters";
    } elseif (max_length($c_name, 50)) {
        $erorrs = "Name Must Be At Most 50 Characters";
    }

    if (required_input($c_content)) {
        $erorrs = "Please Enter Your Name";
    } elseif (min_length($c_content, 3)) {
        $erorrs = "Name Must Be At Least 3 Characters";
    } elseif (max_length($c_content, 200)) {
        $erorrs = "Name Must Be At Most 200 Characters";
    }

    if (empty($erorrs)) {
        $data = [
            "c_name" => $c_name,
            "c_content" => $c_content,
            "c_date" => $c_date,
            "c_post_id" => $pid,
        ];
        $result = dbInsert("comments", $data);
        if ($result) {
            $_SESSION["success"] = ["Comment Added"];
        } else {
            $_SESSION["error"] = ["Something Went Wrong"];
        }

    } else {
        $_SESSION["error"] = $erorrs;
    }

    header("location:" .URL . "views/front/post.php?pid=" . $pid);
}