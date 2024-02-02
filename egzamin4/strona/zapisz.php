<?php

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'wedkowanie';

    $dbConn = new mysqli($host, $user, $password, $db);

    if(isset($_POST['imie'])){
        
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $adres = $_POST['adres'];
        
        $sql_insert = "INSERT INTO `karty_wedkarskie` (`imie`, `nazwisko`, `adres`) VALUES ('$imie', '$nazwisko', '$adres'); ";

        $dbConn -> query($sql_insert);

        header("Location: karta.html");

    }
    


?>