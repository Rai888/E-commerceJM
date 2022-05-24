<?php

$servername = "ftp.defrai.altervista.org";
$username = "defrai";
$password = "";
$dbname = "my_defrai";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
