<?php
 require_once "../../app/config.php";
session_destroy();
header("location: " . URL . "views/dash/login.php");