<?php
include("connection.php");

session_start();
$nullo = "null";
$_SESSION["username"]=$nullo;
$_SESSION["profile"]=$nullo;
session_destroy();
header("location:index.php");

$conn->close();
?>