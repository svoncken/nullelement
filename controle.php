<?php
session_start();
if (isset($_SESSION["usuario"])) {
    require_once("home.php");
} else {
    header("Location: login.php");
}
?>
