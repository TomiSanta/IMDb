<html lang="hu">
<head>
    <title>Felhasználók</title>
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
    <h1>Felhasználók:</h1>

    <form method="get" action="index.php">
        <button class="button" type="submit">Főoldalra</button>
    </form>

    <div>Írja be az adatokat a megfelelő mezőkbe!</div>


    <form action="felhasznalohozzaadasa.php" method="POST">


        <label>Felhasználónév:</label><label for="felhasznalo"></label>
        <input type="text" id="felhasznalonev" name="felhasznalonev" placeholder="Felhasználónév" minlength="5" required/>


        <label>Név:</label><label for="felhasznalo"></label>
        <input type="text" id="nev" name="nev" placeholder="Név" minlength="6" required/>


        <label>E-mail cím:</label><label for="felhasznalo"></label>
        <input type="text" id="email" name="emailcim" placeholder="valami@valami.com" required/>

        <label>Jelszó:</label><label for="felhasznalo"></label>
        <input type="text" id="jelszo" name="jelszo" placeholder="******" minlength="4" required/>

        <label>Születési dátum:</label><label for="felhasznalo"></label>
        <select name="szulev">
            <?php
            for($i=1940; $i<=date("Y"); $i++){
                echo '<option value"'.$i.'">'.$i.'</option>';
            }
            ?>
        </select> év &nbsp
        <select name="szulhonap">
            <?php
            for($i=1; $i<=12; $i++){
                echo '<option value"'.$i.'">'.$i.'</option>';
            }
            ?>
        </select> hónap &nbsp
        <select name="szulnap">
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


    $sql = "SELECT felhasznalonev, nev, emailcim, szuldatum, jelszo, szuldatum FROM felhasznalo"; // ez csak egy string, még nem hajtódik végre
    $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!'); // végrehajtjuk az SQL utasítást

    // html táblázatként íratjuk ki;
    echo '<table border=1>';
    echo '<tr>';            // táblázat fejléce
    echo '<th>Felhasználónév</th>';
    echo '<th>Név</th>';
    echo '<th>E-mail cím</th>';
    echo '<th>Jelszó</th>';
    echo '<th>Születési dátum</th>';
    echo '</tr>';

    // a táblázat sorai
    while ( ($current_row = mysqli_fetch_assoc($res))) {    // most asszociatív tömbként kezeljük a sorokat
        echo '<form action="felhasznalomodositas.php" method="post">';
        echo '<tr>';
        echo '<td>' . $current_row["felhasznalonev"] . '</td>';
        echo '<td>' . $current_row["nev"] . '</td>';
        echo '<td>' . $current_row["emailcim"] . '</td>';
        echo '<td>' . $current_row["jelszo"] . '</td>';
        echo '<td>' . $current_row["szuldatum"] . '</td>';
        echo '<td><input type="submit" value="Módosít"></td>';
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