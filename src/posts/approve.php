<?php
require_once "../../app/config.php";
admin_view();
if($_SERVER["REQUEST_METHOD"] == "GET"){
    $post_id = sanitaiz($_GET["p_id"]);
    $erorrs = [];
    if(!if_exists("posts","where id = '$_GET[p_id]'")){
        $erorrs [] = "post not found";
    }
    if(empty($erorrs)){

        if(dbUpdate("posts","p_approve = 1"," id = '$post_id'")){
            $_SESSION["success"] = ["post approved"];
        }else{
            $_SESSION["erorrs"] = ["something went wrong". mysqli_error($conn) ];
            echo error_log("MySQL Error: " . mysqli_error($conn));
        }
        
        
    }else{
        $_SESSION["erorrs"] = $erorrs;
    }

    header("location:" . $_SERVER['HTTP_REFERER']);


}