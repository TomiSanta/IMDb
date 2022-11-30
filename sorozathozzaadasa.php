<?php

$cim = $_POST['cim'];
$evadszam=$_POST['evadszam'];
$szereplok=$_POST['szereplok'];
$mufaj=$_POST['mufaj'];
$rendezo = $_POST['rendezo'];
$studioneve = $_POST['studioneve'];
$mikorev = $_POST['mikorev'];
$mikorhonap = $_POST['mikorhonap'];
$mikornap = $_POST['mikornap'];
$mikor = date('Y-m-d', mktime(0,0,0, $mikorhonap, $mikornap, $mikorev));
$database="imdb";
$servername = "localhost";
$username = "imdb";
$password = "sjjqcqkc43";


if(!empty($cim)||!empty($evadszam)||!empty($szereplok)||!empty($mufaj)||!empty($rendezo)||!empty($studioneve)||!empty($mikor)){
    $conn =new mysqli($servername, $username, $password, $database);
    if (mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else {
        $sql="INSERT Into sorozat (cim, evadszam, szereplok, mufaj, rendezo, studioneve, mikor) VALUES ('$cim','$evadszam',' $szereplok', '$mufaj', '$rendezo', '$studioneve', '$mikor')";
        if ($conn->query($sql) === TRUE) {
            echo "Rekord felvitele sikeres<br>";
            header("Location: sorozat.php");
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

