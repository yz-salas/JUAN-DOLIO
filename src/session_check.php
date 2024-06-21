<?php
session_start();

//* verificar si un usuario a iniciado session
if (!isset($_SESSION["username"])) {
    header("location: login.php");
    exit();
}
