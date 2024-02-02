<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal społecznościowy</title>
    <link rel="stylesheet" href="./styl5.css">
</head>

<body>

    <?php

    $user = 'root';
    $password = '';
    $host = 'localhost';
    $db = 'egz3';

    $dbConn = new mysqli($host, $user, $password, $db);

    // if($dbConn->connect_error){
    //     die('error');
    // }else{
    //     echo 'correct';
    // }


    ?>

    <header id="naglowki">

        <div id="baner1">

            <h2>Nasze osiedle</h2>

        </div>

        <div id="baner2">

            <?php

            $sql_select1 = "SELECT COUNT(*) FROM `dane`; ";
            $resault_sql_select1 = $dbConn->query($sql_select1);
            $wartosc1 = mysqli_fetch_array($resault_sql_select1, MYSQLI_BOTH);
            echo "<h5>Liczba użytkowników portalu:" . $wartosc1[0] . "</h5>";

            ?>


        </div>

    </header>

    <main>

        <section id="lewy">

            <h3>Logowanie</h3>
            <form method="post">

                <label for="login">login</label>
                <br>
                <input type="text" name="login" id="login">
                <br>
                <label for="haslo">hasło</label>
                <br>
                <input type="text" name="haslo" id="haslo">
                <br>
                <input type="submit" value="zaloguj">

            </form>

        </section>

        <section id="prawy">

            <h3>Wizytówka</h3>
            <div id="wizytowka">

                <?php

                

                if (isset($_POST['login']) && $_POST['login'] != '') {

                    $login = $_POST['login'];
                    $pass_inp = $_POST['haslo'];
                    $sql_select2 = "SELECT `haslo` FROM `uzytkownicy` WHERE `login`='$login';";
                    $resault_sq1 = mysqli_fetch_array($dbConn->query($sql_select2), MYSQLI_BOTH);

                    if ($resault_sq1 != null) {

                        if (sha1($pass_inp) == $resault_sq1[0]) {
                            
                            $sql_select3 = "SELECT `uzytkownicy`.`login`, `dane`.`rok_urodz`, `dane`.`przyjaciol`, `dane`.`hobby`, `dane`.`zdjecie` FROM `uzytkownicy` JOIN `dane` WHERE `uzytkownicy`.`id` = `dane`.`id` AND `uzytkownicy`.`login` = '$login';";
                            $resault_sq3 = mysqli_fetch_array($dbConn->query($sql_select3),MYSQLI_BOTH);
                            
                            $photo = $resault_sq3['zdjecie'];
                            $today = date("Y");
                            $birthYear = $resault_sq3['rok_urodz'];
                            $age = $today-$birthYear;
                            $hobby = $resault_sq3['hobby'];
                            $friends = $resault_sq3['przyjaciol'];

                            echo "<img src='$photo' alt='osoba'>";
                            echo "<h4>$login ($age)</h4>";
                            echo "<p>hobby: $hobby</p>";
                            echo "<h1><img src='./icon-on.png' alt='osoba'>$friends</h1>";
                            
                            echo "<a href='./dane.html'><button id='wiec_info'>Więcej informacji</button></a>";


                        } else {
                            echo 'wrong password';
                        }
                    } else {
                        echo 'wrong login';
                    }
                }


                ?>

                
            </div>

        </section>

    </main>

    <footer id="stopka">
        <span>Napis wykonał: 0000000000096969</span>
    </footer>


    <?php

    $dbConn->close();

    ?>




</body>

</html>