<html lang="hu">
<head>
    <title>2013-nál újabb filmek</title>
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

<h1>2013-nál újabb filmek</h1>

<div>Ez a lekérdezés kilistázza a 2013 után elkészített filmeket, filmcím alapján rendezve.</div>

    <?php
    $servername = "localhost";
    $username = "imdb";
    $password = "sjjqcqkc43";
    $database = "imdb";
    $conn =new mysqli($servername, $username, $password, $database);

    // csatlakozás az adatbázishoz
    $conn = mysqli_connect('localhost', 'imdb','sjjqcqkc43') or die("Hibás csatlakozás!");

    if ( mysqli_select_db($conn, 'imdb') ) {    // ha sikeres az adatbázis kiválasztása


        $sql = "SELECT cim, mikor FROM film WHERE Year(mikor) > 2013 group by cim"; // ez csak egy string, még nem hajtódik végre
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!'); // végrehajtjuk az SQL utasítást

        // html táblázatként íratjuk ki;
        echo '<table border=1>';
        echo '<tr>';            // táblázat fejléce
        echo '<th>Cím</th>';
        echo '<th>Mikori</th>';
        echo '</tr>';

        // a táblázat sorai
        while ( ($current_row = mysqli_fetch_assoc($res))) {    // most asszociatív tömbként kezeljük a sorokat
            echo '<form>';
            echo '<tr>';
            echo '<td>' . $current_row["cim"] . '</td>';
            echo '<td>' . $current_row["mikor"] . '</td>';
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
