<?php
include("connection.php");
session_start();

$id=$_SESSION["idarticolo"];
$quantita = $_POST['quantita2'];
$idcarrello = $_SESSION["idcarrello"];

//aggiunge prodotto al carrello
    

    $sqlquantita = "SELECT * FROM articoli WHERE id = '$id'";
    $resultquantita = $conn->query($sqlquantita);
    $rowquantita = $resultquantita->fetch_assoc();
    if($rowquantita["nDisponibili"]>=$quantita){
        /*$newq=$rowquantita["nDisponibili"]-$quantita;
        $sqlquantita = "UPDATE articoli SET nDisponibili = '$newq' WHERE id='$id'";
        $resultquantita = $conn->query($sqlquantita);*/

        $sqlcontrollo = "SELECT * from contiene where idCarrello = '$idcarrello'";
        $resultcontrollo = $conn->query($sqlcontrollo);
            if($resultcontrollo->num_rows>0){
                $rowcontrollo = $resultcontrollo->fetch_assoc();
                if($id==$rowcontrollo["idArticolo"]){//se il prodotto è già nel carrello semplicemente modifica la quantità
    
                    $newquantita = $quantita + $rowcontrollo["quantita"];
                    $idcontiene = $rowcontrollo["id"];
                    $stmt = "UPDATE contiene SET quantita = '$newquantita' WHERE id = '$idcontiene'";
                    $resultstmt = $conn->query($stmt);
                    header("location:index.php");
                }else{
                    $stmt = $conn->prepare("INSERT INTO contiene (idCarrello, idArticolo, quantita) 
                                            VALUES (?, ?, ?)");          
                    $stmt->bind_param("iii", $idcarrello, $id, $quantita);
                    if ($stmt->execute() == true) {
                        
                        header("location:index.php?msg=Prodotto aggiunto con successo");
                        return 0;
                    } else {
                        
                        header("location:index.php?msg=Errore nell'aggiunta del prodotto");
                    }
                }
            }else{
                $stmt = $conn->prepare("INSERT INTO contiene (idCarrello, idArticolo, quantita) 
                                        VALUES (?, ?, ?)");          
                $stmt->bind_param("iii", $idcarrello, $id, $quantita);
                if ($stmt->execute() == true) {
                    
                    header("location:index.php?msg=Prodotto aggiunto con successo");
                    return 0;
                } else {
                    
                    header("location:index.php?msg=Errore nell'aggiunta del prodotto");
                }
            }
    }
  $conn->close();
?>