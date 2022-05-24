<?php
include("connection.php");
session_start();

$added = $_POST['quantita1'];
$id=$_SESSION["idarticolo"];

$sqlq="SELECT * from articoli where id='$id'";
$resultq=$conn->query($sqlq);
$rowq = $resultq->fetch_assoc();
$newq = $rowq["nDisponibili"]+$added;
$sqlq="UPDATE articoli SET nDisponibili = '$newq' WHERE id='$id'";
$resultq=$conn->query($sqlq);
header("location:visualizzaProdotto.php?articolo=".$id);
?>