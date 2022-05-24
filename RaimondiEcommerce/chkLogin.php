<?php
include("connection.php");
session_start();
//select form database

  $us = $_POST["username"];
  $pass = $_POST["password"];
  $_SESSION["profilo"] = $us;
  $profilo = $_SESSION["profilo"];

  $sql = "SELECT username, id FROM utenti WHERE username = '$us' AND password = md5('$pass')";

  $result = $conn->query($sql);
  if ($result->num_rows > 0){

    while($row = $result->fetch_assoc()){
      $_SESSION["username"] = $row["username"];
      $_SESSION["id"] = $row["id"];
      header("location:index.php");
    }
  }
  else{
    header("location:login.php?msg=password o username non validi!");
  }
  $conn->close();
?>
