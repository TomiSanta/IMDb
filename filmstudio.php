<html lang="hu">

<head>
    <title>Filmstúdiók</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF8" >
    <link rel="icon" href="img/logo.png"/>
    <style>
        table, td {
            border: 1px solid black;
            font-size: 17px;
            color: goldenrod;
            font-style: italic;
        }
        th{
            border: 1px solid black;
            font-size: 20px;
            color: orange;
        }
        h1{
            color: orange;
        }
        div{
            font-size: 18px;
            color: orange;
        }
        label{
            font-size: 20px;
            color: orange;
        }
        .button{
            color: gold;
            background-color: cornflowerblue;
        }
        body {
            background: url("img/kekhatter.jpg") center/cover no-repeat;
        }

    </style>
</head>
<body>
<h1>Filmstúdiók:</h1>

<form method="get" action="index.php">
    <button class="button" type="submit">Főoldalra</button>
</form>

<div>Írja be az adatokat a megfelelő mezőkbe!</div>


<form action="filmstudiohozzaadasa.php" method="POST">
    <label>Neve:</label><label for="filmstudio"></label>
    <input type="text" id="nev" name="nev" placeholder="Név" required/>

    <label>Helye:</label><label for="filmstudio"></label>
    <input type="text" id="helyszin" name="helyszin" placeholder="Filmstúdió helyszíne" required/>

    <input type="submit" class="button" value="Hozzáad"></form>
<?php
$servername = "localhost";
$username = "imdb";
$password = "sjjqcqkc43";
$database = "imdb";
$conn =new mysqli($servername, $username, $password, $database);

// csatlakozás az adatbázishoz
$conn = mysqli_connect('localhost', 'imdb','sjjqcqkc43') or die("Hibás csatlakozás!");

if ( mysqli_select_db($conn, 'imdb') ) {    // ha sikeres az adatbázis kiválasztása


    $sql = "SELECT nev, helyszin FROM filmstudio"; // ez csak egy string, még nem hajtódik végre
    $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!'); // végrehajtjuk az SQL utasítást

    // html táblázatként íratjuk ki;
    echo '<table border=1>';
    echo '<tr>';            // táblázat fejléce
    echo '<th>Név</th>';
    echo '<th>Helye</th>';
    echo '</tr>';

    // a táblázat sorai
    while ( ($current_row = mysqli_fetch_assoc($res))) {    // most asszociatív tömbként kezeljük a sorokat
        echo '<form action="filmstudiomodositas.php" method="post">';
        echo '<tr>';
        echo '<td>' . $current_row["nev"] . '</td>';
        echo '<td>' . $current_row["helyszin"] . '</td>';
        echo '<td><input type="submit" value="Módosít"></td>';
        echo '</tr>';
        echo '<input type="hidden" name="nev" value="'.$current_row["nev"].'">';
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
