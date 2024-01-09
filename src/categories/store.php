<?php
require_once "../../app/config.php";
admin_view();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = sanitaiz($_POST["category"]);
    $erorrs = [];
    if(required_input($category)) {
        $erorrs[] = "Category is required";
    }elseif(min_length($category, 3)) {
        $erorrs[] = "Category must be at least 3 characters";
    }elseif(max_length($category, 100)) {
        $erorrs[] = "Category must be less than 100 characters";
    }

    if(empty($erorrs)) {
        if(store_category($category)){
            $_SESSION["success"] = ["Category added successfully"];
        }else{
            $_SESSION["erorrs"] = ["Something went wrong"];
        }
    }else{
        $_SESSION["erorrs"] = $erorrs;
    }
    header("location: ". URL . "views/dash/categories/add.php");
    
}