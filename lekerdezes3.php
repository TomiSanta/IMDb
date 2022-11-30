<html lang="hu">
<head>
    <title>1995 után SP </title>
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

<h1>1995 után született SP monogrammű felhasználók</h1>

<div>Ez a lekérdezés kilistázza az 1995 után született SP monogrammú felhasználókat.</div>

<?php
$servername = "localhost";
$username = "imdb";
$password = "sjjqcqkc43";
$database = "imdb";
$conn =new mysqli($servername, $username, $password, $database);

// csatlakozás az adatbázishoz
$conn = mysqli_connect('localhost', 'imdb','sjjqcqkc43') or die("Hibás csatlakozás!");


if ( mysqli_select_db($conn, 'imdb') ) {    // ha sikeres az adatbázis kiválasztása
    // lekérdezzük a városokat a "varosok" táblából

    $sql = "SELECT felhasznalonev, nev, szuldatum FROM felhasznalo WHERE nev IN (SELECT nev FROM felhasznalo WHERE nev LIKE 'S% P%') AND YEAR(szuldatum) > 1995"; // ez csak egy string, még nem hajtódik végre
    $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!'); // végrehajtjuk az SQL utasítást

    // html táblázatként íratjuk ki;
    echo '<table border=1>';
    echo '<tr>';            // táblázat fejléce
    echo '<th>Felhasználónév</th>';
    echo '<th>Név</th>';
    echo '<th>Születési dátum</th>';
    echo '</tr>';

    // a táblázat sorai
    while ( ($current_row = mysqli_fetch_assoc($res))) {    // most asszociatív tömbként kezeljük a sorokat
        echo '<form>';
        echo '<tr>';
        echo '<td>' . $current_row["felhasznalonev"] . '</td>';
        echo '<td>' . $current_row["nev"] . '</td>';
        echo '<td>' . $current_row["szuldatum"] . '</td>';
        echo '</tr>';
        echo '<input type="hidden" name="felhasznalonev" value="'.$current_row["felhasznalonev"].'">';
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