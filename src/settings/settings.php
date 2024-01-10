<?php
require_once "../../app/config.php";
admin_view();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $key => $value) {
        $$key = sanitaiz($value);
    }
    if (dbUpdate("settings", "site_title = '$site_title',site_description = '$site_description',logo = '$logo',phone = '$phone',email = '$email',fav_icon = '$fav_icon',facebook = '$facebook',twitter = '$twitter',github = '$github',about_title = '$about_title',about_content = '$about_content'", "id = 1")) {
        $_SESSION["success"] = ["Settings updated successfully"];

    } else {
        $_SESSION["errors"] = ["Something went wrong" . mysqli_error($conn)];
    }
    header("location:" . $_SERVER['HTTP_REFERER']);

}
