<?php
require_once('./includes/db.php');

//real_escape_string evita i problemi derivanti dai caratteri speciali

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $connessione->real_escape_string($_POST['username']);
    $password = $connessione->real_escape_string($_POST['password']);

    // Controllo che non ci siano registrazioni duplicate
    $sql_select = "SELECT * FROM users WHERE username = '$username'";
    if($result = $connessione->query($sql_select)) {
        if ($result->num_rows == 1) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            if(password_verify($password, $row['password'])){
                session_start();
                $_SESSION['loggato'] = true;
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                header("location: area-privata.php");
            } else {
                echo "La password non è corretta";
            }
        } else {
            echo "Non ci sono account con quello username";
        }
    } else {
        echo "Errore in fase di login";
    }

    $connessione->close();
}
?>
