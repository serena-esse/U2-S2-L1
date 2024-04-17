<?php

$host = 'localhost';
$db   = 'ifoa_blog';
$user = 'root';
$password = '';

$connessione = new mysqli($host, $user, $password, $db);

if($connessione ===false)
{die("Errore durante la connessione: " . $connessione->connect_error);} ?>