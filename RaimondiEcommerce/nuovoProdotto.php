<?php include("connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop DefRai</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
</head>
<body>


<form action="addProduct.php" method="get">
<?php if(isset($_GET["msg"])) echo $_GET["msg"]."<br>" ?>

  <h1>Aggiungi Prodotto</h1>
     Nome: <input type="text" name="nome"><br>
     Marca: <input type="text" name="marca"><br>
     Prezzo: <input type="number" step="0.01" name="prezzo"><br>
     Disponibili: <input type="number" name="nDisponibili"><br>
     Immagine: <input type="text" name="immagine"><br>
     Descrizione: <input type="text" name="descrizione"><br>
     
    Categoria: <select name="categoria" id="categoria">
        <!--<option value="volvo">Volvo</option>-->

        <?php
            $tipo;
            $i=0;
            $sql = "SELECT * FROM categorie";
            $result = $conn->query($sql);
            if($result-> num_rows >0){
                
                while($row = $result->fetch_assoc()){
                $i++;
                $tipo = $row["tipo"];
                createCategoria($tipo, $i);
                }
            }

            //$all_categoriesm = mysqli_query($conn, $sql);
                function createCategoria($tipo, $i){
                    echo "<option value='" . $i . "'>" . $tipo . "</option>";
                }

        ?> 
        
    </select><br>
       
        <input type="submit" value="Aggiungi">
        <br>

</form>


</body>
    
</html>