<?php

$felhasznalonev = $_POST['felhasznalonev'];
$cim=$_POST['cim'];
$database="imdb";
$servername = "localhost";
$username = "imdb";
$password = "sjjqcqkc43";

if(!empty($felhasznalonev)||!empty($cim)){
    $conn =new mysqli($servername, $username, $password, $database);
    if (mysqli_connect_error()) {
        die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
    else {
        $sql="INSERT Into sorozatot_keres (felhasznalonev, cim) VALUES ('$felhasznalonev', '$cim')";
        if ($conn->query($sql) === TRUE) {
            echo "Rekord felvitele sikeres<br>";
            header("Location: sorozatot_keres.php");
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
<head>
</head>
<body>
</body>
</html>


