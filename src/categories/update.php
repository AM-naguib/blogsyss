<?php 

require_once "../../app/config.php";
admin_view();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $cat_id = sanitaiz($_POST["cat_id"]);
    $cat_name = sanitaiz($_POST["cat_name"]);
    $erorrs = [];
    if(required_input($cat_name)) {
        $erorrs[] = "Category is required";
    }elseif(min_length($cat_name, 3)) {
        $erorrs[] = "Category must be at least 3 characters";
    }elseif(max_length($cat_name, 100)) {
        $erorrs[] = "Category must be less than 100 characters";
    }
    if(!check_find_cat($cat_id)){
        $erorrs[] = "category not found";
    }
    if(empty($erorrs)) {
        $sql = "UPDATE categories SET name = '$cat_name' WHERE id = '$cat_id'";
        $result = mysqli_query($conn, $sql);
        if($result){
            $_SESSION["success"] = ["Category updated successfully"];
        }else{
            $_SESSION["errors"] = ["Something went wrong" . mysqli_error($conn) ];
        }
    }else{
        $_SESSION["errors"] = $erorrs;
    }
    header("location: ". URL . "views/dash/categories/index.php");
}