<?php

$felhasznalonev = $_POST['felhasznalonev'];
$nev=$_POST['nev'];
$emailcim=$_POST['emailcim'];
$jelszo=$_POST['jelszo'];
$szulev = $_POST['szulev'];
$szulhonap = $_POST['szulhonap'];
$szulnap = $_POST['szulnap'];
$szuldatum = date('Y-m-d', mktime(0,0,0, $szulhonap, $szulnap, $szulev));
$database="imdb";
$servername = "localhost";
$username = "imdb";
$password = "sjjqcqkc43";


if(!empty($felhasznalonev)&&!empty($nev)&&!empty($emailcim)&&!empty($jelszo)&&!empty($szuldatum)){
    $conn =new mysqli($servername, $username, $password, $database);
    if (mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else {
        $sql="INSERT Into felhasznalo (felhasznalonev, nev, emailcim, jelszo, szuldatum) VALUES ('$felhasznalonev','$nev',' $emailcim', '$jelszo', '$szuldatum')";
        if ($conn->query($sql) === TRUE) {
            echo "Rekord felvitele sikeres<br>";
            header("Location: felhasznalo.php");
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
