<?php
include("connection.php");
session_start();


//aggiunge commento ad un articolo


$nstelle=$_POST["stelline"];
$commento = $_POST["addANote"];
$idArticolo=$_SESSION["idarticolo"];
$idUtente=$_SESSION["id"];

$sqlstar="SELECT avg(stelle) as media from commenti where idArticolo='$idArticolo'";
$resultstar=$conn->query($sqlstar);
$rowstar = $resultstar->fetch_assoc();
$media = $rowstar["media"];

$sqlstar="UPDATE articoli SET stelle = '$media' WHERE id = '$idArticolo'";
$resultstar = $conn->query($sqlstar);

$stmt = $conn->prepare("INSERT INTO commenti (txt, stelle, idArticolo, idUtente) 
          VALUES (?, ?, ?, ?)");          
$stmt->bind_param("siii", $commento, $nstelle, $idArticolo, $idUtente);
if ($stmt->execute() == true) {
    header("location:visualizzaProdotto.php?articolo=".$idArticolo);
    return 0;
  } else {
    header("location:visualizzaProdotto.php?articolo=".$idArticolo. "&msg=Errore nell'aggiunta del commento");
  }
  $conn->close();

?>