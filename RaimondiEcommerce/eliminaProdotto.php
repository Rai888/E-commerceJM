<?php
include("connection.php");
session_start();
$id=$_GET["articolo"];
$sqlm="DELETE FROM `articoli` WHERE `id` = $id";
$result = $conn->query($sqlm);
header("location:index.php?msg=cancellazione effettuata");
?>