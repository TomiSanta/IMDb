<?php
$servername = "localhost";
$username = "imdb";
$password = "sjjqcqkc43";
$database = "imdb";
$conn =new mysqli($servername, $username, $password, $database);

$felhasznalonev = $_POST['felhasznalonev'];
$cim = $_POST['cim'];


$qry = mysqli_query($conn,"select * from filmet_keres where felhasznalonev = '$felhasznalonev' AND cim='$cim'");

$row = mysqli_fetch_array($qry);

if(isset($_POST['delete'])){
    $felhasznalonev = $_POST['felhasznalonev'];
    $cim = $_POST['cim'];


    $torles = mysqli_query($conn, "delete from filmet_keres where felhasznalonev = '$felhasznalonev' AND cim='$cim'");

    if ($torles) {
        mysqli_close($conn);
        header('Location: filmet_keres.php');
    } else {
        echo "Sikertelen törlés!";
    }
}

?>

<html lang="hu">
<head>
    <title>Filmet keresett törlése</title>
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

        body {
            background: url("img/modosithatter.jpg");
        }
    </style>

</head>
<body>

<h1>Film keresés törlése</h1>


<form method="get" action="filmet_keres.php">
    <button type="submit">Vissza</button>
</form>


<form method="post" >
    <label>Felhasználó neve:</label><label for="filmet_keres"></label><input type="text" name="felhasznalonev" value="<?php echo $row['felhasznalonev'] ?>" placeholder="Felhasználó neve" >
    <label>Film címe:</label><label for="filmet_keres"></label><input type="text" name="cim" value="<?php echo $row['cim'] ?>" placeholder="Film címe" >
    <form method="post">
        <?php '<input type="hidden" name="felhasznalonev" value="'.$felhasznalonev.'">' && '<input type="hidden" name="cim" value="'.$cim.'">' ?>
        <td><input type="submit" class="button" name="delete" value="Törlés"></td>
    </form>
</form>
</body>
</html>


