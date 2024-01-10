<?php
session_start();
define("MAIN_PATH",dirname(dirname(__FILE__)) .DIRECTORY_SEPARATOR);
define("URL", "http://127.0.0.1/my-projects/blog-sys-master/");
require_once MAIN_PATH . "app/db.php";
require_once MAIN_PATH . "app/sanitaiz.php";
require_once MAIN_PATH . "app/validation.php";
require_once MAIN_PATH . "app/helper.php";


