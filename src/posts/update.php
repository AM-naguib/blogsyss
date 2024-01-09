<?php
require_once "../../app/config.php";
checkUserRole();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $erorrs = [];
    foreach ($_POST as $key => $value) {
        $$key = sanitaiz($value);
    }
    // if (!if_exists('posts', "where id = '$id' and p_user_id = " . $_SESSION["user"]["id"])) {
    //     $erorrs[] = "Post not found";
    // }

    if ($_SESSION["user"]["u_role"] == 1) {
        if (!if_exists('posts', "where id = '$id'")) {
            $erorrs[] = "Post not found";
        }
    } else {
        if (!if_exists('posts', "where id = '$id' and p_user_id = " . $_SESSION["user"]["id"])) {
            $erorrs[] = "Post not found";
        }
    }

    if (!check_find_cat($category_id)) {
        $erorrs[] = "category not found";
    }

    if (required_input($title)) {
        $erorrs[] = "title is required";
    } elseif (min_length($title, 3)) {
        $erorrs[] = "title must be at least 3 characters";
    } elseif (max_length($title, 100)) {
        $erorrs[] = "title must be at most 100 characters";
    }
    if (required_input($content)) {
        $erorrs[] = "content is required";
    } elseif (min_length($content, 3)) {
        $erorrs[] = "content must be at least 3 characters";
    } elseif (max_length($content, 2500)) {
        $erorrs[] = "content must be at most 2500 characters";
    }

    if (empty($erorrs)) {
        $data = [
            "p_title" => $title,
            "p_content" => $content,
            "p_category_id" => $category_id,
        ];
        if (dbUpdate("posts", "p_title = '$title', p_content = '$content', p_category_id = '$category_id'", "id = $id")) {
            $_SESSION["success"] = ["post edited successfully"];
        } else {
            $_SESSION["erorrs"] = ["something went wrong"];
        }
    } else {
        $_SESSION["erorrs"] = $erorrs;
    }
    // print_r(if_exists('posts', "where id = '$id' and p_user_id = " . $_SESSION["user"]["id"]));
    header("location: " . URL . "views/dash/post/");


}