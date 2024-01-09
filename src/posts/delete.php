<?php
require_once "../../app/config.php";

checkUserRole();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $p_id = sanitaiz($_GET['p_id']);
    $erorrs = [];


    if ($_SESSION["user"]["u_role"] == 1) {
        if (!if_exists('posts', "where id = '$p_id'")) {
            $erorrs[] = "Post not found";
        }
    } else {
        if (!if_exists('posts', "where id = '$p_id' and p_user_id = " . $_SESSION["user"]["id"])) {
            $erorrs[] = "Post not found";
        }
    }
    if (empty($erorrs)) {
        $sql = "DELETE FROM comments WHERE c_post_id = '$p_id'";
        $result = mysqli_query($conn, $sql);
        if ($result && deleteItem('posts', $p_id)) {
            $_SESSION['success'] = ["post deleted successfully"];
        } else {
            $_SESSION['erorrs'] = ["Something went wrong" . mysqli_error($conn)];
        }
    } else {
        $_SESSION['erorrs'] = $erorrs;
    }
    header("location:" . URL . "views/dash/post/");
}

?>