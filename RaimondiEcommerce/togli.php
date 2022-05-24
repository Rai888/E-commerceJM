<?php
include("connection.php");
session_start();

$idCarrello=$_SESSION["idcarrello"];
$idArticolo=$_GET["articolo"];

$sql="DELETE FROM contiene WHERE idArticolo = '$idArticolo' AND idCarrello = '$idCarrello'";
$result = $conn->query($sql);
header("location:visualizzaCarrello.php");

?>