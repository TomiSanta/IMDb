<?php
$servername = "localhost";
$username = "imdb";
$password = "sjjqcqkc43";
$database = "imdb";
$conn =new mysqli($servername, $username, $password, $database);

$nev = $_POST['nev']; // get id through query string

$qry = mysqli_query($conn,"select * from filmstudio where nev='$nev'"); // select query

$row = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $nev = $_POST['nev'];
    $helyszin = $_POST['helyszin'];


    $edit = mysqli_query($conn,"update filmstudio set nev='$nev', helyszin='$helyszin' where nev='$nev'");

    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location: filmstudio.php"); // redirects to all records page
    }
    else
    {
        error_log("A modositas nem volt sikeres:(");
    }

}
if(isset($_POST['delete'])){
    $nev = $_POST['nev'];

    $del = mysqli_query($conn, "delete from filmstudio where nev = '$nev'");

    if($del){
        mysqli_close($conn);
        header('Location: filmstudio.php');
    }
    else{
        error_log("A torles nem volt sikeres");
    }
}
?>
<html lang="hu">

<head>
    <title>Filmstúdió módosítása</title>
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

<div>Írja be az új adatokat! A név nem módosítható!</div>

<form method="POST">
    <label>Név:</label><label for="filmstudio"></label><input type="text" name="nev" value="<?php echo $row['nev'] ?>" placeholder="Név" Required>
    <label>Helyszíne:</label><label for="filmstudio"></label><input type="text" name="helyszin" value="<?php echo $row['helyszin'] ?>" placeholder="helyszin">

    <input type="submit" class="button" name="update" value="Filmstúdió modosítása">

    <form method="post">
        <?php '<input type="hidden" name="nev" value="'.$nev.'">' ?>
        <td><input type="submit" class="button2" name="delete" value="Törlés"></td>
    </form>
</form>
<button class="button" onclick="history.go(-1);">Back </button>
</body>
</html>
