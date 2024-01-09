<?php
require_once "../../app/config.php";

admin_view();
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $u_id = sanitaiz($_GET['u_id']);
    $erorrs = [];
    if(!if_exists('users',"where id = '$u_id'")){
        $erorrs [] = "User not found";
    }
    if(empty($erorrs)){
        $sql = "delete from posts where p_user_id = '$u_id'";
        mysqli_query($conn,$sql);
        if(deleteItem('users',$u_id)){
            $_SESSION['success'] = ["User deleted successfully"];
        }else{
            $_SESSION['erorrs'] = ["Something went wrong" . mysqli_error($conn)];
        }
    }else{
        $_SESSION['erorrs'] = $erorrs;
    }
    header("location:" . URL . "views/dash/user/index.php");
}