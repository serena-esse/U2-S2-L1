<?php

session_start();
if(!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true) {
    header("location: login.html");
    exit;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area privata</title>
</head>
<body>
    <h1>Area Privata
    <?php    echo "Ciao" . $_SESSION["username"];?>
    </h1>
</body>
</html>