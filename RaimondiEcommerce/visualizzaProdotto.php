<?php include("connection.php");
session_start();
$id = $_GET["articolo"];
$_SESSION["idarticolo"] = $id;
$sqlm = "SELECT * FROM articoli WHERE id =" . $id;
$result = $conn->query($sqlm);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $nome = $row["nome"];
        $marca = $row["marca"];
        $prezzo = $row["prezzo"];
        $nDisponibili = $row["nDisponibili"];
        $immagine = $row["immagine"];
        $descrizione = $row["descrizione"];
        $stelle = $row["stelle"];
        $idCategoria = $row["idCategoria"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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

    <?php
    if (isset($_SESSION["username"]))
        $user = $_SESSION["username"];
    else
        $user = null;

    ?>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">DefRai</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <!-- --><li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="index.php">Tutti i prodotti</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <?php
                                    $tipo;
                                    $sql = "SELECT * FROM categorie";
                                    $result = $conn->query($sql);
                                    if($result-> num_rows >0){
                                        while($row = $result->fetch_assoc()){
                                        $tipo = $row["tipo"];
                                        $idCategoria = $row["id"];
                                    
                                        echo "<li><a class='dropdown-item' href='index.php?filtro=". $idCategoria ."'>".$tipo."</a></li>";
                                        }
                                    }

                                    

                                ?>
                                
                            </ul>
                            
                        </li><!-- -->
                        <form class='d-flex' action="index.php" method="GET">
                        <input class="form-control mr-sm-2" name="ricerca" style="width:400px;" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit"><i class="bi bi-search"></i></button>
                        </form>
                    </ul>
                    <?php
                    if(isset($_SESSION["idcarrello"])){
                        $idcart = $_SESSION["idcarrello"];
                        $sqlc="SELECT count(*) as total FROM contiene  WHERE idCarrello = '$idcart'";
                        $resultc=$conn->query($sqlc);
                        $rowc = $resultc->fetch_assoc();

                        echo "<form class='d-flex' action='visualizzaCarrello.php'>";
                        echo "<button class='btn btn-outline-dark' type='submit'>";
                            echo "<i class='bi-cart-fill me-1'></i>";
                            echo "Cart";
                            echo "<span class='badge bg-dark text-white ms-1 rounded-pill'>".$rowc['total']."</span>";
                        echo "</button>";
                    echo "</form>";
                    }else{
                        echo "<form class='d-flex' action='visualizzaCarrello.php'>";
                        echo "<button class='btn btn-outline-dark' type='submit'>";
                            echo "<i class='bi-cart-fill me-1'></i>";
                           echo "Cart";
                            echo "<span class='badge bg-dark text-white ms-1 rounded-pill'>0</span>";
                        echo "</button>";
                    echo "</form>";
                    }
                    ?>  
                    <ul class="navbar-nav mb-2 mb-lg-0 ms-lg-4">
                    <?php
                    if($user != null && $user != "null"){
                        echo "<li class='nav-item'><a class='nav-link' href='#!'>" . $user . "</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='logout.php'>Logout</a></li>";
                    }else{
                        echo "<li class='nav-item'><a class='nav-link' href='signup.php'><span class='glyphicon glyphicon-user'></span>Sign up</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='login.php'><span class='glyphicon glyphicon-log-in'></span>Login</a></li>";
                    }
                    ?>
                    </ul>
                </div>
            </div>
        </nav>
    <!-- Header-->


    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-white">

                <section class="py-5">

                    <div class="row justify-content-center">


                        <?php
                        if ($_SESSION["admin"] == 0) {
                            echo "<div class='col mb-5'>";
                            echo "<div class='card h-100'>";
                            echo "<img class='card-img-top' src='" . $immagine . "' alt='...'/>";
                            echo "</div>";
                            echo "</div>";


                            echo "<div class='col mb-5'>";
                            echo "<div class='h-100'>";
                            echo "<h1 class='fw-bolder'>" . $nome . "</h1>";
                            echo  "<h4 class='fw-bolder'>" . $marca . "</h4>";
                            echo "<div class='d-flex text-warning mb-2'>";
                            for ($i = 0; $i < $stelle; $i++) {
                                echo "<div class='bi-star-fill'></div>";
                            }
                            for($i=$stelle; $i<5;$i++){
                                echo "<div class='bi-star'></div>";
                            }
                            echo "</div>";
                            echo "<h4>Disponibili: " . $nDisponibili . "</h4>";
                            echo "<h7>" . $descrizione . "</h7>";
                            echo "<div>";

                            echo "<div>";
                            echo "<h2>" . $prezzo . "€</h2>";
                            echo "</div>";
                            echo "<form action='addtocart.php' method='post'>";
                            echo "<input type='number' id='quantita' name='quantita2' value='1' min='1' max='" . $nDisponibili . "'>";
                            echo " | ";
                            echo "<input type='submit' value='Add to Cart' class='btn btn-outline-warning mt-auto'>";
                            echo "</form>";

                            echo "</div>";
                        } else if ($_SESSION["admin"] == 1) {
                            echo "<div class='col mb-5'>";
                            echo "<div class='card h-100'>";
                            echo "<img class='card-img-top' src='" . $immagine . "' alt='...'/>";
                            echo "</div>";
                            echo "</div>";


                            echo "<div class='col mb-5'>";
                            echo "<div class='h-100'>";
                            echo "<h1 class='fw-bolder'>" . $nome . "</h1>";
                            echo  "<h4 class='fw-bolder'>" . $marca . "</h4>";
                            echo "<div class='d-flex text-warning mb-2'>";
                            for ($i = 0; $i < $stelle; $i++) {
                                echo "<div class='bi-star-fill'></div>";
                            }
                            for($i=$stelle; $i<5;$i++){
                                echo "<div class='bi-star'></div>";
                            }
                            echo "</div>";
                            echo "<h4>Disponibili: " . $nDisponibili . "</h4>";
                            echo "<form action='aggiornaquantita.php' method='post'>";
                            echo "<input type='number' name='quantita1' value='0' min='0' max='20'>";
                            echo " | ";
                            echo "<input type='submit' value='Update quantity' class='btn btn-outline-primary mt-auto'>";
                            echo "</form>";
                            echo "<h6>" . $descrizione . "</h6>";
                            echo "<div>";

                            echo "<div>";
                            echo "<h2>" . $prezzo . "€</h2>";
                            echo "</div>";
                            echo "<form action='addtocart.php' method='post'>";
                            echo "<input type='number' id='quantita' name='quantita2' value='1' min='1' max='" . $nDisponibili . "'>";
                            echo " | ";
                            echo "<input type='submit' value='Add to Cart' class='btn btn-outline-warning mt-auto'>";
                            echo "</form>";

                            echo "</div>";
                        }
                        ?>



                    </div>
            </div>
        </div>
        </div>
        </section>
    </header>
    <!-- Section-->
    <br>
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                <div class="card-body p-4">
                    <div class="form-outline mb-4">
                        <form action="addComment.php" method="post">
                            <div class='d-flex mb-2'>
                                <div class='bi-star-fill text-star'></div>
                                <input type="number" min="1" max="5" name="stelline" value="1">
                            </div>
                            <input type="text" name="addANote" class="form-control" placeholder="Type comment..." />
                            <input type="submit" value="+ Add a note" class="btn-outline-secondary">
                        </form>
                    </div>

                    <?php
                    $sqlcom = "SELECT * FROM commenti join utenti on idUtente=utenti.id WHERE idArticolo = '$id'";
                    $resultcom = $conn->query($sqlcom);

                    if ($resultcom->num_rows > 0) {
                        while ($rowcom = $resultcom->fetch_assoc()) {

                            echo "<div class='card mb-4'>";
                            echo "<div class='d-flex small text-warning mb-2'>";
                            for ($i = 0; $i < $rowcom["stelle"]; $i++) {
                                echo "<div class='bi-star-fill'></div>";
                            }
                            for($i=$rowcom["stelle"]; $i<5;$i++){
                                echo "<div class='bi-star'></div>";
                            }
                            
                            echo "</div>";
                            echo "<div class='card-body'>";
                            echo "<p>" . utf8_encode($rowcom["txt"]) . "</p>";
                            echo "<div class='d-flex justify-content-between'>";
                            echo "<div class='d-flex flex-row align-items-center'>";
                            echo "<img src='https://demo.dj-extensions.com/dj-classifieds-demo-2021/components/com_djclassifieds/assets/images/default_profile.png' alt='avatar' width='25'
                                  height='25' />";
                            echo "<p class='small mb-0 ms-2'>" . $rowcom["nome"] . "</p>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                    }
                    ?>



                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <br>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Raimondi Riccardo 2022</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>


</html>