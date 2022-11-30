<?php
$servername = "localhost";
$username = "imdb";
$password = "sjjqcqkc43";
$database = "imdb";
$conn =new mysqli($servername, $username, $password, $database);

$felhasznalonev = $_POST['felhasznalonev']; // get id through query string

$qry = mysqli_query($conn,"select * from felhasznalo where felhasznalonev='$felhasznalonev'"); // select query

$row = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $felhasznalonev = $_POST['felhasznalonev'];
    $nev = $_POST['nev'];
    $emailcim = $_POST['emailcim'];
    $jelszo = $_POST['jelszo'];
    $szuldatum = $_POST['szuldatum'];

    $edit = mysqli_query($conn,"update felhasznalo set felhasznalonev='$felhasznalonev', nev='$nev', emailcim='$emailcim', jelszo='$jelszo', szuldatum='$szuldatum' where felhasznalonev='$felhasznalonev'");

    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location: felhasznalo.php"); // redirects to all records page
    }
    else
    {
        error_log("A modositas nem volt sikeres:(");
    }

}
if(isset($_POST['delete'])){
    $felhasznalonev = $_POST['felhasznalonev'];

    $del = mysqli_query($conn, "delete from felhasznalo where felhasznalonev = '$felhasznalonev'");

    if($del){
        mysqli_close($conn);
        header('Location: felhasznalo.php');
    }
    else{
        error_log("A torles nem volt sikeres");
    }
}
?>
<html lang="hu">
<head>
    <title>Felhasználó módosítása</title>
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

<div>Írja be az új adatokat! A felhasználónév nem módosítható!</div>

<form method="POST">
    <label>Felhasználónév:</label><label for="felhasznalo"></label><input type="text" name="felhasznalonev" value="<?php echo $row['felhasznalonev'] ?>" placeholder="felhasználónév" Required>
    <label>Név:</label><label for="felhasznalo"></label><input type="text" name="nev" value="<?php echo $row['nev'] ?>" placeholder="nev">
    <label>E-mail cím:</label><label for="felhasznalo"></label><input type="text" name="emailcim" value="<?php echo $row['emailcim'] ?>" placeholder="valami@valami.com" Required>
    <label>Jelszó:</label><label for="felhasznalo"></label><input type="text" name="jelszo" value="<?php echo $row['jelszo'] ?>" placeholder="*****" Required>
    <label>Születési dátum:</label><label for="felhasznalo"></label><input type="date" name="szuldatum" value="<?php echo $row['szuldatum'] ?>" >
    <input type="submit" class="button" name="update" value="Felhasználó modosítása">

    <form method="post">
        <?php '<input type="hidden" name="felhasznalonev" value="'.$felhasznalonev.'">' ?>
        <td><input type="submit" class="button2" name="delete" value="Törlés"></td>
    </form>
</form>
<button class="button" onclick="history.go(-1);">Vissza </button>
</body>
</html>