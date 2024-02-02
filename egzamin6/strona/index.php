<!DOCTYPE html>
<html lang="pl">

<?php

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'forumpsy';

$dbConn = new mysqli($host, $user, $password, $db);

if (isset($_POST['answer'])) {

    $answer = $_POST['answer'];
    $sql_insert_answer = "INSERT INTO `odpowiedzi`(`id`, `Pytania_id`, `konta_id`, `odpowiedz`) VALUES ('','1','5','$answer');";

    mysqli_query($dbConn, $sql_insert_answer);
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>

    <header>

        <h1>Forum miłościnków psów</h1>

    </header>

    <main>

        <section id="left">

            <!-- skrtpy 1 -->

            <img src="./Avatar.png" alt="Użytkownik forum">

            <?php

            $sql_user_select = "SELECT `nick`, `postow`, `pytanie` FROM `konta` JOIN `pytania` WHERE `konta`.`id` = `pytania`.`konta_id`; ";
            $sql_US_resault = mysqli_fetch_array($dbConn->query($sql_user_select), MYSQLI_BOTH);

            $user_nick = $sql_US_resault['nick'];
            $number_of_posts = $sql_US_resault['postow'];
            $question = $sql_US_resault['pytanie'];

            echo <<<TX

                    <h4>Użytkownik: $user_nick </h4>
                    <p>$number_of_posts postów na forum</p>
                    <p>$question </p>

                TX;

            ?>

            <video src="./video.mp4" controls loop></video>

        </section>

        <section id="right">

            <!-- skrypt 2 -->
            <!-- skrypt 3 -->

            <form action="./index.php" method="post">
                <textarea name="answer" id="answer" cols="40" rows="4" required></textarea>
                <br>
                <input type="submit" value="Dodaj odpowiedź">


            </form>

            <h2>Odpowiedzi na pytanie</h2>
            <ol>

                <?php

                    $sql_select_answers = "SELECT `odpowiedzi`.`id`, `odpowiedzi`.`odpowiedz`, `konta`.`nick` FROM `odpowiedzi` JOIN `konta` WHERE `konta`.`id` = `odpowiedzi`.`konta_id` AND `odpowiedzi`.`Pytania_id` = 1; ";
                    $sql_SA_resault = mysqli_query($dbConn, $sql_select_answers);
                    
                    while($row = mysqli_fetch_array($sql_SA_resault, MYSQLI_BOTH)){

                        $answer_content = $row['odpowiedz'];
                        $user_nickname = $row['nick'];
                        

                        echo <<<TX

                            <li>$answer_content. $user_nickname</li>
                            <hr>

                        TX;

                    }



                ?>

            </ol>

        </section>

    </main>

    <footer>
        Autor: 00000000000,
        <a href="http://mojestrony.pl/">Zobacz nasze realizacje</a>
    </footer>

</body>

<?php

$dbConn->close();

?>

</html>