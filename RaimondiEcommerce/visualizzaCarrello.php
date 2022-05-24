<?php include("connection.php");
session_start();
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

    $id = $_SESSION["idcarrello"];
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
                    <!-- -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index.php">Tutti i prodotti</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <?php
                            $tipo;
                            $sql = "SELECT * FROM categorie";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $tipo = $row["tipo"];
                                    $idCategoria = $row["id"];

                                    echo "<li><a class='dropdown-item' href='index.php?filtro=" . $idCategoria . "'>" . $tipo . "</a></li>";
                                }
                            }



                            ?>

                        </ul>

                    </li><!-- -->


                    
                    <form class='d-flex' action="index.php" method="GET">
                        <input class="form-control mr-sm-2" name="ricerca" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </ul>
                <?php
                if (isset($_SESSION["idcarrello"])) {
                    $idcart = $_SESSION["idcarrello"];
                    $sqlc = "SELECT count(*) as total FROM contiene  WHERE idCarrello = '$idcart'";
                    $resultc = $conn->query($sqlc);
                    $rowc = $resultc->fetch_assoc();

                    echo "<form class='d-flex' action='visualizzaCarrello.php'>";
                    echo "<button class='btn btn-outline-dark' type='submi'>";
                    echo "<i class='bi-cart-fill me-1'></i>";
                    echo "Cart";
                    echo "<span class='badge bg-dark text-white ms-1 rounded-pill'>" . $rowc['total'] . "</span>";
                    echo "</button>";
                    echo "</form>";
                } else {
                    echo "<form class='d-flex' action='signup.php'>";
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
                    if ($user != null && $user != "null") {
                        echo "<li class='nav-item'><a class='nav-link' href='#!'>" . $user . "</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='logout.php'>Logout</a></li>";
                    } else {
                        echo "<li class='nav-item'><a class='nav-link' href='signup.php'><span class='glyphicon glyphicon-user'></span>Sign up</a></li>";
                        echo "<li class='nav-item'><a class='nav-link' href='login.php'><span class='glyphicon glyphicon-log-in'></span>Login</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>



    <!-- Header-->
    <form action="addtocart.php" method="post">
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                    <section class="py-5">

                        <div class="row justify-content-center">


                            <?php
                            $somma=0;
                            $sql="SELECT * FROM contiene WHERE idCarrello = '$id'";
                            $result = $conn->query($sql);
                            if($result->num_rows>0){
                                while($row = $result->fetch_assoc()){
                                    $idArticolo = $row["idArticolo"];
                                    $quantita = $row["quantita"];
                                    $sqlart="SELECT * FROM articoli WHERE id = '$idArticolo'";
                                    $resultart =$conn->query($sqlart);
                                    if($resultart->num_rows>0){
                                        while($rowart = $resultart->fetch_assoc()){
                                            $articolo = $rowart["id"];
                                            $somma+=$rowart["prezzo"]*$quantita;

                                            echo "<div class='mb-5'>";
                                            echo "<div class='card h-100'>";
                                            echo "<a href='visualizzaProdotto.php?articolo=" . $articolo . "'><img class='card-img-top' src='" . $rowart["immagine"] . "' alt='...'/></a>";
                                            echo "<div class='card-body p-4'>";
                                            echo "<div class='text-center'>";
                                            echo "<h5 class='fw-bolder'>" . $rowart["nome"] . "</h5>";
                                            echo "<div class='d-flex justify-content-center small text-warning mb-2'>";
                                            for ($i = 0; $i < $rowart["stelle"]; $i++) {
                                                echo "<div class='bi-star-fill'></div>";
                                            }
                                            for ($i = $rowart["stelle"]; $i < 5; $i++) {
                                                echo "<div class='bi-star'></div>";
                                            }
                                            echo "</div>";
                                            echo $rowart["prezzo"] . "€";
                                            echo "<div>";
                                            echo "Quantità: " . $quantita;
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "<div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>";
                                    echo "<div class='text-center'><a class='btn btn-outline-danger mt-auto' href='togli.php?articolo=" . $articolo . "'>Togli</a></div>";
                                    echo "</div>";
                                            echo "</div>";
                                            
                                            echo "</div>"; 
                                        }

                                        
                                    }
                                    
                                }
                                echo "<div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>";
                                echo "<h1 style='color:white'>" . $somma . "€</h1>";
                                    echo "</div>";
                                
                                echo "<div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>";
                                    echo "<div class='text-center'><a class='btn btn-outline-success mt-auto' href='ordina.php?somma=".$somma."'>Ordina</a></div>";
                                    echo "</div>";
                            }
                            
                            ?>
    </form>


    </div>
    </div>
    </div>
    </div>
    </section>
    </header>
    <!-- Section-->





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