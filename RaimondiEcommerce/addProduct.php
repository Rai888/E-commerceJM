<?php
include("connection.php");
$nome = $_GET["nome"];
$marca = $_GET["marca"];
$prezzo = $_GET["prezzo"];
$nDisponibili = $_GET["nDisponibili"];
$immagine = $_GET["immagine"];
$descrizione = $_GET["descrizione"];
$idCategoria = $_GET["categoria"];
$stelle = 0;

//aggiunge prodotto


$stmt = $conn->prepare("INSERT INTO articoli (nome, marca, prezzo, nDisponibili, immagine, descrizione, stelle, idCategoria) 
          VALUES (?, ?, ?, ?, ?, ?, ?, ?)");          
$stmt->bind_param("ssdissii", $nome, $marca, $prezzo, $nDisponibili, $immagine, $descrizione, $stelle, $idCategoria);
if ($stmt->execute() == true) {
    header("location:index.php?msg=Prodotto aggiunto con successo");
    return 0;
  } else {
    header("location:index.php?msg=Errore nell'aggiunta del prodotto");
  }
  $conn->close();
?>