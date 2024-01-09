<?php
require_once "../../app/config.php";
admin_view();
if($_SERVER["REQUEST_METHOD"] == "GET") {
    $erorrs = [];
    $category = sanitaiz($_GET["cat_id"]);
    if(!check_find_cat($category)){
        $erorrs[] = "category not found";
    }

    if(empty($erorrs)){
        if(delete_cat($category)){
            $_SESSION["success"] = ["Category deleted successfully"];
        }else{
            $_SESSION["errors"] = ["Something went wrong"];
        }
    }else{
        $_SESSION["errors"] = $erorrs;
    }
    header("location: ". URL . "views/dash/categories/index.php");

}