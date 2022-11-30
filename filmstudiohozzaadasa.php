<?php

$nev = $_POST['nev'];
$helyszin=$_POST['helyszin'];
$database="imdb";
$servername = "localhost";
$username = "imdb";
$password = "sjjqcqkc43";


if(!empty($nev)&&!empty($helyszin)){
    $conn =new mysqli($servername, $username, $password, $database);
    if (mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else {
        $sql="INSERT Into filmstudio (nev, helyszin) VALUES ('$nev','$helyszin')";
        if ($conn->query($sql) === TRUE) {
            echo "Rekord felvitele sikeres<br>";
            header("Location: filmstudio.php");
        } else {
            echo "Hiba a rekort felvitelekor: " . $conn->error;
        }

    }
}
else{
    echo "Nincs minden mező helyesen kitöltve";
}
?>

<html>
<body>
<head>
</head>
</body>
</html>
