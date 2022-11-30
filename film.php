<html lang="hu">
<head>
    <title>Filmek</title>
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
<h1>Filmek:</h1>

<form method="get" action="index.php">
    <button class="button" type="submit">Főoldalra</button>
</form>

<div>Írja be az adatokat a megfelelő mezőkbe!</div>

<form action="filmhozzaadasa.php" method="POST">

    <label>Cím:</label><label for="film"></label>
    <input type="text" id="cim" name="cim" placeholder="A film címe" required/>

    <label>Szereplők:</label><label for="film"></label>
    <input type="text" id="szereplok" name="szereplok" placeholder="Szereplők neve(i)" required/>

    <label>Műfaj:</label><label for="film"></label>
    <input type="text" id="mufaj" name="mufaj" placeholder="Film műfaja"  required/>

    <label>Rendező:</label><label for="film"></label>
    <input type="text" id="rendezo" name="rendezo" placeholder="Film rendezője"  required/>

    <label>Korhatár:</label><label for="film"></label>
    <input type="number" id="korhatar" name="korhatar" placeholder="A film korhatára" required/>

    <label>Időtartam:</label><label for="film"></label>
    <input type="text" id="idotartam" name="idotartam" placeholder="A film hossza"  required/>

    <label>Stúdióneve:</label><label for="film"></label>
    <input type="text" id="studioneve" name="studioneve" placeholder="Stúdió neve"  required/>

    <label>Mikor:</label><label for="film"></label>
    <select name="mikorev">
        <?php
        for($i=1940; $i<=date("Y"); $i++){
            echo '<option value"'.$i.'">'.$i.'</option>';
        }
        ?>
    </select> év &nbsp
    <select name="mikorhonap">
        <?php
        for($i=1; $i<=12; $i++){
            echo '<option value"'.$i.'">'.$i.'</option>';
        }
        ?>
    </select> hónap &nbsp
    <select name="mikornap">
        <?php
        for($i=1; $i<=31; $i++){
            echo '<option value="'.$i.'">'.$i.'</option>';
        }
        ?>
    </select> nap &nbsp

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


    $sql = "SELECT cim, szereplok, mufaj, rendezo, korhatar, idotartam, studioneve, mikor FROM film"; // ez csak egy string, még nem hajtódik végre
    $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!'); // végrehajtjuk az SQL utasítást

    // html táblázatként íratjuk ki;
    echo '<table border=1>';
    echo '<tr>';            // táblázat fejléce
    echo '<th>Cím</th>';
    echo '<th>Szereplők</th>';
    echo '<th>Műfaj</th>';
    echo '<th>Rendező</th>';
    echo '<th>Korhatár</th>';
    echo '<th>Időtartam</th>';
    echo '<th>Stúdió neve</th>';
    echo '<th>Mikori</th>';
    echo '</tr>';

    // a táblázat sorai
    while ( ($current_row = mysqli_fetch_assoc($res))) {    // most asszociatív tömbként kezeljük a sorokat
        echo '<form action="filmmodositas.php" method="post">';
        echo '<tr>';
        echo '<td>' . $current_row["cim"] . '</td>';
        echo '<td>' . $current_row["szereplok"] . '</td>';
        echo '<td>' . $current_row["mufaj"] . '</td>';
        echo '<td>' . $current_row["rendezo"] . '</td>';
        echo '<td>' . $current_row["korhatar"] . '</td>';
        echo '<td>' . $current_row["idotartam"] . '</td>';
        echo '<td>' . $current_row["studioneve"] . '</td>';
        echo '<td>' . $current_row["mikor"] . '</td>';
        echo '<td><input type="submit" value="Módosít"></td>';
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
