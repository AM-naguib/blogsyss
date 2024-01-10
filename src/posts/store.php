<?php 
require_once "../../app/config.php";
checkUserRole();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $erorrs = [];
    $date = date("Y-m-d H:i:a");
    foreach($_POST as $key => $value) {
        $$key = sanitaiz($value);
    }
    if(!check_find_cat($category_id)){
        $erorrs [] = "category not found";
    }
    if(required_input($title)){
        $erorrs [] = "title is required";
    }elseif(min_length($title,3)){
        $erorrs [] = "title must be at least 3 characters";
    }elseif(max_length($title,100)){
        $erorrs [] = "title must be at most 100 characters";
    }
    if(required_input($content)){
        $erorrs [] = "content is required";
    }elseif(min_length($content,3)){
        $erorrs [] = "content must be at least 3 characters";
    }elseif(max_length($content,2500)){
        $erorrs [] = "content must be at most 2500 characters";
    }

    if(empty($erorrs)) {
        $data = [
            "p_title" => $title,
            "p_content" => $content,
            "p_category_id" => $category_id,
            "p_user_id" => $_SESSION["user"]["id"],
            "p_date" => $date

        ];
        if(dbInsert("posts", $data)){
            $_SESSION["success"] = ["post created successfully"];
        }else{
            $_SESSION["erorrs"] = ["something went wrong" . mysqli_error($conn) ];
        }
    }else{
        $_SESSION["erorrs"] = $erorrs;
    }
    header("location:" . $_SERVER['HTTP_REFERER']);



}