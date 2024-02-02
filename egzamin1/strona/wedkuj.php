<!DOCTYPE html>
<html lang="pol">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styl_1.css">
</head>

<body>

    <?php

    $host = 'localhost';
    $userName = 'root';
    $password = '';
    $dataBase = 'egz1';

    $dataBaseConnection = mysqli_connect($host, $userName, $password, $dataBase);

    ?>

    <header id="naglowek">
        <h1>Portal dla wędkarzy</h1>
    </header>

    <div id="glowny">
        <div id="lewe">
            <section id="blok_lewy1">
                <h3>Ryby zamieszkujące rzeki</h3>

                <?php

                $sql = 'SELECT `ryby`.`nazwa`, `lowisko`.`akwen`, `lowisko`.`wojewodztwo` FROM `ryby` JOIN `lowisko` where `lowisko`.`Ryby_id` = `ryby`.`id` and `lowisko`.`rodzaj` = 3;';
                $resault = $dataBaseConnection->query($sql);


                echo "<ol>";
                while ($row = mysqli_fetch_array($resault, MYSQLI_ASSOC)) {
                    echo "<li>" . $row['nazwa'] . " pływa w rzece " . $row['akwen'] . ", " . $row['wojewodztwo'] . "</li>";
                }
                echo "</ol>";

                ?>

            </section>

            <section id="blok_lewy2">
                <h3>Ryby drapieżne naszych wód</h3>
                <table>
                    <tr>
                        <th>L.p.</th>
                        <th>Gatunek</th>
                        <th>Występowanie</th>
                    </tr>

                    <?php

                    $sql = 'SELECT `id`,`nazwa`,`wystepowanie` FROM `ryby` WHERE `styl_zycia` = 1;';
                    $resault = $dataBaseConnection->query($sql);

                    while ($row = mysqli_fetch_array($resault, MYSQLI_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nazwa'] . "</td>";
                        echo "<td>" . $row['wystepowanie'] . "</td>";
                        echo "</tr>";
                    }


                    ?>


                </table>

            </section>

        </div>

        <section id="blok_prawy">

            <img src="./ryba1.jpg" alt="Sum">
            <br>
            <a href="../screenshots/zapytania_sql.txt">Pobierz kwerendy</a>

        </section>

    </div>

    <footer id="stopka">
        <p>Stronę wykonał: 00000000000</p>
    </footer>



</body>

</html>