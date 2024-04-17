<?php
require_once('./includes/db.php');

//real_escape_string evita i problemi derivanti dai caratteri speciali
$email = $connessione -> real_escape_string( $_POST['email']);
$username = $connessione -> real_escape_string( $_POST['username']);
$password = $connessione -> real_escape_string( $_POST['password']);

//criptare la password (hasharla)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, email, password) VALUES ( '$username', '$email','$hashed_password')";
if($connessione->query($sql)===true){
    echo "Registrazione effettuata con successo";

} else {echo "Errore durante registrazione utente $sql." . $connessione->error;}