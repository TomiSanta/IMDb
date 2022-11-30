<?php
$servername = "localhost";
$username = "imdb";
$password = "sjjqcqkc43";
$database = "imdb";
$conn =new mysqli($servername, $username, $password, $database);

$cim = $_POST['cim']; // get id through query string

$qry = mysqli_query($conn,"select * from film where cim='$cim'"); // select query

$row = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $cim = $_POST['cim'];
    $szereplok = $_POST['szereplok'];
    $mufaj = $_POST['mufaj'];
    $rendezo = $_POST['rendezo'];
    $korhatar = $_POST['korhatar'];
    $idotartam = $_POST['idotartam'];
    $studioneve = $_POST['studioneve'];
    $mikor = $_POST['mikor'];

    $edit = mysqli_query($conn,"update film set cim='$cim',  szereplok='$szereplok', mufaj='$mufaj', rendezo='$rendezo', korhatar='$korhatar', idotartam='$idotartam', studioneve='$studioneve', mikor='$mikor' where cim='$cim'");

    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location: film.php"); // redirects to all records page
    }
    else
    {
        error_log("A modositas nem volt sikeres:(");
    }

}
if(isset($_POST['delete'])){
    $cim = $_POST['cim'];

    $del = mysqli_query($conn, "delete from film where cim = '$cim'");

    if($del){
        mysqli_close($conn);
        header('Location: film.php');
    }
    else{
        error_log("A torles nem volt sikeres");
    }
}
?>
<html lang="hu">
<head>
    <title>Film módosítása</title>
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
            color: purple;
            background-color: lightgreen;
        }
        .button2{
            background-color: darkred;
            color: gold;
        }
        body {
            background: url("img/modosithatter.jpg");
        }
        #biztose{
            position: absolute;
            bottom: 20px;
            right: 650px;
        }
    </style>
</head>
<body>
<img src="img/biztosvagye.jpg" alt="Biztosan?" title="Biztosan meg akarod változtatni valamelyik adatot?" width="300" id="biztose">
<h1>Adatok módosítása</h1>

<form method="get" action="index.php">
    <button class="button" type="submit">Főoldalra</button>
</form>

<div>Írja be az új adatokat! A cím nem módosítható!</div>

<form method="POST">
    <label>Cím:</label><label for="film"></label><input type="text" name="cim" value="<?php echo $row['cim'] ?>" placeholder="Film címe" >
    <label>Szereplők:</label><label for="film"></label><input type="text" name="szereplok" value="<?php echo $row['szereplok'] ?>" placeholder="Szereplők neve(i)">
    <label>Műfaj:</label><label for="film"></label><input type="text" name="mufaj" value="<?php echo $row['mufaj'] ?>" placeholder="Műfaja">
    <label>Rendező:</label><label for="film"></label><input type="text" name="rendezo" value="<?php echo $row['rendezo'] ?>" placeholder="Rendezője">
    <label>Korhatára:</label><label for="film"></label><input type="number" name="korhatar" value="<?php echo $row['korhatar'] ?>" placeholder="Korhatára">
    <label>Időtartama:</label><label for="film"></label><input type="text" name="idotartam" value="<?php echo $row['idotartam'] ?>" placeholder="Időtartama">
    <label>Stúdióneve:</label><label for="film"></label><input type="text" name="studioneve" value="<?php echo $row['studioneve'] ?>" placeholder="Stúdió neve">
    <label>Mikori:</label><label for="film"></label><input type="date" name="mikor" value="<?php echo $row['mikor'] ?>" >
    <input type="submit" class="button" name="update" value="Film modosítása">

    <form method="post">
        <?php '<input type="hidden" name="cim" value="'.$cim.'">' ?>
        <td><input type="submit" class="button2" name="delete" value="Törlés"></td>
    </form>
</form>
<button class="button" onclick="history.go(-1);">Back </button>
</body>
</html>