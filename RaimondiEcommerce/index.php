<?php include("connection.php");
session_start();
$filtro = null;
if (isset($_GET["filtro"]))
    $filtro = $_GET["filtro"];
$ricerca = null;
if (isset($_GET["ricerca"]))
    $ricerca = $_GET["ricerca"];
/*$cookie_name = "user";
$cookie_value = "Alex Porter";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");*/
?>
<!DOCTYPE html>
<html lang="en">

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

    <?php
    if (isset($_SESSION["id"])) {
        $idUtente = $_SESSION["id"];
        $sqlCar = "SELECT * from carrelli where codUtente = '$idUtente'";
        $resultcar = $conn->query($sqlCar);
        if ($resultcar->num_rows > 0) {
            //carrello già esistente
            $rowCar = $resultcar->fetch_assoc();
            $_SESSION["idcarrello"] = $rowCar["id"];
        } else {
            //carrello non esistente

            $sqlnewcar = "INSERT INTO carrelli (codUtente)
                    VALUES ('$idUtente')";
            $resultnewcar = $conn->query($sqlnewcar);
            $sqlCar = "SELECT id from carrelli where codUtente = '$idUtente'";
            $resultcar = $conn->query($sqlCar);
            $rowCar = $resultcar->fetch_assoc();
            $_SESSION["idcarrello"] = $rowCar["id"];
        }
    }

    ?>

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
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
                <p class="lead fw-normal text-white-50 mb-0">With DefRai</p>
            </div>
        </div>
    </header>




    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">


                <?php
                if ($ricerca == null) {
                    if ($filtro == null)
                        $sql = "SELECT * FROM articoli WHERE 1 ORDER BY RAND()";
                    else
                        $sql = "SELECT * FROM articoli WHERE idCategoria = '$filtro'";
                } else {
                    $sql = "SELECT * FROM articoli WHERE nome LIKE '%$ricerca%' OR descrizione LIKE '%$ricerca%'";
                }
                $result = $conn->query($sql);

                if (isset($_SESSION["id"])) {
                    $profilo = $_SESSION["id"];
                    $sqlA = "SELECT admin FROM utenti WHERE id='$profilo'";
                    $resultA = $conn->query($sqlA);

                    if ($result->num_rows > 0 && $resultA->num_rows > 0) {
                        while ($rowA = $resultA->fetch_assoc()) {
                            if ($rowA["admin"] == 0) {
                                $_SESSION["admin"] = 0;
                                while ($row = $result->fetch_assoc()) {
                                    $articolo = $row["id"];

                                    echo "<div class='col mb-5'>";
                                    echo "<div class='card h-100'>";
                                    echo "<a href='visualizzaProdotto.php?articolo=" . $articolo . "'><img class='card-img-top' src='" . $row["immagine"] . "' alt='...'/></a>";
                                    echo "<div class='card-body p-4'>";
                                    echo "<div class='text-center'>";
                                    echo "<h5 class='fw-bolder'>" . $row["nome"] . "</h5>";
                                    echo "<div class='d-flex justify-content-center small text-warning mb-2'>";
                                    for ($i = 0; $i < $row["stelle"]; $i++) {
                                        echo "<div class='bi-star-fill'></div>";
                                    }
                                    for ($i = $row["stelle"]; $i < 5; $i++) {
                                        echo "<div class='bi-star'></div>";
                                    }
                                    echo "</div>";
                                    echo $row["prezzo"] . "€";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "<div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>";
                                    echo "<div class='text-center'><a class='btn btn-outline-dark mt-auto' href='visualizzaProdotto.php?articolo=" . $articolo . "'>Add to cart</a></div>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                            } else if ($rowA["admin"] == 1) {
                                $_SESSION["admin"] = 1;
                                echo "<div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>";
                                echo "<div class='text-center'><a class='btn btn-outline-success mt-auto' href='nuovoProdotto.php'>Add product</a></div>";
                                echo "</div>";
                                while ($row = $result->fetch_assoc()) {
                                    $articolo = $row["id"];
                                    echo "<div class='col mb-5'>";
                                    echo "<div class='card h-100'>";
                                    echo "<a href='visualizzaProdotto.php?articolo=" . $articolo . "'><img class='card-img-top' src='" . $row["immagine"] . "' alt='...'/></a>";
                                    echo "<div class='card-body p-4'>";
                                    echo "<div class='text-center'>";
                                    echo "<h5 class='fw-bolder'>" . $row["nome"] . "</h5>";
                                    echo "<div class='d-flex justify-content-center small text-warning mb-2'>";
                                    for ($i = 0; $i < $row["stelle"]; $i++) {
                                        echo "<div class='bi-star-fill'></div>";
                                    }
                                    for ($i = $row["stelle"]; $i < 5; $i++) {
                                        echo "<div class='bi-star'></div>";
                                    }
                                    echo "</div>";
                                    echo $row["prezzo"] . "€";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "<div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>";
                                    echo "<div class='text-center'><a class='btn btn-outline-dark mt-auto' href='visualizzaProdotto.php?articolo=" . $articolo . "'>Add to cart</a></div>";
                                    echo "</div>";
                                    echo "<div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>";
                                    echo "<div class='text-center'><a class='btn btn-outline-danger mt-auto' href='eliminaProdotto.php?articolo=" . $articolo . "'>Delete product</a></div>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                            }
                        }
                    }
                } else {
                    while ($row = $result->fetch_assoc()) {
                        $articolo = $row["id"];
                        $_SESSION["admin"] = 0;

                        echo "<div class='col mb-5'>";
                        echo "<div class='card h-100'>";
                        echo "<a href='visualizzaProdotto.php?articolo=" . $articolo . "'><img class='card-img-top' src='" . $row["immagine"] . "' alt='...'/></a>";
                        echo "<div class='card-body p-4'>";
                        echo "<div class='text-center'>";
                        echo "<h5 class='fw-bolder'>" . $row["nome"] . "</h5>";
                        echo "<div class='d-flex justify-content-center small text-warning mb-2'>";
                        for ($i = 0; $i < $row["stelle"]; $i++) {
                            echo "<div class='bi-star-fill'></div>";
                        }
                        for ($i = $row["stelle"]; $i < 5; $i++) {
                            echo "<div class='bi-star'></div>";
                        }
                        echo "</div>";
                        echo $row["prezzo"] . "€";
                        echo "</div>";
                        echo "</div>";
                        echo "<div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>";
                        echo "<div class='text-center'><a class='btn btn-outline-dark mt-auto' href='visualizzaProdotto.php?articolo=" . $articolo . "'>Add to cart</a></div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                ?>


            </div>
        </div>
    </section>


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