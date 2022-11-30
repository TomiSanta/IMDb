<?php
$servername = "localhost";
$username = "imdb";
$password = "sjjqcqkc43";
$database = "imdb";
$conn =new mysqli($servername, $username, $password, $database);

$felhasznalonev = $_POST['felhasznalonev'];
$cim = $_POST['cim'];


$qry = mysqli_query($conn,"select * from sorozatot_keres where felhasznalonev = '$felhasznalonev' AND cim='$cim'");

$row = mysqli_fetch_array($qry);

if(isset($_POST['delete'])){
    $felhasznalonev = $_POST['felhasznalonev'];
    $cim = $_POST['cim'];


    $torles = mysqli_query($conn, "delete from sorozatot_keres where felhasznalonev = '$felhasznalonev' AND cim='$cim'");

    if ($torles) {
        mysqli_close($conn);
        header('Location: sorozatot_keres.php');
    } else {
        echo "Nem sikerült a törlés!";
    }
}

?>

<html lang="hu">
<head>
    <title>Sorozatott keresett törlése</title>
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

<h1>Sorozatot keresett törlése</h1>


<form method="get" action="sorozatot_keres.php">
    <button type="submit">Vissza</button>
</form>


<form method="post" >
    <label>Felhasználó neve:</label><label for="sorozatot_keres"></label><input type="text" name="felhasznalonev" value="<?php echo $row['felhasznalonev'] ?>"required>
    <label>Sorozat címe:</label><label for="sorozatot_keres"></label><input type="text" name="cim" value="<?php echo $row['cim'] ?>" required>
    <?php '<input type="hidden" name="felhasznalonev" value="'.$felhasznalonev.'">' && '<input type="hidden" name="cim" value="'.$cim.'">' ?>
    <input type="submit" name="delete" value="Sorozat törlése">
</form>
</body>
</html>

