<html lang="hu">
<head>
    <title>4 évadnál hosszabb akció sorozatok</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF8" >
    <link rel="icon" href="img/logo.png"/>
    <style>
        table, td {
            border: 1px solid black;
            font-size: 17px;
            color: goldenrod;
            font-style: italic;
        }
        h1{
            color: orange;
        }
        div{
            font-size: 18px;
            color: orange;
        }
        .button{
            color: purple;
            background-color: lightgreen;
        }
        body {
            background: url("img/modosithatter.jpg");
        }
    </style>

</head>
<body>
<form method="get" action="index.php">
    <button class="button" type="submit">Főoldalra</button>
</form>

<h1>4 évad vagy annál hosszabb akció sorozatok</h1>

<div>Ez a lekérdezés kilistázza az 4 évad vagy annál hosszabb akció sorozatokat, cím alapján rendezve.</div>

    <?php
    $servername = "localhost";
    $username = "imdb";
    $password = "sjjqcqkc43";
    $database = "imdb";
    $conn =new mysqli($servername, $username, $password, $database);

    // csatlakozás az adatbázishoz
    $conn = mysqli_connect('localhost', 'imdb','sjjqcqkc43') or die("Hibás csatlakozás!");

    if ( mysqli_select_db($conn, 'imdb') ) {    // ha sikeres az adatbázis kiválasztása


        $sql = "SELECT cim, evadszam, mufaj FROM sorozat WHERE evadszam >= 4 AND mufaj LIKE '%akció%' group by cim"; // ez csak egy string, még nem hajtódik végre
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!'); // végrehajtjuk az SQL utasítást

        // html táblázatként íratjuk ki;
        echo '<table border=1>';
        echo '<tr>';            // táblázat fejléce
        echo '<th>Cím</th>';
        echo '<th>Évadszám</th>';
        echo '<th>Műfaj</th>';
        echo '</tr>';

        // a táblázat sorai
        while ( ($current_row = mysqli_fetch_assoc($res))) {    // most asszociatív tömbként kezeljük a sorokat
            echo '<form>';
            echo '<tr>';
            echo '<td>' . $current_row["cim"] . '</td>';
            echo '<td>' . $current_row["evadszam"] . '</td>';
            echo '<td>' . $current_row["mufaj"] . '</td>';
            echo '</tr>';
            echo '<input type="hidden" name="cim" value="'.$current_row["cim"].'">';
            echo '</form>';
        }
        echo '</table>';

        mysqli_free_result($res);    // felszabadítjuk a lefoglalt memóriát
    } else {                                    // nem sikerült csatlakozni az adatbázishoz
        die('Nem sikerült csatlakozni az adatbázishoz.');
    }

    mysqli_close($conn); // lezárjuk az adatbázis-kapcsolatot

    ?>
    <button class="button" onclick="history.go(-1);">Vissza </button>
</body>
</html>

