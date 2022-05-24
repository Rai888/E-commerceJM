<?php
include("connection.php");
session_start();

$idCarrello=$_SESSION["idcarrello"];
$prezzo = $_GET["somma"];

$stmt = $conn->prepare("INSERT INTO ordini (prezzo, idCarrello)
                        VALUES (?,?)");
$stmt->bind_param("di", $prezzo, $idCarrello);
if ($stmt->execute() == true) {
    
    $sql="SELECT * FROM contiene WHERE idCarrello = '$idCarrello'";
    $result = $conn->query($sql);
    while($row=$result->fetch_assoc()){
        $idArticolo = $row["idArticolo"];
        $sqlq="SELECT quantita FROM contiene WHERE idArticolo = '$idArticolo'";
        $resultq = $conn->query($sqlq);
        if($resultq->num_rows>0){
            while($rowq=$resultq->fetch_assoc()){
                


                $sqlquantita = "SELECT * FROM articoli WHERE id = '$idArticolo'";
                $resultquantita = $conn->query($sqlquantita);
                $rowquantita = $resultquantita->fetch_assoc();
                if($rowquantita["nDisponibili"]>=$rowq['quantita']){
                    $newq=$rowquantita["nDisponibili"]-$rowq['quantita'];
                    $sqlquantita = "UPDATE articoli SET nDisponibili = '$newq' WHERE id='$idArticolo'";
                    $resultquantita = $conn->query($sqlquantita);


            }

        }
    }
    }



    header("location:grazie.php");
    return 0;
} else {
    
    header("location:index.php?msg=Errore");
}
$conn->close();



?>