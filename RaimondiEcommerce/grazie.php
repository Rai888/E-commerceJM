<?php
include("connection.php");
session_start();

echo "<div>";
echo "<h2>ORDINE EFFETTUATO</h2>";
echo "<h1> Grazie " . $_SESSION["username"] . " per aver utilizzato DefRai</h1>";
echo "<h3>Buona Giornata</h3>";
echo "</div>";

?>